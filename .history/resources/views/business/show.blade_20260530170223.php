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
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

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

        .whatsapp-float {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #25D366, #1ebe5d);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 29px;
            transition: all .3s ease;
            backdrop-filter: blur(10px);

            /* POSICIÓN */
            position: absolute;
            right: 20px;
            bottom: 7%;
            z-index: 30;
        }

        .whatsapp-float:hover {
            transform: translateY(-5px) scale(1.08);
            box-shadow:
                0 14px 35px rgba(37, 211, 102, 0.45),
                0 6px 14px rgba(0, 0, 0, 0.35);
        }

        .whatsapp-float:active {
            transform: scale(0.96);
        }

        /* Tablets */
        @media (max-width: 768px) {
            .whatsapp-float {
                width: 56px;
                height: 56px;
                font-size: 26px;

                right: 18px;
                bottom: 8%;
            }
        }

        /* Celulares */
        @media (max-width: 430px) {
            .whatsapp-float {
                width: 52px;
                height: 52px;
                font-size: 24px;

                right: 20px;
                bottom: 9%;
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
{{-- 
        <!-- Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/90 via-black/70 to-black/95">
        </div> --}}

        <!-- Marca -->
        <div class="absolute top-6 left-6 z-20">
            <p class="text-sm md:text-base tracking-[0.4em] text-gray-400 uppercase">
                Carrington Brian
            </p>
        </div>

        <!-- Contenido -->
        <div class="relative z-10 max-w-3xl px-4 fade-in">

            <h1 class="hero-title text-6xl md:text-7xl tracking-widest mb-8 font-bold leading-tight">
                {{ $user->name }}
            </h1>

            <p class="hero-text text-gray-300 text-xl md:text-2xl mb-12 leading-relaxed">
                Una experiencia única donde cada detalle importa.
                Calidad, estilo y atención en un solo lugar.
            </p>

            <a href="#menu"
                class="hero-button inline-block border border-yellow-500 text-yellow-400 px-10 py-4 rounded-full tracking-[0.2em] hover:bg-yellow-500 hover:text-black transition duration-300">
                DESCUBRE MÁS
            </a>

        </div>

        <!-- BOTÓN WHATSAPP -->
        <a href="https://wa.me/{{ $user->whatsapp }}" target="_blank" class="whatsapp-float">

            <i class="fab fa-whatsapp"></i>

        </a>

    </section>


    <!-- 🔥 MENÚ -->
    <section id="menu" class="relative py-28 px-6 mobile-section mobile-spacing">

        <!-- Fondo -->
        <div class="absolute inset-0">
            <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}"
                class="w-full h-full object-cover opacity-35">
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
    <footer class="bg-white text-black py-16 md:py-20 text-center mobile-spacing relative overflow-hidden">

        <!-- Fondo decorativo -->
        <div class="absolute top-0 left-0 w-full h-full opacity-[0.03] pointer-events-none">

            <div
                class="w-[260px] sm:w-[350px] md:w-[500px] h-[260px] sm:h-[350px] md:h-[500px] bg-black rounded-full blur-3xl absolute -top-32 -left-32">
            </div>

            <div
                class="w-[220px] sm:w-[300px] md:w-[400px] h-[220px] sm:h-[300px] md:h-[400px] bg-black rounded-full blur-3xl absolute -bottom-32 -right-32">
            </div>

        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-10">

            <!-- TITULO -->
            <h3
                class="footer-title text-2xl sm:text-3xl md:text-4xl tracking-[0.15em] sm:tracking-[0.25em] mb-4 font-semibold">
                Carrington Brian
            </h3>

            <p
                class="footer-text text-gray-600 text-sm sm:text-base md:text-lg max-w-2xl mx-auto leading-relaxed mb-12 md:mb-16">
                Experiencia de calidad y atención excepcional
            </p>

            <!-- INFO EXTRA -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8 items-stretch mb-14">

                <!-- Horario -->
                <div
                    class="bg-gray-50 border border-gray-200 rounded-[28px] p-6 sm:p-8 text-left shadow-sm hover:shadow-2xl transition duration-500 group">

                    <div class="flex items-center gap-4 mb-6">

                        <div
                            class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-black text-white flex items-center justify-center text-xl sm:text-2xl group-hover:scale-110 transition duration-300">
                            🕒
                        </div>

                        <h4 class="text-lg sm:text-xl md:text-2xl font-semibold">
                            Horario
                        </h4>

                    </div>

                    <div class="text-gray-600 leading-relaxed text-sm sm:text-base md:text-lg">

                        {!! nl2br(e($user->schedule)) !!}

                    </div>

                </div>

                <!-- MAPA -->
                <div
                    class="bg-gray-50 border border-gray-200 rounded-[28px] overflow-hidden shadow-sm hover:shadow-2xl transition duration-500 min-h-[280px] sm:min-h-[320px]">

                    <iframe src="{{ $user->map_url }}"
                        class="w-full h-full min-h-[280px] sm:min-h-[320px] lg:min-h-full" style="border:0;"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>

                </div>

            </div>

            <!-- FOOTER BOTTOM -->
            <div
                class="flex flex-col sm:flex-row justify-center items-center gap-3 sm:gap-6 text-sm sm:text-base text-gray-500 mb-8">

                <span>© {{ date('Y') }}</span>

                <span class="hidden sm:block text-gray-300">•</span>

                <span>Todos los derechos reservados</span>

            </div>

            <!-- Línea -->
            <div class="w-16 sm:w-20 h-[2px] bg-black mx-auto rounded-full"></div>

        </div>

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
