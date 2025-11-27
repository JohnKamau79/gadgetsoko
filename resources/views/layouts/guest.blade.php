<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">

    <div class="min-h-screen flex flex-col justify-center items-center
                bg-gradient-to-br from-teal-500 via-indigo-500 to-teal-400
                dark:from-teal-600 dark:via-indigo-700 dark:to-teal-500
                overflow-hidden relative">

        <!-- Floating Accent Shapes -->
        <div class="absolute -top-16 -left-16 w-72 h-72 bg-white/20 dark:bg-gray-700/20 rounded-full filter blur-3xl animate-pulse-slow"></div>
        <div class="absolute -bottom-16 -right-16 w-96 h-96 bg-indigo-300/20 dark:bg-indigo-700/20 rounded-full filter blur-3xl animate-pulse-slow"></div>

        <!-- Welcome Heading -->
        <div class="text-center z-10 mb-8 px-6">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-white drop-shadow-lg animate-fade-in-down">
                Welcome to <span class="text-amber-400 dark:text-amber-500">GadgetSoko</span>
            </h1>
            <p class="mt-4 text-lg sm:text-xl text-white/90 dark:text-white/80 drop-shadow-sm animate-fade-in">
                Your gateway to premium gadgets, unbeatable deals, and fast delivery.
            </p>
        </div>

        <!-- Form Card -->
        <div class="w-full sm:max-w-md px-6 py-6 bg-white dark:bg-gray-800 shadow-2xl dark:shadow-lg
                    sm:rounded-2xl relative z-10 transform hover:-translate-y-2 transition-all duration-500">
            
            {{ $slot }}
            
        </div>

        <!-- Optional Footer Note -->
        <div class="mt-6 text-center text-white/70 dark:text-gray-400 z-10 text-sm">
            © {{ date('Y') }} GadgetSoko. All rights reserved.
        </div>
    </div>

    <!-- Animations -->
    <style>
        @keyframes fade-in-down {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-down { animation: fade-in-down 1s ease forwards; }
        @keyframes fade-in { 0% { opacity: 0 } 100% { opacity: 1 } }
        .animate-fade-in { animation: fade-in 1.5s ease forwards; }
    </style>

</body>
</html>
