<?php

namespace App\Http\Controllers;

use App\Models\SmartMeter;
use Illuminate\Http\Request;
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
            $mqtt = $this->getMqttClient();
            $connectionSettings = (new ConnectionSettings)
                ->setUsername(env('MQTT_USERNAME', 'powerapp'))
                ->setPassword(env('MQTT_PASSWORD', 'BeetleFanta24'));
            
            $mqtt->connect($connectionSettings);
            
            // Subscribe to the status topic
            $statusTopic = "stat/tasmota_" . $socketId . "/POWER";
            $status = null;
            
            $mqtt->subscribe($statusTopic, function ($topic, $message) use (&$status) {
                $status = strtolower($message) === 'on' ? 'active' : 'inactive';
            }, 0);

            // Request current state
            $commandTopic = "cmnd/tasmota_" . $socketId . "/POWER";
            $mqtt->publish($commandTopic, "", 0);
            
            // Process incoming messages for a short time
            $mqtt->loop(true, true, 2);
            $mqtt->disconnect();

            return $status ?? 'inactive';
        } catch (\Exception $e) {
            \Log::error('MQTT status check failed: ' . $e->getMessage());
            return 'inactive';
        }
    }

    public function index()
    {
        $smartMeters = SmartMeter::all();
        return view('sockets', compact('smartMeters'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'socket_id' => 'required|unique:smart_meters,socket_id',
            'name' => 'required|string|max:255',
        ]);

        try {
            $mqtt = $this->getMqttClient();
            $connectionSettings = (new ConnectionSettings)
                ->setUsername(env('MQTT_USERNAME', 'powerapp'))
                ->setPassword(env('MQTT_PASSWORD', 'BeetleFanta24'));
            
            $mqtt->connect($connectionSettings);
            
            // Zet de socket op OFF
            $topic = "cmnd/tasmota_" . $validated['socket_id'] . "/POWER";
            $mqtt->publish($topic, 'OFF', 0);
            
            // Wacht even en controleer de status
            sleep(1);
            $currentStatus = $this->getCurrentPowerState($validated['socket_id']);
            
            $mqtt->disconnect();

            // Sla de meter op met de huidige status
            $validated['status'] = $currentStatus;
            $smartMeter = SmartMeter::create($validated);

            return redirect()->route('sockets')->with('success', 'Slimme meter succesvol toegevoegd en uitgeschakeld!');
        } catch (\Exception $e) {
            \Log::error('MQTT connection failed: ' . $e->getMessage());
            return redirect()->route('sockets')->with('error', 'Er is een fout opgetreden bij het toevoegen van de meter.');
        }
    }

    public function togglePower(SmartMeter $smartMeter)
    {
        try {
            $mqtt = $this->getMqttClient();
            $connectionSettings = (new ConnectionSettings)
                ->setUsername(env('MQTT_USERNAME', 'powerapp'))
                ->setPassword(env('MQTT_PASSWORD', 'BeetleFanta24'));
            
            $mqtt->connect($connectionSettings);
            
            $topic = "cmnd/tasmota_" . $smartMeter->socket_id . "/POWER";
            
            // Toggle de status
            $newStatus = $smartMeter->status === 'active' ? 'inactive' : 'active';
            $powerCommand = $newStatus === 'active' ? 'ON' : 'OFF';
            
            $mqtt->publish($topic, $powerCommand, 0);
            
            // Wacht even en controleer de nieuwe status
            sleep(1);
            $actualStatus = $this->getCurrentPowerState($smartMeter->socket_id);
            
            // Update de status in de database met de werkelijke status
            $smartMeter->update(['status' => $actualStatus]);
            
            $mqtt->disconnect();

            return response()->json([
                'success' => true,
                'status' => $actualStatus,
                'message' => 'Socket status succesvol bijgewerkt'
            ]);
        } catch (\Exception $e) {
            \Log::error('MQTT toggle failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Kon de socket status niet bijwerken'
            ], 500);
        }
    }

    public function setPower(SmartMeter $smartMeter, Request $request)
    {
        try {
            $mqtt = $this->getMqttClient();
            
            // Direct commando sturen
            $topic = "cmnd/tasmota_" . $smartMeter->socket_id . "/POWER";
            $command = $request->action === 'on' ? 'ON' : 'OFF';
            
            \Log::info('Sending MQTT command', [
                'topic' => $topic,
                'command' => $command
            ]);
            
            $mqtt->publish($topic, $command, 0);

            // Update database status
            $newStatus = $request->action === 'on' ? 'active' : 'inactive';
            $smartMeter->update(['status' => $newStatus]);

            return response()->json([
                'success' => true,
                'status' => $newStatus,
                'message' => 'Socket status succesvol bijgewerkt'
            ]);
        } catch (\Exception $e) {
            \Log::error('MQTT command failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Kon de socket status niet bijwerken: ' . $e->getMessage()
            ], 500);
        }
    }
} 