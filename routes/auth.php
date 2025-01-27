<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    // Toont het registratieformulier
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    // Verwerkt het registratieformulier
    Route::post('register', [RegisteredUserController::class, 'store']);

    // Toont het inlogformulier
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    // Verwerkt het inlogformulier
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    // Toont het formulier voor wachtwoord vergeten
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    // Verwerkt het wachtwoord vergeten formulier en verstuurt reset e-mail
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    // Toont het formulier voor wachtwoord resetten
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    // Verwerkt het wachtwoord reset formulier
    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    // Toont de e-mail verificatie melding
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    // Verwerkt de e-mail verificatie link
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    // Verstuurt de verificatie e-mail opnieuw
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    // Toont het wachtwoord bevestigingsformulier
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    // Verwerkt het wachtwoord bevestigingsformulier
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    // Werkt het wachtwoord bij
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    // Verwerkt het uitloggen
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
