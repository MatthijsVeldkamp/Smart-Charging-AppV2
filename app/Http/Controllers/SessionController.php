<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChargeSession;
use App\Models\SmartMeter;
use Illuminate\Support\Facades\Http;
class SessionController extends Controller
{
    public function startSession($id)
    {
        $smartMeter = SmartMeter::where('socket_id', $id)->first();
        $response = Http::get("http://{$smartMeter->ip_address}/cm?cmnd=Status%208");
        $data = json_decode($response, true);
        $total_energy_on_start = $data['StatusSNS']['ENERGY']['Total'];
        $session = new \App\Models\ChargeSession();
        $session->socket_id = $id;
        $session->user_id = auth()->user()->id;
        $session->time_begin = now();
        $session->total_energy_on_start = $total_energy_on_start;
        $session->save();

        return redirect()->back();
    }

    public function stopSession($id)
    {
        $session = ChargeSession::where('socket_id', $id)->first();
        $session->time_end = now();
        $smartMeter = SmartMeter::where('socket_id', $id)->first();
        $response = Http::get("http://{$smartMeter->ip_address}/cm?cmnd=Status%208");
        $data = json_decode($response, true);
        $total_energy_on_end = $data['StatusSNS']['ENERGY']['Total'];
        $session->total_energy_on_end = $total_energy_on_end;
        $session->used_energy_total = $total_energy_on_end - $session->total_energy_on_start;
        $session->save();

        return redirect()->back();
    }

    public function status($id)
    {
        $session = ChargeSession::where('socket_id', $id)->first();
        $status = 'off';
        if ($session && $session->time_begin && !$session->time_end) {
            $status = 'on';
        }
        return response()->json(['status' => $status]);
    }
}
