<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Perfil Business</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fuente -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen p-10">

    <div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow">

        <h1 class="text-2xl font-bold mb-6 text-center">Perfil del Negocio</h1>

        {{-- MENSAJES --}}
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        {{-- IMAGEN ACTUAL --}}
        <div class="text-center mb-6">
            @if (!empty(Auth::user()->image))
                <img src="{{ asset('storage/' . Auth::user()->image) }}"
                    class="w-40 h-40 mx-auto rounded-full object-cover border-4 border-yellow-500 shadow-lg">
            @else
                <img src="/images/panaderia.jpg"
                    class="w-40 h-40 mx-auto rounded-full object-cover border-4 border-gray-300 shadow">
            @endif
        </div>

        {{-- FORMULARIO --}}
        <form action="/business/profile/image" method="POST" enctype="multipart/form-data"
            class="flex flex-col items-center gap-4">
            @csrf

            <input type="file" name="image" class="border p-2 rounded w-full max-w-sm">

            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded shadow">
                Subir imagen
            </button>
        </form>

    </div>

</body>

</html>
