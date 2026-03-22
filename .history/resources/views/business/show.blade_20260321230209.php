<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Menú / Servicios</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: #0f0f0f;
        }

        .title-font {
            font-family: 'Georgia', serif;
            letter-spacing: 2px;
        }
    </style>
</head>

<body class="text-white">

    <!-- HEADER -->
    <div class="text-center py-10 border-b border-gray-800">
        <h1 class="text-5xl font-bold title-font tracking-widest">
            {{ $user->name }}
        </h1>

        <p class="text-gray-400 mt-2">{{ $user->email }}</p>

        <span class="inline-block mt-3 px-4 py-1 border border-orange-500 text-orange-500 text-sm">
            {{ $user->role }}
        </span>
    </div>

    <!-- CONTENIDO -->
    <div class="max-w-6xl mx-auto px-6 py-10">

        <!-- CATEGORIA -->
        <div class="mb-12">

            <h2 class="text-3xl font-bold border-l-4 border-orange-500 pl-4 mb-6 title-font">
                💈 Cortes & Servicios
            </h2>

            <div class="grid md:grid-cols-2 gap-6">

                <!-- ITEM -->
                <div class="border border-gray-800 p-5 rounded-xl hover:border-orange-500 transition">

                    <div class="flex justify-between items-center">
                        <h3 class="text-xl font-semibold">Corte clásico</h3>
                        <span class="text-orange-500 font-bold">$25</span>
                    </div>

                    <p class="text-gray-400 text-sm mt-2">
                        Corte profesional con acabado limpio y moderno.
                    </p>
                </div>

                <!-- ITEM -->
                <div class="border border-gray-800 p-5 rounded-xl hover:border-orange-500 transition">

                    <div class="flex justify-between items-center">
                        <h3 class="text-xl font-semibold">Corte + Barba</h3>
                        <span class="text-orange-500 font-bold">$45</span>
                    </div>

                    <p class="text-gray-400 text-sm mt-2">
                        Corte completo con perfilado de barba y detalles.
                    </p>
                </div>

                <!-- ITEM -->
                <div class="border border-gray-800 p-5 rounded-xl hover:border-orange-500 transition">

                    <div class="flex justify-between items-center">
                        <h3 class="text-xl font-semibold">Diseño con color</h3>
                        <span class="text-orange-500 font-bold">$10+</span>
                    </div>

                    <p class="text-gray-400 text-sm mt-2">
                        Diseño personalizado con pigmentación profesional.
                    </p>
                </div>

            </div>
        </div>


        <!-- CATEGORIA 2 -->
        <div class="mb-12">

            <h2 class="text-3xl font-bold border-l-4 border-orange-500 pl-4 mb-6 title-font">
                ☕ Bebidas
            </h2>

            <div class="grid md:grid-cols-2 gap-6">

                <div class="border border-gray-800 p-5 rounded-xl hover:border-orange-500 transition">
                    <div class="flex justify-between">
                        <h3 class="text-lg font-semibold">Americano</h3>
                        <span class="text-orange-500">$5</span>
                    </div>
                    <p class="text-gray-400 text-sm mt-2">
                        Café intenso preparado al momento.
                    </p>
                </div>

                <div class="border border-gray-800 p-5 rounded-xl hover:border-orange-500 transition">
                    <div class="flex justify-between">
                        <h3 class="text-lg font-semibold">Latte</h3>
                        <span class="text-orange-500">$7</span>
                    </div>
                    <p class="text-gray-400 text-sm mt-2">
                        Café suave con leche cremosa.
                    </p>
                </div>

            </div>
        </div>

    </div>

</body>

</html>
