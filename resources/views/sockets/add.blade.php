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
        <main class="relative z-10">
            <div class="container mx-auto">
                <h1 class="text-2xl font-bold mb-4 text-text">Add Socket</h1>
                <div class="bg-primary/50 p-6 rounded-lg border border-accent/50 max-w-md">
                    <form action="{{ route('smart-meters.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="socket_id" class="block text-sm font-medium text-text mb-1">Socket ID</label>
                            <input type="text" name="socket_id" id="socket_id" value="{{ $id }}" readonly
                                   class="w-full px-3 py-2 bg-primary border border-accent/50 rounded-md focus:outline-none focus:border-accent">
                        </div>
                        <div>
                            <label for="name" class="block text-sm font-medium text-text mb-1">Naam</label>
                            <input type="text" name="name" id="name" required 
                                   class="w-full px-3 py-2 bg-primary border border-accent/50 rounded-md focus:outline-none focus:border-accent"
                                   placeholder="Voer een naam in voor deze socket">
                        </div>
                        <button type="submit" 
                                class="w-full bg-gray-900 text-text px-4 py-2 rounded-md hover:bg-gray-600 transition-colors">
                            Socket Toevoegen
                        </button>
                    </form>
                </div>
            </div>
        </main>
    @endsection
</x-app-layout>