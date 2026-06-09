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
            --bg-gradient: linear-gradient(135deg, #f7f9fc 0%, #efe1f5 100%);
            --card-bg: #ffffff;
            --text-main: #2d3748;
            --text-muted: #718096;
            --accent-primary: #ff5e7e;
            /* Rosa piñata vibrante */
            --accent-secondary: #ffa200;
            /* Amarillo festivo */
            --accent-blue: #4d96ff;
            /* Azul mágico */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            background: var(--bg-gradient);
            color: var(--text-main);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* CAPA DE FONDO INTERACTIVA (PIÑATERÍA ELEGANTE) */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(247, 249, 252, 0.85), rgba(239, 225, 245, 0.92)),
                url("{{ $user->image ? asset('storage/' . $user->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}");
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            z-index: -2;
        }

        /* FIGURAS DE CONFETI EN EL FONDO */
        .bg-shapes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
            pointer-events: none;
        }

        .shape {
            position: absolute;
            opacity: 0.15;
            border-radius: 50%;
        }

        .shape-1 {
            top: 5%;
            left: 8%;
            width: 60px;
            height: 60px;
            background: var(--accent-primary);
            clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
        }

        .shape-2 {
            top: 15%;
            right: 10%;
            width: 40px;
            height: 40px;
            background: var(--accent-blue);
            transform: rotate(45deg);
            border-radius: 4px;
        }

        .shape-3 {
            top: 40%;
            left: -20px;
            width: 80px;
            height: 80px;
            background: var(--accent-secondary);
        }

        .shape-4 {
            top: 65%;
            right: -30px;
            width: 100px;
            height: 100px;
            background: var(--accent-primary);
        }

        .shape-5 {
            top: 80%;
            left: 12%;
            width: 30px;
            height: 30px;
            background: var(--accent-blue);
            clip-path: polygon(50% 0%, 100% 38%, 82% 100%, 18% 100%, 0% 38%);
        }

        /* Branding / Identidad */
        .brand-section {
            text-align: center;
            padding: 40px 20px 25px;
            position: relative;
        }

        .logo-wrapper {
            display: inline-block;
            border: 3px dashed var(--accent-primary);
            border-radius: 50%;
            padding: 12px;
            margin-bottom: 16px;
            background: #ffffff;
            box-shadow: 0 10px 25px rgba(255, 94, 126, 0.18);
            animation: pulse 3s infinite alternate;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(1.03);
                border-color: var(--accent-secondary);
            }
        }

        .logo-content {
            width: 100px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            border-radius: 50%;
        }

        .logo-rotator-item {
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transform: translateY(25px) scale(0.85);
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.6s ease;
            pointer-events: none;
        }

        .logo-rotator-item.active {
            opacity: 1;
            transform: translateY(0) scale(1);
            pointer-events: auto;
        }

        .logo-rotator-item.exit {
            opacity: 0;
            transform: translateY(-25px) scale(0.85);
        }

        .logo-rotator-item img {
            width: 54px;
            height: 54px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid var(--accent-primary);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 4px;
        }

        .logo-rotator-item span {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 700;
            color: var(--text-main);
            max-width: 90px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            text-align: center;
        }

        .brand-title {
            font-size: 34px;
            font-weight: 800;
            background: linear-gradient(45deg, #2d3748, var(--accent-primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1.2;
            margin-bottom: 4px;
        }

        .brand-subtitle {
            font-size: 12px;
            color: var(--text-muted);
            letter-spacing: 4px;
            text-transform: uppercase;
            font-weight: 600;
        }

        /* BARRA DE BÚSQUEDA INTERACTIVA */
        .search-box-container {
            padding: 0 20px 25px;
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
            color: var(--accent-primary);
            font-size: 16px;
        }

        .search-input {
            width: 100%;
            background: var(--card-bg);
            border: 2px solid transparent;
            padding: 15px 16px 15px 50px;
            border-radius: 20px;
            color: var(--text-main);
            font-size: 15px;
            font-weight: 500;
            outline: none;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .search-input::placeholder {
            color: #a0aec0;
        }

        .search-input:focus {
            box-shadow: 0 8px 30px rgba(255, 94, 126, 0.15);
            border-color: var(--accent-primary);
            background: #ffffff;
        }

        .menu-section-title {
            font-size: 16px;
            font-weight: 700;
            padding: 0 24px;
            margin-bottom: 14px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--text-main);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .menu-section-title::after {
            content: '';
            flex: 1;
            height: 2px;
            background: linear-gradient(to right, var(--accent-primary), transparent);
            border-radius: 2px;
        }

        /* CONTENEDOR HORIZONTAL DE CATEGORÍAS */
        .categories-horizontal-scroll {
            display: flex;
            gap: 16px;
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
            flex-direction: column;
            align-items: center;
            background: transparent;
            border: none;
            cursor: pointer;
            outline: none;
            flex-shrink: 0;
            gap: 10px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .category-tab-btn:active {
            transform: scale(0.95);
        }

        .tab-image-wrapper {
            position: relative;
            width: 72px;
            height: 72px;
            border-radius: 24px;
            padding: 4px;
            background: var(--card-bg);
            border: 2px solid transparent;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
        }

        .tab-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 18px;
        }

        .tab-btn-title {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-muted);
            max-width: 85px;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            transition: all 0.3s ease;
        }

        .category-tab-btn.active .tab-image-wrapper {
            background: #ffffff;
            border-color: var(--accent-primary);
            box-shadow: 0 12px 25px rgba(255, 94, 126, 0.25);
            transform: translateY(-4px) rotate(-3deg);
        }

        .category-tab-btn.active .tab-btn-title {
            color: var(--accent-primary);
            font-weight: 700;
        }

        /* CONTENEDOR DE PRODUCTOS */
        .products-container {
            padding: 5px 20px 40px;
        }

        .category-products-panel {
            display: none;
            flex-direction: column;
            gap: 18px;
        }

        .category-products-panel.active {
            display: flex;
            animation: fadeIn 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* NUEVAS TARJETAS DE PRODUCTOS COMPACTAS Y OPTIMIZADAS */
        .product-card {
            background-color: var(--card-bg);
            border-radius: 22px;
            padding: 16px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: var(--text-main);
            box-shadow: 0 10px 25px rgba(160, 174, 192, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.8);
            position: relative;
            overflow: hidden;
        }

        .product-info {
            flex: 0 1 auto;
            /* Permite reducirse si el espacio lo requiere */
            max-width: 65%;
            /* Asegura que la flecha tenga un recorrido visible */
            z-index: 2;
        }

        .product-title {
            font-size: 16px;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 4px;
            letter-spacing: -0.2px;
        }

        .product-description {
            font-size: 12.5px;
            color: var(--text-muted);
            line-height: 1.4;
        }

        /* DISEÑO DE LÍNEA-FLECHA EXPANSIVA COLECTORA */
        .product-arrow-connector {
            flex: 1;
            /* Ocupa de manera dinámica todo el espacio restante intermedio */
            display: flex;
            align-items: center;
            position: relative;
            margin: 0 14px;
            min-width: 40px;
            /* Longitud mínima garantizada en pantallas compactas */
            height: 20px;
            z-index: 2;
        }

        /* Línea horizontal continua */
        .product-arrow-connector::before {
            content: '';
            flex: 1;
            height: 2px;
            background: linear-gradient(to right, rgba(255, 94, 126, 0.15), rgba(255, 94, 126, 0.4));
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        /* Punta de la flecha integrada al final de la línea */
        .product-arrow-connector i {
            color: rgba(255, 94, 126, 0.4);
            font-size: 12px;
            margin-left: -4px;
            /* Ensamblado directo sobre la línea */
            transition: all 0.3s ease;
        }

        /* Animación e iluminación al hacer hover/touch sobre la tarjeta */
        .product-card:hover .product-arrow-connector::before {
            background: linear-gradient(to right, var(--accent-primary), var(--accent-primary));
            height: 2.5px;
        }

        .product-card:hover .product-arrow-connector i {
            color: var(--accent-primary);
            transform: translateX(4px) scale(1.1);
        }

        /* CONTENEDOR DEL PRECIO EN LA PARTE DERECHA CON ESTRELLA */
        .product-price-wrapper {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 75px;
            height: 60px;
            z-index: 2;
            flex-shrink: 0;
            /* Impide que el bloque del precio se deforme */
        }

        /* Estrella de fondo integrada */
        .price-star-bg {
            position: absolute;
            font-size: 58px;
            /* Tamaño grande para envolver el precio */
            background: linear-gradient(135deg, rgba(255, 222, 89, 0.35) 0%, rgba(255, 162, 0, 0.15) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            transform: rotate(-15deg);
            z-index: 1;
            pointer-events: none;
        }

        /* Texto del Precio sobre la estrella */
        .product-price {
            font-size: 18px;
            font-weight: 800;
            color: var(--accent-primary);
            z-index: 2;
            text-shadow: 1px 1px 0px #ffffff, -1px -1px 0px #ffffff;
            /* Evita que el fondo interfiera con la lectura */
            letter-spacing: -0.5px;
        }

        /* FOOTER PREMIUM ELEGANTE */
        .premium-footer {
            background: #ffffff;
            padding: 40px 24px 35px;
            border-top: 1px solid rgba(0, 0, 0, 0.04);
            display: flex;
            flex-direction: column;
            gap: 30px;
            margin-top: auto;
            border-radius: 32px 32px 0 0;
            box-shadow: 0 -10px 30px rgba(0, 0, 0, 0.02);
        }

        .footer-block {
            width: 100%;
        }

        .footer-title-block {
            font-size: 15px;
            color: var(--text-main);
            font-weight: 700;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .footer-title-block i {
            color: var(--accent-primary);
            background: rgba(255, 94, 126, 0.1);
            padding: 10px;
            border-radius: 14px;
            font-size: 15px;
        }

        .schedule-card {
            background: #f7f9fc;
            border: 1px solid rgba(0, 0, 0, 0.02);
            border-radius: 18px;
            padding: 16px 20px;
            color: var(--text-muted);
            font-size: 14px;
            line-height: 1.7;
            font-weight: 500;
        }

        .map-container-premium {
            border-radius: 24px;
            overflow: hidden;
            border: 4px solid #ffffff;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
            height: 180px;
        }

        .map-container-premium iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        .copyright-section {
            text-align: center;
            font-size: 12px;
            color: #a0aec0;
            border-top: 1px solid #edf2f7;
            padding-top: 25px;
            font-weight: 500;
        }

        /* BOTÓN DE WHATSAPP FLOTANTE */
        .whatsapp-float {
            width: 58px;
            height: 58px;
            border-radius: 50%;
            background: linear-gradient(135deg, #25D366, #1ebe5d);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 28px;
            position: fixed;
            right: 20px;
            bottom: 25px;
            z-index: 200;
            box-shadow: 0 10px 25px rgba(37, 211, 102, 0.35);
            text-decoration: none;
            transition: transform 0.3s ease;
        }

        .whatsapp-float:hover {
            transform: scale(1.08);
        }
    </style>
</head>

<body>

    <div class="bg-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
        <div class="shape shape-4"></div>
        <div class="shape shape-5"></div>
    </div>

    <section class="brand-section">
        <div class="logo-wrapper">
            <div class="logo-content">
                @foreach ($user->categories as $index => $category)
                    <div class="logo-rotator-item {{ $index == 0 ? 'active' : '' }}">
                        <img src="{{ $category->image ? asset('storage/' . $category->image) : 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=200&auto=format&fit=crop' }}"
                            alt="{{ $category->name }}">
                        <span>{{ $category->name }}</span>
                    </div>
                @endforeach
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
                        </div>

                        <!-- Conector de flecha expandible de extremo a extremo -->
                        <div class="product-arrow-connector">
                            <i class="fa-solid fa-chevron-right"></i>
                        </div>

                        <div class="product-price-wrapper">
                            <i class="fa-solid fa-star price-star-bg"></i>
                            <span class="product-price">${{ number_format($product->price, 2) }}</span>
                        </div>

                    </div>
                @empty
                    <p
                        style="color: var(--text-muted); font-size: 14px; text-align: center; padding: 40px 15px; width: 100%; font-weight: 500;">
                        No hay productos en esta categoría actualmente.
                    </p>
                @endforelse
            </div>
        @empty
            <div class="text-center"
                style="color: var(--text-muted); padding: 40px 20px; width: 100%; font-weight: 500;">
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
        // Carrousel automático interno del Logo (Cambia Imagen + Nombre 1 x 1)
        document.addEventListener("DOMContentLoaded", function() {
            const items = document.querySelectorAll('.logo-rotator-item');
            if (items.length <= 1) return;

            let currentIndex = 0;

            setInterval(() => {
                const currentItem = items[currentIndex];

                currentItem.classList.remove('active');
                currentItem.classList.add('exit');

                setTimeout(() => {
                    currentItem.classList.remove('exit');
                }, 600);

                currentIndex = (currentIndex + 1) % items.length;

                const nextItem = items[currentIndex];
                nextItem.classList.add('active');

            }, 2500);
        });

        // Cambiar de categoría al dar clic arriba
        function switchTab(index) {
            document.getElementById('input-busqueda').value = "";
            restablecerFiltros();

            document.querySelectorAll('.category-tab-btn').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.category-products-panel').forEach(panel => panel.classList.remove('active'));

            document.getElementById(`tab-btn-${index}`).classList.remove('active');
            document.getElementById(`tab-btn-${index}`).classList.add('active');
            document.getElementById(`panel-${index}`).classList.add('active');
        }

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
                        tabs[index].classList.add('active');
                    } else {
                        panel.classList.remove('active');
                        tabs[index].classList.remove('active');
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
