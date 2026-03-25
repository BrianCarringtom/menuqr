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
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: #f5f5f5;
        }

        h1,
        h2 {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>

<body class="bg-black">

    <!-- 🔥 HERO -->
    <section class="h-screen relative flex items-center justify-center text-center overflow-hidden">

        <!-- Imagen fondo -->
        <div class="absolute inset-0">
            <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}"
                class="w-full h-full object-cover scale-105 blur-[2px]">
        </div>

        <!-- Overlay degradado -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/60 to-black/90"></div>

        <!-- 🔥 Marca arriba -->
        <div class="absolute top-6 left-6 z-20">
            <p class="text-sm tracking-[0.4em] text-gray-300 uppercase">
                Carrington Brian
            </p>
        </div>

        <!-- Contenido -->
        <div class="relative z-10 px-6 max-w-2xl">

            <h1 class="text-5xl md:text-7xl tracking-widest mb-6 leading-tight">
                {{ $user->name }}
            </h1>

            <p class="text-gray-300 text-lg mb-10 leading-relaxed">
                Una experiencia gastronómica moderna donde cada detalle importa. Sabor, diseño y elegancia en un solo
                lugar.
            </p>

            <a href="#menu"
                class="inline-block border border-yellow-500 text-yellow-400 px-10 py-3 rounded-full tracking-widest hover:bg-yellow-500 hover:text-black transition duration-300">
                VER MENÚ
            </a>

        </div>

    </section>


    <!-- 🔥 MENÚ -->
    <section id="menu" class="relative py-24 px-6">

        <!-- Fondo con misma imagen (más transparente) -->
        <div class="absolute inset-0">
            <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}"
                class="w-full h-full object-cover opacity-10">
        </div>

        <!-- Overlay más ligero -->
        <div class="absolute inset-0 bg-white"></div>

        <div class="relative max-w-4xl mx-auto">

            <!-- HEADER -->
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-5xl tracking-[0.3em]">
                    MENÚ
                </h2>

                <div class="w-24 h-[1px] bg-yellow-500 mx-auto mt-6"></div>
            </div>

            {{-- 🔥 CATEGORÍAS --}}
            @forelse ($user->categories as $category)

                <div class="mb-20">

                    <h2
                        class="text-3xl md:text-4xl mb-10 text-yellow-500 tracking-wide border-l-4 border-yellow-500 pl-4">
                        {{ $category->name }}
                    </h2>

                    <div class="space-y-10">

                        {{-- 🔥 PRODUCTOS --}}
                        @forelse ($category->products as $product)
                            <div class="group transition duration-300 hover:translate-x-1 hover:scale-[1.02]">

                                <div class="flex justify-between items-end border-b border-gray-700 pb-3">

                                    <h3 class="text-xl md:text-2xl group-hover:text-yellow-400 transition">
                                        {{ $product->name }}
                                    </h3>

                                    <span class="text-lg text-yellow-400 font-semibold">
                                        ${{ number_format($product->price, 2) }}
                                    </span>

                                </div>

                                <p class="text-gray-400 text-sm mt-2 max-w-xl">
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


    <!-- 🔥 FOOTER BLANCO -->
    <footer class="bg-white text-black py-12 text-center">

        <h3 class="text-xl tracking-widest mb-2">
            Carrington Brian
        </h3>

        <p class="text-gray-600 text-sm mb-4">
            Diseño gastronómico moderno
        </p>

        <div class="flex justify-center gap-6 text-gray-500 text-sm">
            <span>© {{ date('Y') }}</span>
            <span>Todos los derechos reservados</span>
        </div>

    </footer>

</body>

</html>
