<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $user->name }} - Menú Digital</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --card-bg: #ffffff;
            --text-main: #ffffff;
            --text-muted: #b3b3b3;
            --accent-orange: #ff9f1c;
            --price-pink: #ff3366;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            background-color: #0d0d0f;
            color: var(--text-main);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            position: relative;
        }

        /* CAPA DE FONDO FIJO PREMIUM */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(13, 13, 15, 0.88), rgba(13, 13, 15, 0.96)),
                url("{{ $user->image ? asset('storage/' . $user->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}");
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            z-index: -1;
            will-change: transform;
        }

        /* Branding / Identidad */
        .brand-section {
            text-align: center;
            padding: 15px 20px 25px;
            margin-top: 80px;
            margin-bottom: 60px;
        }

        .logo-wrapper {
            display: inline-block;
            border: 2px dashed var(--accent-orange);
            border-radius: 50%;
            padding: 16px;
            margin-bottom: 16px;
            background: rgba(0, 0, 0, 0.5);
        }

        .logo-content i {
            font-size: 38px;
            color: var(--accent-orange);
            display: block;
            margin-bottom: 4px;
        }

        .logo-content span {
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .brand-title {
            font-size: 38px;
            font-weight: 700;
            color: var(--accent-orange);
            font-style: italic;
            line-height: 1;
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.8);
        }

        .brand-subtitle {
            font-size: 11px;
            color: var(--text-muted);
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-top: 6px;
        }

        /* BARRA DE BÚSQUEDA INTERACTIVA (ESTABLE SIN ZOOM) */
        .search-box-container {
            padding: 0 20px 15px;
        }

        .search-wrapper {
            position: relative;
            width: 100%;
        }

        .search-wrapper i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 15px;
        }

        .search-input {
            width: 100%;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.08);
            padding: 14px 16px 14px 46px;
            border-radius: 16px;
            color: white;
            font-size: 16px;
            outline: none;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            background: rgba(255, 255, 255, 0.12);
            border-color: var(--accent-orange);
        }

        .menu-section-title {
            font-size: 18px;
            font-weight: 600;
            padding: 0 20px;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--accent-orange);
        }

        /* CONTENEDOR HORIZONTAL DE CATEGORÍAS (SCROLL) */
        .categories-horizontal-scroll {
            display: flex;
            gap: 18px;
            overflow-x: auto;
            padding: 10px 20px 25px;
            scroll-behavior: smooth;
            scrollbar-width: none;
            /* Oculta barra en Firefox */
        }

        .categories-horizontal-scroll::-webkit-scrollbar {
            display: none;
            /* Oculta barra en Chrome/Safari */
        }

        /* Botón de Categoría Individual */
        .category-tab-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: transparent;
            border: none;
            cursor: pointer;
            outline: none;
            flex-shrink: 0;
            gap: 8px;
            transition: transform 0.2s ease;
        }

        .category-tab-btn:active {
            transform: scale(0.95);
        }

        .tab-image-wrapper {
            position: relative;
            width: 68px;
            height: 68px;
            border-radius: 50%;
            padding: 3px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        .tab-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .tab-btn-title {
            font-size: 12px;
            font-weight: 500;
            color: var(--text-muted);
            max-width: 75px;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            transition: all 0.3s ease;
        }

        /* Estado Activo de la Categoría Seleccionada */
        .category-tab-btn.active .tab-image-wrapper {
            background: var(--accent-orange);
            border-color: var(--accent-orange);
            box-shadow: 0 8px 20px rgba(255, 159, 28, 0.4);
            transform: translateY(-2px);
        }

        .category-tab-btn.active .tab-btn-title {
            color: var(--accent-orange);
            font-weight: 700;
        }

        /* CONTENEDOR DE PRODUCTOS (VISTA DE TABS) */
        .products-container {
            padding: 5px 20px 30px;
        }

        .category-products-panel {
            display: none;
            /* Ocultos por defecto */
            flex-direction: column;
            gap: 16px;
        }

        /* Cuando está activa, se muestra el panel */
        .category-products-panel.active {
            display: flex;
            animation: fadeIn 0.35s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Tarjetas de Productos Premium (Cards Blancos) */
        .product-card {
            background-color: var(--card-bg);
            border-radius: 22px;
            padding: 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #1c1c1e;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        .product-info {
            flex: 1;
            padding-right: 12px;
        }

        .product-title {
            font-size: 16px;
            font-weight: 700;
            color: #121214;
            margin-bottom: 5px;
        }

        .product-description {
            font-size: 12px;
            color: #555560;
            line-height: 1.4;
            margin-bottom: 10px;
        }

        .product-price {
            font-size: 19px;
            font-weight: 700;
            color: var(--price-pink);
        }

        /* FOOTER PREMIUM */
        .premium-footer {
            background: linear-gradient(180deg, rgba(20, 20, 24, 0.93) 0%, rgba(13, 13, 15, 0.99) 100%);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 35px 20px 25px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            flex-direction: column;
            gap: 25px;
            margin-top: auto;
        }

        .footer-block {
            width: 100%;
        }

        .footer-title-block {
            font-size: 15px;
            color: #ffffff;
            font-weight: 600;
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-title-block i {
            color: var(--accent-orange);
            background: rgba(255, 159, 28, 0.1);
            padding: 8px;
            border-radius: 50%;
            font-size: 14px;
        }

        .schedule-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            padding: 14px 18px;
            color: var(--text-muted);
            font-size: 13.5px;
            line-height: 1.6;
        }

        .map-container-premium {
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.4);
            height: 160px;
        }

        .map-container-premium iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        .copyright-section {
            text-align: center;
            font-size: 11px;
            color: rgba(255, 255, 255, 0.25);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            padding-top: 20px;
        }

        /* BOTÓN DE WHATSAPP FLOTANTE */
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
            box-shadow: 0 8px 25px rgba(37, 211, 102, 0.3);
            text-decoration: none;
        }
    </style>
