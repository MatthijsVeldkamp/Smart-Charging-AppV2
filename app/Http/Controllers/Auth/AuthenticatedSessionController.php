<?php

// Definieert de namespace voor deze controller
namespace App\Http\Controllers\Auth;

// Importeert de benodigde classes
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;

// Definieert de authenticatie controller class
class AuthenticatedSessionController extends Controller
{
    
    // Methode om de login pagina weer te geven
    public function create(): View
    {
        // Geeft de login view terug
        return view('auth.login');
    }

    
    // Methode om het inlogverzoek te verwerken
    public function store(LoginRequest $request): RedirectResponse
    {
        // Haalt alleen het wachtwoord op uit het verzoek
        $credentials = $request->only('password');

        // Zoekt de gebruiker in de database op basis van gebruikersnaam of e-mail
        $user = User::where('username', $request->username)
                    ->orWhere('email', $request->username)
                    ->first();

        // Controleert of de gebruiker bestaat
        if ($user) {
            // Probeert in te loggen met gebruikersnaam of e-mail
            if (Auth::attempt(['username' => $user->username, 'password' => $request->password]) || 
                Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
                // Genereert een nieuwe sessie voor veiligheid
                $request->session()->regenerate();
                // Stuurt de gebruiker door naar het dashboard
                return redirect()->intended('dashboard');
            }
        }

        // Stuurt de gebruiker terug met een foutmelding als de inloggegevens niet kloppen
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

   
    // Methode om de gebruiker uit te loggen
    public function destroy(Request $request): RedirectResponse
    {
        // Logt de gebruiker uit
        Auth::guard('web')->logout();

        // Maakt de huidige sessie ongeldig
        $request->session()->invalidate();

        // Genereert een nieuwe CSRF token
        $request->session()->regenerateToken();

        // Stuurt de gebruiker terug naar de homepage
        return redirect('/');
    }
}
