<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Menú Elegante</title>
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
        }

        h1,
        h2 {
            font-family: 'Playfair Display', serif;
        }

        /* Animación fade */
        .fade-in {
            animation: fadeIn 1.2s ease forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="bg-black">

    <!-- 🔥 HERO -->
    <section class="h-screen relative flex items-center justify-center text-center overflow-hidden">

        <!-- Imagen fondo -->
        <div class="absolute inset-0">
            <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}"
                class="w-full h-full object-cover scale-110 blur-[3px]">
        </div>

        <!-- Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/90 via-black/70 to-black/95"></div>

        <!-- Marca -->
        <div class="absolute top-6 left-6 z-20">
            <p class="text-sm tracking-[0.5em] text-gray-400 uppercase">
                Carrington Brian
            </p>
        </div>

        <!-- Contenido -->
        <div class="relative z-10 px-6 max-w-2xl fade-in">

            <h1 class="text-5xl md:text-7xl tracking-widest mb-6 leading-tight">
                {{ $user->name }}
            </h1>

            <p class="text-gray-300 text-lg mb-10 leading-relaxed">
                Una experiencia única donde cada detalle importa.
                Calidad, estilo y atención en un solo lugar.
            </p>

            <a href="#menu"
                class="inline-block border border-yellow-500 text-yellow-400 px-10 py-3 rounded-full tracking-widest hover:bg-yellow-500 hover:text-black transition duration-300">
                VER MENÚ
            </a>

        </div>

    </section>


    <!-- 🔥 MENÚ ACORDEÓN -->
    <section id="menu" class="relative py-24 px-6">

        <!-- Fondo -->
        <div class="absolute inset-0">
            <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}"
                class="w-full h-full object-cover opacity-15">
        </div>

        <div class="absolute inset-0 bg-white/10"></div>

        <div class="relative max-w-4xl mx-auto">

            <!-- HEADER -->
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-5xl tracking-[0.3em]">
                    MENÚ
                </h2>
                <div class="w-24 h-[1px] bg-yellow-500 mx-auto mt-6"></div>
            </div>

            @forelse ($user->categories as $index => $category)

                <div class="mb-10 border-b border-gray-700 pb-6">

                    <!-- BOTÓN ACORDEÓN -->
                    <button onclick="toggleMenu({{ $index }})"
                        class="w-full flex justify-between items-center text-left">

                        <h2 class="text-2xl md:text-3xl text-yellow-500 tracking-wide">
                            {{ $category->name }}
                        </h2>

                        <!-- ICONO -->
                        <span id="icon-{{ $index }}" class="text-3xl text-yellow-400 transition">
                            +
                        </span>
                    </button>

                    <!-- CONTENIDO -->
                    <div id="content-{{ $index }}" class="max-h-0 overflow-hidden transition-all duration-500">

                        <div class="mt-8 space-y-8">

                            @forelse ($category->products as $product)
                                <div class="group">
                                    <div class="flex justify-between items-end border-b border-gray-700 pb-3">
                                        <h3 class="text-xl md:text-2xl">
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
                                <p class="text-gray-500 italic mt-4">
                                    No hay productos en esta categoría
                                </p>
                            @endforelse

                        </div>

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
    <footer class="bg-white text-black py-16 text-center">

        <h3 class="text-2xl tracking-[0.3em] mb-3">
            Carrington Brian
        </h3>

        <p class="text-gray-600 text-sm mb-6">
            Experiencia gastronómica de alto nivel
        </p>

        <div class="flex justify-center gap-6 text-sm text-gray-500 mb-6">
            <span>© {{ date('Y') }}</span>
            <span>Todos los derechos reservados</span>
        </div>

        <!-- Línea elegante -->
        <div class="w-16 h-[2px] bg-black mx-auto"></div>

    </footer>


    <!-- 🔥 SCRIPT ACORDEÓN -->
    <script>
        function toggleMenu(index) {
            const content = document.getElementById(`content-${index}`);
            const icon = document.getElementById(`icon-${index}`);

            if (content.style.maxHeight) {
                content.style.maxHeight = null;
                icon.innerText = "+";
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
                icon.innerText = "−";
            }
        }
    </script>

</body>

</html>
