<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Elegante</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FUENTES -->
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <style>
        html {
            scroll-behavior: smooth;
        }

        html,
        body {
            overflow-x: hidden;
            width: 100%;
        }

        * {
            box-sizing: border-box;
            max-width: 100%;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: #f5f5f5;
            background: black;
        }

        h1,
        h2,
        h3 {
            font-family: 'Playfair Display', serif;
        }

        /* ANIMACIÓN */
        .fade-in {
            animation: fadeIn 1.2s ease forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* TRANSICIÓN */
        .accordion-content {
            transition: max-height 0.5s ease;
        }

        /* 🔥 IMÁGENES PEQUEÑAS Y ELEGANTES */
        /* 🔥 IMÁGENES MINIMALISTAS Y PREMIUM */
        .menu-image {
            width: 56px;
            height: 56px;
            object-fit: cover;
            border-radius: 18px;

            /* BORDE DELGADO */
            border: 1px solid rgba(255, 255, 255, 0.08);

            /* EFECTO GLASS */
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);

            /* SOMBRA ELEGANTE */
            box-shadow:
                0 8px 25px rgba(0, 0, 0, 0.35),
                0 0 0 1px rgba(255, 255, 255, 0.03);

            flex-shrink: 0;

            transition:
                transform 0.35s ease,
                box-shadow 0.35s ease,
                border-color 0.35s ease;

            position: relative;
            overflow: hidden;
        }

        /* EFECTO HOVER */
        .menu-image:hover {

            transform: translateY(-3px) scale(1.04);

            border-color: rgba(234, 179, 8, 0.35);

            box-shadow:
                0 12px 28px rgba(0, 0, 0, 0.45),
                0 0 18px rgba(234, 179, 8, 0.12);
        }

        .category-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        /* 🔥 RESPONSIVE CELULAR */
        @media (max-width: 768px) {

            /* HERO */
            .hero-title {
                font-size: 3.1rem !important;
                line-height: 1.15;
                letter-spacing: 2px;
                word-break: break-word;
            }

            .hero-text {
                font-size: 1.15rem !important;
                line-height: 1.9;
            }

            .hero-button {
                font-size: 1rem;
                padding: 14px 28px;
                letter-spacing: 2px;
            }

            /* TÍTULOS */
            .section-title {
                font-size: 2rem !important;
                line-height: 1.3;
                letter-spacing: 4px;
            }

            .category-title {
                font-size: 1.5rem !important;
                line-height: 1.5;
                padding-right: 12px;
            }

            /* PRODUCTOS */
            .product-name {
                font-size: 1.2rem !important;
                line-height: 1.5;
                word-break: break-word;
            }

            .product-price {
                font-size: 1.1rem !important;
                flex-shrink: 0;
                white-space: nowrap;
            }

            .product-description {
                font-size: 1rem !important;
                line-height: 1.8;
                word-break: break-word;
            }

            /* FOOTER */
            .footer-title {
                font-size: 1.4rem;
                line-height: 1.5;
            }

            .footer-text {
                font-size: 0.95rem;
                line-height: 1.7;
            }

            /* ESPACIADOS */
            .mobile-spacing {
                padding-left: 1rem !important;
                padding-right: 1rem !important;
            }

            .mobile-section {
                padding-top: 6rem;
                padding-bottom: 6rem;
            }

            /* FLEX RESPONSIVE */
            .product-flex {
                gap: 10px;
                align-items: flex-start;
            }

            /* BOTÓN ACORDEÓN */
            .accordion-button {
                gap: 15px;
                align-items: center;
            }

            /* ICONO */
            .accordion-icon {
                font-size: 2rem !important;
                flex-shrink: 0;
            }

            /* IMÁGENES */
            .menu-image {
                width: 48px;
                height: 48px;
                border-radius: 15px;
            }

            .category-left {
                gap: 12px;
            }
        }
    </style>
</head>

