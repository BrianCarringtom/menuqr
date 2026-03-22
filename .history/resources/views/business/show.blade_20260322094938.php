<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Menú Premium</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FUENTES PRO -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),
                        url('https://images.unsplash.com/photo-1555396273-367ea4eb4db5') center/cover no-repeat fixed;
        }

        h1, h2 {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center px-4 py-12">

    <!-- CONTENEDOR -->
    <div class="w-full max-w-6xl bg-[#fdfaf6]/90 backdrop-blur-2xl rounded-3xl shadow-[0_20px_60px_rgba(0,0,0,0.5)] overflow-hidden border border-white/20">

        <!-- HEADER -->
        <div class="bg-gradient-to-r from-black via-gray-900 to-black text-white text-center p-10 relative">

            <h1 class="text-4xl md:text-5xl font-bold tracking-widest">
                {{ $user->name }}
            </h1>

            <p class="text-gray-400 text-sm mt-2 tracking-wide">
                {{ $user->email }}
            </p>

            <div class="w-24 h-[2px] bg-gradient-to-r from-yellow-600 to-yellow-400 mx-auto mt-6 rounded-full"></div>

        </div>

        <!-- CONTENIDO -->
        <div class="p-8 md:p-12 space-y-14">

            <!-- CATEGORIA -->
            <div>

                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-2xl md:text-3xl font-semibold text-gray-900 flex items-center gap-2">
                        💈 Cortes & Servicios
                    </h2>

                    <span class="text-xs uppercase tracking-widest text-gray-400">Premium</span>
                </div>

                <!-- GRID PRODUCTOS -->
                <div class="grid md:grid-cols-2 gap-6">

                    <!-- CARD -->
                    <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl transition duration-300 border border-gray-100">

                        <div class="flex justify-between items-start">
                            <h3 class="text-lg font-semibold text-gray-900">Corte Clásico</h3>
                            <span class="text-yellow-600 font-bold text-lg">$25</span>
                        </div>

                        <p class="text-sm text-gray-500 mt-2">
                            Corte limpio y profesional con acabado moderno.
                        </p>

                        <div class="mt-4 h-[1px] bg-gray-100"></div>

                        <div class="mt-3 text-xs text-gray-400">
                            Servicio rápido • 30 min
                        </div>

                    </div>

                    <!-- CARD -->
                    <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl transition duration-300 border border-gray-100">

                        <div class="flex justify-between items-start">
                            <h3 class="text-lg font-semibold text-gray-900">Corte + Barba</h3>
                            <span class="text-yellow-600 font-bold text-lg">$45</span>
                        </div>

                        <p class="text-sm text-gray-500 mt-2">
                            Incluye perfilado y diseño de barba.
                        </p>

                        <div class="mt-4 h-[1px] bg-gray-100"></div>

                        <div class="mt-3 text-xs text-gray-400">
                            Servicio completo • 50 min
                        </div>

                    </div>

                    <!-- CARD -->
                    <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl transition duration-300 border border-gray-100 md:col-span-2">

                        <div class="flex justify-between items-start">
                            <h3 class="text-lg font-semibold text-gray-900">Diseño con color</h3>
                            <span class="text-yellow-600 font-bold text-lg">$10+</span>
                        </div>

                        <p class="text-sm text-gray-500 mt-2">
                            Diseños personalizados con pigmentación.
                        </p>

                        <div class="mt-4 h-[1px] bg-gray-100"></div>

                        <div class="mt-3 text-xs text-gray-400">
                            Personalizado • Variable
                        </div>

                    </div>

                </div>

            </div>

            <!-- OTRA CATEGORIA -->
            <div>

                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-2xl md:text-3xl font-semibold text-gray-900">
                        🧴 Tratamientos
                    </h2>

                    <span class="text-xs uppercase tracking-widest text-gray-400">Luxury Care</span>
                </div>

                <div class="grid md:grid-cols-2 gap-6">

                    <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl transition duration-300 border border-gray-100">

                        <div class="flex justify-between items-start">
                            <h3 class="text-lg font-semibold text-gray-900">Mascarilla Facial</h3>
                            <span class="text-yellow-600 font-bold text-lg">$45</span>
                        </div>

                        <p class="text-sm text-gray-500 mt-2">
                            Limpieza profunda y rejuvenecimiento facial.
                        </p>

                        <div class="mt-4 h-[1px] bg-gray-100"></div>

                        <div class="mt-3 text-xs text-gray-400">
                            Relax • 40 min
                        </div>

                    </div>

                    <div class="bg-gradient-to-br from-yellow-600 to-yellow-400 text-white rounded-2xl p-6 shadow-xl hover:scale-[1.02] transition duration-300">

                        <div class="flex justify-between items-start">
                            <h3 class="text-lg font-semibold">Paquete VIP</h3>
                            <span class="font-bold text-lg">$120</span>
                        </div>

                        <p class="text-sm mt-2 opacity-90">
                            Incluye corte, barba, spa y mascarilla.
                        </p>

                        <div class="mt-4 h-[1px] bg-white/30"></div>

                        <div class="mt-3 text-xs opacity-80">
                            Experiencia premium ⭐
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>