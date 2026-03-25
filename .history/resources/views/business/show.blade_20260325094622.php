<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Menú Michelin</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FUENTES ELEGANTES -->
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Inter:wght@300;400&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #fafafa;
            color: #111;
        }

        h1,
        h2 {
            font-family: 'Playfair Display', serif;
        }

        .fade-in {
            animation: fadeIn 1s ease forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Chevron para acordeón */
        .chevron {
            transition: transform 0.3s ease;
        }

        .chevron-open {
            transform: rotate(90deg);
        }
    </style>
</head>

<body>

    <!-- HERO -->
    <section class="h-screen flex items-center justify-center text-center relative overflow-hidden bg-white">
        <div class="absolute inset-0">
            <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}"
                class="w-full h-full object-cover opacity-20">
        </div>

        <div class="relative z-10 px-6 max-w-3xl fade-in">
            <h1 class="text-5xl md:text-7xl mb-6 tracking-wide">{{ $user->name }}</h1>
            <p class="text-gray-700 mb-10 text-lg leading-relaxed">
                Una experiencia gastronómica donde cada detalle cuenta. Elegancia, sabor y armonía en cada plato.
            </p>
            <a href="#menu"
                class="border border-black px-10 py-3 rounded-full tracking-wide hover:bg-black hover:text-white transition">
                VER MENÚ
            </a>
        </div>
    </section>

    <!-- MENÚ MICHELIN -->
    <section id="menu" class="relative py-24 px-6 max-w-4xl mx-auto">

        @forelse ($user->categories as $index => $category)
            <div class="mb-12">

                <!-- Botón acordeón -->
                <button onclick="toggleMenu({{ $index }})"
                    class="w-full flex justify-between items-center text-left py-3 border-b border-gray-300">
                    <h2 class="text-2xl font-semibold">{{ $category->name }}</h2>
                    <svg id="icon-{{ $index }}" class="w-6 h-6 chevron text-gray-600" fill="none"
                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <!-- Contenido -->
                <div id="content-{{ $index }}" class="max-h-0 overflow-hidden transition-all duration-500">
                    <div class="mt-6 space-y-6">
                        @forelse ($category->products as $product)
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-xl font-medium">{{ $product->name }}</h3>
                                    <p class="text-gray-600 text-sm mt-1">{{ $product->description }}</p>
                                </div>
                                <span class="text-lg font-semibold">{{ '$' . number_format($product->price, 2) }}</span>
                            </div>
                        @empty
                            <p class="text-gray-400 italic">No hay productos en esta categoría</p>
                        @endforelse
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-400">Este negocio aún no tiene menú</p>
        @endforelse

    </section>

    <!-- FOOTER MINIMALISTA -->
    <footer class="text-center py-12 border-t border-gray-300">
        <h3 class="text-xl font-medium mb-2">{{ $user->name }}</h3>
        <p class="text-gray-600 text-sm">Experiencia gastronómica de alto nivel</p>
        <p class="text-gray-400 text-xs mt-2">© {{ date('Y') }} Todos los derechos reservados</p>
    </footer>

    <script>
        function toggleMenu(index) {
            const content = document.getElementById(`content-${index}`);
            const icon = document.getElementById(`icon-${index}`);

            if (content.style.maxHeight && content.style.maxHeight !== "0px") {
                content.style.maxHeight = "0px";
                icon.classList.remove('chevron-open');
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
                icon.classList.add('chevron-open');
            }
        }
    </script>

</body>

</html>
