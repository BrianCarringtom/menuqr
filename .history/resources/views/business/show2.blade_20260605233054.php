<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $user->name }} - Menú Digital</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600;700&family=Poppins:wght@400;600;700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --bg-dark: #0f021f;
            /* Púrpura ultra oscuro de fondo */
            --mexican-orange: #ff6f00;
            /* Naranja festivo de la piñata */
            --mexican-pink: #ff007f;
            /* Rosa mexicano llamativo */
            --mexican-purple: #7b2cbf;
            /* Morado piñata */
            --mexican-green: #00e676;
            /* Verde brillante */
            --mexican-yellow: #ffd600;
            /* Amarillo vibrante */
            --text-light: #ffffff;
            --text-muted: #e0d0f0;
        }

        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            background-color: var(--bg-dark);
            color: var(--text-light);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* CAPA DE FONDO EFECTO LOGO PATRÓN / MARCA DE AGUA VIBRANTE */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                radial-gradient(circle at 20% 20%, rgba(255, 111, 0, 0.15) 0%, transparent 40%),
                radial-gradient(circle at 80% 70%, rgba(123, 44, 191, 0.2) 0%, transparent 50%),
                linear-gradient(rgba(15, 2, 31, 0.92), rgba(15, 2, 31, 0.98)),
                url("{{ $user->image ? asset('storage/' . $user->image) : 'https://images.unsplash.com/photo-1513151233558-d860c5398176?q=80&w=600' }}");
            background-size: cover;
            background-position: center;
            z-index: -1;
        }

        /* DISEÑO DE CABECERA INSPIRADO EN LA IMAGEN (PIÑATAS) */
        .brand-section {
            text-align: center;
            padding: 40px 20px 30px;
            position: relative;
            background: linear-gradient(135deg, var(--mexican-purple) 0%, #3c096c 100%);
            border-bottom: 6px dashed var(--mexican-yellow);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            margin-bottom: 25px;
        }

        /* Borde dentado decorativo imitando el marco de la imagen */
        .brand-section::after {
            content: "";
            position: absolute;
            bottom: -12px;
            left: 0;
            width: 100%;
            height: 12px;
            background-image: linear-gradient(-45deg, var(--mexican-yellow) 6px, transparent 0), linear-gradient(45deg, var(--mexican-yellow) 6px, transparent 0);
            background-position: left top;
            background-repeat: repeat-x;
            background-size: 12px 12px;
            z-index: 10;
        }

        .logo-wrapper {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 85px;
            height: 85px;
            background: var(--mexican-orange);
            border: 4px solid var(--text-light);
            border-radius: 50%;
            margin-bottom: 12px;
            box-shadow: 0 0 20px var(--mexican-orange);
            transform: rotate(-5deg);
            animation: float 4s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0) rotate(-5deg);
            }

            50% {
                transform: translateY(-8px) rotate(5deg);
            }
        }

        .logo-content i {
            font-size: 36px;
            color: var(--text-light);
            text-shadow: 2px 2px 0px rgba(0, 0, 0, 0.2);
        }

        .brand-title {
            font-family: 'Fredoka', sans-serif;
            font-size: 42px;
            font-weight: 700;
            color: var(--text-light);
            letter-spacing: 1px;
            text-shadow: 4px 4px 0px var(--mexican-pink), 7px 7px 0px rgba(0, 0, 0, 0.4);
            line-height: 1.1;
        }

        .brand-subtitle {
            font-size: 13px;
            color: var(--mexican-yellow);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 4px;
            margin-top: 10px;
        }

        /* BUSCADOR */
        .search-box-container {
            padding: 0 20px;
            margin-bottom: 30px;
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
            color: var(--mexican-orange);
            font-size: 18px;
        }

        .search-input {
            width: 100%;
            background: rgba(255, 255, 255, 0.07);
            border: 2px solid rgba(255, 255, 255, 0.15);
            padding: 16px 16px 16px 52px;
            border-radius: 30px;
            color: white;
            font-size: 16px;
            outline: none;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            background: rgba(123, 44, 191, 0.15);
            border-color: var(--mexican-pink);
            box-shadow: 0 0 15px rgba(255, 0, 127, 0.3);
        }

        /* SECCIÓN NUEVA DE CATEGORÍAS UNIVERSAL EN BLOQUES DE ALTA VISIBILIDAD */
        .menu-section-title {
            font-family: 'Fredoka', sans-serif;
            font-size: 24px;
            font-weight: 700;
            padding: 0 20px;
            margin-bottom: 20px;
            color: var(--text-light);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .menu-section-title::after {
            content: "";
            flex: 1;
            height: 4px;
            background: linear-gradient(to right, var(--mexican-pink), transparent);
            border-radius: 2px;
        }

        /* Contenedor en cuadrícula/bloques en vez de scroll lineal */
        .categories-grid {
            display: flex;
            flex-direction: column;
            gap: 20px;
            padding: 0 20px 40px;
        }

        /* Tarjeta de Categoría Transformada como "Caja de Sorpresas/Piñata" */
        .category-block-wrapper {
            width: 100%;
            background: rgba(255, 255, 255, 0.04);
            border-radius: 24px;
            border: 2px solid rgba(255, 255, 255, 0.08);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .category-trigger-header {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 20px;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.02) 0%, rgba(255, 255, 255, 0.05) 100%);
            border: none;
            cursor: pointer;
            outline: none;
            text-align: left;
            position: relative;
        }

        /* Colores dinámicos usando selectores CSS repetitivos para dar el look multicolor de piñatas */
        .category-block-wrapper:nth-child(4n+1) .category-img-container {
            background: var(--mexican-orange);
            box-shadow: 0 0 15px rgba(255, 111, 0, 0.4);
        }

        .category-block-wrapper:nth-child(4n+2) .category-img-container {
            background: var(--mexican-pink);
            box-shadow: 0 0 15px rgba(255, 0, 127, 0.4);
        }

        .category-block-wrapper:nth-child(4n+3) .category-img-container {
            background: var(--mexican-green);
            box-shadow: 0 0 15px rgba(0, 230, 118, 0.4);
        }

        .category-block-wrapper:nth-child(4n+4) .category-img-container {
            background: var(--mexican-purple);
            box-shadow: 0 0 15px rgba(123, 44, 191, 0.4);
        }

        .category-block-wrapper:nth-child(4n+1).active {
            border-color: var(--mexican-orange);
        }

        .category-block-wrapper:nth-child(4n+2).active {
            border-color: var(--mexican-pink);
        }

        .category-block-wrapper:nth-child(4n+3).active {
            border-color: var(--mexican-green);
        }

        .category-block-wrapper:nth-child(4n+4).active {
            border-color: var(--mexican-purple);
        }

        .category-left-side {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .category-img-container {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            padding: 3px;
            border: 2px solid #fff;
            transition: transform 0.3s ease;
        }

        .category-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 12px;
        }

        .category-text-name {
            font-family: 'Fredoka', sans-serif;
            font-size: 19px;
            font-weight: 700;
            color: var(--text-light);
            letter-spacing: 0.5px;
        }

        /* Icono indicador de despliegue */
        .category-arrow-indicator {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            transition: all 0.3s ease;
        }

        .category-arrow-indicator i {
            font-size: 14px;
            transition: transform 0.3s ease;
        }

        /* ESTADO ACTIVO - DESPLEGADO */
        .category-block-wrapper.active {
            background: rgba(255, 255, 255, 0.07);
            transform: scale(1.01);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
        }

        .category-block-wrapper.active .category-arrow-indicator {
            background: #ffffff;
            color: #000000;
        }

        .category-block-wrapper.active .category-arrow-indicator i {
            transform: rotate(180deg);
        }

        .category-block-wrapper.active .category-img-container {
            transform: scale(1.08) rotate(-4deg);
        }

        /* CONTENEDOR INTERNO DE PRODUCTOS (DESPLEGABLE INTERACTIVO) */
        .category-products-panel {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0.25, 1, 0.5, 1);
            display: flex;
            flex-direction: column;
            gap: 14px;
            padding: 0 16px;
        }

        .category-block-wrapper.active .category-products-panel {
            max-height: 2000px;
            /* Suficiente espacio dinámico para albergar los productos */
            padding: 10px 16px 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
        }

        /* TARJETAS DE PRODUCTOS REDISEÑADAS */
        .product-card {
            background: linear-gradient(145deg, #1d0f33 0%, #130724 100%);
            border-radius: 18px;
            padding: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-left: 5px solid var(--mexican-yellow);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s ease, border-color 0.3s ease;
        }

        .category-block-wrapper:nth-child(4n+1) .product-card {
            border-left-color: var(--mexican-orange);
        }

        .category-block-wrapper:nth-child(4n+2) .product-card {
            border-left-color: var(--mexican-pink);
        }

        .category-block-wrapper:nth-child(4n+3) .product-card {
            border-left-color: var(--mexican-green);
        }

        .category-block-wrapper:nth-child(4n+4) .product-card {
            border-left-color: var(--mexican-purple);
        }

        .product-card:active {
            transform: scale(0.98);
        }

        .product-info {
            flex: 1;
            padding-right: 14px;
        }

        .product-title {
            font-size: 16px;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 4px;
            letter-spacing: 0.3px;
        }

        .product-description {
            font-size: 12px;
            color: var(--text-muted);
            line-height: 1.5;
            margin-bottom: 8px;
        }

        /* Contenedor del Precio como medalla llamativa */
        .product-price-tag {
            display: inline-block;
            background: rgba(255, 255, 255, 0.08);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 16px;
            font-weight: 700;
            color: var(--mexican-yellow);
        }

        .category-block-wrapper:nth-child(4n+2) .product-price-tag {
            color: var(--mexican-yellow);
        }

        /* MULTICOLOR FOOTER PREMIUM */
        .premium-footer {
            background: #090114;
            padding: 40px 20px 30px;
            border-top: 4px solid var(--mexican-pink);
            display: flex;
            flex-direction: column;
            gap: 30px;
            margin-top: auto;
            position: relative;
        }

        .footer-block {
            width: 100%;
        }

        .footer-title-block {
            font-family: 'Fredoka', sans-serif;
            font-size: 16px;
            color: #ffffff;
            font-weight: 700;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .footer-title-block i {
            color: var(--mexican-yellow);
            background: rgba(255, 214, 0, 0.15);
            padding: 10px;
            border-radius: 12px;
            font-size: 16px;
        }

        .schedule-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.07);
            border-radius: 18px;
            padding: 16px 20px;
            color: var(--text-muted);
            font-size: 14px;
            line-height: 1.7;
        }

        .map-container-premium {
            border-radius: 24px;
            overflow: hidden;
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.5);
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
            color: rgba(255, 255, 255, 0.3);
            border-top: 1px solid rgba(255, 255, 255, 0.07);
            padding-top: 25px;
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
            box-shadow: 0 10px 25px rgba(37, 211, 102, 0.4);
            text-decoration: none;
            transition: transform 0.3s ease;
        }

        .whatsapp-float:active {
            transform: scale(0.9);
        }
    </style>
