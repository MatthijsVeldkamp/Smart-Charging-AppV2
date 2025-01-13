<x-app-layout>
    @section('content')
    <x-hamburger-menu />

        <!-- Main Content -->
        <main class="relative z-10 min-h-screen flex flex-col items-center justify-center px-4 sm:px-6 lg:px-8">
            <div class="text-center welcome-fade-in">
                <h1 class="text-4xl sm:text-6xl font-bold text-text mb-6">Socket Page for {{ env('APP_NAME') }}</h1>
                <p class="text-secondary text-lg sm:text-xl max-w-2xl mx-auto mb-8">
                This is the socket page where you can manage your socket connections and settings. Explore the features available to enhance your experience.
                </p>
                <a href="{{ route('dashboard') }}" class="bg-primary border border-accent/50 text-text px-6 py-3 rounded-lg transition-all duration-300 hover:bg-primary/90 hover:border-accent hover:shadow-lg hover:shadow-accent/20 hover:scale-105 hover:-translate-y-1 welcome-fade-in">
                    Go to Dashboard
                </a>
            </div>
        </main>
    @endsection
</x-app-layout>