<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    <!-- Fondo -->
    <div
        class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-950 via-slate-900 to-indigo-950 relative overflow-hidden">

        <!-- Blur decorativo -->
        <div class="absolute w-72 h-72 bg-blue-500/30 rounded-full blur-3xl top-10 left-10"></div>
        <div class="absolute w-72 h-72 bg-purple-500/30 rounded-full blur-3xl bottom-10 right-10"></div>

        <!-- Card -->
        <div
            class="relative z-10 w-full max-w-md px-8 py-10 bg-white/10 backdrop-blur-xl border border-white/20 shadow-2xl rounded-3xl">

            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <a href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo"
                        class="w-24 h-24 object-contain drop-shadow-xl">
                </a>
            </div>

            <!-- Título -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-white">
                    Bienvenido
                </h1>

                <p class="text-gray-300 mt-2 text-sm">
                    Inicia sesión para continuar
                </p>
            </div>

            {{ $slot }}

        </div>

    </div>

</body>

</html>
