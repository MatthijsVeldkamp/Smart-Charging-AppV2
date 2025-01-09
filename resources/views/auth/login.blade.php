@extends('layouts.app')

@section('content')
    <div class="fixed inset-0 z-0 animate-fade-in">
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#1f1f1f_1px,transparent_1px),linear-gradient(to_bottom,#1f1f1f_1px,transparent_1px)] bg-[size:4rem_4rem] [mask-image:radial-gradient(ellipse_60%_60%_at_50%_50%,#000_40%,transparent_100%)]">
            <!-- Grid Background -->
            <div class="relative w-full h-[200vh] z-10"> <!-- Added z-index to keep grid below hero text -->
                <div class="absolute w-16 h-16 bg-[#141414] opacity-40 border border-white/5" style="top: 4rem; left: 8rem;"></div>
                <div class="absolute w-16 h-16 bg-[#141414] opacity-40 border border-white/5" style="top: 12rem; left: 20rem;"></div>
                <div class="absolute w-16 h-16 bg-[#141414] opacity-40 border border-white/5" style="top: 8rem; left: 28rem;"></div>
                <div class="absolute w-16 h-16 bg-[#141414] opacity-40 border border-white/5" style="top: 16rem; left: 16rem;"></div>
                <div class="absolute w-16 h-16 bg-[#141414] opacity-40 border border-white/5" style="top: 20rem; left: 24rem;"></div>
                <div class="absolute w-16 h-16 bg-[#141414] opacity-40 border border-white/5" style="top: 24rem; left: 12rem;"></div>
                <div class="absolute w-16 h-16 bg-[#141414] opacity-40 border border-white/5" style="top: 28rem; left: 32rem;"></div>
                <div class="absolute w-16 h-16 bg-[#141414] opacity-40 border border-white/5" style="top: 8rem; left: 40rem;"></div>
                <div class="absolute w-16 h-16 bg-[#141414] opacity-40 border border-white/5" style="top: 16rem; left: 36rem;"></div>
                <div class="absolute w-16 h-16 bg-[#141414] opacity-40 border border-white/5" style="top: 4rem; left: 24rem;"></div>
                <div class="absolute w-16 h-16 bg-[#141414] opacity-40 border border-white/5" style="top: 32rem; left: 16rem;"></div>
                <div class="absolute w-16 h-16 bg-[#141414] opacity-40 border border-white/5" style="top: 20rem; left: 44rem;"></div>
                <div class="absolute w-16 h-16 bg-[#141414] opacity-40 border border-white/5" style="top: 28rem; left: 8rem;"></div>
                <div class="absolute w-16 h-16 bg-[#141414] opacity-40 border border-white/5" style="top: 12rem; left: 48rem;"></div>
                <div class="absolute w-16 h-16 bg-[#141414] opacity-40 border border-white/5" style="top: 36rem; left: 28rem;"></div>
            </div>
        </div>
    </div>
    <x-hamburger-menu />
    <main class="relative z-10 min-h-screen flex flex-col items-center justify-center px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl sm:text-6xl font-bold text-text mb-6 animate-slide-up">Please login</h1>
            </div>
       

    <form method="POST" action="{{ route('login') }}" class="bg-primary/95 backdrop-blur-sm border border-white/10 rounded-lg p-6 shadow-lg max-w-md mx-auto mt-16 z-20"> <!-- Increased max-width for a wider form -->
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-text" />
            <x-text-input id="email" class="block mt-1 w-full bg-transparent border border-gray-300 rounded-lg focus:border-accent focus:ring focus:ring-accent/50" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" style="background-color: transparent;" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-text" />

            <x-text-input id="password" class="block mt-1 w-full bg-transparent border border-gray-300 rounded-lg focus:border-accent focus:ring focus:ring-accent/50"
                            type="password"
                            name="password"
                            required autocomplete="current-password" style="background-color: transparent;" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-accent shadow-sm focus:ring-accent" name="remember" value="1">
                <span class="ms-2 text-sm text-text">{{ __('Remember me') }}</span>
            </label>
        </div> -->

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-text hover:text-accent rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3 bg-accent text-text hover:bg-accent/90">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
@endsection