</head>

<body>

    <section class="brand-section">
        <div class="logo-wrapper">
            <div class="logo-content">
                <i class="fa-solid fa-fire-burner"></i>
                <span>Tu</span>
            </div>
        </div>
        <h1 class="brand-title">{{ $user->name }}</h1>
        <p class="brand-subtitle">Est. 2026</p>
    </section>

    <div class="search-box-container">
        <div class="search-wrapper">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="input-busqueda" class="search-input" placeholder="¿Qué se te antoja hoy?..."
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
                        <div class="product-info">
                            <h3 class="product-title">{{ $product->name }}</h3>
                            <p class="product-description">{{ $product->description }}</p>
                            <span class="product-price">${{ number_format($product->price, 2) }}</span>
                        </div>
                    </div>
                @empty
                    <p
                        style="color: var(--text-muted); font-size: 13px; text-align: center; padding: 30px 15px; width: 100%;">
                        No hay productos en esta categoría actualmente.
                    </p>
                @endforelse
            </div>
        @empty
            <div class="text-center" style="color: var(--text-muted); padding: 40px 20px; width: 100%;">
                <p>Este negocio aún no tiene categorías cargadas.</p>
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
        // Cambiar de categoría al dar clic arriba
        function switchTab(index) {
            // Limpiar buscador al cambiar manualmente de categoría para mejor experiencia
            document.getElementById('input-busqueda').value = "";
            restablecerFiltros();

            // Quitar clase activa a todos los botones y paneles
            document.querySelectorAll('.category-tab-btn').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.category-products-panel').forEach(panel => panel.classList.remove('active'));

            // Activar el seleccionado
            document.getElementById(`tab-btn-${index}`).classList.remove('active'); // Parche de seguridad
            document.getElementById(`tab-btn-${index}`).classList.add('active');
            document.getElementById(`panel-${index}`).classList.add('active');
        }

        // Restablecer visibilidad de tarjetas
        function restablecerFiltros() {
            document.querySelectorAll('.product-card').forEach(card => {
                card.style.display = 'flex';
            });
        }

        // BÚSQUEDA INTEGRADA EN TIEMPO REAL
        function buscarEnTiempoReal() {
            const query = document.getElementById('input-busqueda').value.toLowerCase();
            const panels = document.querySelectorAll('.category-products-panel');
            const tabs = document.querySelectorAll('.category-tab-btn');

            if (query.length > 0) {
                // Si escribe algo, buscamos de manera global abriendo visibilidad donde haya coincidencias
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

                    // Si esta pestaña tiene resultados, la hacemos visible temporalmente para mostrar el producto hallado
                    if (tieneCoincidencias > 0) {
                        panel.classList.add('active');
                        tabs[index].classList.add('active');
                    } else {
                        panel.classList.remove('active');
                        tabs[index].classList.remove('active');
                    }
                });
            } else {
                // Si borra el buscador, regresamos al estado inicial (Pestaña index 0 activa por defecto)
                panels.forEach(panel => panel.classList.remove('active'));
                tabs.forEach(tab => tab.classList.remove('active'));
                restablecerFiltros();

                // Activa la primera por defecto
                if (panels[0]) panels[0].classList.add('active');
                if (tabs[0]) tabs[0].classList.add('active');
            }
        }
    </script>
</body>

</html>
