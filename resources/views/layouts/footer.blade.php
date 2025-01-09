<footer class="fixed bottom-0 left-0 right-0 bg-primary/95 backdrop-blur-sm border-t border-white/10 h-16 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center justify-between">
        <div class="text-text/60 text-sm">
            © {{ date('Y') }} {{ env('APP_NAME') }}
        </div>
        <div class="flex items-center space-x-6">
            <a href="#" class="group flex items-center text-text/60 hover:text-accent text-sm transition-colors duration-200">
                <i class="fab fa-github text-lg sm:mr-2 transition-transform duration-200 group-hover:scale-110"></i>
                <span class="hidden sm:inline">GitHub</span>
            </a>
            <a href="#" class="group flex items-center text-text/60 hover:text-accent text-sm transition-colors duration-200">
                <i class="fas fa-book text-lg sm:mr-2 transition-transform duration-200 group-hover:scale-110"></i>
                <span class="hidden sm:inline">Documentation</span>
            </a>
        </div>
    </div>
</footer>