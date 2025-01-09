<x-app-layout>
    @section('content')
        <style>
            /* Fade-in animation for welcome page elements */
            .welcome-fade-in {
                opacity: 0;
                transform: translateY(20px);
                transition: opacity 0.8s cubic-bezier(0.25, 0.1, 0.25, 1), transform 0.8s cubic-bezier(0.25, 0.1, 0.25, 1); /* Adjust duration for a smoother effect */
                font-family: 'JetBrains Mono', monospace; /* Use JetBrains Mono font for a coding aesthetic */
            }

            .welcome-fade-in-active {
                opacity: 1;
                transform: translateY(0);
            }
        </style>

        <!-- Grid Background -->
        <div class="fixed inset-0 z-0 animate-fade-in">
            <div class="absolute inset-0 bg-[linear-gradient(to_right,#1f1f1f_1px,transparent_1px),linear-gradient(to_bottom,#1f1f1f_1px,transparent_1px)] bg-[size:4rem_4rem] [mask-image:radial-gradient(ellipse_60%_60%_at_50%_50%,#000_40%,transparent_100%)]" id="grid-background">
                <!-- First set of grid squares -->
                <div class="grid-squares absolute w-full h-full transition-transform duration-1000" id="grid-set-1">
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

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Delay before starting the fade-in effect
                const delay = 500; // Delay in milliseconds (1 second)
                const fadeInElements = document.querySelectorAll('.welcome-fade-in');

                setTimeout(() => {
                    fadeInElements.forEach((element, index) => {
                        setTimeout(() => {
                            element.classList.add('welcome-fade-in-active');
                        }, index * 300); // Stagger the fade-in effect
                    });
                }, delay); // Apply the delay before starting the fade-in
            });
        </script>

        <x-hamburger-menu />

        <!-- Main Content -->
        <main class="relative z-10 min-h-screen flex flex-col items-center justify-center px-4 sm:px-6 lg:px-8">
            <div class="text-center welcome-fade-in">
                <h1 class="text-4xl sm:text-6xl font-bold text-text mb-6">Welcome to {{ env('APP_NAME') }}</h1>
                <p class="text-secondary text-lg sm:text-xl max-w-2xl mx-auto mb-8">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan ante nunc, non pharetra dui tincidunt id. Aenean sollicitudin vestibulum lacus quis egestas.                </p>
                <button class="bg-primary border border-accent/50 text-text px-6 py-3 rounded-lg transition-all duration-300 hover:bg-primary/90 hover:border-accent hover:shadow-lg hover:shadow-accent/20 hover:scale-105 hover:-translate-y-1 welcome-fade-in">
                    Get Started
                </button>
            </div>
        </main>
    @endsection
</x-app-layout>
