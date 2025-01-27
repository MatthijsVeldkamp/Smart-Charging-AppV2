<?php

// Definieert de namespace voor deze controller
namespace App\Http\Controllers\Auth;

// Importeert de benodigde klassen
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

// Controller klasse voor het verifiëren van e-mailadressen
class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    // Enkele methode die wordt aangeroepen wanneer de verificatie-link wordt bezocht
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        // Controleert of de gebruiker al geverifieerd is
        if ($request->user()->hasVerifiedEmail()) {
            // Stuurt de gebruiker door naar het dashboard met een 'verified=1' parameter
            return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
        }

        // Markeert het e-mailadres als geverifieerd en slaat dit op in de database
        if ($request->user()->markEmailAsVerified()) {
            // Vuurt een Verified event af dat kan worden opgevangen door event listeners
            event(new Verified($request->user()));
        }

        // Stuurt de gebruiker door naar het dashboard met een 'verified=1' parameter
        return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
    }
}
