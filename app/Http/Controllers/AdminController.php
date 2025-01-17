<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Check of de gebruiker is ingelogd en admin is
        if (!auth()->check() || auth()->user()->role !== 'Admin') {
            abort(403, 'Geen toegang tot deze pagina.');
        }

        return view('adminpage');
    }
}
