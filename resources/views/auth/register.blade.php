@extends('layouts.app')

@section('content')
    <div class="fixed inset-0 z-0 animate-fade-in">
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#1f1f1f_1px,transparent_1px),linear-gradient(to_bottom,#1f1f1f_1px,transparent_1px)] bg-[size:4rem_4rem]">
            <!-- Grid Background -->
            <div class="relative w-full h-[200vh] z-10">
                <!-- Grid squares here -->
            </div>
        </div>
    </div>

    <main class="relative z-10 min-h-screen flex flex-col items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl sm:text-6xl font-bold text-text mb-6">Register</h1>
        </div>

        <form method="POST" action="{{ route('register') }}" class="bg-primary/95 backdrop-blur-sm border border-white/10 rounded-lg p-6 shadow-lg max-w-md mx-auto mt-16 z-20">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" class="text-text" />
                <x-text-input id="name" class="block mt-1 w-full bg-transparent border border-gray-300 rounded-lg focus:border-accent focus:ring focus:ring-accent/50" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" style="background-color: transparent;" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Username -->
            <div>
                <x-input-label for="username" :value="__('Username')" class="text-text" />
                <x-text-input id="username" class="block mt-1 w-full bg-transparent border border-gray-300 rounded-lg focus:border-accent focus:ring focus:ring-accent/50" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" style="background-color: transparent;" />
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" class="text-text" />
                <x-text-input id="email" class="block mt-1 w-full bg-transparent border border-gray-300 rounded-lg focus:border-accent focus:ring focus:ring-accent/50" type="email" name="email" :value="old('email')" required autocomplete="email" style="background-color: transparent;" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="text-text" />
                <x-text-input id="password" class="block mt-1 w-full bg-transparent border border-gray-300 rounded-lg focus:border-accent focus:ring focus:ring-accent/50" type="password" name="password" required autocomplete="new-password" style="background-color: transparent;" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Password Confirmation -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-text" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full bg-transparent border border-gray-300 rounded-lg focus:border-accent focus:ring focus:ring-accent/50" type="password" name="password_confirmation" required autocomplete="new-password" style="background-color: transparent;" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-3 bg-accent text-text hover:bg-accent/90">
                    {{ __('Register') }}
                </x-primary-button>
            </div>

        </form>
    </main>
@endsection
