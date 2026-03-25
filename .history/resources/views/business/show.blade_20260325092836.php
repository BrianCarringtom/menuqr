<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Menú Premium</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FUENTES -->
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Inter:wght@300;400;500&display=swap"
        rel="stylesheet">

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        h1,
        h2 {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>

<body class="bg-black text-white">

    <!-- 🔥 NAVBAR -->
    <div
        class="fixed top-0 left-0 w-full z-50 px-6 py-4 flex justify-between items-center bg-black/30 backdrop-blur-md border-b border-white/10">
        <span class="tracking-[0.3em] text-sm text-gray-300 uppercase">
            Carrington Brian
        </span>
    </div>


    <!-- 🔥 HERO -->
    <section class="h-screen flex items-center justify-center text-center relative">

        <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}"
            class="absolute inset-0 w-full h-full object-cover scale-105">

        <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/50 to-black/90 backdrop-blur-sm"></div>

        <div class="relative z-10 max-w-2xl px-6">

            <h1 class="text-5xl md:text-7xl mb-6 leading-tight">
                {{ $user->name }}
            </h1>

            <p class="text-gray-300 text-lg mb-10">
                Alta cocina moderna con una experiencia diseñada para cautivar todos los sentidos.
            </p>

            <a href="#menu"
                class="px-10 py-3 border border-yellow-400 text-yellow-400 rounded-full hover:bg-yellow-400 hover:text-black transition duration-300 shadow-[0_0_20px_rgba(250,204,21,0.2)]">
                Explorar menú
            </a>

        </div>

    </section>


    <!-- 🔥 MENÚ -->
    <section id="menu" class="relative py-24 px-6">

        <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}"
            class="absolute inset-0 w-full h-full object-cover opacity-10">

        <div class="absolute inset-0 bg-black/80"></div>

        <div class="relative max-w-4xl mx-auto">

            <div class="text-center mb-20">
                <h2 class="text-4xl tracking-[0.2em]">MENÚ</h2>
            </div>

            @forelse ($user->categories as $category)

                <div class="mb-20">

                    <h2 class="text-3xl mb-10 text-yellow-400 border-l-4 border-yellow-400 pl-4">
                        {{ $category->name }}
                    </h2>

                    <div class="space-y-6">

                        @forelse ($category->products as $product)
                            <!-- CARD -->
                            <div
                                class="p-5 rounded-xl bg-white/5 backdrop-blur-md border border-white/10 hover:border-yellow-400/40 transition">

                                <div class="flex justify-between">
                                    <h3 class="text-lg md:text-xl">
                                        {{ $product->name }}
                                    </h3>

                                    <span class="text-yellow-400 font-semibold">
                                        ${{ number_format($product->price, 2) }}
                                    </span>
                                </div>

                                <p class="text-gray-400 text-sm mt-2">
                                    {{ $product->description }}
                                </p>

                            </div>

                        @empty
                            <p class="text-gray-500">Sin productos</p>
                        @endforelse

                    </div>

                </div>

            @empty
                <p class="text-center text-gray-400">No hay menú aún</p>
            @endforelse

        </div>
    </section>


    <!-- 🔥 FOOTER -->
    <footer class="bg-white text-black py-12 text-center">

        <h3 class="text-xl tracking-widest mb-2">
            Carrington Brian
        </h3>

        <p class="text-gray-600 text-sm mb-4">
            Experiencia gastronómica moderna
        </p>

        <span class="text-gray-500 text-sm">
            © {{ date('Y') }} Todos los derechos reservados
        </span>

    </footer>

</body>

</html>
