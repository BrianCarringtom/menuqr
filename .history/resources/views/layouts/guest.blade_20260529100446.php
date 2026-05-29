<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body{
            background:
                radial-gradient(circle at top left, #312e81, transparent 35%),
                radial-gradient(circle at bottom right, #1e3a8a, transparent 35%),
                #020617;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-6 font-sans">

    {{ $slot }}

</body>
</html>