<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            overflow-x: hidden;
        }

        h1,
        h2 {
            font-family: 'Playfair Display', serif;
        }

        /* Animación */
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

        /* 🔥 MEJORAS CELULAR */
        @media (max-width: 768px) {

            /* HERO */
            .hero-title {
                font-size: 4rem !important;
                line-height: 1.1;
                letter-spacing: 3px;
            }

            .hero-text {
                font-size: 1.35rem !important;
                line-height: 1.9;
            }

            .hero-button {
                font-size: 1.1rem;
                padding: 16px 34px;
            }

            /* TITULOS */
            .section-title {
                font-size: 2.8rem !important;
            }

            .category-title {
                font-size: 2rem !important;
            }

            /* PRODUCTOS */
            .product-name {
                font-size: 1.5rem !important;
                line-height: 1.5;
            }

            .product-price {
                font-size: 1.4rem !important;
            }

            .product-description {
                font-size: 1.1rem !important;
                line-height: 1.9;
            }

            /* FOOTER */
            .footer-title {
                font-size: 1.7rem;
            }

            .footer-text {
                font-size: 1rem;
            }

            /* MÁS ESPACIOS */
            .mobile-spacing {
                padding-left: 1.4rem;
                padding-right: 1.4rem;
            }

            .mobile-section {
                padding-top: 7rem;
                padding-bottom: 7rem;
            }
        }
    </style>
</head>

<body class="bg-black">

    <!-- 🔥 HERO -->
    <section
        class="h-screen relative flex items-center justify-center text-center overflow-hidden mobile-spacing">

        <!-- Imagen fondo -->
        <div class="absolute inset-0">
            <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}"
                class="w-full h-full object-cover scale-110 blur-[3px]">
        </div>

        <!-- Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/90 via-black/70 to-black/95"></div>

        <!-- Marca -->
        <div class="absolute top-6 left-6 z-20">
            <p class="text-sm md:text-base tracking-[0.5em] text-gray-400 uppercase">
                Carrington Brian
            </p>
        </div>

        <!-- Contenido -->
        <div class="relative z-10 px-6 max-w-3xl fade-in">

            <h1
                class="hero-title text-6xl md:text-7xl tracking-widest mb-8 leading-tight font-bold">
                {{ $user->name }}
            </h1>

            <p
                class="hero-text text-gray-300 text-xl md:text-2xl mb-12 leading-relaxed">
                Una experiencia única donde cada detalle importa.
                Calidad, estilo y atención en un solo lugar.
            </p>

            <a href="#menu"
                class="hero-button inline-block border border-yellow-500 text-yellow-400 px-12 py-4 rounded-full tracking-[0.25em] hover:bg-yellow-500 hover:text-black transition duration-300">
                DESCUBRE MÁS
            </a>

        </div>

    </section>


    <!-- 🔥 MENÚ -->
    <section id="menu"
        class="relative py-28 px-6 mobile-section mobile-spacing">

        <!-- Fondo -->
        <div class="absolute inset-0">
            <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}"
                class="w-full h-full object-cover opacity-15">
        </div>

        <div class="absolute inset-0 bg-black/80"></div>

        <div class="relative max-w-5xl mx-auto">

            <!-- HEADER -->
            <div class="text-center mb-24">
                <h2
                    class="section-title text-5xl md:text-6xl tracking-[0.3em]">
                    LO QUE OFRECEMOS
                </h2>

                <div class="w-28 h-[2px] bg-yellow-500 mx-auto mt-8"></div>
            </div>

            @forelse ($user->categories as $index => $category)

                <div class="mb-12 border-b border-gray-700 pb-8">

                    <!-- BOTÓN -->
                    <button onclick="toggleMenu({{ $index }})"
                        class="w-full flex justify-between items-center text-left gap-5">

                        <h2
                            class="category-title text-3xl md:text-4xl text-yellow-500 tracking-wide font-semibold">
                            {{ $category->name }}
                        </h2>

                        <!-- ICONO -->
                        <span id="icon-{{ $index }}"
                            class="text-4xl text-yellow-400 transition duration-300">
                            +
                        </span>

                    </button>

                    <!-- CONTENIDO -->
                    <div id="content-{{ $index }}"
                        class="max-h-0 overflow-hidden transition-all duration-500">

                        <div class="mt-10 space-y-10">

                            @forelse ($category->products as $product)

                                <div class="group">

                                    <div
                                        class="flex justify-between items-end gap-5 border-b border-gray-700 pb-5">

                                        <h3
                                            class="product-name text-2xl md:text-3xl font-medium">
                                            {{ $product->name }}
                                        </h3>

                                        <span
                                            class="product-price text-2xl text-yellow-400 font-semibold whitespace-nowrap">
                                            ${{ number_format($product->price, 2) }}
                                        </span>

                                    </div>

                                    <p
                                        class="product-description text-gray-400 text-base md:text-lg mt-4 leading-relaxed max-w-3xl">
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

        <h3
            class="footer-title text-3xl tracking-[0.3em] mb-4 font-semibold">
            Carrington Brian
        </h3>

        <p class="footer-text text-gray-600 text-lg mb-8">
            Experiencia de calidad y atención excepcional
        </p>

        <div
            class="flex flex-col md:flex-row justify-center items-center gap-4 text-base text-gray-500 mb-8">
            <span>© {{ date('Y') }}</span>
            <span>Todos los derechos reservados</span>
        </div>

        <!-- Línea -->
        <div class="w-20 h-[2px] bg-black mx-auto"></div>

    </footer>


    <!-- 🔥 SCRIPT -->
    <script>
        function toggleMenu(index) {

            const allContents = document.querySelectorAll("[id^='content-']");
            const allIcons = document.querySelectorAll("[id^='icon-']");

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