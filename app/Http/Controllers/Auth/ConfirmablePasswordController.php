<?php

// Definieert de namespace voor deze controller
namespace App\Http\Controllers\Auth;

// Importeert de benodigde klassen
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

// Definieert de controller klasse die de basis Controller klasse uitbreidt
class ConfirmablePasswordController extends Controller
{
    /**
     * Show the confirm password view.
     */
    // Methode om het wachtwoordbevestigingsformulier weer te geven
    public function show(): View
    {
        // Retourneert de view voor wachtwoordbevestiging
        return view('auth.confirm-password');
    }

    /**
     * Confirm the user's password.
     */
    // Methode om het ingevoerde wachtwoord te valideren
    public function store(Request $request): RedirectResponse
    {
        // Controleert of het wachtwoord overeenkomt met het e-mailadres van de ingelogde gebruiker
        if (! Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            // Gooit een validatie-uitzondering als het wachtwoord niet correct is
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        // Slaat het tijdstip van wachtwoordbevestiging op in de sessie
        $request->session()->put('auth.password_confirmed_at', time());

        // Stuurt de gebruiker door naar de dashboard pagina of de oorspronkelijk bedoelde pagina
        return redirect()->intended(route('dashboard', absolute: false));
    }
}
