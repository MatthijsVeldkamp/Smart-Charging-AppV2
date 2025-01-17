<x-app-layout>
    @section('content')
    <x-hamburger-menu />
    <div class="fixed inset-0 z-0 animate-fade-in">
            <div class="absolute inset-0 bg-[linear-gradient(to_right,#1f1f1f_1px,transparent_1px),linear-gradient(to_bottom,#1f1f1f_1px,transparent_1px)] bg-[size:4rem_4rem] [mask-image:radial-gradient(ellipse_60%_60%_at_50%_50%,#000_40%,transparent_100%)]" id="grid-background">
                <!-- Centered 3x3 grid -->
                <div class="grid-squares absolute w-full h-full transition-transform duration-1000 flex justify-center items-center" id="grid-set-1">
                    <!-- Row 1 -->
                    <div class="absolute w-16 h-16 bg-[#141414] opacity-40 border border-white/5" style="top: calc(50% - 12rem); left: calc(50% - 12rem);"></div>
                    <div class="absolute w-16 h-16 bg-[#141414] opacity-40 border border-white/5" style="top: calc(50% - 12rem); left: calc(50% - 4rem);"></div>
                    <div class="absolute w-16 h-16 bg-[#141414] opacity-40 border border-white/5" style="top: calc(50% - 12rem); left: calc(50% + 4rem);"></div>
                    
                    <!-- Row 2 -->
                    <div class="absolute w-16 h-16 bg-[#141414] opacity-40 border border-white/5" style="top: calc(50% - 4rem); left: calc(50% - 12rem);"></div>
                    <div class="absolute w-16 h-16 bg-[#141414] opacity-40 border border-white/5" style="top: calc(50% - 4rem); left: calc(50% - 4rem);"></div>
                    <div class="absolute w-16 h-16 bg-[#141414] opacity-40 border border-white/5" style="top: calc(50% - 4rem); left: calc(50% + 4rem);"></div>
                    
                    <!-- Row 3 -->
                    <div class="absolute w-16 h-16 bg-[#141414] opacity-40 border border-white/5" style="top: calc(50% + 4rem); left: calc(50% - 12rem);"></div>
                    <div class="absolute w-16 h-16 bg-[#141414] opacity-40 border border-white/5" style="top: calc(50% + 4rem); left: calc(50% - 4rem);"></div>
                    <div class="absolute w-16 h-16 bg-[#141414] opacity-40 border border-white/5" style="top: calc(50% + 4rem); left: calc(50% + 4rem);"></div>
                </div>
            </div>
        </div>
        <!-- Main Content -->
        <main class="relative z-10 min-h-screen flex flex-col justify-center items-center px-4 sm:px-6 lg:px-8 py-12">
            <div class="text-center welcome-fade-in mb-12">
                <h1 class="text-4xl sm:text-6xl font-bold text-text mb-6">Socket Beheer</h1>
                <p class="text-secondary text-lg sm:text-xl max-w-2xl mx-auto mb-8">
                    Voeg nieuwe slimme meters toe en beheer je bestaande meters.
                </p>
            </div>

            <!-- Lijst van bestaande meters -->
            <div class="mt-12 w-full max-w-4xl mx-auto">
                @if(count($smartMeters ?? []) > 0)
                    <h2 class="text-2xl font-bold mb-4 text-text">Geïnstalleerde Meters</h2>
                @endif
                <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3 place-items-center">
                    @foreach($smartMeters ?? [] as $meter)
                        <div class="bg-primary/50 p-4 rounded-lg border border-accent/50">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <h3 class="font-bold text-lg">{{ $meter->name }}</h3>
                                    <p class="text-sm text-secondary">ID: {{ $meter->socket_id }}</p>
                                    <p class="text-sm text-secondary status-text" data-meter-id="{{ $meter->id }}">
                                        Status: {{ $meter->status === 'active' ? 'Actief' : 'Inactief' }}
                                    </p>
                                </div>
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
                                        <button type="submit" 
                                                class="px-3 py-1 rounded-md text-sm font-medium bg-gray-500 hover:bg-gray-600 transition-colors"
                                                onclick="return confirm('Weet je zeker dat je deze socket wilt verwijderen?')">
                                            Verwijder
                                        </button>
                                    </form>
                                </div>
                            </div>
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