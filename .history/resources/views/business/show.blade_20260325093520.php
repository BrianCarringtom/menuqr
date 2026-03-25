<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Menú Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@300;400;500&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #050505;
            color: #f5f5f5;
        }

        h1,
        h2,
        h3 {
            font-family: 'Playfair Display', serif;
        }

        .glass {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        /* Scroll horizontal bonito */
        .scroll-x {
            scrollbar-width: none;
        }

        .scroll-x::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body>

    <!-- 🔥 HERO -->
    <section class="h-[70vh] relative flex items-center justify-center text-center">

        <div class="absolute inset-0">
            <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}"
                class="w-full h-full object-cover brightness-75">
        </div>

        <div class="absolute inset-0 bg-black/70"></div>

        <div class="relative z-10">
            <h1 class="text-5xl md:text-6xl tracking-widest mb-4">
                {{ $user->name }}
            </h1>

            <p class="text-gray-300">
                Menú digital premium
            </p>
        </div>

    </section>

    <!-- 🔥 CATEGORÍAS STICKY -->
    <div class="sticky top-0 z-50 bg-black/80 backdrop-blur border-b border-white/10">

        <div class="flex gap-4 overflow-x-auto px-6 py-4 scroll-x">

            @foreach ($user->categories as $category)
                <a href="#cat-{{ $category->id }}"
                    class="whitespace-nowrap px-5 py-2 rounded-full border border-yellow-500/40 text-sm hover:bg-yellow-500 hover:text-black transition">
                    {{ $category->name }}
                </a>
            @endforeach

        </div>

    </div>

    <!-- 🔥 MENÚ -->
    <section class="py-16 px-6 max-w-6xl mx-auto">

        @foreach ($user->categories as $category)
            <div id="cat-{{ $category->id }}" class="mb-20">

                <!-- Título -->
                <h2 class="text-2xl md:text-3xl text-yellow-500 mb-8 tracking-wide">
                    {{ $category->name }}
                </h2>

                <!-- GRID PRODUCTOS -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                    @foreach ($category->products as $product)
                        <div
                            class="glass p-5 rounded-xl hover:scale-[1.03] transition duration-300 hover:border-yellow-500/40">

                            <div class="flex justify-between items-start mb-2">

                                <h3 class="text-lg font-medium leading-snug">
                                    {{ $product->name }}
                                </h3>

                                <span class="text-yellow-400 font-semibold text-sm">
                                    ${{ number_format($product->price, 2) }}
                                </span>

                            </div>

                            <p class="text-gray-400 text-sm line-clamp-3">
                                {{ $product->description }}
                            </p>

                        </div>
                    @endforeach

                </div>

            </div>
        @endforeach

    </section>

    <!-- 🔥 FOOTER -->
    <footer class="text-center py-10 border-t border-white/10 text-gray-500 text-sm">
        © {{ date('Y') }} {{ $user->name }}
    </footer>

</body>

</html>
