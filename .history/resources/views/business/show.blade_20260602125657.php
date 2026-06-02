<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Elegante</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FUENTES -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Bebas+Neue&display=swap"
        rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        /* ===========================
   FUENTES
=========================== */

        body {
            font-family: 'Poppins', sans-serif;
        }

        /* ===========================
   VARIABLES
=========================== */

        :root {

            --primary: #2563eb;
            --secondary: #3b82f6;
            --accent: #60a5fa;

            --dark: #020617;
            --dark-card: rgba(15, 23, 42, 0.8);

            --white: #ffffff;
            --text: #e2e8f0;
            --muted: #94a3b8;

        }

        /* ===========================
   RESET
=========================== */

        html {
            scroll-behavior: smooth;
        }

        html,
        body {
            overflow-x: hidden;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* ===========================
   BODY
=========================== */

        body {

            color: white;

            background:
                radial-gradient(circle at top left,
                    rgba(37, 99, 235, .25),
                    transparent 30%),

                radial-gradient(circle at bottom right,
                    rgba(96, 165, 250, .18),
                    transparent 35%),

                linear-gradient(135deg,
                    #020617,
                    #0f172a,
                    #020617);

            min-height: 100vh;

        }

        /* ===========================
   HERO
=========================== */

        .hero-title {

            font-family: 'Bebas Neue', sans-serif;

            font-size: clamp(4rem, 9vw, 8rem);

            letter-spacing: 5px;

            line-height: .95;

            text-transform: uppercase;

            background:
                linear-gradient(180deg,
                    #ffffff,
                    #60a5fa);

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;

            text-shadow:
                0 0 40px rgba(59, 130, 246, .4);

        }

        .hero-text {

            color: #cbd5e1;

            font-size: 1.2rem;

            line-height: 1.9;

            max-width: 700px;

            margin: auto;

        }

        .hero-button {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding: 18px 40px;

            border-radius: 18px;

            background:
                linear-gradient(135deg,
                    #2563eb,
                    #60a5fa);

            color: white;

            font-weight: 700;

            letter-spacing: 1px;

            transition: .4s;

            box-shadow:
                0 15px 35px rgba(37, 99, 235, .35);

        }

        .hero-button:hover {

            transform:
                translateY(-5px) scale(1.03);

            box-shadow:
                0 20px 50px rgba(37, 99, 235, .55);

        }

        /* ===========================
   OVERLAY HERO
=========================== */

        .hero-overlay {

            background:
                linear-gradient(to bottom,
                    rgba(2, 6, 23, .4),
                    rgba(2, 6, 23, .7),
                    rgba(2, 6, 23, .95));

        }

        /* ===========================
   ANIMACIONES
=========================== */

        .fade-in {

            animation: fadeIn 1.2s ease forwards;

        }

        @keyframes fadeIn {

            from {

                opacity: 0;
                transform: translateY(40px);

            }

            to {

                opacity: 1;
                transform: translateY(0);

            }

        }

        /* ===========================
   TITULOS
=========================== */

        .section-title {

            font-family: 'Bebas Neue', sans-serif;

            font-size: clamp(3rem, 6vw, 5rem);

            letter-spacing: 5px;

            color: white;

        }

        .section-divider {

            width: 120px;

            height: 4px;

            margin: auto;

            border-radius: 999px;

            background:
                linear-gradient(90deg,
                    #2563eb,
                    #60a5fa);

        }

        /* ===========================
   CATEGORIAS
=========================== */

        .category-card {

            background: rgba(15, 23, 42, .75);

            backdrop-filter: blur(25px);

            border: 1px solid rgba(96, 165, 250, .12);

            border-radius: 30px;

            padding: 25px;

            margin-bottom: 24px;

            transition: .4s;

        }

        .category-card:hover {

            transform: translateY(-5px);

            border-color: rgba(96, 165, 250, .45);

            box-shadow:
                0 20px 50px rgba(37, 99, 235, .18);

        }

        .category-left {

            display: flex;

            align-items: center;

            gap: 18px;

        }

        .category-title {

            color: white;

            font-size: 2rem;

            font-weight: 700;

        }

        /* ===========================
   IMAGEN CATEGORIA
=========================== */

        .menu-image {

            width: 75px;

            height: 75px;

            border-radius: 22px;

            object-fit: cover;

            border: 2px solid rgba(96, 165, 250, .25);

            transition: .4s;

            box-shadow:
                0 10px 25px rgba(0, 0, 0, .4);

        }

        .menu-image:hover {

            transform:
                scale(1.08) rotate(2deg);

            border-color: #60a5fa;

        }

        /* ===========================
   ACORDEON
=========================== */

        .accordion-button {

            width: 100%;

            display: flex;

            justify-content: space-between;

            align-items: center;

            background: transparent;

        }

        .accordion-icon {

            font-size: 2rem;

            color: #60a5fa;

            transition: .4s;

        }

        /* ===========================
   PRODUCTOS
=========================== */

        .product-card {

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 20px;

            background: rgba(255, 255, 255, .03);

            border: 1px solid rgba(255, 255, 255, .04);

            border-radius: 22px;

            padding: 18px;

            margin-top: 15px;

            transition: .3s;

        }

        .product-card:hover {

            background: rgba(37, 99, 235, .08);

            transform: translateX(8px);

        }

        .product-name {

            font-size: 1.3rem;

            font-weight: 700;

            color: white;

        }

        .product-description {

            color: #94a3b8;

            margin-top: 5px;

            line-height: 1.7;

        }

        .price-tag {

            min-width: 95px;

            height: 55px;

            border-radius: 18px;

            display: flex;

            align-items: center;

            justify-content: center;

            background:
                linear-gradient(135deg,
                    #2563eb,
                    #60a5fa);

            color: white;

            font-weight: 700;

            font-size: 1.1rem;

            box-shadow:
                0 10px 25px rgba(37, 99, 235, .35);

        }

        /* ===========================
   FOOTER
=========================== */

        footer {

            background:
                linear-gradient(180deg,
                    #020617,
                    #0f172a);

            border-top:
                1px solid rgba(96, 165, 250, .1);

        }

        .footer-card {

            background: rgba(15, 23, 42, .7);

            backdrop-filter: blur(20px);

            border: 1px solid rgba(96, 165, 250, .08);

            border-radius: 28px;

        }

        /* ===========================
   WHATSAPP
=========================== */

        .whatsapp-float {

            position: fixed;

            right: 25px;

            bottom: 25px;

            width: 72px;

            height: 72px;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            background:
                linear-gradient(135deg,
                    #25D366,
                    #1ebe5d);

            color: white;

            font-size: 34px;

            z-index: 9999;

            transition: .4s;

            box-shadow:
                0 15px 35px rgba(37, 211, 102, .45);

        }

        .whatsapp-float:hover {

            transform:
                translateY(-6px) scale(1.08);

        }

        /* ===========================
   RESPONSIVE
=========================== */

        @media (max-width:768px) {

            .hero-title {

                font-size: 4.5rem;

            }

            .category-title {

                font-size: 1.4rem;

            }

            .menu-image {

                width: 60px;
                height: 60px;

            }

            .product-card {

                flex-direction: column;
                align-items: flex-start;

            }

            .price-tag {

                width: 100%;

            }

            .whatsapp-float {

                width: 60px;
                height: 60px;
                font-size: 28px;

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
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-black/75">
        </div>

        <!-- Marca -->
        <div class="absolute top-6 left-6 z-20">
            <p class="text-sm md:text-base tracking-[0.4em] text-gray-400 uppercase">
                Carrington Brian
            </p>
        </div>

        <!-- Contenido -->
        <div class="relative z-10 max-w-3xl px-4 fade-in">

            <h1 class="hero-title text-6xl md:text-7xl tracking-widest mb-8 font-bold leading-tight"
                style="
        text-shadow:
            0 2px 8px rgba(0,0,0,.45),
            0 4px 16px rgba(0,0,0,.25);
    ">
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
                class="w-full h-full object-cover opacity-20">
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
