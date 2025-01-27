<?php

// Definieert de namespace voor deze controller
namespace App\Http\Controllers\Auth;

// Importeert de benodigde classes
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

// Controller class voor het afhandelen van nieuwe wachtwoorden
class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    // Toont het wachtwoord reset formulier
    public function create(Request $request): View
    {
        // Geeft de reset-password view terug met het request object
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // Verwerkt het verzoek voor een nieuw wachtwoord
    public function store(Request $request): RedirectResponse
    {
        // Valideert de ingevoerde gegevens
        $request->validate([
            'token' => ['required'], // Controleert of er een token is meegegeven
            'email' => ['required', 'email'], // Controleert of er een geldig e-mailadres is ingevoerd
            'password' => ['required', 'confirmed', Rules\Password::defaults()], // Controleert het nieuwe wachtwoord
        ]);

        // Probeert het wachtwoord te resetten
        $status = Password::reset(
            // Haalt alleen de benodigde velden uit het request
            $request->only('email', 'password', 'password_confirmation', 'token'),
            // Callback functie die wordt uitgevoerd als de reset succesvol is
            function ($user) use ($request) {
                // Update het gebruikerswachtwoord en remember token
                $user->forceFill([
                    'password' => Hash::make($request->password), // Hasht het nieuwe wachtwoord
                    'remember_token' => Str::random(60), // Genereert een nieuwe remember token
                ])->save(); // Slaat de wijzigingen op in de database

                // Vuurt een PasswordReset event af
                event(new PasswordReset($user));
            }
        );

        // Controleert de status van de wachtwoordreset
        return $status == Password::PASSWORD_RESET
                    // Bij succes: redirect naar login pagina met succesbericht
                    ? redirect()->route('login')->with('status', __($status))
                    // Bij falen: terug naar vorige pagina met foutmelding
                    : back()->withInput($request->only('email'))
                        ->withErrors(['email' => __($status)]);
    }
}
