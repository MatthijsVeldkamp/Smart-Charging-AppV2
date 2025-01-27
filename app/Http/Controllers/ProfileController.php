<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Toon het profiel bewerkingsformulier van de gebruiker.
     */
    public function edit(Request $request): View
    {
        // Retourneer de view met de gebruikersgegevens
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Werk de profielinformatie van de gebruiker bij.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Vul de gevalideerde gebruikersgegevens in
        $request->user()->fill($request->validated());

        // Als het e-mailadres is gewijzigd, reset dan de verificatiestatus
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Sla de wijzigingen op in de database
        $request->user()->save();

        // Redirect terug naar de profielpagina met een statusmelding
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Verwijder het account van de gebruiker.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Valideer het wachtwoord voor het verwijderen van het account
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        // Haal de huidige gebruiker op
        $user = $request->user();

        // Log de gebruiker uit
        Auth::logout();

        // Verwijder het gebruikersaccount
        $user->delete();

        // Maak de sessie ongeldig
        $request->session()->invalidate();
        // Genereer een nieuw CSRF-token
        $request->session()->regenerateToken();

        // Redirect naar de homepage
        return Redirect::to('/');
    }
}
