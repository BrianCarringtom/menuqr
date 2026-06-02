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
        <style>html {
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

        :root {
            --gold: #facc15;
            --gold-light: #fde68a;
            --dark: #050505;
            --card: rgba(255, 255, 255, .04);
            --border: rgba(255, 255, 255, .08);
        }

        body {
            font-family: 'Inter', sans-serif;
            color: #f5f5f5;

            background:
                radial-gradient(circle at top,
                    rgba(250, 204, 21, .12),
                    transparent 35%),

                radial-gradient(circle at bottom right,
                    rgba(255, 255, 255, .04),
                    transparent 30%),

                radial-gradient(circle at bottom left,
                    rgba(250, 204, 21, .08),
                    transparent 25%),

                #050505;
        }

        h1,
        h2,
        h3 {
            font-family: 'Playfair Display', serif;
        }

        /* ANIMACIONES */

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

        /* HERO */

        .hero-title {

            background:
                linear-gradient(135deg,
                    #ffffff,
                    #fcd34d,
                    #ffffff);

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;

            text-shadow:
                0 0 25px rgba(250, 204, 21, .25),
                0 0 50px rgba(250, 204, 21, .15);
        }

        .hero-button {

            background:
                rgba(250, 204, 21, .08);

            backdrop-filter: blur(15px);

            border: 1px solid rgba(250, 204, 21, .4);

            box-shadow:
                0 10px 30px rgba(250, 204, 21, .12);

            transition: .35s;
        }

        .hero-button:hover {

            background: var(--gold);

            color: black;

            transform:
                translateY(-3px);

            box-shadow:
                0 18px 40px rgba(250, 204, 21, .35);
        }

        /* MENÚ */

        .accordion-content {
            transition: max-height .5s ease;
        }

        .category-card {

            background:
                linear-gradient(180deg,
                    rgba(255, 255, 255, .05),
                    rgba(255, 255, 255, .02));

            backdrop-filter: blur(20px);

            border: 1px solid var(--border);

            border-radius: 28px;

            padding: 30px;

            transition: .4s ease;

            overflow: hidden;
        }

        .category-card:hover {

            transform:
                translateY(-4px);

            border-color:
                rgba(250, 204, 21, .35);

            box-shadow:
                0 25px 60px rgba(0, 0, 0, .45);
        }

        /* IMÁGENES */

        .menu-image {

            width: 72px;
            height: 72px;

            object-fit: cover;

            border-radius: 22px;

            border:
                1px solid rgba(255, 255, 255, .1);

            box-shadow:
                0 12px 25px rgba(0, 0, 0, .35);

            transition: .35s;
        }

        .menu-image:hover {

            transform:
                scale(1.08);

            box-shadow:
                0 15px 35px rgba(250, 204, 21, .25);
        }

        .category-left {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        /* TITULOS */

        .section-title {

            background:
                linear-gradient(135deg,
                    #ffffff,
                    #fcd34d);

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .category-title {

            color: #facc15;

            text-shadow:
                0 0 20px rgba(250, 204, 21, .18);
        }

        /* PRODUCTOS */

        .product-flex {
            position: relative;
            gap: 15px;
        }

        .product-name {
            font-weight: 500;
        }

        .product-price {

            color: #facc15;

            white-space: nowrap;

            font-weight: 700;
        }

        .product-flex::after {

            content: "";

            flex: 1;

            border-bottom:
                1px dashed rgba(255, 255, 255, .15);

            margin-top: 22px;
        }

        .product-description {

            color: #bcbcbc;

            line-height: 1.9;
        }

        /* ICONO ACORDEÓN */

        .accordion-icon {

            width: 52px;
            height: 52px;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            background:
                rgba(250, 204, 21, .08);

            border:
                1px solid rgba(250, 204, 21, .2);

            transition: .35s;
        }

        /* FOOTER */

        footer {

            background:
                linear-gradient(180deg,
                    #ffffff,
                    #f7f7f7);
        }

        footer .bg-gray-50 {

            border: none;

            background: white;

            box-shadow:
                0 15px 40px rgba(0, 0, 0, .06);
        }

        /* WHATSAPP */

        .whatsapp-float {

            width: 65px;
            height: 65px;

            border-radius: 50%;

            background:
                linear-gradient(135deg,
                    #25D366,
                    #18b857);

            display: flex;
            align-items: center;
            justify-content: center;

            color: white;

            font-size: 30px;

            position: absolute;
            right: 20px;
            bottom: 7%;

            z-index: 30;

            box-shadow:
                0 10px 30px rgba(37, 211, 102, .35);

            transition: .35s;
        }

        .whatsapp-float:hover {

            transform:
                translateY(-5px) scale(1.08);

            box-shadow:
                0 20px 45px rgba(37, 211, 102, .45);
        }

        /* RESPONSIVE */

        @media(max-width:768px) {

            .hero-title {
                font-size: 3rem !important;
                line-height: 1.1;
            }

            .hero-text {
                font-size: 1.1rem !important;
            }

            .section-title {
                font-size: 2rem !important;
            }

            .category-title {
                font-size: 1.4rem !important;
            }

            .product-name {
                font-size: 1.1rem !important;
            }

            .product-price {
                font-size: 1.05rem !important;
            }

            .menu-image {
                width: 60px;
                height: 60px;
            }

            .category-card {
                padding: 20px;
            }

            .whatsapp-float {
                width: 55px;
                height: 55px;
                font-size: 25px;
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

                <div class="category-card mb-10">

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
