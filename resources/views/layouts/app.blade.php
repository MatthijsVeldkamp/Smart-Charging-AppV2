<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'text': '{{ env("THEME_TEXT") }}',
                        'background': '{{ env("THEME_BACKGROUND") }}',
                        'primary': '{{ env("THEME_PRIMARY") }}',
                        'secondary': '{{ env("THEME_SECONDARY") }}',
                        'accent': '{{ env("THEME_ACCENT") }}',
                    }
                }
            }
        }
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-text antialiased">

    <!-- Page Content -->
    <main class="min-h-screen pt-16 pb-16 fade-in" id="main-content"> <!-- Added fade-in class -->
        @yield('content') <!-- This is where the content from other views will be injected -->
    </main>

    @include('layouts.footer')

    <script>
        // Optional: Add any additional JavaScript here
        document.addEventListener('DOMContentLoaded', function() {
            const mainContent = document.getElementById('main-content');
            mainContent.classList.add('fade-in-active'); // Add active class for transition
        });
    </script>
</body>
</html>
