<!-- Hamburger Menu -->
<div class="fixed top-0 left-0 h-[calc(100vh-4rem)] w-64 transform transition-all duration-300 cubic-bezier(0.68, -0.55, 0.27, 1.55) z-50 -translate-x-full animate-fade-in delay-200 overflow-hidden" id="sidebar">
    <div class="h-full bg-primary/95 backdrop-blur-sm border-r border-white/10 pt-4 flex flex-col translate-y-0">
        <button onclick="toggleSidebar(event)" class="absolute top-4 right-4 text-text/80 hover:text-accent transition-colors duration-200">
            <i class="fas fa-times text-xl"></i>
        </button>
        
        <!-- Main Navigation -->
        <nav class="mt-12 px-4 flex-1 overflow-y-auto">
            <a href="{{ route('home') }}" class="group flex items-center py-2.5 px-4 text-text/80 hover:text-accent rounded-lg transition-all duration-200">
                <i class="fas fa-home w-5"></i>
                <span class="ml-3 transition-transform duration-200 group-hover:translate-x-1">Home</span>
            </a>
            <a href="#" class="group flex items-center py-2.5 px-4 text-text/80 hover:text-accent rounded-lg transition-all duration-200">
                <i class="fas fa-chart-line w-5"></i>
                <span class="ml-3 transition-transform duration-200 group-hover:translate-x-1">Dashboard</span>
            </a>
            <a href="#" class="group flex items-center py-2.5 px-4 text-text/80 hover:text-accent rounded-lg transition-all duration-200">
                <i class="fas fa-cog w-5"></i>
                <span class="ml-3 transition-transform duration-200 group-hover:translate-x-1">Settings</span>
            </a>
            <a href="#" class="group flex items-center py-2.5 px-4 text-text/80 hover:text-accent rounded-lg transition-all duration-200">
                <i class="fas fa-user w-5"></i>
                <span class="ml-3 transition-transform duration-200 group-hover:translate-x-1">Profile</span>
            </a>
            <a href="#" class="group flex items-center py-2.5 px-4 text-text/80 hover:text-accent rounded-lg transition-all duration-200">
                <i class="fas fa-globe w-5"></i>
                <span class="ml-3 transition-transform duration-200 group-hover:translate-x-1">Language</span>
            </a>
        </nav>

        <!-- Logout Section -->
        <div class="px-4 pb-6">
            
            @if (Auth::check())
                <div class="border-t border-white/10 my-2"></div>
                <a href="{{ route('logout') }}" class="group flex items-center py-2.5 px-4 text-text/80 hover:text-accent rounded-lg transition-all duration-200" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt w-5"></i>
                    <span class="ml-3 transition-transform duration-200 group-hover:translate-x-1">Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            @else
                <div class="border-t border-white/10 my-2"></div>
                <a href="{{ route('login') }}" class="group flex items-center py-2.5 px-4 text-text/80 hover:text-accent rounded-lg transition-all duration-200">
                    <i class="fas fa-sign-in-alt w-5"></i>
                    <span class="ml-3 transition-transform duration-200 group-hover:translate-x-1">Login</span>
                </a>
            @endif
        </div>
    </div>
</div>
<div class="fixed top-4 left-4 z-50 flex items-center gap-3 animate-fade-in delay-400">
    <button onclick="toggleSidebar(event)" class="p-2 text-text/70 hover:text-accent transition-colors duration-200">
        <i class="fas fa-bars text-2xl"></i>
    </button>
</div>

<!-- Sidebar Toggle Script -->
<script>
    function toggleSidebar(event) {
        if (event) {
            event.stopPropagation();
        }
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('-translate-x-full');
        
        // Remove the arrow after first click
        const arrowElement = document.querySelector('.animate-bounce-left');
        if (arrowElement) {
            arrowElement.style.opacity = '0';
            setTimeout(() => {
                arrowElement.remove();
            }, 300);
        }
    }

    // Close sidebar when clicking outside
    document.addEventListener('click', function(event) {
        const sidebar = document.getElementById('sidebar');
        const hamburgerButtons = document.querySelectorAll('[onclick="toggleSidebar(event)"]');
        
        if (!sidebar.contains(event.target) && 
            !Array.from(hamburgerButtons).some(button => button.contains(event.target)) && 
            !sidebar.classList.contains('-translate-x-full')) {
            sidebar.classList.add('-translate-x-full');
        }
    });
</script> 