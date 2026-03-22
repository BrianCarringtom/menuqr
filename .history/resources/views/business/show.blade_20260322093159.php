<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Menú Premium</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: url('https://images.unsplash.com/photo-1536782376847-5c9d14d97cc0?fm=jpg&q=60&w=3000&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') center/cover no-repeat fixed;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center px-4 py-10">

    <!-- CONTENEDOR -->
    <div class="w-full max-w-5xl bg-white/40 backdrop-blur-xl border border-white/30 text-gray-900 p-6 md:p-10 rounded-2xl shadow-2xl">

        <!-- HEADER -->
        <div class="text-center mb-10">
            <h1 class="text-4xl md:text-5xl font-light tracking-widest">
                {{ $user->name }}
            </h1>

            <p class="text-gray-400 mt-2">{{ $user->email }}</p>

            <div class="w-20 h-[2px] bg-orange-500 mx-auto mt-4"></div>
        </div>

        <!-- CATEGORÍAS -->
        <div class="space-y-10">

            <!-- EJEMPLO CATEGORIA -->
            <div>

                <!-- TITULO -->
                <h2 class="text-2xl md:text-3xl font-semibold mb-6 border-l-4 border-orange-500 pl-4">
                    💈 Cortes & Servicios
                </h2>

                <!-- PRODUCTOS -->
                <div class="space-y-5">

                    <!-- PRODUCTO -->
                    <div class="flex justify-between items-start border-b border-gray-700 pb-3">

                        <div class="pr-4">
                            <h3 class="text-lg font-medium">Corte Clásico</h3>
                            <p class="text-sm text-gray-400">
                                Corte limpio y profesional con acabado moderno.
                            </p>
                        </div>

                        <span class="text-orange-400 font-semibold text-lg">$25</span>
                    </div>

                    <!-- PRODUCTO -->
                    <div class="flex justify-between items-start border-b border-gray-700 pb-3">

                        <div class="pr-4">
                            <h3 class="text-lg font-medium">Corte + Barba</h3>
                            <p class="text-sm text-gray-400">
                                Incluye perfilado y diseño de barba.
                            </p>
                        </div>

                        <span class="text-orange-400 font-semibold text-lg">$45</span>
                    </div>

                    <!-- PRODUCTO -->
                    <div class="flex justify-between items-start border-b border-gray-700 pb-3">

                        <div class="pr-4">
                            <h3 class="text-lg font-medium">Diseño con color</h3>
                            <p class="text-sm text-gray-400">
                                Diseños personalizados con pigmentación.
                            </p>
                        </div>

                        <span class="text-orange-400 font-semibold text-lg">$10+</span>
                    </div>

                </div>

            </div>


            <!-- OTRA CATEGORIA -->
            <div>

                <h2 class="text-2xl md:text-3xl font-semibold mb-6 border-l-4 border-orange-500 pl-4">
                    🧴 Tratamientos
                </h2>

                <div class="space-y-5">

                    <div class="flex justify-between items-start border-b border-gray-700 pb-3">
                        <div>
                            <h3 class="text-lg font-medium">Mascarilla Facial</h3>
                            <p class="text-sm text-gray-400">
                                Limpieza profunda y rejuvenecimiento facial.
                            </p>
                        </div>
                        <span class="text-orange-400 font-semibold text-lg">$45</span>
                    </div>

                    <div class="flex justify-between items-start border-b border-gray-700 pb-3">
                        <div>
                            <h3 class="text-lg font-medium">Paquete VIP</h3>
                            <p class="text-sm text-gray-400">
                                Incluye corte, barba, spa y mascarilla.
                            </p>
                        </div>
                        <span class="text-orange-400 font-semibold text-lg">$120</span>
                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>
