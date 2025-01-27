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
            
            <div class="bg-primary/50 p-6 rounded-lg border border-accent/50 w-[95%] max-w-[800px] 
                sm:w-[95%] sm:max-w-[800px]
                md:w-[800px] md:max-w-[800px]
                lg:w-[800px]
                xl:w-[800px]">
                <a href="/sockets" class="inline-flex items-center text-text hover:text-accent transition-colors mb-6">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Terug naar Socket Beheer
                </a>
                <h2 class="text-2xl font-bold mb-4 text-text">Socket Details</h2>
                @if(isset($error))
                    <p class="text-red-500">{{ $error }}</p>
                @endif
                @if(!isset($error))
                    <div class="flex flex-col space-y-4">
                        <p class="text-text font-mono">Socket ID: {{ $id }}</p>
                        
                        @if($role === 'Admin')
                        

                        <div class="w-full">
                            <div class="flex items-center justify-between mt-4 mb-4">
                            <div class="w-full">
                                <div class="border border-accent/50 rounded-lg">
                                    <button class="flex justify-between items-center w-full p-4 text-text font-mono hover:bg-primary/30 transition-colors" onclick="toggleAccordion(this, 'info')">
                                        <div class="flex items-center">
                                            <div class="pr-2 mr-2 border-r border-accent/50 h-full">
                                                <i class="fas fa-chart-line"></i>
                                            </div>
                                            <span>Current Graph</span>
                                        </div>
                                        <svg class="w-5 h-5 transition-transform duration-300 ease-[cubic-bezier(0.4,0,0.2,1)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>
                                    <div id="info" class="max-h-0 overflow-hidden border-t border-accent/50 transition-all duration-300 ease-[cubic-bezier(0.4,0,0.2,1)]">
                                        <div class="p-4">
                                            <div class="bg-primary/30 rounded-lg p-4">
                                                <canvas id="measurementsChart" class="w-full h-[400px]"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="border border-accent/50 rounded-lg">
                                <button class="flex justify-between items-center w-full p-4 text-text font-mono hover:bg-primary/30 transition-colors" onclick="toggleAccordion(this, 'admin-log')">
                                    <div class="flex items-center">
                                        <div class="pr-2 mr-2 border-r border-accent/50 h-full">
                                            <i class="fas fa-terminal"></i>
                                        </div>
                                        <span>Admin Log</span>
                                    </div>
                                    <svg class="w-5 h-5 transition-transform duration-300 ease-[cubic-bezier(0.4,0,0.2,1)]" fill="none" stroke="white" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </button>
                                <div id="admin-log" class="max-h-0 overflow-hidden border-t border-accent/50 transition-all duration-300 ease-[cubic-bezier(0.4,0,0.2,1)]">
                                    <div class="p-4 flex flex-col">
                                        <!-- Log Section -->
                                        <div class="h-[400px] mb-4 overflow-y-auto border border-accent/20 rounded-lg p-3 bg-primary/30">
                                            <p class="text-red-500 font-mono italic">Geen logs gevonden...</p>
                                        </div>

                                        <!-- Command Input Section -->
                                        <div class="flex items-center">
                                            <input type="text" id="command-input" class="p-2 rounded-l-lg w-full bg-transparent border border-accent/50 text-white placeholder-gray-500 focus:shadow-md focus:shadow-gray-700 outline-none transition-all duration-300 backdrop-blur-sm" placeholder="Enter command here..." style="transition-timing-function: cubic-bezier(0.68, -0.55, 0.27, 1.55);">
                                            <button id="send-command" class="px-4 py-2 rounded-r-md flex items-center transition-all duration-300 cursor-not-allowed text-gray-400 bg-gray-600" style="transition-timing-function: cubic-bezier(0.68, -0.55, 0.27, 1.55);" disabled="">
                                                <i class="fa-regular fa-paper-plane mr-2"></i>
                                                Send
                                            </button>
                                            <script>
                                                function toggleSendButton() {
                                                    const commandInput = document.getElementById('command-input');
                                                    const sendButton = document.getElementById('send-command');
                                                    if (commandInput.value.trim() !== '') {
                                                        sendButton.disabled = false;
                                                        sendButton.classList.remove('cursor-not-allowed', 'text-gray-400', 'bg-gray-600', 'border-gray-600');
                                                        sendButton.classList.add('cursor-pointer', 'text-white', 'bg-gray-600');
                                                        sendButton.classList.add('hover:px-6');
                                                    } else {
                                                        sendButton.disabled = true;
                                                        sendButton.classList.add('cursor-not-allowed', 'text-gray-400', 'bg-gray-600', 'border-gray-600');
                                                        sendButton.classList.remove('cursor-pointer', 'text-white', 'bg-gray-600');
                                                        sendButton.classList.remove('hover:px-6');
                                                    }
                                                }

                                                document.getElementById('command-input').addEventListener('input', toggleSendButton);

                                                // Run once when the script loads
                                                toggleSendButton();
                                                document.getElementById('send-command').addEventListener('click', function() {
                                                const commandInput = document.getElementById('command-input');
                                                const command = commandInput.value.trim();

                                                if (command) {
                                                    fetch('http://davinciplaysmc.nl/sendCommand', {
                                                        method: 'POST',
                                                        headers: {
                                                            'Content-Type': 'application/json',
                                                            'X-CSRF-TOKEN': 'ibO9OtmC3iHqfnMEkMSSAVFDnEkgSL9Aq3jm42dl'
                                                        },
                                                        body: JSON.stringify({ command: command })
                                                    })
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        commandInput.value = '';
                                                        toggleSendButton();
                                                    })
                                                    .catch(error => {
                                                        alert('Error: ' + error.message);
                                                    });
                                                }
                                            });

                                            document.getElementById('command-input').addEventListener('keypress', function(event) {
                                                if (event.key === 'Enter') {
                                                    event.preventDefault();
                                                    document.getElementById('send-command').click();
                                                }
                                            });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between mt-4">
                            <div class="w-full">
                                <div class="border border-accent/50 rounded-lg">
                                    <button class="flex justify-between items-center w-full p-4 text-text font-mono hover:bg-primary/30 transition-colors" onclick="toggleAccordion(this, 'settings')">
                                        <div class="flex items-center">
                                            <div class="pr-2 mr-2 border-r border-accent/50 h-full">
                                                <i class="fas fa-cog"></i>
                                            </div>
                                            <span>Instellingen</span>
                                        </div>
                                        <svg class="w-5 h-5 transition-transform duration-300 ease-[cubic-bezier(0.4,0,0.2,1)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>
                                    <div id="settings" class="max-h-0 overflow-hidden border-t border-accent/50 transition-all duration-300 ease-[cubic-bezier(0.4,0,0.2,1)]">
                                        <div class="space-y-4 p-4">
                                            <!-- Naam instelling -->
                                            <div class="flex items-center justify-between">
                                                <span class="text-text font-mono">Naam:</span>
                                                <input type="text" class="bg-primary/50 border border-accent/50 rounded px-3 py-1 text-text font-mono focus:outline-none focus:border-accent" placeholder="Voer naam in...">
                                            </div>

                                            <!-- Toegang instelling -->
                                            <div class="flex items-center justify-between">
                                                <span class="text-text font-mono">Toegang tot socket:</span>
                                                <label class="relative inline-flex items-center cursor-pointer">
                                                    <input type="checkbox" class="sr-only peer" id="powerToggle" checked>
                                                    <div class="w-14 h-7 bg-gray-700 peer-focus:outline-none rounded-full peer 
                                                        peer-checked:after:translate-x-[28px] peer-checked:after:border-white 
                                                        after:content-[''] after:absolute after:top-[2px] after:left-[2px] 
                                                        after:bg-white after:border-gray-300 after:border after:rounded-full 
                                                        after:h-6 after:w-6 after:transition-all peer-checked:bg-sky-400
                                                        peer-checked:border-sky-500 peer-checked:border-2">
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="flex justify-end mt-4">
                                                <button type="submit" class="bg-sky-500 hover:bg-sky-600 text-white font-bold py-2 px-4">
                                                    Toepassen
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <div class="w-full">
                                <div class="border border-accent/50 rounded-lg">
                                    <button class="flex justify-between items-center w-full p-4 text-text font-mono hover:bg-primary/30 transition-colors" onclick="toggleAccordion(this, 'laadsessie')">
                                        <div class="flex items-center">
                                            <div class="pr-2 mr-2 border-r border-accent/50 h-full">
                                                <i class="fas fa-charging-station"></i>
                                            </div>
                                            <span>Laadsessie</span>
                                        </div>
                                        <svg class="w-5 h-5 transition-transform duration-300 ease-[cubic-bezier(0.4,0,0.2,1)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>
                                    <div id="laadsessie" class="max-h-0 overflow-hidden border-t border-accent/50 transition-all duration-300 ease-[cubic-bezier(0.4,0,0.2,1)]">
                                        <div class="space-y-4 p-4">
                                            <!-- Session Status -->
                                            <div class="flex items-center justify-between">
                                                <span class="text-text font-mono">Status:</span>
                                                <span id="session-status" class="text-text font-mono">Laden...</span>
                                            </div>
                                            <script>
                                                function updateSessionStatus() {
                                                    fetch(`/socket/{{ $id }}/status`)
                                                        .then(response => response.json())
                                                        .then(data => {
                                                            const statusElement = document.getElementById('session-status');
                                                            statusElement.textContent = data.status === 'on' ? 'Actief' : 'Inactief';
                                                        })
                                                        .catch(error => console.error('Error:', error));
                                                }
                                                
                                                // Update status immediately and every second
                                                updateSessionStatus();
                                                setInterval(updateSessionStatus, 1000);
                                            </script>

                                            <!-- Session Info -->
                                            <div id="session-info" class="space-y-2 hidden">
                                                <div class="flex items-center justify-between">
                                                    <span class="text-text font-mono">Verbruik:</span>
                                                    <span id="session-kwh" class="text-text font-mono">0 kWh</span>
                                                </div>
                                                <div class="flex items-center justify-between">
                                                    <span class="text-text font-mono">Start tijd:</span>
                                                    <span id="session-start" class="text-text font-mono">--:--</span>
                                                </div>
                                                <div class="flex items-center justify-between">
                                                    <span class="text-text font-mono">Duur:</span>
                                                    <span id="session-duration" class="text-text font-mono">0 minuten</span>
                                                </div>
                                            </div>

                                            <!-- Session Controls -->
                                            <div class="flex justify-end space-x-4">
                                                <form action="/socket/{{ $id }}/start" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" id="start-btn" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition-colors">
                                                        Start Sessie
                                                    </button>
                                                </form>
                                                <form action="/socket/{{ $id }}/stop" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" id="stop-btn" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition-colors">
                                                        Stop Sessie
                                                    </button>
                                                </form>
                                            </div>
                                            </div>

                                            <script>
                                                let startTime;
                                                let durationInterval;

                                                function updateDuration() {
                                                    const now = new Date();
                                                    const diffMs = now - startTime;
                                                    const diffMins = Math.floor(diffMs / 60000);
                                                    document.getElementById('session-duration').textContent = `${diffMins} minuten`;
                                                    
                                                    // Simulate kWh increase (for demo purposes)
                                                    const kWh = (diffMins * 0.1).toFixed(2);
                                                    document.getElementById('session-kwh').textContent = `${kWh} kWh`;
                                                }

                                                function startSession() {
                                                    startTime = new Date();
                                                    document.getElementById('session-status').textContent = 'Actief';
                                                    document.getElementById('session-start').textContent = startTime.toLocaleTimeString();
                                                    document.getElementById('session-info').classList.remove('hidden');
                                                    document.getElementById('start-btn').classList.add('hidden');
                                                    document.getElementById('stop-btn').classList.remove('hidden');
                                                    
                                                    durationInterval = setInterval(updateDuration, 60000); // Update every minute
                                                }

                                                function stopSession() {
                                                    clearInterval(durationInterval);
                                                    document.getElementById('session-status').textContent = 'Inactief';
                                                    document.getElementById('session-info').classList.add('hidden');
                                                    document.getElementById('stop-btn').classList.add('hidden');
                                                    document.getElementById('start-btn').classList.remove('hidden');
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        
                        
                        
                        <script>
                        function toggleAccordion(button, id) {
                            const content = document.getElementById(id);
                            const arrow = button.querySelector('svg');
                            
                            // Close all accordions first
                            const allAccordions = document.querySelectorAll('[id^="admin-log"], [id^="settings"], [id^="laadsessie"], [id^="info"]');
                            const allArrows = document.querySelectorAll('button svg');
                            
                            allAccordions.forEach(accordion => {
                                if (accordion.id !== id) {
                                    accordion.style.maxHeight = null;
                                }
                            });
                            
                            allArrows.forEach(arr => {
                                if (arr !== arrow) {
                                    arr.style.transform = '';
                                }
                            });
                            
                            // Toggle the clicked accordion
                            arrow.style.transform = content.style.maxHeight ? '' : 'rotate(180deg)';
                            
                            if (content.style.maxHeight) {
                                content.style.maxHeight = null;
                            } else {
                                content.style.maxHeight = content.scrollHeight + "px";
                            }
                        }
                        </script>
                        
                        @endif
                    </div>
                @endif
            </div>
        </main>
    @endsection
</x-app-layout>

<!-- Add Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Your existing script -->
<script>
    // Initialize the chart
    const ctx = document.getElementById('measurementsChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: 'Current (A)', 
                data: [],
                borderColor: '#00ff00',
                backgroundColor: (context) => {
                    const gradient = context.chart.ctx.createLinearGradient(0, 0, 0, context.chart.height);
                    gradient.addColorStop(0, '#00ff00');
                    gradient.addColorStop(1, 'black');
                    return gradient;
                },
                tension: 0.1,
                fill: true
            }]
        },
        options: {
            responsive: true,

            scales: {
                x: {
                    display: true,
                    title: {
                        display: false,
                        text: 'Time',
                        color: 'white'
                    },
                    ticks: {
                        color: 'white'
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.1)'
                    }
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Current (A)',
                        color: 'white'
                    },
                    ticks: {
                        color: 'white',
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.1)'
                    },
                    suggestedMin: 0,
                    suggestedMax: 1000
                }
            },
            animation: {
                duration: 1000
            },
            plugins: {
                legend: {
                    labels: {
                        color: 'white'
                    }
                }
            }
        }
    });

    // Function to update measurements
    async function updateMeasurements() {
        try {
            // First save new measurements
            await fetch(`/save-measurements/{{ $id }}`);
            
            // Then fetch just the voltage
            const response = await fetch(`/socketcurrent/{{ $id }}`);
            let current = await response.json();
            let finalcurrent = current.current;
            console.log(finalcurrent);

            // Add new data point to the chart
            chart.data.labels.push(chart.data.labels.length + 1);
            chart.data.datasets[0].data.push(finalcurrent);
            
            // Keep only the last 20 data points for better visualization
            if (chart.data.labels.length > 20) {
                chart.data.labels.shift();
                chart.data.datasets[0].data.shift();
            }
            
            chart.update();
        } catch (error) {
            console.error('Error updating measurements:', error);
        }
    }

    updateMeasurements();
    // Update every 30 seconds
    setInterval(updateMeasurements, 30000);
</script>
