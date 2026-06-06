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
            /* Colores inspirados en imagen_3.jpg */
            --bg-main: #23120e;
            /* Chocolate oscuro de fondo */
            --bg-sidebar: #331a14;
            /* Lateral ligeramente más claro para contraste */
            --bg-card: #3d2119;
            /* Marrón caramelo para el contenedor de productos */
            --accent-orange: #e07a34;
            /* Naranja tostado artesanal */
            --text-light: #ffffff;
            /* Blanco para textos principales */
            --text-muted: #d1bfa7;
            /* Crema para descripciones secundarias */
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
        }

        /* ESTRUCTURA PRINCIPAL REINVENTADA (DIVIDIDA EN DOS COLUMNAS) */
        .main-app-container {
            display: flex;
            flex: 1;
            position: relative;
            height: calc(100vh - 120px);
            /* Ajuste para dejar espacio al header */
            overflow: hidden;
        }

        /* ENCABEZADO SUPERIOR MINIMALISTA */
        .brand-header {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 20px;
            background: var(--bg-sidebar);
            border-bottom: 1px solid rgba(224, 122, 52, 0.1);
        }

        .logo-wrapper {
            width: 60px;
            height: 60px;
            border: 2px solid var(--accent-orange);
            border-radius: 50%;
            padding: 2px;
            background: var(--bg-card);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
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
            font-size: 20px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            line-height: 1.2;
        }

        .brand-subtitle {
            font-size: 11px;
            color: var(--accent-orange);
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 600;
        }

        /* COLUMNA IZQUIERDA: MENÚ DE CATEGORÍAS VERTICAL */
        .sidebar-categories {
            width: 105px;
            background-color: var(--bg-sidebar);
            display: flex;
            flex-direction: column;
            gap: 12px;
            padding: 20px 8px;
            overflow-y: auto;
            border-right: 1px solid rgba(224, 122, 52, 0.1);
            scrollbar-width: none;
            flex-shrink: 0;
        }

        .sidebar-categories::-webkit-scrollbar {
            display: none;
        }

        /* Botones en forma vertical estilizada */
        .category-tab-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(224, 122, 52, 0.1);
            border-radius: 16px;
            padding: 12px 6px;
            cursor: pointer;
            outline: none;
            gap: 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            width: 100%;
        }

        .tab-image-wrapper {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            border: 2px solid transparent;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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
            word-break: break-word;
            line-height: 1.2;
        }

        /* Categoría Seleccionada Lateral */
        .category-tab-btn.active {
            background: var(--accent-orange);
            border-color: var(--accent-orange);
            box-shadow: 0 6px 15px rgba(224, 122, 52, 0.3);
            transform: scale(1.03);
        }

        .category-tab-btn.active .tab-image-wrapper {
            border-color: var(--text-light);
        }

        .category-tab-btn.active .tab-btn-title {
            color: var(--text-light);
            font-weight: 600;
        }

        /* COLUMNA DERECHA: AREA DE CONTENIDO (BUSCADOR + PRODUCTOS) */
        .content-area {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            background-color: var(--bg-main);
            padding: 16px;
        }

        /* Buscador integrado arriba del contenido */
        .search-box-container {
            width: 100%;
            margin-bottom: 16px;
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
            font-size: 14px;
        }

        .search-input {
            width: 100%;
            background: var(--bg-card);
            border: 1px solid rgba(224, 122, 52, 0.2);
            padding: 12px 16px 12px 44px;
            border-radius: 12px;
            color: white;
            font-size: 14px;
            outline: none;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            border-color: var(--accent-orange);
            background: rgba(61, 33, 25, 0.9);
        }

        /* PANEL DE PRODUCTOS */
        .products-container {
            width: 100%;
        }

        .category-products-panel {
            display: none;
            flex-direction: column;
            background: var(--bg-card);
            border-radius: 20px;
            padding: 20px 16px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(224, 122, 52, 0.08);
            gap: 22px;
        }

        .category-products-panel.active {
            display: flex;
            animation: slideIn 0.35s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(15px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* ESTRUCTURA DE PRODUCTO BASADO EN IMAGEN_3.JPG (MENU CLASSIC) */
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
            font-size: 15px;
            font-weight: 600;
            color: var(--text-light);
            white-space: nowrap;
            padding-right: 6px;
        }

        /* Puntos guías continuos como la imagen de referencia */
        .product-leader {
            flex-grow: 1;
            border-bottom: 2px dotted rgba(209, 191, 167, 0.35);
            margin-bottom: 4px;
            min-width: 15px;
        }

        .product-price {
            font-size: 16px;
            font-weight: 700;
            color: var(--accent-orange);
            white-space: nowrap;
            padding-left: 6px;
        }

        .product-description {
            font-size: 12px;
            color: var(--text-muted);
            line-height: 1.4;
            margin-top: 3px;
            max-width: 90%;
        }

        /* SECCIÓN DE FOOTER INTEGRADO ABAJO DE LA APP */
        .premium-footer {
            background: #190c0a;
            padding: 30px 20px;
            border-top: 2px solid var(--accent-orange);
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .footer-block {
            width: 100%;
        }

        .footer-title-block {
            font-size: 14px;
            color: var(--text-light);
            font-weight: 600;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .footer-title-block i {
            color: var(--accent-orange);
            background: rgba(224, 122, 52, 0.15);
            padding: 6px;
            border-radius: 50%;
            font-size: 12px;
        }

        .schedule-card {
            background: var(--bg-card);
            border: 1px solid rgba(224, 122, 52, 0.1);
            border-radius: 12px;
            padding: 14px 16px;
            color: var(--text-muted);
            font-size: 13px;
            line-height: 1.5;
        }

        .map-container-premium {
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid rgba(224, 122, 52, 0.1);
            height: 140px;
        }

        .map-container-premium iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        .copyright-section {
            text-align: center;
            font-size: 11px;
            color: rgba(255, 255, 255, 0.2);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            padding-top: 15px;
        }

        /* BOTÓN WHATSAPP FLOTANTE */
        .whatsapp-float {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #25D366, #1ebe5d);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            position: fixed;
            right: 16px;
            bottom: 16px;
            z-index: 200;
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);
            text-decoration: none;
        }

        /* RESPONSIVE: Adaptación para pantallas de tablets o PC */
        @media(min-width: 768px) {
            .sidebar-categories {
                width: 160px;
                padding: 25px 15px;
            }

            .category-tab-btn {
                flex-direction: row;
                padding: 10px 12px;
                justify-content: flex-start;
            }

            .tab-btn-title {
                text-align: left;
                font-size: 13px;
            }

            .content-area {
                padding: 24px;
            }

            .premium-footer {
                flex-direction: row;
                justify-content: space-between;
            }

            .footer-block {
                flex: 1;
            }
        }
    </style>
</head>

<body>

    <!-- Cabecera Superior Fija -->
    <header class="brand-header">
        <div class="logo-wrapper">
            <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}"
                alt="Logotipo">
        </div>
        <div class="brand-info">
            <h1 class="brand-title">{{ $user->name }}</h1>
            <p class="brand-subtitle">Catálogo Universal</p>
        </div>
    </header>

    <!-- Nueva Estructura del Cuerpo dividida en Lateral y Contenido -->
    <div class="main-app-container">

        <!-- COLUMNA IZQUIERDA: MENÚ VERTICAL -->
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

        <!-- COLUMNA DERECHA: PANEL DE CONTENIDOS -->
        <main class="content-area">

            <!-- Buscador Integrado -->
            <div class="search-box-container">
                <div class="search-wrapper">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" id="input-busqueda" class="search-input" placeholder="Buscar elemento..."
                        oninput="buscarEnTiempoReal()">
                </div>
            </div>

            <!-- Contenedor Dinámico de Productos -->
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
                                style="color: var(--text-muted); font-size: 13px; text-align: center; padding: 20px 10px; width: 100%; font-style: italic;">
                                Sin elementos en esta categoría.
                            </p>
                        @endforelse
                    </div>
                @empty
                    <div class="text-center" style="color: var(--text-muted); padding: 40px 20px; width: 100%;">
                        <p>No hay categorías registradas.</p>
                    </div>
                @endforelse
            </div>

        </main>
    </div>

    <!-- Sección de Footer Ocupando el Ancho Inferior -->
    <footer class="premium-footer">
        <div class="footer-block">
            <h4 class="footer-title-block"><i class="fa-solid fa-calendar-days"></i> Horarios</h4>
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

        <div class="copyright-section" style="width: 100%;">
            <p>© {{ date('Y') }} {{ $user->name }}. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Botón de Acción Flotante -->
    <a href="https://wa.me/{{ $user->whatsapp }}" target="_blank" class="whatsapp-float">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Scripts de Lógica intactos -->
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
