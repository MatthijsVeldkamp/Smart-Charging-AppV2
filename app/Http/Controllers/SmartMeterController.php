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
        $smartMeter = SmartMeter::where('socket_id', $id)->first();
        
        if (!$smartMeter) {
            return view('sockets.socket', ['error' => 'Socket niet met id: ' . $id . ' niet gevonden', 'id' => $id]);
        }

        return view('sockets.socket', [
            'id' => $id,
            'role' => auth()->user()->role
        ]);
    }

    public function destroy(SmartMeter $smartMeter)
    {
        $smartMeter->delete();
        return redirect()->route('sockets')->with('success', 'Slimme meter succesvol verwijderd!');
    }   

    public function setPowerOn(SmartMeter $smartMeter, Request $request)
    {
        try {
            // Send power on command to the device with hardcoded IP
            $response = Http::get("http://192.168.92.185/cm?cmnd=Power%20On");

            if ($response->successful()) {
                // Update the status in database
                $smartMeter->update(['status' => 'active']);
                return redirect()->route('sockets')
                    ->with('success', 'Power turned on successfully');
            }

            throw new \Exception('Failed to turn power on');

        } catch (\Exception $e) {
            \Log::error('Failed to turn power on', [
                'smart_meter_id' => $smartMeter->id,
                'error' => $e->getMessage()
            ]);

            return redirect()->route('sockets')
                ->with('error', 'Failed to turn power on: ' . $e->getMessage());
        }
    }

    public function setPowerOff(SmartMeter $smartMeter, Request $request)
    {
        try {
            // Send power off command to the device with hardcoded IP
            $response = Http::get("http://192.168.92.185/cm?cmnd=Power%20Off");

            if ($response->successful()) {
                // Update the status in database
                $smartMeter->update(['status' => 'inactive']);
                return redirect()->route('sockets')
                    ->with('success', 'Power turned off successfully');
            }

            throw new \Exception('Failed to turn power off');

        } catch (\Exception $e) {
            return redirect()->route('sockets')
                ->with('error', 'Failed to turn power off: ' . $e->getMessage());
        }
    }

    public function getMeasurements($id)
    {
        $smartMeter = SmartMeter::where('socket_id', $id)->first();
        try {
            $response = Http::get("http://192.168.92.185/cm?cmnd=Status%208/cm?cmnd=Status%208");
            
            if ($response->successful()) {
                $data = $response->json();
                return response()->json([
                    'success' => true,
                    'data' => $data
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch measurements'
            ], 500);

        } catch (\Exception $e) {
            \Log::error('Failed to get measurements', [
                'socket_id' => $id,
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Error fetching measurements: ' . $e->getMessage()
            ], 500);
        }
        return response()->json($request);
    }
}