<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChargeSession;

class SessionController extends Controller
{
    public function startSession($id)
    {
        $session = new \App\Models\ChargeSession();
        $session->socket_id = $id;
        $session->user_id = auth()->user()->id;
        $session->time_begin = now();
        $session->save();

        return redirect()->back();
    }

    public function stopSession($id)
    {
        $session = ChargeSession::where('socket_id', $id)->first();
        $session->time_end = now();
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
