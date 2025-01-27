<?php

// Definieert de namespace voor deze controller
namespace App\Http\Controllers;

// Importeert de Request class voor het afhandelen van HTTP requests
use Illuminate\Http\Request;
// Importeert de Auth facade voor authenticatie functionaliteit
use Illuminate\Support\Facades\Auth;

// Definieert de DashboardController class
class DashboardController
{
    // De index methode die wordt aangeroepen wanneer de dashboard pagina wordt bezocht
    public function index()
    {
        // Haalt de momenteel ingelogde gebruiker op
        $user = Auth::user();

        // Controleert of er een gebruiker is ingelogd
        if (!$user) {
            // Zo niet, redirect naar de login pagina met een foutmelding
            return redirect()->route('login')->with('error', 'You must be logged in to access the dashboard.');
        }

        // Haalt het e-mailadres van de ingelogde gebruiker op
        $email = $user->email;

        // Toont de dashboard view en geeft het e-mailadres door
        return view('dashboard', compact('email'));
    }
} 