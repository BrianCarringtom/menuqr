<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $user->name }} - Catálogo Digital</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Patrick+Hand&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --bg-page: #f9f1e1;
            /* Fondo crema de la imagen */
            --yellow-main: #fcc006;
            /* Amarillo destacado */
            --blue-accent: #004dff;
            /* Azul vibrante de las manchas */
            --text-dark: #1c1c1e;
            /* Negro para textos principales y bordes */
            --white: #ffffff;
            --font-main: 'Poppins', sans-serif;
            --font-hand: 'Patrick Hand', cursive;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            background-color: var(--bg-page);
            color: var(--text-dark);
            font-family: var(--font-main);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-image: radial-gradient(rgba(0, 0, 0, 0.02) 1px, transparent 1px);
            background-size: 15px 15px;
        }

        /* HEADER - Estilo cartel Universal */
        .brand-section {
            text-align: center;
            padding: 30px 20px 15px;
            position: relative;
        }

        .main-banner-title {
            font-family: var(--font-hand);
            font-size: 55px;
            background: var(--text-dark);
            color: var(--yellow-main);
            display: inline-block;
            padding: 0px 35px;
            transform: skewX(-10deg);
            border-radius: 8px;
            line-height: 1.1;
            box-shadow: 5px 5px 0px var(--yellow-main);
            text-transform: uppercase;
        }

        .brand-title {
            font-family: var(--font-hand);
            font-size: 32px;
            color: var(--text-dark);
            margin-top: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .brand-subtitle {
            font-family: var(--font-hand);
            font-size: 16px;
            background: var(--blue-accent);
            color: var(--white);
            display: inline-block;
            padding: 2px 20px;
            margin-top: 5px;
            transform: rotate(-2deg);
            text-transform: uppercase;
            font-weight: bold;
        }

        /* BUSCADOR UNIVERSAL */
        .search-box-container {
            padding: 15px 20px;
            max-width: 450px;
            margin: 0 auto;
            width: 100%;
        }

        .search-wrapper {
            position: relative;
        }

        .search-wrapper i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-dark);
        }

        .search-input {
            width: 100%;
            background: var(--white);
            border: 3px solid var(--text-dark);
            padding: 10px 15px 10px 40px;
            border-radius: 0px;
            box-shadow: 4px 4px 0px var(--text-dark);
            font-size: 15px;
            outline: none;
            font-family: var(--font-main);
        }

        /* CATEGORÍAS (SCROLL HORIZONTAL) */
        .menu-section-title {
            font-family: var(--font-hand);
            font-size: 26px;
            text-align: center;
            margin-top: 10px;
            text-transform: uppercase;
        }

        .categories-horizontal-scroll {
            display: flex;
            gap: 15px;
            overflow-x: auto;
            padding: 15px 20px;
            scrollbar-width: none;
        }

        .categories-horizontal-scroll::-webkit-scrollbar {
            display: none;
        }

        .category-tab-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            background: var(--white);
            border: 2px solid var(--text-dark);
            padding: 6px 15px;
            cursor: pointer;
            box-shadow: 3px 3px 0px var(--text-dark);
            flex-shrink: 0;
        }

        .tab-image-wrapper {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            overflow: hidden;
            border: 1px solid var(--text-dark);
        }

        .tab-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .tab-btn-title {
            font-family: var(--font-hand);
            font-size: 18px;
            color: var(--text-dark);
            font-weight: bold;
        }

        /* Categoría Activa */
        .category-tab-btn.active {
            background: var(--yellow-main);
            transform: translate(2px, 2px);
            box-shadow: 1px 1px 0px var(--text-dark);
        }

        /* ESTRUCTURA DE PRODUCTOS/SERVICIOS: DISEÑO DE BLOQUES/AFICHE */
        .products-container {
            padding: 10px 20px 40px;
            max-width: 800px;
            margin: 0 auto;
            width: 100%;
        }

        .category-products-panel {
            display: none;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .category-products-panel.active {
            display: grid;
            animation: apperance 0.25s ease-in-out;
        }

        @keyframes apperance {
            from {
                opacity: 0;
                transform: scale(0.98);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Tarjeta tipo bloque de poster */
        .product-card {
            background: var(--white);
            border: 3px solid var(--text-dark);
            padding: 15px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            box-shadow: 5px 5px 0px var(--text-dark);
            transition: transform 0.2s;
        }

        /* Efecto de mancha decorativa azul */
        .product-card::before {
            content: "";
            position: absolute;
            top: -8px;
            right: -8px;
            width: 16px;
            height: 16px;
            background: var(--blue-accent);
            border-radius: 50%;
            z-index: -1;
        }

        .product-info {
            margin-bottom: 15px;
        }

        .product-title {
            font-family: var(--font-hand);
            font-size: 22px;
            color: var(--text-dark);
            text-transform: uppercase;
            line-height: 1.2;
            border-bottom: 2px dashed rgba(0, 0, 0, 0.15);
            padding-bottom: 5px;
            margin-bottom: 8px;
        }

        .product-description {
            font-size: 13px;
            color: rgba(0, 0, 0, 0.7);
            line-height: 1.4;
        }

        /* Contenedor de precio destacado */
        .price-badge-container {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .product-price {
            font-family: var(--font-hand);
            font-size: 22px;
            font-weight: bold;
            color: var(--text-dark);
            background: var(--yellow-main);
            padding: 2px 14px;
            border: 2px solid var(--text-dark);
            transform: rotate(-2deg);
            box-shadow: 2px 2px 0px var(--text-dark);
        }

        /* SECCIÓN DE HORARIOS Y MAPA */
        .premium-footer {
            background: var(--white);
            border-top: 4px solid var(--text-dark);
            padding: 35px 20px;
            display: flex;
            flex-direction: column;
            gap: 25px;
            margin-top: auto;
        }

        .footer-block {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        .footer-title-block {
            font-family: var(--font-hand);
            font-size: 24px;
            text-transform: uppercase;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-title-block i {
            color: var(--blue-accent);
        }

        .schedule-card {
            background: var(--yellow-main);
            border: 3px solid var(--text-dark);
            padding: 15px;
            font-size: 14px;
            font-weight: 600;
            box-shadow: 4px 4px 0px var(--text-dark);
        }

        .map-container-premium {
            border: 3px solid var(--text-dark);
            box-shadow: 4px 4px 0px var(--text-dark);
            height: 180px;
        }

        .map-container-premium iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        .copyright-section {
            text-align: center;
            font-size: 11px;
            color: rgba(0, 0, 0, 0.4);
            margin-top: 15px;
        }

        /* BOTÓN FLOTANTE WHATSAPP */
        .whatsapp-float {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: #25D366;
            border: 3px solid var(--text-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-dark);
            font-size: 26px;
            position: fixed;
            right: 20px;
            bottom: 25px;
            z-index: 200;
            box-shadow: 4px 4px 0px var(--text-dark);
            text-decoration: none;
        }
    </style>
</head>

<body>

    <section class="brand-section">
        <div class="main-banner-title">ONLINE</div>
        <h1 class="brand-title">{{ $user->name }}</h1>
        <p class="brand-subtitle">Catálogo Digital</p>
    </section>

    <div class="search-box-container">
        <div class="search-wrapper">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="input-busqueda" class="search-input" placeholder="¿Qué estás buscando hoy?..."
                oninput="buscarEnTiempoReal()">
        </div>
    </div>

    <h2 class="menu-section-title">Explora</h2>

    <div class="categories-horizontal-scroll">
        @foreach ($user->categories as $index => $category)
            <button onclick="switchTab({{ $index }})" class="category-tab-btn {{ $index == 0 ? 'active' : '' }}"
                id="tab-btn-{{ $index }}">
                <div class="tab-image-wrapper">
                    <img src="{{ $category->image ? asset('storage/' . $category->image) : 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=200&auto=format&fit=crop' }}"
                        alt="{{ $category->name }}">
                </div>
                <span class="tab-btn-title">{{ $category->name }}</span>
            </button>
        @endforeach
    </div>

    <div class="products-container" id="contenedor-paneles">
        @forelse ($user->categories as $index => $category)
            <div class="category-products-panel {{ $index == 0 ? 'active' : '' }}" id="panel-{{ $index }}">
                @forelse ($category->products as $product)
                    <div class="product-card" data-title="{{ strtolower($product->name) }}"
                        data-desc="{{ strtolower($product->description) }}">
                        <div class="product-info">
                            <h3 class="product-title">{{ $product->name }}</h3>
                            <p class="product-description">{{ $product->description }}</p>
                        </div>
                        <div class="price-badge-container">
                            <span class="product-price">${{ number_format($product->price, 2) }}</span>
                        </div>
                    </div>
                @empty
                    <p
                        style="color: var(--text-dark); font-size: 14px; text-align: center; padding: 30px 15px; width: 100%; font-style: italic;">
                        No hay elementos disponibles por el momento.
                    </p>
                @endforelse
            </div>
        @empty
            <div class="text-center" style="color: var(--text-dark); padding: 40px 20px; width: 100%;">
                <p>No se encontraron categorías cargadas.</p>
            </div>
        @endforelse
    </div>

    <footer class="premium-footer">
        <div class="footer-block">
            <h4 class="footer-title-block"><i class="fa-solid fa-calendar-days"></i> Horarios de Atención</h4>
            <div class="schedule-card">
                {!! nl2br(e($user->schedule)) !!}
            </div>
        </div>

        <div class="footer-block">
            <h4 class="footer-title-block"><i class="fa-solid fa-map-location-dot"></i> Ubicación</h4>
            <div class="map-container-premium">
                <iframe src="{{ $user->map_url }}" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

        <div class="copyright-section">
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

            document.getElementById(`tab-btn-${index}`).classList.add('active');
            document.getElementById(`panel-${index}`).classList.add('active');
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
                        panel.style.display = 'grid';
                        panel.classList.add('active');
                        tabs[index].classList.add('active');
                    } else {
                        panel.classList.remove('active');
                        tabs[index].classList.remove('active');
                    }
                });
            } else {
                panels.forEach(panel => {
                    panel.style.display = '';
                    panel.classList.remove('active');
                });
                tabs.forEach(tab => tab.classList.remove('active'));
                restablecerFiltros();

                if (panels[0]) panels[0].classList.add('active');
                if (tabs[0]) tabs[0].classList.add('active');
            }
        }
    </script>
</body>

</html>
