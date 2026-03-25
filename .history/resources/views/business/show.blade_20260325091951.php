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
    <section class="h-screen relative flex items-center justify-center text-center">

        <!-- Imagen fondo -->
        <div class="absolute inset-0">
            <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}"
                class="w-full h-full object-cover">
        </div>

        <!-- Overlay oscuro -->
        <div class="absolute inset-0 bg-black/70"></div>

        <!-- Contenido -->
        <div class="relative z-10 px-6">
            <h1 class="text-5xl md:text-7xl tracking-widest mb-4">
                {{ $user->name }}
            </h1>

            <p class="text-gray-300 max-w-xl mx-auto mb-8">
                Descubre una experiencia gastronómica única, donde cada platillo está hecho con pasión y los mejores
                ingredientes.
            </p>

            <a href="#menu"
                class="bg-yellow-500 hover:bg-yellow-400 text-black px-8 py-3 rounded-full font-semibold tracking-wide transition">
                Ver menú
            </a>
        </div>

    </section>


    <!-- 🔥 MENÚ -->
    <section id="menu" class="relative py-20 px-6">

        <!-- Fondo con misma imagen pero con opacity -->
        <div class="absolute inset-0">
            <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}"
                class="w-full h-full object-cover opacity-20">
        </div>

        <div class="absolute inset-0 bg-black/90"></div>

        <div class="relative max-w-4xl mx-auto">

            <!-- HEADER -->
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-5xl tracking-widest">
                    MENÚ
                </h2>

                <div class="w-24 h-[1px] bg-yellow-500 mx-auto mt-6"></div>
            </div>

            {{-- 🔥 CATEGORÍAS --}}
            @forelse ($user->categories as $category)

                <div class="mb-16">

                    <!-- NOMBRE CATEGORIA -->
                    <h2
                        class="text-3xl md:text-4xl mb-10 text-yellow-500 tracking-wide border-l-4 border-yellow-500 pl-4">
                        {{ $category->name }}
                    </h2>

                    <div class="space-y-8">

                        {{-- 🔥 PRODUCTOS --}}
                        @forelse ($category->products as $product)
                            <div class="hover:scale-[1.02] transition duration-300">

                                <div class="flex justify-between items-end border-b border-gray-600 pb-2">

                                    <h3 class="text-xl md:text-2xl">
                                        {{ $product->name }}
                                    </h3>

                                    <span class="text-lg text-yellow-400 font-semibold">
                                        ${{ number_format($product->price, 2) }}
                                    </span>

                                </div>

                                <p class="text-gray-400 text-sm mt-2">
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


    <!-- 🔥 FOOTER -->
    <footer class="bg-black border-t border-gray-800 py-10 text-center">

        <h3 class="text-xl tracking-widest mb-2">
            {{ $user->name }}
        </h3>

        <p class="text-gray-400 text-sm mb-4">
            Gracias por visitarnos
        </p>

        <div class="flex justify-center gap-6 text-gray-500 text-sm">
            <span>© {{ date('Y') }}</span>
            <span>Todos los derechos reservados</span>
        </div>

    </footer>

</body>

</html>
