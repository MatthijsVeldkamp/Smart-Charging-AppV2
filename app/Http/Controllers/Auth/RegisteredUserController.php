<?php

// Definieert de namespace voor deze controller
namespace App\Http\Controllers\Auth;

// Importeert de benodigde classes
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

// Definieert de controller class die de basis Controller class extend
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    // Methode om het registratieformulier weer te geven
    public function create(): View
    {
        // Retourneert de registratie view
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     */
    // Methode om een nieuwe gebruiker te registreren
    public function store(RegisterRequest $request)
    {
        // Maakt een nieuwe gebruiker aan in de database met de opgegeven gegevens
        $user = User::create([
            'name' => $request->name,          // Slaat de opgegeven naam op
            'email' => $request->email,        // Slaat het opgegeven emailadres op
            'username' => $request->username,  // Slaat de opgegeven gebruikersnaam op
            'password' => Hash::make($request->password),  // Slaat het gehashte wachtwoord op
            'role' => 'User'                  // Stelt de standaard rol in als 'User'
        ]);

        // Vuurt een Registered event af voor de nieuwe gebruiker
        event(new Registered($user));

        // Logt de nieuwe gebruiker automatisch in
        Auth::login($user);

        // Stuurt de gebruiker door naar het dashboard met een succesbericht
        return redirect()->route('dashboard')->with('success', 'Registration successful! You are now logged in.');
    }
}
