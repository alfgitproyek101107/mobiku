<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mobiku - Inovasi Dalam Setiap Perjalanan</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Theme CSS -->
    @php
        $currentTheme = \App\Models\ThemeSetting::getCurrentTheme();
    @endphp
    <link rel="stylesheet" href="{{ asset('css/themes/' . $currentTheme . '.css') }}">

    <script>
        // Konfigurasi Tailwind untuk warna custom
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: { 50: '#f0f9ff', 100: '#e0f2fe', 900: '#1e3a8a', DEFAULT: '#2563eb' },
                        secondary: { 50: '#fff7f7', 100: '#ffe5e5', 900: '#7f1d1d', DEFAULT: '#dc2626' },
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        .hero-bg { background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%); }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-5px); }
        .btn-hover { transition: all 0.3s ease; }
        .btn-hover:hover { transform: translateY(-2px); }
    </style>
</head>
<body class="font-sans bg-gray-50 text-gray-800 dark:bg-gray-900 dark:text-gray-100">
    <!-- Navbar akan di-include di sini -->
    <x-navbar />
    
    <main>
        <!-- Konten halaman akan di-include di sini -->
        @yield('content')
    </main>
    
    <!-- Footer akan di-include di sini -->
    <x-footer />
    
    <script>
        // Theme management - remove forced dark mode
        // Theme CSS will handle all styling now
    </script>
</body>
</html>