<?php

namespace App\Http\Controllers;

use App\Models\SmartMeter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;
class SmartMeterController extends Controller
{
    private function getMqttClient()
    {
        \Log::debug('Creating MQTT client with settings', [
            'host' => env('MQTT_HOST'),
            'port' => (int)env('MQTT_PORT'),
            'username' => env('MQTT_USERNAME')
        ]);

        return new MqttClient(
            env('MQTT_HOST', 'server.byimil.com'),
            (int)env('MQTT_PORT', 1883),
            env('MQTT_CLIENT_ID', 'laravel_' . uniqid())
        );
    }

    public function getAllSocketStatuses()
    {
        try {
            $smartMeters = SmartMeter::all();
            $statuses = [];

            foreach ($smartMeters as $meter) {
                $status = $this->getCurrentPowerState($meter->socket_id);
                $statuses[$meter->id] = $status;
                
                // Update database status als deze verschilt
                if ($status !== $meter->status) {
                    $meter->update(['status' => $status]);
                }
            }

            return response()->json(['success' => true, 'statuses' => $statuses]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    private function getCurrentPowerState($socketId)
    {
        try {
            // Haal de smart meter op om het IP-adres te krijgen
            $smartMeter = SmartMeter::where('socket_id', $socketId)->first();
            if (!$smartMeter) {
                throw new \Exception('Smart meter not found');
            }

            $response = Http::get("http://{$smartMeter->ip_address}/cm?cmnd=Power");
            
            if ($response->successful()) {
                $data = $response->json();
                return strtolower($data['POWER']) === 'on' ? 'active' : 'inactive';
            }

            return 'inactive';
        } catch (\Exception $e) {
            \Log::error('Status check failed: ' . $e->getMessage());
            return 'inactive';
        }
    }

    public function index()
    {
        // Check of de gebruiker is ingelogd en admin is
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
            // Sla de meter op
            $smartMeter = SmartMeter::create([
                'socket_id' => $validated['socket_id'],
                'name' => $validated['name'],
                'status' => 'inactive'  // Standaard status
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
        return view('sockets.socket', ['id' => $id]);
    }

    public function destroy(SmartMeter $smartMeter)
    {
        $smartMeter->delete();
        return redirect()->route('sockets')->with('success', 'Slimme meter succesvol verwijderd!');
    }   


    public function setPower(SmartMeter $smartMeter, Request $request)
    {
        try {
            $mqtt = $this->getMqttClient();
            
            // Maak verbinding met de MQTT server
            $connectionSettings = (new ConnectionSettings)
                ->setUsername(env('MQTT_USERNAME', 'powerapp'))
                ->setPassword(env('MQTT_PASSWORD', 'BeetleFanta24'));
            
            $mqtt->connect($connectionSettings);
            
            // Direct commando sturen via MQTT
            $topic = "cmnd/tasmota_" . $smartMeter->socket_id . "/POWER";
            $command = $request->action === 'on' ? 'ON' : 'OFF';
            
            \Log::info('Sending MQTT command', [
                'topic' => $topic,
                'command' => $command
            ]);
            
            $mqtt->publish($topic, $command, 0);
            $mqtt->disconnect();

            // Update database status
            $newStatus = $request->action === 'on' ? 'active' : 'inactive';
            $smartMeter->update(['status' => $newStatus]);

            return response()->json([
                'success' => true,
                'status' => $newStatus,
                'message' => 'Socket status succesvol bijgewerkt'
            ]);
        } catch (\Exception $e) {
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