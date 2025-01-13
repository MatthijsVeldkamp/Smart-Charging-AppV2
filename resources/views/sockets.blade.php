<x-app-layout>
    @section('content')
    <x-hamburger-menu />

        <!-- Main Content -->
        <main class="relative z-10 min-h-screen flex flex-col items-center px-4 sm:px-6 lg:px-8 py-12">
            <div class="text-center welcome-fade-in mb-12">
                <h1 class="text-4xl sm:text-6xl font-bold text-text mb-6">Socket Beheer</h1>
                <p class="text-secondary text-lg sm:text-xl max-w-2xl mx-auto mb-8">
                    Voeg nieuwe slimme meters toe en beheer je bestaande meters.
                </p>
            </div>

            <!-- Loading Spinner -->
            <div id="loading-spinner" class="hidden">
                <div class="loader"></div>
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
                            class="w-full bg-accent text-text px-4 py-2 rounded-md hover:bg-accent/90 transition-colors">
                        Meter Toevoegen
                    </button>
                </form>
            </div>

            <!-- Lijst van bestaande meters -->
            <div class="mt-12 w-full max-w-4xl">
                <h2 class="text-2xl font-bold mb-4 text-text">Geïnstalleerde Meters</h2>
                <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                    @foreach($smartMeters ?? [] as $meter)
                        <div class="bg-primary/50 p-4 rounded-lg border border-accent/50">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-bold text-lg">{{ $meter->name }}</h3>
                                <div class="flex space-x-2">
                                    <button data-action="on" 
                                            data-meter-id="{{ $meter->id }}"
                                            class="power-btn-on px-3 py-1 rounded-md text-sm font-medium transition-colors {{ $meter->status === 'active' ? 'bg-green-500 cursor-not-allowed opacity-50' : 'bg-green-500 hover:bg-green-600' }}"
                                            {{ $meter->status === 'active' ? 'disabled' : '' }}>
                                        Aan
                                    </button>
                                    <button data-action="off"
                                            data-meter-id="{{ $meter->id }}"
                                            class="power-btn-off px-3 py-1 rounded-md text-sm font-medium transition-colors {{ $meter->status === 'inactive' ? 'bg-red-500 cursor-not-allowed opacity-50' : 'bg-red-500 hover:bg-red-600' }}"
                                            {{ $meter->status === 'inactive' ? 'disabled' : '' }}>
                                        Uit
                                    </button>
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

        @push('scripts')
        <script>
            // Definieer functies in de globale scope
            function updateButtonStates(meterId, status) {
                const onButton = document.querySelector(`.power-btn-on[data-meter-id="${meterId}"]`);
                const offButton = document.querySelector(`.power-btn-off[data-meter-id="${meterId}"]`);
                
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
            }

            function updateStatusText(meterId, status) {
                const statusText = document.querySelector(`.status-text[data-meter-id="${meterId}"]`);
                if (statusText) {
                    statusText.textContent = `Status: ${status === 'active' ? 'Actief' : 'Inactief'}`;
                }
            }

            function setPower(meterId, action) {
                console.log('setPower called:', meterId, action);
                
                const loadingSpinner = document.getElementById('loading-spinner');
                loadingSpinner.classList.remove('hidden');

                const onButton = document.querySelector(`.power-btn-on[data-meter-id="${meterId}"]`);
                const offButton = document.querySelector(`.power-btn-off[data-meter-id="${meterId}"]`);
                onButton.disabled = true;
                offButton.disabled = true;

                console.log('Sending fetch request...');
                fetch(`/smart-meters/${meterId}/power`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ action: action })
                })
                .then(response => {
                    console.log('Response received:', response);
                    return response.json();
                })
                .then(data => {
                    console.log('Data received:', data);
                    if (data.success) {
                        updateButtonStates(meterId, data.status);
                        updateStatusText(meterId, data.status);
                    } else {
                        alert('Er is een fout opgetreden bij het schakelen van de socket.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Er is een fout opgetreden bij het schakelen van de socket.');
                })
                .finally(() => {
                    loadingSpinner.classList.add('hidden');
                    onButton.disabled = false;
                    offButton.disabled = false;
                });
            }

            function updateAllSocketStatuses() {
                fetch('/socket-statuses', {
                    headers: {
                        'Accept': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Object.entries(data.statuses).forEach(([meterId, status]) => {
                            updateButtonStates(meterId, status);
                            updateStatusText(meterId, status);
                        });
                    }
                })
                .catch(error => console.error('Error updating statuses:', error));
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
                updateAllSocketStatuses();
                setInterval(updateAllSocketStatuses, 30000);
            });
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
        @endpush
    @endsection
</x-app-layout>