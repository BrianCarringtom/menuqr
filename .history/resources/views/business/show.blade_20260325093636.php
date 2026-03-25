<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Menú Elegante</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #050505;
            color: #f5f5f5;
        }

        h1, h2, h3 {
            font-family: 'Playfair Display', serif;
        }

        .glass {
            background: rgba(255,255,255,0.04);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.08);
        }
    </style>
</head>

<body>

<!-- 🔥 HERO -->
<section class="h-[60vh] relative flex items-center justify-center text-center">

    <div class="absolute inset-0">
        <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}"
            class="w-full h-full object-cover brightness-75">
    </div>

    <div class="absolute inset-0 bg-black/70"></div>

    <div class="relative z-10">
        <h1 class="text-5xl tracking-widest mb-4">
            {{ $user->name }}
        </h1>
        <p class="text-gray-300">Menú</p>
    </div>

</section>

<!-- 🔥 MENÚ -->
<section class="py-20 px-6 max-w-3xl mx-auto">

@forelse ($user->categories as $category)

    <!-- 🔥 CATEGORÍA ACORDEÓN -->
    <div class="mb-6 border-b border-white/10 pb-4">

        <!-- HEADER CLICK -->
        <button onclick="toggleCategory({{ $category->id }})"
            class="w-full flex justify-between items-center text-left py-4">

            <h2 class="text-2xl text-yellow-500 tracking-wide">
                {{ $category->name }}
            </h2>

            <span id="icon-{{ $category->id }}" class="text-gray-400 text-xl transition">
                +
            </span>

        </button>

        <!-- CONTENIDO -->
        <div id="cat-{{ $category->id }}" class="hidden mt-4 space-y-6">

            @forelse ($category->products as $product)

            <div class="group">

                <div class="flex justify-between items-end border-b border-gray-800 pb-2">

                    <h3 class="text-lg group-hover:text-yellow-400 transition">
                        {{ $product->name }}
                    </h3>

                    <span class="text-yellow-400 font-semibold">
                        ${{ number_format($product->price, 2) }}
                    </span>

                </div>

                <p class="text-gray-400 text-sm mt-1">
                    {{ $product->description }}
                </p>

            </div>

            @empty
                <p class="text-gray-500 italic">Sin productos</p>
            @endforelse

        </div>

    </div>

@empty

    <p class="text-center text-gray-400">No hay menú disponible</p>

@endforelse

</section>

<!-- 🔥 FOOTER -->
<footer class="text-center py-10 border-t border-white/10 text-gray-500 text-sm">
    © {{ date('Y') }} {{ $user->name }}
</footer>

<!-- 🔥 SCRIPT -->
<script>
function toggleCategory(id) {
    const el = document.getElementById('cat-' + id);
    const icon = document.getElementById('icon-' + id);

    if (el.classList.contains('hidden')) {
        el.classList.remove('hidden');
        icon.innerHTML = '−';
    } else {
        el.classList.add('hidden');
        icon.innerHTML = '+';
    }
}
</script>

</body>

</html>