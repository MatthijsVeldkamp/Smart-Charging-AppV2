<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to access the dashboard.');
        }

        // Now it's safe to access the user's email
        $email = $user->email;

        return view('dashboard', compact('email'));
    }
} 