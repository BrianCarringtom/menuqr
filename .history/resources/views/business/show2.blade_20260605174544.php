<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $user->name }} - Catálogo Digital</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            /* Paleta extraída de la imagen de referencia */
            --bg-main: #2b1712;
            /* Marrón chocolate profundo */
            --bg-card: #3d231c;
            /* Café caramelo para las tarjetas */
            --accent-orange: #e07a34;
            /* Naranja tostado artesanal */
            --text-light: #ffffff;
            /* Blanco limpio */
            --text-muted: #d1bfa7;
            /* Crema suave para textos secundarios */
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
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            position: relative;
        }

        /* CAPA DE FONDO ARTESANAL */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at center, rgba(61, 35, 28, 0.4) 0%, rgba(43, 23, 18, 0.95) 100%);
            z-index: -1;
        }

        /* BRANDING CON IMAGEN DINÁMICA COMO LOGO */
        .brand-section {
            text-align: center;
            padding: 40px 20px 25px;
            position: relative;
        }

        .logo-wrapper {
            display: inline-block;
            width: 110px;
            height: 110px;
            border: 3px solid var(--accent-orange);
            border-radius: 50%;
            padding: 5px;
            margin-bottom: 16px;
            background: var(--bg-card);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.5);
            overflow: hidden;
        }

        .logo-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .brand-title {
            font-size: 32px;
            font-weight: 700;
            color: var(--text-light);
            letter-spacing: 1px;
            text-transform: uppercase;
            text-shadow: 2px 4px 10px rgba(0, 0, 0, 0.7);
        }

        .brand-subtitle {
            font-size: 13px;
            color: var(--accent-orange);
            letter-spacing: 4px;
            text-transform: uppercase;
            margin-top: 4px;
            font-weight: 600;
        }

        /* BUSCADOR COLOCOAL */
        .search-box-container {
            padding: 0 20px 25px;
            max-width: 500px;
            width: 100%;
            margin: 0 auto;
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
            color: var(--text-muted);
            font-size: 16px;
        }

        .search-input {
            width: 100%;
            background: var(--bg-card);
            border: 2px solid rgba(224, 122, 52, 0.2);
            padding: 14px 16px 14px 50px;
            border-radius: 30px;
            color: white;
            font-size: 16px;
            outline: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .search-input:focus {
            background: rgba(61, 35, 28, 0.9);
            border-color: var(--accent-orange);
            box-shadow: 0 4px 20px rgba(224, 122, 52, 0.3);
        }

        .menu-section-title {
            font-size: 16px;
            font-weight: 600;
            padding: 0 24px;
            margin-bottom: 16px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--text-muted);
            text-align: center;
        }

        /* CONTENEDOR DE CATEGORÍAS EN FORMA DE TARJETAS HORIZONTALES */
        .categories-horizontal-scroll {
            display: flex;
            gap: 14px;
            overflow-x: auto;
            padding: 5px 20px 25px;
            scroll-behavior: smooth;
            scrollbar-width: none;
        }

        .categories-horizontal-scroll::-webkit-scrollbar {
            display: none;
        }

        .category-tab-btn {
            display: flex;
            align-items: center;
            background: var(--bg-card);
            border: 1px solid rgba(224, 122, 52, 0.15);
            border-radius: 40px;
            padding: 8px 18px 8px 8px;
            cursor: pointer;
            outline: none;
            flex-shrink: 0;
            gap: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .tab-image-wrapper {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid transparent;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .tab-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .tab-btn-title {
            font-size: 14px;
            font-weight: 500;
            color: var(--text-muted);
            white-space: nowrap;
            transition: all 0.3s ease;
        }

        /* Categoría Seleccionada */
        .category-tab-btn.active {
            background: var(--accent-orange);
            border-color: var(--accent-orange);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(224, 122, 52, 0.4);
        }

        .category-tab-btn.active .tab-image-wrapper {
            border-color: var(--text-light);
        }

        .category-tab-btn.active .tab-btn-title {
            color: var(--text-light);
            font-weight: 600;
        }

        /* NUEVA ESTRUCTURA DE PRODUCTOS BASADA EN LA REFERENCIA */
        .products-container {
            padding: 5px 20px 40px;
            max-width: 650px;
            width: 100%;
            margin: 0 auto;
        }

        .category-products-panel {
            display: none;
            flex-direction: column;
            background: var(--bg-card);
            border-radius: 24px;
            padding: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(224, 122, 52, 0.1);
            gap: 20px;
        }

        .category-products-panel.active {
            display: flex;
            animation: fadeIn 0.4s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(12px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* FILAS ESTRUCTURADAS CON SEPARACIÓN DE PUNTOS */
        .product-card {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .product-header-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            width: 100%;
        }

        .product-title {
            font-size: 16px;
            font-weight: 600;
            color: var(--text-light);
            white-space: nowrap;
            padding-right: 4px;
        }

        .product-leader {
            flex-grow: 1;
            border-bottom: 2px dotted rgba(209, 191, 167, 0.3);
            margin-bottom: 5px;
            min-width: 20px;
        }

        .product-price {
            font-size: 17px;
            font-weight: 700;
            color: var(--accent-orange);
            white-space: nowrap;
            padding-left: 6px;
        }

        .product-description {
            font-size: 12.5px;
            color: var(--text-muted);
            line-height: 1.4;
            margin-top: 4px;
            max-width: 85%;
        }

        /* FOOTER ARTESANAL */
        .premium-footer {
            background: #1f0f0c;
            padding: 40px 20px 30px;
            border-top: 3px solid var(--accent-orange);
            display: flex;
            flex-direction: column;
            gap: 30px;
            margin-top: auto;
        }

        .footer-block {
            width: 100%;
            max-width: 550px;
            margin: 0 auto;
        }

        .footer-title-block {
            font-size: 15px;
            color: var(--text-light);
            font-weight: 600;
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .footer-title-block i {
            color: var(--accent-orange);
            background: rgba(224, 122, 52, 0.15);
            padding: 8px;
            border-radius: 50%;
            font-size: 14px;
        }

        .schedule-card {
            background: var(--bg-card);
            border: 1px solid rgba(224, 122, 52, 0.15);
            border-radius: 16px;
            padding: 16px 20px;
            color: var(--text-muted);
            font-size: 14px;
            line-height: 1.6;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .map-container-premium {
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid rgba(224, 122, 52, 0.15);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            height: 170px;
        }

        .map-container-premium iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        .copyright-section {
            text-align: center;
            font-size: 11px;
            color: rgba(255, 255, 255, 0.3);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            padding-top: 20px;
        }

        /* BOTÓN FLOTANTE */
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
        }
    </style>
</head>

<body>

    <section class="brand-section">
        <div class="logo-wrapper">
            <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}"
                alt="Logo">
        </div>
        <h1 class="brand-title">{{ $user->name }}</h1>
        <p class="brand-subtitle">Catálogo Digital</p>
    </section>

    <div class="search-box-container">
        <div class="search-wrapper">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="input-busqueda" class="search-input" placeholder="¿Qué deseas buscar hoy?..."
                oninput="buscarEnTiempoReal()">
        </div>
    </div>

    <h2 class="menu-section-title">Categorías</h2>

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
                        style="color: var(--text-muted); font-size: 13px; text-align: center; padding: 20px 15px; width: 100%; font-style: italic;">
                        No hay elementos en esta categoría actualmente.
                    </p>
                @endforelse
            </div>
        @empty
            <div class="text-center" style="color: var(--text-muted); padding: 40px 20px; width: 100%;">
                <p>Aún no se han cargado categorías.</p>
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
            <h4 class="footer-title-block"><i class="fa-solid fa-map-location-dot"></i> Ubicación del Local</h4>
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
