<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Menú Premium</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: url('https://images.unsplash.com/photo-1517832606299-7ae9b720a186') center/cover no-repeat fixed;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center px-4 py-10">

    <!-- CONTENEDOR -->
    <div class="w-full max-w-5xl bg-black/80 backdrop-blur-lg text-white p-6 md:p-10 rounded-2xl shadow-2xl space-y-14">

        <!-- HEADER -->
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-light tracking-widest">
                {{ $user->name }}
            </h1>

            <p class="text-gray-400 mt-2">{{ $user->email }}</p>

            <div class="w-20 h-[2px] bg-orange-500 mx-auto mt-4"></div>
        </div>

        <!-- ================= BARBERÍA ================= -->
        <div>

            <h1 class="text-3xl md:text-4xl text-center mb-8 tracking-widest">
                💈 BARBERÍA
            </h1>

            <div class="space-y-10">

                <div>
                    <h2 class="text-2xl border-l-4 border-orange-500 pl-4 mb-4">
                        Cortes & Servicios
                    </h2>

                    <div class="space-y-5">

                        <div class="flex justify-between border-b border-gray-700 pb-3">
                            <div>
                                <h3>Corte Clásico</h3>
                                <p class="text-sm text-gray-400">Corte limpio y profesional</p>
                            </div>
                            <span>$25</span>
                        </div>

                        <div class="flex justify-between border-b border-gray-700 pb-3">
                            <div>
                                <h3>Corte + Barba</h3>
                                <p class="text-sm text-gray-400">Perfilado completo</p>
                            </div>
                            <span>$45</span>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <!-- SEPARADOR -->
        <div class="flex items-center gap-4">
            <div class="flex-1 h-[1px] bg-gray-600"></div>
            <span class="text-gray-400 text-sm">CAFETERÍA</span>
            <div class="flex-1 h-[1px] bg-gray-600"></div>
        </div>

        <!-- ================= CAFETERÍA ================= -->
        <div>

            <div class="space-y-10">

                <div>
                    <h2 class="text-2xl border-l-4 border-orange-500 pl-4 mb-4">
                        ☕ Bebidas
                    </h2>

                    <div class="space-y-5">

                        <div class="flex justify-between border-b border-gray-700 pb-3">
                            <div>
                                <h3>Americano</h3>
                                <p class="text-sm text-gray-400">Café intenso</p>
                            </div>
                            <span>$5</span>
                        </div>

                        <div class="flex justify-between border-b border-gray-700 pb-3">
                            <div>
                                <h3>Latte</h3>
                                <p class="text-sm text-gray-400">Leche cremosa</p>
                            </div>
                            <span>$7</span>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <!-- SEPARADOR -->
        <div class="flex items-center gap-4">
            <div class="flex-1 h-[1px] bg-gray-600"></div>
            <span class="text-gray-400 text-sm">RESTAURANTE</span>
            <div class="flex-1 h-[1px] bg-gray-600"></div>
        </div>

        <!-- ================= RESTAURANTE ================= -->
        <div>

            <div class="space-y-10">

                <div>
                    <h2 class="text-2xl border-l-4 border-orange-500 pl-4 mb-4">
                        🍕 Comida
                    </h2>

                    <div class="space-y-5">

                        <div class="flex justify-between border-b border-gray-700 pb-3">
                            <div>
                                <h3>Pizza Pepperoni</h3>
                                <p class="text-sm text-gray-400">Clásica italiana</p>
                            </div>
                            <span>$15</span>
                        </div>

                        <div class="flex justify-between border-b border-gray-700 pb-3">
                            <div>
                                <h3>Hamburguesa</h3>
                                <p class="text-sm text-gray-400">Con papas fritas</p>
                            </div>
                            <span>$12</span>
                        </div>

                    </div>
                </div>

                <div>
                    <h2 class="text-2xl border-l-4 border-orange-500 pl-4 mb-4">
                        🥤 Bebidas
                    </h2>

                    <div class="space-y-5">

                        <div class="flex justify-between border-b border-gray-700 pb-3">
                            <div>
                                <h3>Refresco</h3>
                                <p class="text-sm text-gray-400">Coca / Sprite</p>
                            </div>
                            <span>$3</span>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

</body>

</html>
