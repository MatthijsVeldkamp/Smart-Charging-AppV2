<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\SmartMeterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AddSocketController;
use App\Http\Controllers\SocketController;
use Illuminate\Support\Facades\Route;

// Toont de welkomstpagina
Route::get('/', function () {
    return view('welcome');
});

// Toont het dashboard voor ingelogde en geverifieerde gebruikers
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Toont de sockets pagina voor ingelogde en geverifieerde gebruikers
Route::get('/sockets', function () {
    return view('sockets');
})->middleware(['auth', 'verified'])->name('sockets');

// Groep van routes voor ingelogde gebruikers gerelateerd aan profielbeheer
Route::middleware('auth')->group(function () {
    // Toont het profiel bewerkingsformulier
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Verwerkt de profielupdate
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Verwijdert het gebruikersprofiel
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Alternatieve route voor de homepagina
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Toont het registratieformulier
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
// Verwerkt de registratie van een nieuwe gebruiker
Route::post('/register', [RegisteredUserController::class, 'store']);

// Groep van routes voor ingelogde gebruikers gerelateerd aan smart meters
Route::middleware(['auth'])->group(function () {
    // Toont overzicht van alle sockets
    Route::get('/sockets', [SmartMeterController::class, 'index'])->name('sockets');
    // Slaat een nieuwe smart meter op
    Route::post('/smart-meters', [SmartMeterController::class, 'store'])->name('smart-meters.store');
    // Schakelt de stroomtoevoer van een smart meter aan/uit
    Route::post('/smart-meters/{smartMeter}/toggle', [SmartMeterController::class, 'togglePower'])->name('smart-meters.toggle');
    // Verwijdert een smart meter
    Route::delete('/smart-meters/{smartMeter}', [SmartMeterController::class, 'destroy'])->name('smart-meters.destroy');
    // Stelt het vermogen in voor een smart meter
    Route::post('/smart-meters/{smartMeter}/power', [SmartMeterController::class, 'setPower'])
        ->name('smart-meters.power')
        ->middleware('web');
    // Toont het formulier voor het toevoegen van een socket
    Route::get('/sockets/add/{id}', [AddSocketController::class, 'index'])->name('sockets.add');
    // Toont details van een specifieke socket
    Route::get('/socket/{id}', [SmartMeterController::class, 'show'])->name('socket.show');
});

// Haalt de status op van alle sockets voor ingelogde gebruikers
Route::get('/socket-statuses', [SmartMeterController::class, 'getAllSocketStatuses'])->middleware('auth');

// Laadt de authenticatie routes
require __DIR__.'/auth.php';
