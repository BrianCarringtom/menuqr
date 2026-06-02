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
        :root {
            --bg: #09090b;
            --bg-secondary: #141418;
            --card: #18181b;
            --card-hover: #27272a;

            --primary: #e50914;
            --primary-hover: #ff2330;

            --text: #ffffff;
            --text-secondary: #b4b4b8;

            --radius: 24px;
        }

        /* RESET */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        html,
        body {
            overflow-x: hidden;
        }

        body {
            font-family: 'Inter', sans-serif;
            background:
                radial-gradient(circle at top left,
                    rgba(229, 9, 20, .15),
                    transparent 35%),
                radial-gradient(circle at top right,
                    rgba(255, 255, 255, .05),
                    transparent 25%),
                var(--bg);

            color: var(--text);
            min-height: 100vh;
        }

        /* FONDO CINEMATOGRÁFICO */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background:
                linear-gradient(180deg,
                    transparent,
                    rgba(0, 0, 0, .25));

            pointer-events: none;
            z-index: -1;
        }

        /* TITULOS */
        h1,
        h2,
        h3 {
            font-family: 'Inter', sans-serif;
            font-weight: 800;
            letter-spacing: -1px;
        }

        /* HERO */
        .hero-title {
            font-size: clamp(3rem, 8vw, 6rem);
            font-weight: 900;
            line-height: .95;
        }

        .hero-text {
            font-size: 1.1rem;
            color: var(--text-secondary);
            max-width: 700px;
            line-height: 1.8;
        }

        /* BOTON ESTILO NETFLIX */
        .hero-button {
            background: var(--primary);
            color: white;
            border: none;

            padding: 15px 28px;

            border-radius: 14px;

            font-weight: 700;

            transition: .3s;
        }

        .hero-button:hover {
            background: var(--primary-hover);

            transform:
                translateY(-3px) scale(1.03);

            box-shadow:
                0 15px 35px rgba(229, 9, 20, .35);
        }

        /* ANIMACIONES */
        .fade-in {
            animation: fadeUp .8s ease forwards;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* TITULOS DE SECCIONES */
        .section-title {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 25px;
        }

        /* CATEGORIAS */
        .category-title {
            font-size: 1.35rem;
            font-weight: 700;
            color: white;
        }

        /* CONTENEDOR DE PRODUCTO */
        .product-flex {
            background: var(--card);

            border-radius: 20px;

            padding: 18px;

            transition: .35s;

            border: 1px solid rgba(255, 255, 255, .04);
        }

        .product-flex:hover {
            background: var(--card-hover);

            transform:
                scale(1.03);

            border-color:
                rgba(255, 255, 255, .10);

            box-shadow:
                0 15px 40px rgba(0, 0, 0, .45);
        }

        /* IMAGENES */
        .menu-image {
            width: 85px;
            height: 85px;

            object-fit: cover;

            border-radius: 18px;

            transition: .35s;

            flex-shrink: 0;
        }

        .product-flex:hover .menu-image {
            transform: scale(1.08);
        }

        /* TEXTO PRODUCTOS */
        .product-name {
            font-size: 1.1rem;
            font-weight: 700;
        }

        .product-description {
            color: var(--text-secondary);
            line-height: 1.7;
            margin-top: 6px;
        }

        .product-price {
            color: white;
            font-size: 1.15rem;
            font-weight: 800;
        }

        /* ACORDEONES */
        .accordion-button {
            background: var(--card);

            border-radius: 18px;

            transition: .3s;

            padding: 18px 22px;
        }

        .accordion-button:hover {
            background: var(--card-hover);
        }

        .accordion-content {
            transition: max-height .4s ease;
        }

        /* ICONOS */
        .accordion-icon {
            color: var(--primary);
            transition: .3s;
        }

        /* FOOTER */
        .footer-title {
            font-size: 1.4rem;
            font-weight: 700;
        }

        .footer-text {
            color: var(--text-secondary);
            line-height: 1.8;
        }

        /* WHATSAPP */
        .whatsapp-float {
            position: fixed;

            right: 25px;
            bottom: 25px;

            width: 68px;
            height: 68px;

            border-radius: 20px;

            background: #25D366;

            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 30px;

            transition: .3s;

            z-index: 9999;

            box-shadow:
                0 15px 35px rgba(37, 211, 102, .35);
        }

        .whatsapp-float:hover {
            transform:
                scale(1.1) translateY(-4px);

            box-shadow:
                0 20px 50px rgba(37, 211, 102, .50);
        }

        /* SCROLL */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #111;
        }

        ::-webkit-scrollbar-thumb {
            background: #333;
            border-radius: 50px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        /* MOBILE */
        @media(max-width:768px) {

            .hero-title {
                font-size: 3rem;
            }

            .hero-text {
                font-size: 1rem;
            }

            .section-title {
                font-size: 1.8rem;
            }

            .menu-image {
                width: 70px;
                height: 70px;
            }

            .product-name {
                font-size: 1rem;
            }

            .product-description {
                font-size: .95rem;
            }

            .whatsapp-float {
                width: 58px;
                height: 58px;
                font-size: 26px;
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
