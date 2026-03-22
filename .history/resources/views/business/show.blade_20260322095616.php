<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Menú Elegante</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FUENTES PRO -->
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Inter:wght@300;400&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(rgba(10, 10, 10, 0.75), rgba(10, 10, 10, 0.85)),
                url('https://images.unsplash.com/photo-1504674900247-0877df9cc836') center/cover no-repeat fixed;
            color: #f5f5f5;
        }

        h1,
        h2 {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>

<body class="min-h-screen px-6 py-16">

    <div class="max-w-4xl mx-auto">

        <!-- HEADER -->
        <div class="text-center mb-20">
            <h1 class="text-5xl md:text-6xl tracking-widest">
                {{ $user->name }}
            </h1>

            <p class="text-gray-400 mt-3 text-sm tracking-[0.3em] uppercase">
                BUSINESS
            </p>

            <div class="w-24 h-[1px] bg-yellow-500 mx-auto mt-6"></div>
        </div>

        <!-- CATEGORIA -->
        <div class="mb-16">

            <h2 class="text-3xl md:text-4xl mb-10 text-yellow-500 tracking-wide">
                Cortes & Servicios
            </h2>

            <div class="space-y-8">

                <!-- ITEM -->
                <div>
                    <div class="flex justify-between items-end border-b border-gray-600 pb-2">
                        <h3 class="text-xl md:text-2xl">Corte Clásico</h3>
                        <span class="text-lg text-yellow-400">$25</span>
                    </div>
                    <p class="text-gray-400 text-sm mt-2">
                        Corte limpio y profesional con acabado moderno.
                    </p>
                </div>

                <div>
                    <div class="flex justify-between items-end border-b border-gray-600 pb-2">
                        <h3 class="text-xl md:text-2xl">Corte + Barba</h3>
                        <span class="text-lg text-yellow-400">$45</span>
                    </div>
                    <p class="text-gray-400 text-sm mt-2">
                        Incluye perfilado y diseño de barba.
                    </p>
                </div>

                <div>
                    <div class="flex justify-between items-end border-b border-gray-600 pb-2">
                        <h3 class="text-xl md:text-2xl">Diseño con color</h3>
                        <span class="text-lg text-yellow-400">$10+</span>
                    </div>
                    <p class="text-gray-400 text-sm mt-2">
                        Diseños personalizados con pigmentación.
                    </p>
                </div>

            </div>

        </div>

        <!-- OTRA CATEGORIA -->
        <div>

            <h2 class="text-3xl md:text-4xl mb-10 text-yellow-500 tracking-wide">
                Tratamientos
            </h2>

            <div class="space-y-8">

                <div>
                    <div class="flex justify-between items-end border-b border-gray-600 pb-2">
                        <h3 class="text-xl md:text-2xl">Mascarilla Facial</h3>
                        <span class="text-lg text-yellow-400">$45</span>
                    </div>
                    <p class="text-gray-400 text-sm mt-2">
                        Limpieza profunda y rejuvenecimiento facial.
                    </p>
                </div>

                <div>
                    <div class="flex justify-between items-end border-b border-gray-600 pb-2">
                        <h3 class="text-xl md:text-2xl">Paquete VIP</h3>
                        <span class="text-lg text-yellow-400">$120</span>
                    </div>
                    <p class="text-gray-400 text-sm mt-2">
                        Incluye corte, barba, spa y mascarilla.
                    </p>
                </div>

            </div>

        </div>

    </div>

</body>

</html>
