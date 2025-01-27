<?php

// Definieert de namespace voor deze controller
namespace App\Http\Controllers\Auth;

// Importeert de benodigde klassen
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

// Controller klasse voor het afhandelen van e-mailverificatie prompts
class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    // Methode die wordt aangeroepen wanneer de gebruiker de verificatiepagina bezoekt
    public function __invoke(Request $request): RedirectResponse|View
    {
        // Controleert of de gebruiker al geverifieerd is
        return $request->user()->hasVerifiedEmail()
                    // Als de gebruiker geverifieerd is, redirect naar het dashboard
                    ? redirect()->intended(route('dashboard', absolute: false))
                    // Als de gebruiker niet geverifieerd is, toon de verificatie-email pagina
                    : view('auth.verify-email');
    }
}
