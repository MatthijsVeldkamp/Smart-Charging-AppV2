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
            <div class="text-center welcome-fade-in mb-12">
                <h1 class="text-4xl sm:text-6xl font-bold text-text mb-6">Socket Beheer</h1>
                <p class="text-secondary text-lg sm:text-xl max-w-2xl mx-auto mb-8">
                    Voeg nieuwe slimme meters toe en beheer je bestaande meters.
                </p>
            </div>



            <!-- Formulier voor nieuwe meter -->
            <div class="bg-primary/50 p-6 rounded-lg border border-accent/50 max-w-md w-full">
                <h2 class="text-2xl font-bold mb-4 text-text">Nieuwe Slimme Meter Toevoegen</h2>
                <form action="{{ route('smart-meters.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="socket_id" class="block text-sm font-medium text-text mb-1">Socket ID</label>
                        <input type="text" name="socket_id" id="socket_id" required 
                               class="w-full px-3 py-2 bg-primary border border-accent/50 rounded-md focus:outline-none focus:border-accent"
                               placeholder="Bijv. DDEAFC">
                    </div>
                    <div>
                        <label for="name" class="block text-sm font-medium text-text mb-1">Naam</label>
                        <input type="text" name="name" id="name" required 
                               class="w-full px-3 py-2 bg-primary border border-accent/50 rounded-md focus:outline-none focus:border-accent"
                               placeholder="Bijv. Garage Laadpunt">
                    </div>
                    <button type="submit" 
                            class="w-full bg-gray-900 text-text px-4 py-2 rounded-md hover:bg-gray-600 transition-colors">
                        Meter Toevoegen
                    </button>
                </form>
            </div>

            <!-- Lijst van bestaande meters -->
            <div class="mt-12 w-full max-w-4xl">
                @if(count($smartMeters ?? []) > 0)
                    <h2 class="text-2xl font-bold mb-4 text-text">Geïnstalleerde Meters</h2>
                @endif
                <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                    @foreach($smartMeters ?? [] as $meter)
                        <div class="bg-primary/50 p-4 rounded-lg border border-accent/50" data-meter-id="{{ $meter->id }}" data-status="{{ $meter->status }}">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-bold text-lg">{{ $meter->name }}</h3>
                                <div class="flex space-x-2">
                                    <button onclick="setPower({{ $meter->id }}, 'on')"
                                            data-action="on" 
                                            data-meter-id="{{ $meter->id }}"
                                            class="power-btn-on px-3 py-1 rounded-md text-sm font-medium transition-colors {{ $meter->status === 'active' ? 'bg-green-500 cursor-not-allowed opacity-50' : 'bg-green-500 hover:bg-green-600' }}"
                                            {{ $meter->status === 'active' ? 'disabled' : '' }}>
                                        Aan
                                    </button>
                                    <button onclick="setPower({{ $meter->id }}, 'off')"
                                            data-action="off"
                                            data-meter-id="{{ $meter->id }}"
                                            class="power-btn-off px-3 py-1 rounded-md text-sm font-medium transition-colors {{ $meter->status === 'inactive' ? 'bg-red-500 cursor-not-allowed opacity-50' : 'bg-red-500 hover:bg-red-600' }}"
                                            {{ $meter->status === 'inactive' ? 'disabled' : '' }}>
                                        Uit
                                    </button>
                                    <form action="{{ route('smart-meters.destroy', $meter->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Weet je zeker dat je deze meter wilt verwijderen?')"
                                                class="px-3 py-1 rounded-md text-sm font-medium bg-red-800 hover:bg-red-900 transition-colors">
                                            Verwijder
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <p class="text-sm text-secondary">ID: {{ $meter->socket_id }}</p>
                            <p class="text-sm text-secondary status-text" data-meter-id="{{ $meter->id }}">
                                Status: {{ $meter->status === 'active' ? 'Actief' : 'Inactief' }}
                            </p>
                            @if($meter->current_power)
                                <p class="text-sm">Huidig verbruik: {{ $meter->current_power }}W</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </main>

        
        <script>
            // Definieer functies in de globale scope
            function updateButtonStates(meterId, status) {
                const onButton = document.querySelector(`.power-btn-on[data-meter-id="${meterId}"]`);
                const offButton = document.querySelector(`.power-btn-off[data-meter-id="${meterId}"]`);
                const statusText = document.querySelector(`.status-text[data-meter-id="${meterId}"]`);
                
                if (status === 'active') {
                    onButton.classList.add('cursor-not-allowed', 'opacity-50');
                    onButton.disabled = true;
                    offButton.classList.remove('cursor-not-allowed', 'opacity-50');
                    offButton.disabled = false;
                } else {
                    offButton.classList.add('cursor-not-allowed', 'opacity-50');
                    offButton.disabled = true;
                    onButton.classList.remove('cursor-not-allowed', 'opacity-50');
                    onButton.disabled = false;
                }

                // Update status text
                if (statusText) {
                    statusText.textContent = `Status: ${status === 'active' ? 'Actief' : 'Inactief'}`;
                }
            }

            function setPower(meterId, action) {
                const loadingSpinner = document.getElementById('loading-spinner');
                const onButton = document.querySelector(`.power-btn-on[data-meter-id="${meterId}"]`);
                const offButton = document.querySelector(`.power-btn-off[data-meter-id="${meterId}"]`);
                
                // Disable both buttons during request
                onButton.disabled = true;
                offButton.disabled = true;
                loadingSpinner.classList.remove('hidden');

                fetch(`/smart-meters/${meterId}/power`, {
                    method: 'POST', 
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ action: action })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        updateButtonStates(meterId, data.status);
                        
                        // Success feedback
                        const button = action === 'on' ? onButton : offButton;
                        button.classList.add('bg-green-500');
                        setTimeout(() => {
                            button.classList.remove('bg-green-500');
                        }, 1000);
                    } else {
                        throw new Error(data.message || 'Er ging iets mis');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Er ging iets mis bij het schakelen van de socket: ' + error.message);
                    
                    // Error feedback
                    const button = action === 'on' ? onButton : offButton;
                    button.classList.add('bg-red-500');
                    setTimeout(() => {
                        button.classList.remove('bg-red-500');
                    }, 1000);
                })
                .finally(() => {
                    loadingSpinner.classList.add('hidden');
                    // Re-enable buttons
                    updateButtonStates(meterId, action === 'on' ? 'active' : 'inactive');
                });
            }

            // Wacht tot het document geladen is
            document.addEventListener('DOMContentLoaded', function() {
                // Event listeners voor de knoppen
                document.querySelectorAll('.power-btn-on, .power-btn-off').forEach(button => {
                    button.addEventListener('click', function() {
                        const meterId = this.dataset.meterId;
                        const action = this.dataset.action;
                        setPower(meterId, action);
                    });
                });

                // Start de automatische updates
                checkStatuses();
                setInterval(checkStatuses, 30000);
            });

            function checkStatuses() {
                fetch('/socket-statuses')
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Object.entries(data.statuses).forEach(([meterId, status]) => {
                                updateButtonStates(meterId, status);
                            });
                        }
                    })
                    .catch(error => console.error('Error updating statuses:', error));
            }
        </script>
        <style>
            /* Spinner styles */
            #loading-spinner {
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 20px 0;
            }

            .loader {
                border: 8px solid #f3f3f3; /* Light grey */
                border-top: 8px solid #3498db; /* Blue */
                border-radius: 50%;
                width: 40px;
                height: 40px;
                animation: spin 1s linear infinite;
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
        </style>
    @endsection
</x-app-layout>