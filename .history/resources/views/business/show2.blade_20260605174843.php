<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $user->name }} - Catálogo Exclusivo</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            /* Paleta Premium - Tonos Tostados, Chocolate y Caramelo Oro */
            --bg-main: #1c0e0b;
            --bg-sidebar: rgba(43, 22, 17, 0.75);
            --bg-card: rgba(61, 33, 25, 0.65);
            --accent-orange: #e07a34;
            --accent-gold: #f39c12;
            --text-light: #ffffff;
            --text-muted: #e3d4c1;
            --glass-border: rgba(224, 122, 52, 0.15);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            background-color: var(--bg-main);
            color: var(--text-light);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
            position: relative;
        }

        /* Capa de fondo degradado orgánico */
        body::before {
            content: "";
            position: fixed;
            top: -10%;
            left: -10%;
            width: 120%;
            height: 120%;
            background: radial-gradient(circle at 20% 30%, #3d2119 0%, #1c0e0b 70%);
            z-index: -2;
        }

        /* HEADER PREMIUM CON GLASSMORPHISM */
        .brand-header {
            display: flex;
            align-items: center;
            gap: 18px;
            padding: 24px 20px;
            background: linear-gradient(135deg, rgba(43, 22, 17, 0.9) 0%, rgba(28, 14, 11, 0.95) 100%);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--glass-border);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo-wrapper {
            width: 68px;
            height: 68px;
            border: 2px solid var(--accent-orange);
            border-radius: 50%;
            padding: 3px;
            background: #1c0e0b;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4), inset 0 0 10px rgba(224, 122, 52, 0.2);
            flex-shrink: 0;
        }

        .logo-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .brand-info {
            display: flex;
            flex-direction: column;
        }

        .brand-title {
            font-size: 22px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            background: linear-gradient(135deg, #ffffff 0%, #f3deca 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .brand-subtitle {
            font-size: 11px;
            color: var(--accent-orange);
            letter-spacing: 3px;
            text-transform: uppercase;
            font-weight: 600;
            margin-top: 2px;
        }

        /* CONTENEDOR APP DOS COLUMNAS */
        .main-app-container {
            display: flex;
            flex: 1;
            position: relative;
        }

        /* COLUMNA IZQUIERDA: MENÚ DE CATEGORÍAS TIPO FLOTANTE */
        .sidebar-categories {
            width: 110px;
            background: var(--bg-sidebar);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            display: flex;
            flex-direction: column;
            gap: 16px;
            padding: 24px 10px;
            border-right: 1px solid var(--glass-border);
            flex-shrink: 0;
            z-index: 10;
        }

        .category-tab-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 14px 8px;
            cursor: pointer;
            outline: none;
            gap: 10px;
            transition: all 0.4s cubic-bezier(0.25, 1, 0.5, 1);
            width: 100%;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .tab-image-wrapper {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            border: 2px solid transparent;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .tab-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .tab-btn-title {
            font-size: 11px;
            font-weight: 500;
            color: var(--text-muted);
            text-align: center;
            line-height: 1.3;
            transition: color 0.3s;
        }

        /* Estado activo con iluminación perimetral */
        .category-tab-btn.active {
            background: linear-gradient(135deg, var(--accent-orange) 0%, #b85414 100%);
            border-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 25px rgba(224, 122, 52, 0.4);
            transform: scale(1.05) translateY(-2px);
        }

        .category-tab-btn.active .tab-image-wrapper {
            border-color: var(--text-light);
            transform: rotate(5deg);
        }

        .category-tab-btn.active .tab-btn-title {
            color: var(--text-light);
            font-weight: 600;
        }

        /* COLUMNA DERECHA: SECCIÓN DE CONTENIDOS */
        .content-area {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 24px 18px;
            background: transparent;
        }

        /* BARRA DE BÚSQUEDA FLOTANTE AVANZADA */
        .search-box-container {
            width: 100%;
            margin-bottom: 24px;
        }

        .search-wrapper {
            position: relative;
            width: 100%;
        }

        .search-wrapper i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--accent-orange);
            font-size: 15px;
            opacity: 0.8;
        }

        .search-input {
            width: 100%;
            background: var(--bg-card);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            padding: 14px 16px 14px 48px;
            border-radius: 16px;
            color: white;
            font-size: 14px;
            outline: none;
            transition: all 0.3s ease;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.2), 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .search-input:focus {
            border-color: var(--accent-orange);
            background: rgba(43, 22, 17, 0.9);
            box-shadow: 0 0 0 3px rgba(224, 122, 52, 0.25);
        }

        /* CONTENEDOR DE PRODUCTOS ESTILO CARTA MINIMAL */
        .products-container {
            width: 100%;
        }

        .category-products-panel {
            display: none;
            flex-direction: column;
            background: var(--bg-card);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 28px;
            padding: 28px 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
            border: 1px solid var(--glass-border);
            gap: 26px;
        }

        .category-products-panel.active {
            display: flex;
            animation: elegantFade 0.45s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        @keyframes elegantFade {
            from {
                opacity: 0;
                transform: translateY(15px) scale(0.98);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* CARTA DE PRODUCTOS CON PUNTOS DE GUÍA */
        .product-card {
            display: flex;
            flex-direction: column;
            width: 100%;
            position: relative;
        }

        .product-header-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            width: 100%;
        }

        .product-title {
            font-size: 15px;
            font-weight: 600;
            color: var(--text-light);
            letter-spacing: 0.3px;
            padding-right: 8px;
        }

        .product-leader {
            flex-grow: 1;
            border-bottom: 2px dotted rgba(227, 212, 193, 0.25);
            margin-bottom: 5px;
            min-width: 15px;
        }

        .product-price {
            font-size: 16px;
            font-weight: 700;
            color: var(--accent-gold);
            white-space: nowrap;
            padding-left: 8px;
            background: rgba(243, 156, 18, 0.1);
            padding: 2px 10px;
            border-radius: 8px;
            border: 1px solid rgba(243, 156, 18, 0.15);
        }

        .product-description {
            font-size: 12px;
            color: var(--text-muted);
            line-height: 1.5;
            margin-top: 5px;
            max-width: 88%;
            opacity: 0.85;
        }

        /* FOOTER DE ALTO NIVEL */
        .premium-footer {
            background: #120806;
            padding: 45px 24px;
            border-top: 1px solid var(--glass-border);
            display: flex;
            flex-direction: column;
            gap: 35px;
            margin-top: auto;
        }

        .footer-block {
            width: 100%;
        }

        .footer-title-block {
            font-size: 14px;
            color: var(--text-light);
            font-weight: 600;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .footer-title-block i {
            color: var(--accent-orange);
            background: rgba(224, 122, 52, 0.12);
            padding: 8px;
            border-radius: 50%;
            font-size: 13px;
        }

        .schedule-card {
            background: rgba(61, 33, 25, 0.4);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            padding: 18px 20px;
            color: var(--text-muted);
            font-size: 13px;
            line-height: 1.6;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .map-container-premium {
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid var(--glass-border);
            height: 150px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }

        .map-container-premium iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        .copyright-section {
            text-align: center;
            font-size: 11px;
            color: rgba(227, 212, 193, 0.3);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            padding-top: 20px;
        }

        /* WHATSAPP BUTTON FLOTANTE */
        .whatsapp-float {
            width: 54px;
            height: 54px;
            border-radius: 50%;
            background: linear-gradient(135deg, #25D366, #1ebe5d);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 26px;
            position: fixed;
            right: 20px;
            bottom: 25px;
            z-index: 200;
            box-shadow: 0 8px 25px rgba(37, 211, 102, 0.4);
            text-decoration: none;
            transition: transform 0.2s ease;
        }

        .whatsapp-float:active {
            transform: scale(0.9);
        }

        /* MEDIA QUERIES TABLET / DESKTOP */
        @media(min-width: 768px) {
            .sidebar-categories {
                width: 180px;
                padding: 30px 16px;
            }

            .category-tab-btn {
                flex-direction: row;
                padding: 12px 14px;
                justify-content: flex-start;
                gap: 12px;
            }

            .tab-btn-title {
                text-align: left;
                font-size: 13px;
            }

            .content-area {
                padding: 35px;
                max-width: 800px;
                margin: 0 auto;
                width: 100%;
            }

            .premium-footer {
                flex-direction: row;
                justify-content: space-between;
                padding: 50px 40px;
            }

            .footer-block {
                flex: 1;
                max-width: 450px;
            }
        }
    </style>
</head>

<body>

    <header class="brand-header">
        <div class="logo-wrapper">
            <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}"
                alt="Logo">
        </div>
        <div class="brand-info">
            <h1 class="brand-title">{{ $user->name }}</h1>
            <p class="brand-subtitle">Catálogo Digital</p>
        </div>
    </header>

    <div class="main-app-container">

        <aside class="sidebar-categories">
            @foreach ($user->categories as $index => $category)
                <button onclick="switchTab({{ $index }})"
                    class="category-tab-btn {{ $index == 0 ? 'active' : '' }}" id="tab-btn-{{ $index }}">
                    <div class="tab-image-wrapper">
                        <img src="{{ $category->image ? asset('storage/' . $category->image) : 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=200&auto=format&fit=crop' }}"
                            alt="{{ $category->name }}">
                    </div>
                    <span class="tab-btn-title">{{ $category->name }}</span>
                </button>
            @endforeach
        </aside>

        <main class="content-area">

            <div class="search-box-container">
                <div class="search-wrapper">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" id="input-busqueda" class="search-input" placeholder="¿Qué estás buscando?..."
                        oninput="buscarEnTiempoReal()">
                </div>
            </div>

            <div class="products-container" id="contenedor-paneles">
                @forelse ($user->categories as $index => $category)
                    <div class="category-products-panel {{ $index == 0 ? 'active' : '' }}"
                        id="panel-{{ $index }}">
                        @forelse ($category->products as $product)
                            <div class="product-card" data-title="{{ strtolower($product->name) }}"
                                data-desc="{{ strtolower($product->description) }}">
                                <div class="product-header-row">
                                    <h3 class="product-title">{{ $product->name }}</h3>
                                    <div class="product-leader"></div>
                                    <span class="product-price">${{ number_format($product->price, 2) }}</span>
                                </div>
                                @if ($product->description)
                                    <p class="product-description">{{ $product->description }}</p>
                                @endif
                            </div>
                        @empty
                            <p
                                style="color: var(--text-muted); font-size: 13px; text-align: center; padding: 25px 10px; width: 100%; font-style: italic; opacity: 0.7;">
                                No hay elementos en esta sección actualmente.
                            </p>
                        @endforelse
                    </div>
                @empty
                    <div class="text-center" style="color: var(--text-muted); padding: 40px 20px; width: 100%;">
                        <p>No se encontraron registros disponibles.</p>
                    </div>
                @endforelse
            </div>

        </main>
    </div>

    <footer class="premium-footer">
        <div class="footer-block">
            <h4 class="footer-title-block"><i class="fa-solid fa-calendar-days"></i> Horarios de Atención</h4>
            <div class="schedule-card">
                {!! nl2br(e($user->schedule)) !!}
            </div>
        </div>

        <div class="footer-block">
            <h4 class="footer-title-block"><i class="fa-solid fa-map-location-dot"></i> Nuestra Ubicación</h4>
            <div class="map-container-premium">
                <iframe src="{{ $user->map_url }}" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

        <div class="copyright-section" style="width: 100%;">
            <p>© {{ date('Y') }} {{ $user->name }}. Todos los derechos reservados.</p>
        </div>
    </footer>

    <a href="https://wa.me/{{ $user->whatsapp }}" target="_blank" class="whatsapp-float">
        <i class="fab fa-whatsapp"></i>
    </a>

    <script>
        function switchTab(index) {
            document.getElementById('input-busqueda').value = "";
            restablecerFiltros();

            document.querySelectorAll('.category-tab-btn').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.category-products-panel').forEach(panel => panel.classList.remove('active'));

            const selectedBtn = document.getElementById(`tab-btn-${index}`);
            const selectedPanel = document.getElementById(`panel-${index}`);

            if (selectedBtn) selectedBtn.classList.add('active');
            if (selectedPanel) selectedPanel.classList.add('active');
        }

        function restablecerFiltros() {
            document.querySelectorAll('.product-card').forEach(card => {
                card.style.display = 'flex';
            });
        }

        function buscarEnTiempoReal() {
            const query = document.getElementById('input-busqueda').value.toLowerCase();
            const panels = document.querySelectorAll('.category-products-panel');
            const tabs = document.querySelectorAll('.category-tab-btn');

            if (query.length > 0) {
                panels.forEach((panel, index) => {
                    const cards = panel.querySelectorAll('.product-card');
                    let tieneCoincidencias = 0;

                    cards.forEach(card => {
                        const title = card.getAttribute('data-title');
                        const desc = card.getAttribute('data-desc');

                        if (title.includes(query) || desc.includes(query)) {
                            card.style.display = 'flex';
                            tieneCoincidencias++;
                        } else {
                            card.style.display = 'none';
                        }
                    });

                    if (tieneCoincidencias > 0) {
                        panel.classList.add('active');
                        if (tabs[index]) tabs[index].classList.add('active');
                    } else {
                        panel.classList.remove('active');
                        if (tabs[index]) tabs[index].classList.remove('active');
                    }
                });
            } else {
                panels.forEach(panel => panel.classList.remove('active'));
                tabs.forEach(tab => tab.classList.remove('active'));
                restablecerFiltros();

                if (panels[0]) panels[0].classList.add('active');
                if (tabs[0]) tabs[0].classList.add('active');
            }
        }
    </script>
</body>

</html>
