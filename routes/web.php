<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\SmartMeterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AddSocketController;
use App\Http\Controllers\SocketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/sockets', function () {
    return view('sockets');
})->middleware(['auth', 'verified'])->name('sockets');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::middleware(['auth'])->group(function () {
    Route::get('/sockets', [SmartMeterController::class, 'index'])->name('sockets');
    Route::post('/smart-meters', [SmartMeterController::class, 'store'])->name('smart-meters.store');
    Route::post('/smart-meters/{smartMeter}/toggle', [SmartMeterController::class, 'togglePower'])->name('smart-meters.toggle');
    Route::delete('/smart-meters/{smartMeter}', [SmartMeterController::class, 'destroy'])->name('smart-meters.destroy');
    Route::get('/smart-meters/{smartMeter}/power', [SmartMeterController::class, 'setPowerOn'])
        ->name('smart-meters.poweron')
        ->middleware('web');
    Route::get('/smart-meters/{smartMeter}/poweroff', [SmartMeterController::class, 'setPowerOff'])
        ->name('smart-meters.poweroff')
        ->middleware('web');
    Route::get('/sockets/add/{id}', [AddSocketController::class, 'index'])->name('sockets.add');
    Route::get('/socket/{id}/status', [SessionController::class, 'status'])->name('socket.status');
    Route::get('/socket/{id}', [SmartMeterController::class, 'show'])->name('socket.show');
    Route::post('/socket/{id}/start', [SessionController::class, 'startSession'])->name('socket.start');
    Route::post('/socket/{id}/stop', [SessionController::class, 'stopSession'])->name('socket.stop');
});
Route::get('/socket/status/{id}', [SmartMeterController::class, 'getMeasurements'])->middleware('auth');
Route::get('/socket-measurements/{id}', [SmartMeterController::class, 'getMeasurements'])->name('socket-measurements');


require __DIR__.'/auth.php';
