<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Menú Premium</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FUENTES PRO -->
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Inter:wght@300;400;500&display=swap"
        rel="stylesheet">

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: #f5f5f5;
            background: #050505;
        }

        h1,
        h2,
        h3 {
            font-family: 'Playfair Display', serif;
        }

        /* ✨ ANIMACIONES */
        .fade-up {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeUp 1s ease forwards;
        }

        @keyframes fadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ✨ BOTÓN GLOW */
        .btn-glow {
            box-shadow: 0 0 0px rgba(234, 179, 8, 0.0);
            transition: all .4s ease;
        }

        .btn-glow:hover {
            box-shadow: 0 0 25px rgba(234, 179, 8, 0.6);
        }

        /* ✨ TARJETAS GLASS */
        .glass {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
    </style>
</head>

<body>

    <!-- 🔥 HERO PREMIUM -->
    <section class="h-screen relative flex items-center justify-center text-center overflow-hidden">

        <!-- Fondo -->
        <div class="absolute inset-0">
            <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}"
                class="w-full h-full object-cover scale-110 brightness-75">
        </div>

        <!-- Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/90 via-black/60 to-black/95"></div>

        <!-- Marca -->
        <div class="absolute top-6 left-6 z-20 fade-up">
            <p class="text-xs tracking-[0.5em] text-gray-400 uppercase">
                Carrington Brian
            </p>
        </div>

        <!-- Contenido -->
        <div class="relative z-10 px-6 max-w-3xl fade-up">

            <h1 class="text-5xl md:text-7xl tracking-widest mb-6 leading-tight">
                {{ $user->name }}
            </h1>

            <p class="text-gray-300 text-lg mb-10 leading-relaxed">
                Una experiencia gastronómica donde el diseño, el sabor y la elegancia se fusionan.
            </p>

            <a href="#menu"
                class="btn-glow inline-block border border-yellow-500 text-yellow-400 px-10 py-3 rounded-full tracking-widest hover:bg-yellow-500 hover:text-black transition duration-300">
                VER MENÚ
            </a>

        </div>

    </section>


    <!-- 🔥 MENÚ PREMIUM -->
    <section id="menu" class="relative py-28 px-6">

        <!-- Fondo -->
        <div class="absolute inset-0">
            <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}"
                class="w-full h-full object-cover opacity-10">
        </div>

        <div class="relative max-w-5xl mx-auto">

            <!-- Header -->
            <div class="text-center mb-24 fade-up">
                <h2 class="text-4xl md:text-5xl tracking-[0.4em]">
                    MENÚ
                </h2>
                <div class="w-24 h-[2px] bg-yellow-500 mx-auto mt-6"></div>
            </div>

            @forelse ($user->categories as $category)

                <div class="mb-24 fade-up">

                    <h2
                        class="text-3xl md:text-4xl mb-12 text-yellow-500 tracking-wide border-l-4 border-yellow-500 pl-5">
                        {{ $category->name }}
                    </h2>

                    <div class="space-y-8">

                        @forelse ($category->products as $product)
                            <!-- 🔥 PRODUCTO PRO -->
                            <div
                                class="glass p-6 rounded-xl transition duration-300 hover:scale-[1.02] hover:border-yellow-500/40 hover:shadow-xl">

                                <div class="flex justify-between items-center mb-2">

                                    <h3
                                        class="text-xl md:text-2xl group-hover:text-yellow-400 transition tracking-wide">
                                        {{ $product->name }}
                                    </h3>

                                    <span class="text-lg text-yellow-400 font-semibold">
                                        ${{ number_format($product->price, 2) }}
                                    </span>

                                </div>

                                <p class="text-gray-400 text-sm leading-relaxed">
                                    {{ $product->description }}
                                </p>

                            </div>

                        @empty
                            <p class="text-gray-500 italic">
                                No hay productos en esta categoría
                            </p>
                        @endforelse

                    </div>
                </div>

            @empty

                <div class="text-center text-gray-400">
                    <p class="text-xl">Este negocio aún no tiene menú</p>
                </div>

            @endforelse

        </div>
    </section>


    <!-- 🔥 FOOTER PRO -->
    <footer class="bg-black border-t border-white/10 py-12 text-center">

        <h3 class="text-lg tracking-widest mb-2 text-white">
            Carrington Brian
        </h3>

        <p class="text-gray-500 text-sm mb-4">
            Experiencia gastronómica premium
        </p>

        <div class="flex justify-center gap-6 text-gray-600 text-sm">
            <span>© {{ date('Y') }}</span>
            <span>Todos los derechos reservados</span>
        </div>

    </footer>

</body>

</html>
