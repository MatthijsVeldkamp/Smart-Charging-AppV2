<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\SmartMeterController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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
    Route::post('/smart-meters/{smartMeter}/power', [SmartMeterController::class, 'setPower'])
        ->name('smart-meters.power')
        ->middleware('web');
    Route::get('/adminpage', [AdminController::class, 'index']);

});

Route::get('/socket-statuses', [SmartMeterController::class, 'getAllSocketStatuses'])->middleware('auth');


require __DIR__.'/auth.php';
