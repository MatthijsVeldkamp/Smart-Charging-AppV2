<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddSocketController extends Controller
{
    public function index($id)
    {
        return view('sockets.add', ['id' => $id]);
    }
}