<body>

    <!-- 🔥 HERO -->
    <section class="h-screen relative flex items-center justify-center text-center overflow-hidden mobile-spacing">

        <!-- Fondo -->
        <div class="absolute inset-0">
            <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}"
                class="w-full h-full object-cover scale-110">
        </div>

        <!-- Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/90 via-black/70 to-black/95"></div>

        <!-- Marca -->
        <div class="absolute top-6 left-6 z-20">
            <p class="text-sm md:text-base tracking-[0.4em] text-gray-400 uppercase">
                Carrington Brian
            </p>
        </div>

        <!-- Contenido -->
        <div class="relative z-10 max-w-3xl px-4 fade-in">

            <h1 class="hero-title text-6xl md:text-7xl tracking-widest mb-8 font-bold leading-tight text-white">
                {{ $user->name }}
            </h1>

            <p class="hero-text text-gray-300 text-xl md:text-2xl mb-12 leading-relaxed">
                Una experiencia única donde cada detalle importa.
                Calidad, estilo y atención en un solo lugar.
            </p>

            <a href="#menu"
                class="inline-flex items-center gap-3 border border-yellow-500 text-yellow-400 px-10 py-4 rounded-full tracking-[0.2em] hover:bg-yellow-500 hover:text-black transition duration-300 backdrop-blur-sm">

                DESCUBRE MÁS

            </a>

        </div>

        <!-- Barra Inferior -->
        <div class="absolute bottom-5 left-1/2 -translate-x-1/2 z-20 w-[92%] md:w-auto">

            <div
                class="flex items-center justify-between gap-5 bg-black/30 backdrop-blur-xl border border-white/10 rounded-full px-5 py-3 shadow-2xl">

                <!-- Dirección -->
                <div class="flex items-center gap-3">

                    <!-- Icono -->
                    <div class="text-yellow-400">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />

                        </svg>

                    </div>

                    <!-- Texto -->
                    <div class="text-left leading-tight">

                        <p class="text-[10px] uppercase tracking-[0.25em] text-gray-500">
                            Dirección
                        </p>

                        <p class="text-white text-sm md:text-[15px] font-light">
                            Tuxtla Gutiérrez, Chiapas
                        </p>

                    </div>

                </div>

                <!-- Línea -->
                <div class="w-px h-8 bg-white/10"></div>

                <!-- WhatsApp -->
                <a href="https://wa.me/529611234567" target="_blank" class="group">

                    <div
                        class="w-14 h-14 rounded-full bg-[#25D366] flex items-center justify-center shadow-[0_8px_25px_rgba(37,211,102,0.45)] hover:scale-110 hover:-translate-y-1 transition-all duration-300">

                        <!-- Icono WhatsApp -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="w-7 h-7 fill-white">

                            <path
                                d="M16.04 3C8.84 3 3 8.74 3 15.82c0 2.5.74 4.93 2.14 7L3 29l6.37-2.05a13.1 13.1 0 0 0 6.67 1.82h.01C23.2 28.77 29 23.03 29 15.95 29 8.87 23.2 3 16.04 3zm0 23.55c-2.06 0-4.08-.56-5.84-1.62l-.42-.25-3.78 1.22 1.24-3.68-.27-.44a10.5 10.5 0 0 1-1.62-5.64c0-5.82 4.82-10.56 10.74-10.56 2.87 0 5.57 1.1 7.59 3.1a10.4 10.4 0 0 1 3.14 7.53c0 5.82-4.82 10.56-10.78 10.56zm5.9-7.92c-.32-.16-1.88-.92-2.17-1.03-.29-.1-.5-.16-.71.16-.21.31-.82 1.03-1 1.24-.18.21-.36.23-.68.08-.32-.16-1.33-.48-2.53-1.54-.94-.83-1.58-1.85-1.76-2.16-.18-.31-.02-.47.14-.63.14-.14.32-.36.48-.54.16-.18.21-.31.32-.52.1-.21.05-.39-.03-.54-.08-.16-.71-1.72-.98-2.36-.26-.63-.52-.54-.71-.55h-.61c-.21 0-.54.08-.82.39-.28.31-1.08 1.06-1.08 2.58 0 1.52 1.11 2.99 1.26 3.2.16.21 2.18 3.3 5.28 4.5.74.29 1.32.46 1.77.59.74.24 1.41.21 1.94.13.59-.09 1.88-.77 2.14-1.51.27-.75.27-1.39.19-1.52-.08-.13-.29-.21-.61-.37z" />

                        </svg>

                    </div>

                </a>

            </div>

        </div>

    </section>


    <!-- 🔥 MENÚ -->
    <section id="menu" class="relative py-28 px-6 mobile-section mobile-spacing">

        <!-- Fondo -->
        <div class="absolute inset-0">
            <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}"
                class="w-full h-full object-cover opacity-15">
        </div>

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/80"></div>

        <div class="relative max-w-5xl mx-auto">

            <!-- HEADER -->
            <div class="text-center mb-24">

                <h2 class="section-title text-5xl md:text-6xl tracking-[0.3em]">
                    LO QUE OFRECEMOS
                </h2>

                <div class="w-28 h-[2px] bg-yellow-500 mx-auto mt-8"></div>

            </div>

            @forelse ($user->categories as $index => $category)

                <div class="mb-12 border-b border-gray-700 pb-8">

                    <!-- BOTÓN -->
                    <button onclick="toggleMenu({{ $index }})"
                        class="accordion-button w-full flex justify-between items-center text-left">

                        <!-- IZQUIERDA -->
                        <div class="category-left">

                            <!-- 🔥 IMAGEN -->
                            <div class="relative">

                                <!-- IMAGEN -->
                                <img src="{{ $category->image
                                    ? asset('storage/' . $category->image)
                                    : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=1200&auto=format&fit=crop' }}"
                                    class="menu-image">

                                <!-- EFECTO PREMIUM -->
                                <div class="absolute inset-0 rounded-[18px] bg-white/5 backdrop-blur-sm -z-10">
                                </div>

                            </div>

                            <!-- TÍTULO -->
                            <h2 class="category-title text-3xl md:text-4xl text-yellow-500 font-semibold tracking-wide">
                                {{ $category->name }}
                            </h2>

                        </div>

                        <!-- ICONO -->
                        <span id="icon-{{ $index }}"
                            class="accordion-icon text-4xl text-yellow-400 transition duration-300">
                            +
                        </span>

                    </button>

                    <!-- CONTENIDO -->
                    <div id="content-{{ $index }}" class="accordion-content max-h-0 overflow-hidden">

                        <div class="mt-10 space-y-10">

                            @forelse ($category->products as $product)
                                <div>

                                    <div
                                        class="product-flex flex justify-between items-start border-b border-gray-700 pb-5">

                                        <h3 class="product-name text-2xl md:text-3xl font-medium">
                                            {{ $product->name }}
                                        </h3>

                                        <span class="product-price text-2xl text-yellow-400 font-semibold">
                                            ${{ number_format($product->price, 2) }}
                                        </span>

                                    </div>

                                    <p class="product-description text-gray-400 text-base md:text-lg mt-4 max-w-3xl">
                                        {{ $product->description }}
                                    </p>

                                </div>

                            @empty

                                <p class="text-gray-500 italic text-xl mt-6">
                                    No hay productos en esta categoría
                                </p>
                            @endforelse

                        </div>

                    </div>

                </div>

            @empty

                <div class="text-center text-gray-400">
                    <p class="text-2xl">
                        Este negocio aún no tiene menú
                    </p>
                </div>

            @endforelse

        </div>

    </section>


    <!-- 🔥 FOOTER -->
    <footer class="bg-white text-black py-20 text-center mobile-spacing">

        <h3 class="footer-title text-3xl tracking-[0.3em] mb-4 font-semibold">
            Carrington Brian
        </h3>

        <p class="footer-text text-gray-600 text-lg mb-8">
            Experiencia de calidad y atención excepcional
        </p>

        <div class="flex flex-col md:flex-row justify-center items-center gap-4 text-base text-gray-500 mb-8">

            <span>© {{ date('Y') }}</span>
            <span>Todos los derechos reservados</span>

        </div>

        <!-- Línea -->
        <div class="w-20 h-[2px] bg-black mx-auto"></div>

    </footer>


    <!-- 🔥 SCRIPT -->
    <script>
        function toggleMenu(index) {

            const allContents =
                document.querySelectorAll("[id^='content-']");

            const allIcons =
                document.querySelectorAll("[id^='icon-']");

            allContents.forEach((content, i) => {

                const icon = allIcons[i];

                if (i === index) {

                    if (content.style.maxHeight) {

                        content.style.maxHeight = null;
                        icon.innerText = "+";

                    } else {

                        content.style.maxHeight =
                            content.scrollHeight + "px";

                        icon.innerText = "−";
                    }

                } else {

                    content.style.maxHeight = null;
                    icon.innerText = "+";

                }

            });

        }
    </script>

</body>

</html>
