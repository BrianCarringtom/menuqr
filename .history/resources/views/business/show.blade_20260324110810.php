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

    @if ($user->image)
        <div class="text-center mb-10">
            <img src="{{ asset('storage/' . $user->image) }}"
                class="w-40 h-40 mx-auto rounded-full object-cover border-4 border-yellow-500 shadow-lg">
        </div>
    @endif
    
    <div class="max-w-4xl mx-auto">

        <!-- HEADER -->
        <div class="text-center mb-20">
            <h1 class="text-5xl md:text-6xl tracking-widest">
                {{ $user->name }}
            </h1>

            <p class="text-gray-400 mt-3 text-sm tracking-[0.3em] uppercase">
                MENÚ PREMIUM
            </p>

            <div class="w-24 h-[1px] bg-yellow-500 mx-auto mt-6"></div>
        </div>

        {{-- 🔥 CATEGORÍAS DINÁMICAS --}}
        @forelse ($user->categories as $category)

            <div class="mb-16">

                <!-- NOMBRE CATEGORIA -->
                <h2 class="text-3xl md:text-4xl mb-10 text-yellow-500 tracking-wide border-l-4 border-yellow-500 pl-4">
                    {{ $category->name }}
                </h2>

                <div class="space-y-8">

                    {{-- 🔥 PRODUCTOS --}}
                    @forelse ($category->products as $product)
                        <div class="hover:scale-[1.01] transition duration-300">

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

            <!-- SI NO HAY NADA -->
            <div class="text-center text-gray-400">
                <p class="text-xl">Este negocio aún no tiene menú</p>
            </div>

        @endforelse

    </div>

</body>

</html>
