<?php

namespace App\Http\Controllers;

use App\Models\SmartMeter;
use Illuminate\Http\Request;
use PhpMqtt\Client\Facades\MQTT;

class SmartMeterController extends Controller
{
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

        $smartMeter = SmartMeter::create($validated);

        // MQTT verbinding testen
        try {
            $mqtt = MQTT::connection();
            $topic = "cmnd/tasmota_" . $smartMeter->socket_id . "/POWER";
            $mqtt->publish($topic, 'OFF', 0);
            $mqtt->disconnect();
        } catch (\Exception $e) {
            // Log de fout
            \Log::error('MQTT connection failed: ' . $e->getMessage());
        }

        return redirect()->route('sockets')->with('success', 'Slimme meter succesvol toegevoegd!');
    }

    public function togglePower(SmartMeter $smartMeter)
    {
        try {
            $mqtt = MQTT::connection();
            $topic = "cmnd/tasmota_" . $smartMeter->socket_id . "/POWER";
            
            // Toggle de status
            $newStatus = $smartMeter->status === 'active' ? 'inactive' : 'active';
            $powerCommand = $newStatus === 'active' ? 'ON' : 'OFF';
            
            $mqtt->publish($topic, $powerCommand, 0);
            $mqtt->disconnect();

            // Update de status in de database
            $smartMeter->update(['status' => $newStatus]);

            return response()->json([
                'success' => true,
                'status' => $newStatus,
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
} 