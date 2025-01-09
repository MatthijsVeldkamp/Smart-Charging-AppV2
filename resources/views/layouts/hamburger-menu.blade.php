<div class="fixed top-0 left-0 h-screen w-64 transform transition-transform duration-300 ease-in-out z-50 -translate-x-full" id="sidebar">
    <div class="h-full bg-primary/95 backdrop-blur-sm border-r border-white/10 pt-4 flex flex-col">
        <button onclick="toggleMenu()" class="absolute top-4 right-4 text-text/80 hover:text-accent transition-colors duration-200">
            <i class="fas fa-times text-xl"></i>
        </button>
        
        <!-- Main Navigation -->
        <nav class="mt-12 px-4 flex-1">
            <a href="#" class="group flex items-center py-2.5 px-4 text-text/80 hover:text-accent rounded-lg transition-all duration-200">
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
                <i class="fas fa-sign-out-alt w-5"></i>
                <span class="ml-3 transition-transform duration-200 group-hover:translate-x-1">Logout</span>
            </a>
        </nav>
    </div>
</div> 