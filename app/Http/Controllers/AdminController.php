<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Controleert of de gebruiker is ingelogd EN de rol 'Admin' heeft
        // auth()->check() kijkt of er een gebruiker is ingelogd
        // auth()->user()->role controleert de rol van de ingelogde gebruiker
        if (!auth()->check() || auth()->user()->role !== 'Admin') {
            // Als de gebruiker geen admin is of niet is ingelogd, toon een 403 foutmelding
            abort(403, 'Geen toegang tot deze pagina.');
        }

        // Retourneert de view 'adminpage' als de gebruiker wel toegang heeft
        return view('adminpage');
    }
}
