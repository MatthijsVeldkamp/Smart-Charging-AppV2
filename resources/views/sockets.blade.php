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
                                <button onclick="toggleSocket({{ $meter->id }})" 
                                        class="toggle-btn px-3 py-1 rounded-md text-sm font-medium transition-colors"
                                        data-status="{{ $meter->status }}"
                                        data-meter-id="{{ $meter->id }}">
                                    {{ $meter->status === 'active' ? 'Aan' : 'Uit' }}
                                </button>
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
            function updateButtonStyle(button, status) {
                if (status === 'active') {
                    button.classList.remove('bg-red-500', 'hover:bg-red-600');
                    button.classList.add('bg-green-500', 'hover:bg-green-600');
                    button.textContent = 'Aan';
                } else {
                    button.classList.remove('bg-green-500', 'hover:bg-green-600');
                    button.classList.add('bg-red-500', 'hover:bg-red-600');
                    button.textContent = 'Uit';
                }
            }

            function updateStatusText(meterId, status) {
                const statusText = document.querySelector(`.status-text[data-meter-id="${meterId}"]`);
                if (statusText) {
                    statusText.textContent = `Status: ${status === 'active' ? 'Actief' : 'Inactief'}`;
                }
            }

            // Initialize button styles
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.toggle-btn').forEach(button => {
                    updateButtonStyle(button, button.dataset.status);
                });
            });

            function toggleSocket(meterId) {
                const button = document.querySelector(`.toggle-btn[data-meter-id="${meterId}"]`);
                button.disabled = true;

                // Show loading spinner
                const loadingSpinner = document.getElementById('loading-spinner');
                loadingSpinner.classList.remove('hidden');

                fetch(`/smart-meters/${meterId}/toggle`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        updateButtonStyle(button, data.status);
                        updateStatusText(meterId, data.status);
                        button.dataset.status = data.status;
                    } else {
                        alert('Er is een fout opgetreden bij het schakelen van de socket.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Er is een fout opgetreden bij het schakelen van de socket.');
                })
                .finally(() => {
                    button.disabled = false;
                    loadingSpinner.classList.add('hidden'); // Hide loading spinner
                });
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
        @endpush
    @endsection
</x-app-layout>