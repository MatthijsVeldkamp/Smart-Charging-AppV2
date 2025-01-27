<?php

// Definieert de namespace voor deze controller
namespace App\Http\Controllers\Auth;

// Importeert de benodigde klassen
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

// Controller klasse voor het afhandelen van email verificatie notificaties
class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    // Methode om een nieuwe verificatie email te versturen
    public function store(Request $request): RedirectResponse
    {
        // Controleert of de gebruiker al geverifieerd is
        if ($request->user()->hasVerifiedEmail()) {
            // Zo ja, redirect naar het dashboard
            return redirect()->intended(route('dashboard', absolute: false));
        }

        // Stuurt een nieuwe verificatie email naar de gebruiker
        $request->user()->sendEmailVerificationNotification();

        // Gaat terug naar de vorige pagina met een status bericht
        return back()->with('status', 'verification-link-sent');
    }
}
