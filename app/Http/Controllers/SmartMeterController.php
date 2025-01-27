<?php

// Definieert de namespace voor deze controller
namespace App\Http\Controllers;

// Importeert de benodigde klassen
use App\Models\SmartMeter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;

// Definieert de SmartMeterController klasse die extends van de basis Controller
class SmartMeterController extends Controller
{
    // Functie om een MQTT client instantie te maken
    private function getMqttClient()
    {
        // Logt debug informatie over de MQTT verbindingsinstellingen
        \Log::debug('Creating MQTT client with settings', [
            'host' => env('MQTT_HOST'),
            'port' => (int)env('MQTT_PORT'),
            'username' => env('MQTT_USERNAME')
        ]);

        // Maakt en retourneert een nieuwe MQTT client met de geconfigureerde instellingen
        return new MqttClient(
            env('MQTT_HOST', 'server.byimil.com'), // Host instelling met fallback waarde
            (int)env('MQTT_PORT', 1883),           // Poort instelling met fallback waarde
            env('MQTT_CLIENT_ID', 'laravel_' . uniqid()) // Unieke client ID
        );
    }

    // Functie om de status van alle sockets op te halen
    public function getAllSocketStatuses()
    {
        try {
            // Haalt alle smart meters op uit de database
            $smartMeters = SmartMeter::all();
            $statuses = [];

            // Loopt door alle meters heen
            foreach ($smartMeters as $meter) {
                // Haalt de huidige status op voor elke meter
                $status = $this->getCurrentPowerState($meter->socket_id);
                $statuses[$meter->id] = $status;
                
                // Update de database als de status is veranderd
                if ($status !== $meter->status) {
                    $meter->update(['status' => $status]);
                }
            }

            // Retourneert de verzamelde statussen als JSON response
            return response()->json(['success' => true, 'statuses' => $statuses]);
        } catch (\Exception $e) {
            // Retourneert een foutmelding als er iets mis gaat
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    // Functie om de huidige stroomstatus van een specifieke socket op te halen
    private function getCurrentPowerState($socketId)
    {
        try {
            // Zoekt de smart meter op basis van socket ID
            $smartMeter = SmartMeter::where('socket_id', $socketId)->first();
            if (!$smartMeter) {
                throw new \Exception('Smart meter not found');
            }

            // Stuurt een HTTP verzoek naar de meter om de stroomstatus op te halen
            $response = Http::get("http://{$smartMeter->ip_address}/cm?cmnd=Power");
            
            // Verwerkt de response
            if ($response->successful()) {
                $data = $response->json();
                return strtolower($data['POWER']) === 'on' ? 'active' : 'inactive';
            }

            return 'inactive';
        } catch (\Exception $e) {
            // Logt eventuele fouten en retourneert 'inactive' als fallback
            \Log::error('Status check failed: ' . $e->getMessage());
            return 'inactive';
        }
    }

    public function index()
    {
        if (!auth()->check() || auth()->user()->role !== 'Admin') {
            abort(403, 'Geen toegang tot deze pagina.');
        }
        $smartMeters = SmartMeter::all();
        return view('sockets', compact('smartMeters'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'socket_id' => 'required|string|unique:smart_meters,socket_id',
            'name' => 'required|string|max:255',
        ]);

        try {
            $smartMeter = SmartMeter::create([
                'socket_id' => $validated['socket_id'],
                'name' => $validated['name'],
                'status' => 'inactive'
            ]);

            \Log::info('Smart meter created:', [
                'id' => $smartMeter->id,
                'socket_id' => $smartMeter->socket_id,
                'name' => $smartMeter->name
            ]);

            return redirect()->route('sockets')
                ->with('success', 'Slimme meter succesvol toegevoegd!');
        } catch (\Exception $e) {
            \Log::error('Failed to add smart meter: ' . $e->getMessage());
            return redirect()->route('sockets')
                ->with('error', 'Er is een fout opgetreden bij het toevoegen van de meter: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $smartMeter = SmartMeter::where('socket_id', $id)->first();
        
        if (!$smartMeter) {
            return view('sockets.socket', ['error' => 'Socket niet met id: ' . $id . ' niet gevonden', 'id' => $id]);
        }

        return view('sockets.socket', ['id' => $id]);
    }

    public function destroy(SmartMeter $smartMeter)
    {
        $smartMeter->delete();
        return redirect()->route('sockets')->with('success', 'Slimme meter succesvol verwijderd!');
    }   

    // Functie om de stroomstatus van een meter te wijzigen
    public function setPower(SmartMeter $smartMeter, Request $request)
    {
        try {
            // Maakt een nieuwe MQTT client
            $mqtt = $this->getMqttClient();
            
            // Configureert de verbindingsinstellingen
            $connectionSettings = (new ConnectionSettings)
                ->setUsername(env('MQTT_USERNAME', 'powerapp'))
                ->setPassword(env('MQTT_PASSWORD', 'BeetleFanta24'));
            
            // Maakt verbinding met de MQTT server
            $mqtt->connect($connectionSettings);
            
            // Stelt het MQTT topic en commando samen
            $topic = "cmnd/tasmota_" . $smartMeter->socket_id . "/POWER";
            $command = $request->action === 'on' ? 'ON' : 'OFF';
            
            // Logt het MQTT commando
            \Log::info('Sending MQTT command', [
                'topic' => $topic,
                'command' => $command
            ]);
            
            // Verstuurt het commando en verbreekt de verbinding
            $mqtt->publish($topic, $command, 0);
            $mqtt->disconnect();

            // Werkt de database status bij
            $newStatus = $request->action === 'on' ? 'active' : 'inactive';
            $smartMeter->update(['status' => $newStatus]);

            // Retourneert een succesvolle response
            return response()->json([
                'success' => true,
                'status' => $newStatus,
                'message' => 'Socket status succesvol bijgewerkt'
            ]);
        } catch (\Exception $e) {
            // Logt en retourneert eventuele fouten
            \Log::error('MQTT command failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Kon de socket status niet bijwerken: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getMeasurements(SmartMeter $smartMeter)
    {
        try {
            $response = Http::get("http://{$smartMeter->ip_address}/cm?cmnd=Status%208");
            
            if ($response->successful()) {
                $data = $response->json();
                return response()->json([
                    'success' => true,
                    'data' => [
                        'power' => $data['StatusSNS']['ENERGY']['Power'] ?? 'N/A',
                        'voltage' => $data['StatusSNS']['ENERGY']['Voltage'] ?? 'N/A',
                        'current' => $data['StatusSNS']['ENERGY']['Current'] ?? 'N/A',
                        'total_energy' => $data['StatusSNS']['ENERGY']['Total'] ?? 'N/A',
                    ]
                ]);
            }

            throw new \Exception('Failed to get measurements');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Kon de metingen niet ophalen: ' . $e->getMessage()
            ], 500);
        }
    }
} 