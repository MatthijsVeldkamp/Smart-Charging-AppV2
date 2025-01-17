<x-app-layout>
    @section('content')
    <x-hamburger-menu />
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
        <!-- Main Content -->
        <main class="relative z-10 min-h-screen flex flex-col items-center px-4 sm:px-6 lg:px-8 py-12">
            
            <div class="bg-primary/50 p-6 rounded-lg border border-accent/50 max-w-md w-full">
                <h2 class="text-2xl font-bold mb-4 text-text">Socket Details</h2>
                @if(isset($error))
                    <p class="text-red-500">{{ $error }}</p>
                @endif
                @if(!isset($error))
                    <div class="flex flex-col space-y-4">
                        <p class="text-text">Socket ID: {{ $id }}</p>
                        
                        @if($role === 'Admin')
                        <div class="flex items-center justify-between">
                            <span class="text-text">Toegang tot socket:</span>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" id="powerToggle">
                                <div class="w-14 h-7 bg-gray-700 peer-focus:outline-none rounded-full peer 
                                    peer-checked:after:translate-x-[28px] peer-checked:after:border-white 
                                    after:content-[''] after:absolute after:top-[2px] after:left-[2px] 
                                    after:bg-white after:border-gray-300 after:border after:rounded-full 
                                    after:h-6 after:w-6 after:transition-all peer-checked:bg-sky-400
                                    peer-checked:border-sky-500 peer-checked:border-2">
                                </div>
                        @endif
                            </label>
                        </div>
                    </div>
                @endif
            </div>
        </main>
    @endsection
</x-app-layout>