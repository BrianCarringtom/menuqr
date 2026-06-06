<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $user->name }} - Menú Digital</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;700&family=Poppins:wght@300;400;600&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --bg-main: #34b3e4;
            /* Azul vibrante inspirado en la imagen */
            --text-dark: #0f3d59;
            /* Azul oscuro para tipografía y contraste */
            --text-light: #ffffff;
            --accent-yellow: #fff37a;
            /* Amarillo destacado de la imagen */
            --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            -webkit-tap-highlight-color: transparent;
        }

        html {
            scroll-behavior: smooth;
            /* Permite el deslizamiento suave al hacer clic */
        }

        body {
            background-color: var(--bg-main);
            color: var(--text-light);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow-x: hidden;
        }

        /* FONDO COMO LOGO / MARCA DE AGUA GIGANTE */
        .background-logo-watermark {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 85vw;
            height: 85vw;
            max-width: 500px;
            max-height: 500px;
            background-image: url("{{ $user->image ? asset('storage/' . $user->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}");
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.12;
            z-index: 0;
            pointer-events: none;
            filter: grayscale(30%);
        }

        /* Branding / Identidad Superior */
        .brand-header {
            position: relative;
            z-index: 10;
            text-align: center;
            padding: 40px 20px 15px;
        }

        .brand-tagline {
            font-family: 'Oswald', sans-serif;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 4px;
            color: var(--accent-yellow);
            margin-bottom: 5px;
        }

        .brand-title {
            font-family: 'Oswald', sans-serif;
            font-size: 42px;
            font-weight: 700;
            text-transform: uppercase;
            line-height: 0.95;
            color: var(--text-light);
            text-shadow: 3px 3px 0px var(--text-dark);
        }

        /* BUSCADOR ESTILO LLAMATIVO */
        .search-container {
            position: relative;
            z-index: 10;
            padding: 0 25px 15px;
            max-width: 500px;
            margin: 0 auto;
            width: 100%;
        }

        .search-box {
            position: relative;
            width: 100%;
        }

        .search-box i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-dark);
            font-size: 16px;
        }

        .search-input {
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            border: 3px solid var(--text-dark);
            padding: 14px 16px 14px 48px;
            border-radius: 50px;
            color: #111;
            font-size: 15px;
            font-weight: 600;
            outline: none;
            box-shadow: 0 6px 0px var(--text-dark);
            transition: all 0.2s ease;
        }

        /* 1. BARRA FLOTANTE DE CATEGORÍAS (QUICK-NAV) */
        .quick-nav-container {
            position: sticky;
            top: 0;
            z-index: 100;
            background: var(--bg-main);
            padding: 10px 0;
            border-bottom: 2px solid rgba(15, 61, 89, 0.15);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .quick-nav-scroll {
            display: flex;
            gap: 12px;
            overflow-x: auto;
            padding: 5px 20px;
            scrollbar-width: none;
            /* Firefox */
        }

        .quick-nav-scroll::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari, Opera */
        }

        .quick-nav-btn {
            font-family: 'Oswald', sans-serif;
            font-size: 14px;
            text-transform: uppercase;
            font-weight: 700;
            color: var(--text-dark);
            background: rgba(255, 255, 255, 0.25);
            border: 2px solid var(--text-dark);
            padding: 6px 16px;
            border-radius: 30px;
            cursor: pointer;
            white-space: nowrap;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .quick-nav-btn:active {
            background: var(--text-dark);
            color: var(--accent-yellow);
        }

        /* ESTRUCTURA ASIMÉTRICA ALTERNADA */
        .menu-layout-wrapper {
            position: relative;
            z-index: 10;
            padding: 30px 15px 40px;
            display: flex;
            flex-direction: column;
            gap: 50px;
            max-width: 700px;
            margin: 0 auto;
            width: 100%;
        }

        /* Bloque contenedor de categoría con margen de compensación para el sticky navbar */
        .category-block {
            display: flex;
            flex-direction: column;
            width: 100%;
            scroll-margin-top: 80px;
        }

        /* Cabecera de Categoría e Imagen de forma combinada e intercalada */
        .category-header-row {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .category-block:nth-child(even) .category-header-row {
            flex-direction: row-reverse;
        }

        .category-visual-thumb {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 4px solid var(--text-light);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            flex-shrink: 0;
            background: #fff;
        }

        .category-visual-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .category-title-info {
            flex-grow: 1;
        }

        .category-block:nth-child(even) .category-title-info {
            text-align: right;
        }

        .category-name-badge {
            font-family: 'Oswald', sans-serif;
            font-size: 32px;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--text-dark);
            line-height: 1;
            letter-spacing: -0.5px;
        }

        .category-meta-size {
            font-family: 'Oswald', sans-serif;
            font-size: 14px;
            color: var(--accent-yellow);
            text-transform: uppercase;
            letter-spacing: 1px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        /* PANEL DE PRODUCTOS */
        .category-products-panel {
            display: flex;
            flex-direction: column;
            gap: 14px;
            width: 100%;
        }

        /* DISEÑO DE LAS TARJETAS */
        .product-card {
            background: rgba(255, 255, 255, 0.12);
            border-left: 5px solid var(--text-dark);
            padding: 14px 18px;
            border-radius: 0px 16px 16px 0px;
            display: flex;
            flex-direction: column;
            position: relative;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
        }

        .category-block:nth-child(even) .product-card {
            border-left: none;
            border-right: 5px solid var(--text-dark);
            border-radius: 16px 0px 0px 16px;
        }

        .product-main-line {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 10px;
        }

        .product-title {
            font-family: 'Oswald', sans-serif;
            font-size: 19px;
            font-weight: 500;
            text-transform: uppercase;
            color: var(--text-dark);
            letter-spacing: 0.5px;
            line-height: 1.2;
        }

        .product-price {
            font-family: 'Oswald', sans-serif;
            font-size: 20px;
            font-weight: 700;
            color: var(--accent-yellow);
            text-shadow: 1.5px 1.5px 0px var(--text-dark);
            white-space: nowrap;
        }

        .product-description {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.4;
            margin-top: 4px;
            font-weight: 300;
        }

        /* FOOTER PREMIUM */
        .premium-footer {
            background: var(--text-dark);
            color: var(--text-light);
            padding: 40px 25px 30px;
            margin-top: auto;
            border-radius: 30px 30px 0 0;
            position: relative;
            z-index: 10;
            box-shadow: 0 -10px 30px rgba(0, 0, 0, 0.2);
        }

        .footer-grid {
            max-width: 600px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .footer-block h4 {
            font-family: 'Oswald', sans-serif;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 12px;
            color: var(--accent-yellow);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .schedule-box-content {
            background: rgba(255, 255, 255, 0.06);
            border-radius: 12px;
            padding: 15px;
            font-size: 13px;
            line-height: 1.6;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .map-wrapper-frame {
            border-radius: 16px;
            overflow: hidden;
            height: 150px;
            border: 3px solid rgba(255, 255, 255, 0.1);
        }

        .map-wrapper-frame iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        .copyright-text {
            text-align: center;
            font-size: 11px;
            color: rgba(255, 255, 255, 0.4);
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* BOTÓN WHATSAPP FLOTANTE */
        .whatsapp-float {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: #25D366;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 28px;
            position: fixed;
            right: 20px;
            bottom: 20px;
            z-index: 100;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            text-decoration: none;
        }

        /* 2. BOTÓN "VOLVER ARRIBA" (BACK TO TOP) */
        .back-to-top-btn {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: var(--text-dark);
            border: 2px solid var(--accent-yellow);
            color: var(--accent-yellow);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            position: fixed;
            right: 25px;
            bottom: 90px;
            /* Posicionado arriba del botón de WhatsApp */
            z-index: 100;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .back-to-top-btn.visible {
            opacity: 1;
            visibility: visible;
        }
    </style>
</head>

<body>

    <div class="background-logo-watermark"></div>

    <header class="brand-header">
        <p class="brand-tagline">✨ Mantente Saludable ✨</p>
        <h1 class="brand-title">{{ $user->name }}</h1>
    </header>

    <div class="search-container">
        <div class="search-box">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="input-busqueda" class="search-input" placeholder="¿Qué deseas ordenar hoy?..."
                oninput="buscarEnTiempoReal()">
        </div>
    </div>

    <nav class="quick-nav-container" id="quick-nav">
        <div class="quick-nav-scroll">
            @foreach ($user->categories as $index => $category)
                <a href="#categoria-{{ $index }}" class="quick-nav-btn">{{ $category->name }}</a>
            @endforeach
        </div>
    </nav>

    <main class="menu-layout-wrapper" id="contenedor-paneles">

        @forelse ($user->categories as $index => $category)
            <div class="category-block" id="categoria-{{ $index }}">

                <div class="category-header-row">
                    <div class="category-visual-thumb">
                        <img src="{{ $category->image ? asset('storage/' . $category->image) : 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=200&auto=format&fit=crop' }}"
                            alt="{{ $category->name }}">
                    </div>
                    <div class="category-title-info">
                        <h2 class="category-name-badge">{{ $category->name }}</h2>
                        <span class="category-meta-size">-------------</span>
                    </div>
                </div>

                <div class="category-products-panel">
                    @forelse ($category->products as $product)
                        <div class="product-card" data-title="{{ strtolower($product->name) }}"
                            data-desc="{{ strtolower($product->description) }}">
                            <div class="product-main-line">
                                <h3 class="product-title">{{ $product->name }}</h3>
                                <span class="product-price">${{ number_format($product->price, 2) }}</span>
                            </div>
                            @if ($product->description)
                                <p class="product-description">{{ $product->description }}</p>
                            @endif
                        </div>
                    @empty
                        <p style="color: rgba(255,255,255,0.7); font-size: 13px; text-align: center; padding: 15px 0;">
                            No hay productos disponibles en este momento.
                        </p>
                    @endforelse
                </div>

            </div>
        @empty
            <div class="text-center" style="color: white; padding: 40px 20px; text-align: center; width: 100%;">
                <p>Este menú digital no contiene categorías cargadas aún.</p>
            </div>
        @endforelse

    </main>

    <footer class="premium-footer">
        <div class="footer-grid">
            <div class="footer-block">
                <h4><i class="fa-solid fa-clock"></i> Horarios de Servicio</h4>
                <div class="schedule-box-content">
                    {!! nl2br(e($user->schedule)) !!}
                </div>
            </div>

            <div class="footer-block">
                <h4><i class="fa-solid fa-location-dot"></i> Visítanos</h4>
                <div class="map-wrapper-frame">
                    <iframe src="{{ $user->map_url }}" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>

        <div class="copyright-text">
            <p>© {{ date('Y') }} {{ $user->name }}. Todos los derechos reservados.</p>
        </div>
    </footer>

    <div id="btn-back-to-top" class="back-to-top-btn" onclick="scrollToTop()">
        <i class="fa-solid fa-arrow-up"></i>
    </div>

    <a href="https://wa.me/{{ $user->whatsapp }}" target="_blank" class="whatsapp-float">
        <i class="fab fa-whatsapp"></i>
    </a>

    <script>
        // Control de aparición del botón "Volver Arriba" y manejo del menú flotante
        const backToTopBtn = document.getElementById('btn-back-to-top');
        const quickNav = document.getElementById('quick-nav');

        window.onscroll = function() {
            // Muestra u oculta el botón dependiendo del scroll
            if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                backToTopBtn.classList.add('visible');
            } else {
                backToTopBtn.classList.remove('visible');
            }
        };

        // Función para regresar suavemente al inicio
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        function restablecerFiltros() {
            document.querySelectorAll('.product-card').forEach(card => {
                card.style.display = 'flex';
            });
            document.querySelectorAll('.category-block').forEach(block => {
                block.style.display = 'flex';
            });
            quickNav.style.display = 'block'; // Muestra la barra si se borra la búsqueda
        }

        function buscarEnTiempoReal() {
            const query = document.getElementById('input-busqueda').value.toLowerCase();
            const blocks = document.querySelectorAll('.category-block');

            if (query.length > 0) {
                quickNav.style.display = 'none'; // Oculta temporalmente la barra rápida al buscar para no confundir

                blocks.forEach(block => {
                    const cards = block.querySelectorAll('.product-card');
                    let coincidenciasEnCategoria = 0;

                    cards.forEach(card => {
                        const title = card.getAttribute('data-title') || '';
                        const desc = card.getAttribute('data-desc') || '';

                        if (title.includes(query) || desc.includes(query)) {
                            card.style.display = 'flex';
                            coincidenciasEnCategoria++;
                        } else {
                            card.style.display = 'none';
                        }
                    });

                    if (coincidenciasEnCategoria > 0) {
                        block.style.display = 'flex';
                    } else {
                        block.style.display = 'none';
                    }
                });
            } else {
                restablecerFiltros();
            }
        }
    </script>
</body>

</html>
