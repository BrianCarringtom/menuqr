<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Menú Premium</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FUENTE MÁS ELEGANTE -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                        url('https://images.unsplash.com/photo-1536782376847-5c9d14d97cc0') center/cover no-repeat fixed;
        }

        h1, h2 {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center px-4 py-10 text-gray-200">

    <!-- CONTENEDOR -->
    <div class="w-full max-w-5xl bg-[#f8f5f0]/90 backdrop-blur-xl text-gray-800 p-8 md:p-12 rounded-3xl shadow-2xl border border-white/20">

        <!-- HEADER -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-semibold tracking-wider text-gray-900">
                {{ $user->name }}
            </h1>

            <p class="text-gray-500 mt-2 text-sm tracking-wide">
                {{ $user->email }}
            </p>

            <div class="w-24 h-[2px] bg-gradient-to-r from-yellow-600 to-yellow-400 mx-auto mt-5 rounded-full"></div>
        </div>

        <!-- CATEGORÍAS -->
        <div class="space-y-12">

            <!-- CATEGORIA -->
            <div>

                <h2 class="text-2xl md:text-3xl font-semibold mb-6 border-l-4 border-yellow-500 pl-4 text-gray-900">
                    💈 Cortes & Servicios
                </h2>

                <div class="space-y-6">

                    <!-- ITEM -->
                    <div class="flex justify-between items-start border-b border-gray-300 pb-4 hover:opacity-80 transition">

                        <div class="pr-4">
                            <h3 class="text-lg font-medium text-gray-900">Corte Clásico</h3>
                            <p class="text-sm text-gray-500">
                                Corte limpio y profesional con acabado moderno.
                            </p>
                        </div>

                        <span class="text-yellow-600 font-semibold text-lg">$25</span>
                    </div>

                    <div class="flex justify-between items-start border-b border-gray-300 pb-4 hover:opacity-80 transition">
                        <div class="pr-4">
                            <h3 class="text-lg font-medium text-gray-900">Corte + Barba</h3>
                            <p class="text-sm text-gray-500">
                                Incluye perfilado y diseño de barba.
                            </p>
                        </div>

                        <span class="text-yellow-600 font-semibold text-lg">$45</span>
                    </div>

                    <div class="flex justify-between items-start border-b border-gray-300 pb-4 hover:opacity-80 transition">
                        <div class="pr-4">
                            <h3 class="text-lg font-medium text-gray-900">Diseño con color</h3>
                            <p class="text-sm text-gray-500">
                                Diseños personalizados con pigmentación.
                            </p>
                        </div>

                        <span class="text-yellow-600 font-semibold text-lg">$10+</span>
                    </div>

                </div>

            </div>

            <!-- OTRA CATEGORIA -->
            <div>

                <h2 class="text-2xl md:text-3xl font-semibold mb-6 border-l-4 border-yellow-500 pl-4 text-gray-900">
                    🧴 Tratamientos
                </h2>

                <div class="space-y-6">

                    <div class="flex justify-between items-start border-b border-gray-300 pb-4 hover:opacity-80 transition">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Mascarilla Facial</h3>
                            <p class="text-sm text-gray-500">
                                Limpieza profunda y rejuvenecimiento facial.
                            </p>
                        </div>
                        <span class="text-yellow-600 font-semibold text-lg">$45</span>
                    </div>

                    <div class="flex justify-between items-start border-b border-gray-300 pb-4 hover:opacity-80 transition">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Paquete VIP</h3>
                            <p class="text-sm text-gray-500">
                                Incluye corte, barba, spa y mascarilla.
                            </p>
                        </div>
                        <span class="text-yellow-600 font-semibold text-lg">$120</span>
                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>