<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Menú / Servicios</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: linear-gradient(135deg, #f8f9fb, #eef1f5);
        }

        .title-font {
            font-family: 'Georgia', serif;
            letter-spacing: 2px;
        }
    </style>
</head>

<body class="text-gray-800">

    <!-- HEADER -->
    <div class="text-center py-10 bg-white shadow-md">
        <h1 class="text-4xl md:text-5xl font-bold title-font">
            {{ $user->name }}
        </h1>

        <p class="text-gray-500 mt-2">{{ $user->email }}</p>

        <span class="inline-block mt-3 px-4 py-1 border border-orange-500 text-orange-500 text-sm rounded-full">
            {{ $user->role }}
        </span>
    </div>

    <!-- CONTENIDO -->
    <div class="max-w-7xl mx-auto px-4 md:px-8 py-10">

        <!-- CATEGORIA -->
        <div class="mb-14">

            <h2 class="text-2xl md:text-3xl font-bold mb-6 flex items-center gap-2">
                💈 Cortes & Servicios
            </h2>

            <!-- GRID RESPONSIVE -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- ITEM -->
                <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition">

                    <img src="https://images.unsplash.com/photo-1585747860715-2ba37e788b70"
                        class="w-full h-48 object-cover">

                    <div class="p-5">

                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold">Corte clásico</h3>
                            <span class="text-orange-500 font-bold">$25</span>
                        </div>

                        <p class="text-gray-500 text-sm mt-2">
                            Corte profesional con acabado limpio y moderno.
                        </p>

                    </div>
                </div>

                <!-- ITEM -->
                <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition">

                    <img src="https://images.unsplash.com/photo-1599351431202-1e0f0137899a"
                        class="w-full h-48 object-cover">

                    <div class="p-5">

                        <div class="flex justify-between">
                            <h3 class="text-lg font-semibold">Corte + Barba</h3>
                            <span class="text-orange-500 font-bold">$45</span>
                        </div>

                        <p class="text-gray-500 text-sm mt-2">
                            Corte completo con perfilado y estilo moderno.
                        </p>

                    </div>
                </div>

                <!-- ITEM -->
                <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition">

                    <img src="https://images.unsplash.com/photo-1605497788044-5a32c7078486"
                        class="w-full h-48 object-cover">

                    <div class="p-5">

                        <div class="flex justify-between">
                            <h3 class="text-lg font-semibold">Diseño con color</h3>
                            <span class="text-orange-500 font-bold">$10+</span>
                        </div>

                        <p class="text-gray-500 text-sm mt-2">
                            Diseños personalizados con pigmentación profesional.
                        </p>

                    </div>
                </div>

            </div>
        </div>


        <!-- CATEGORIA 2 -->
        <div class="mb-14">

            <h2 class="text-2xl md:text-3xl font-bold mb-6 flex items-center gap-2">
                ☕ Bebidas
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition">
                    <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93"
                        class="w-full h-48 object-cover">

                    <div class="p-5">
                        <div class="flex justify-between">
                            <h3 class="text-lg font-semibold">Americano</h3>
                            <span class="text-orange-500">$5</span>
                        </div>
                        <p class="text-gray-500 text-sm mt-2">
                            Café intenso preparado al momento.
                        </p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition">
                    <img src="https://images.unsplash.com/photo-1523942839745-7848d1c1d8f9"
                        class="w-full h-48 object-cover">

                    <div class="p-5">
                        <div class="flex justify-between">
                            <h3 class="text-lg font-semibold">Latte</h3>
                            <span class="text-orange-500">$7</span>
                        </div>
                        <p class="text-gray-500 text-sm mt-2">
                            Café suave con leche cremosa.
                        </p>
                    </div>
                </div>

            </div>
        </div>

    </div>

</body>

</html>
