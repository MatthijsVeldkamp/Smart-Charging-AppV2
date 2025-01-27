<?php

// Definieert de namespace voor deze controller
namespace App\Http\Controllers\Auth;

// Importeert de benodigde klassen
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

// Controller klasse voor het behandelen van wachtwoord reset links
class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    // Methode om het wachtwoord reset formulier weer te geven
    public function create(): View
    {
        // Retourneert de view voor het wachtwoord vergeten formulier
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // Methode om het versturen van de reset link te verwerken
    public function store(Request $request): RedirectResponse
    {
        // Valideer het email veld
        $request->validate([
            'email' => ['required', 'email'], // Email moet aanwezig zijn en een geldig email formaat hebben
        ]);

        
        
        // Verstuur de wachtwoord reset link naar het opgegeven emailadres
        $status = Password::sendResetLink(
            $request->only('email') // Haalt alleen het email veld uit het request
        );

        // Controleer of het versturen succesvol was en stuur een gepaste response terug
        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status)) // Bij succes: ga terug met een succes bericht
                    : back()->withInput($request->only('email')) // Bij falen: ga terug met het ingevulde email
                        ->withErrors(['email' => __($status)]); // En toon een foutmelding
    }
}
