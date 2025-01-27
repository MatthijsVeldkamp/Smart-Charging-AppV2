<?php

// Definieert de namespace voor deze controller
namespace App\Http\Controllers\Auth;

// Importeert de benodigde klassen
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

// Definieert de PasswordController klasse die de basis Controller klasse uitbreidt
class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    // Methode om het wachtwoord van de gebruiker bij te werken, verwacht een Request object en geeft een RedirectResponse terug
    public function update(Request $request): RedirectResponse
    {
        // Valideert de ingevoerde gegevens met specifieke regels en slaat fouten op in de 'updatePassword' bag
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'], // Controleert of het huidige wachtwoord is ingevuld en correct is
            'password' => ['required', Password::defaults(), 'confirmed'], // Controleert of het nieuwe wachtwoord voldoet aan de standaard eisen en is bevestigd
        ]);

        // Werkt het wachtwoord van de ingelogde gebruiker bij met het nieuwe gehashte wachtwoord
        $request->user()->update([
            'password' => Hash::make($validated['password']), // Hash het nieuwe wachtwoord voordat het wordt opgeslagen
        ]);

        // Stuurt de gebruiker terug naar de vorige pagina met een status bericht
        return back()->with('status', 'password-updated');
    }
}
