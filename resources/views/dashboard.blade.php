@extends('layouts.app')

@section('content')
    <div class="fixed inset-0 z-0 animate-fade-in">
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#1f1f1f_1px,transparent_1px),linear-gradient(to_bottom,#1f1f1f_1px,transparent_1px)] bg-[size:4rem_4rem] [mask-image:radial-gradient(ellipse_60%_60%_at_50%_50%,#000_40%,transparent_100%)]">
            <!-- Grid Background -->
            <div class="relative w-full h-[150vh] z-10">
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
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <main class="relative z-10 min-h-screen flex flex-col items-center justify-center px-4 sm:px-6 lg:px-8">
        </main>
    </x-app-layout>
@endsection