</head>

<body>

    <section class="brand-section">
        <div class="logo-wrapper">
            <div class="logo-content">
                <i class="fa-solid fa-star-of-life"></i>
            </div>
        </div>
        <h1 class="brand-title">{{ $user->name }}</h1>
        <p class="brand-subtitle">Menú Digital</p>
    </section>

    <div class="search-box-container">
        <div class="search-wrapper">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="input-busqueda" class="search-input" placeholder="¿Qué estás buscando hoy?..."
                oninput="buscarEnTiempoReal()">
        </div>
    </div>

    <h2 class="menu-section-title">Explorar Categorías</h2>

    <div class="categories-grid">
        @forelse ($user->categories as $index => $category)
            <div class="category-block-wrapper {{ $index == 0 ? 'active' : '' }}"
                id="category-block-{{ $index }}">

                <button onclick="toggleCategory({{ $index }})" class="category-trigger-header">
                    <div class="category-left-side">
                        <div class="category-img-container">
                            <img src="{{ $category->image ? asset('storage/' . $category->image) : 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=200&auto=format&fit=crop' }}"
                                alt="{{ $category->name }}">
                        </div>
                        <span class="category-text-name">{{ $category->name }}</span>
                    </div>
                    <div class="category-arrow-indicator">
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                </button>

                <div class="category-products-panel" id="panel-{{ $index }}">
                    @forelse ($category->products as $product)
                        <div class="product-card" data-title="{{ strtolower($product->name) }}"
                            data-desc="{{ strtolower($product->description) }}">
                            <div class="product-info">
                                <h3 class="product-title">{{ $product->name }}</h3>
                                <p class="product-description">{{ $product->description }}</p>
                                <div class="product-price-tag">${{ number_format($product->price, 2) }}</div>
                            </div>
                        </div>
                    @empty
                        <p
                            style="color: var(--text-muted); font-size: 13px; text-align: center; padding: 20px 10px; width: 100%;">
                            No hay productos disponibles en este momento.
                        </p>
                    @endforelse
                </div>

            </div>
        @empty
            <div class="text-center"
                style="color: var(--text-muted); padding: 40px 20px; width: 100%; text-align: center;">
                <p>No hay categorías cargadas actualmente.</p>
            </div>
        @endforelse
    </div>

    <footer class="premium-footer">
        <div class="footer-block">
            <h4 class="footer-title-block"><i class="fa-solid fa-clock"></i> Horarios de Atención</h4>
            <div class="schedule-card">
                {!! nl2br(e($user->schedule)) !!}
            </div>
        </div>

        <div class="footer-block">
            <h4 class="footer-title-block"><i class="fa-solid fa-location-dot"></i> Nuestra Ubicación</h4>
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
        // Cambiar / Expandir acordeón de categoría de forma interactiva
        function toggleCategory(index) {
            // Reiniciamos buscador para no interferir con la navegación manual limpia
            document.getElementById('input-busqueda').value = "";
            restablecerFiltros();

            const targetBlock = document.getElementById(`category-block-${index}`);
            const isAlreadyActive = targetBlock.classList.contains('active');

            // Cerramos todas las pestañas primero para un efecto de acordeón suave y ordenado
            document.querySelectorAll('.category-block-wrapper').forEach(block => {
                block.classList.remove('active');
            });

            // Si no estaba activa, la abrimos
            if (!isAlreadyActive) {
                targetBlock.classList.add('active');

                // Hacer scroll automático sutil hacia la categoría abierta para pantallas pequeñas
                setTimeout(() => {
                    targetBlock.scrollIntoView({
                        behavior: 'smooth',
                        block: 'nearest'
                    });
                }, 300);
            }
        }

        // Restablecer visibilidad total interna de tarjetas
        function restablecerFiltros() {
            document.querySelectorAll('.product-card').forEach(card => {
                card.style.display = 'flex';
            });
            document.querySelectorAll('.category-block-wrapper').forEach(block => {
                block.style.display = 'block';
            });
        }

        // BÚSQUEDA INTEGRADA EN TIEMPO REAL MULTI-DESPLEGABLE
        function buscarEnTiempoReal() {
            const query = document.getElementById('input-busqueda').value.toLowerCase();
            const blocks = document.querySelectorAll('.category-block-wrapper');

            if (query.length > 0) {
                blocks.forEach((block) => {
                    const cards = block.querySelectorAll('.product-card');
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

                    // Si la categoría tiene productos que coinciden, la mostramos expandida por completo
                    if (tieneCoincidencias > 0) {
                        block.style.display = 'block';
                        block.classList.add('active');
                    } else {
                        // Escondemos el bloque completo si no coincide nada de su interior
                        block.style.display = 'none';
                        block.classList.remove('active');
                    }
                });
            } else {
                // Si el usuario vacía el buscador, regresamos al estado inicial predeterminado (Pestaña 0 expandida)
                restablecerFiltros();
                blocks.forEach((block, index) => {
                    if (index === 0) {
                        block.classList.add('active');
                    } else {
                        block.classList.remove('active');
                    }
                });
            }
        }
    </script>
</body>

</html>
