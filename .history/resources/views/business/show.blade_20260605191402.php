<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $user->name }} - Menú Digital Premium</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,800;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --bg-main: #fcf9f5;
            /* Fondo crema limpio y cálido tipo la imagen */
            --card-bg: #ffffff;
            --text-dark: #2d2621;
            --text-muted: #7a6e65;
            --accent-primary: #10b981;
            /* Verde fresco */
            --accent-secondary: #f59e0b;
            /* Alerta/Toques naranjas cálidos */
            --price-tag: #e11d48;
            /* Color llamativo para precios */
            --border-radius: 20px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            background-color: var(--bg-main);
            color: var(--text-dark);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* LOGO DE FONDO UNIVERSAL (Marca de agua fija y elegante en el fondo) */
        body::before {
            content: "";
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80vw;
            height: 80vw;
            max-width: 500px;
            max-height: 500px;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100' opacity='0.03'%3E%3Cpath fill='%232d2621' d='M50 5C25.1 5 5 25.1 5 50s20.1 45 45 45 45-20.1 45-45S74.9 5 50 5zm0 82C29.6 87 13 70.4 13 50S29.6 13 50 13s37 16.6 37 37-16.6 37-37 37z'/%3E%3Cpath fill='%232d2621' d='M50 25c-13.8 0-25 11.2-25 25s11.2 25 25 25 25-11.2 25-25-11.2-25-25-25zm0 42c-9.4 0-17-7.6-17-17s7.6-17 17-17 17 7.6 17 17-7.6 17-17 17z'/%3E%3C/svg%3E") no-repeat center center;
            background-size: contain;
            z-index: -1;
            pointer-events: none;
        }

        /* BANNER / CABECERA */
        .brand-header {
            text-align: center;
            padding: 40px 20px 20px;
            position: relative;
        }

        .brand-badge {
            display: inline-block;
            background: rgba(245, 158, 11, 0.15);
            color: #d97706;
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 12px;
        }

        .brand-title {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            font-weight: 800;
            color: var(--text-dark);
            line-height: 1.1;
        }

        .brand-subtitle {
            font-size: 13px;
            color: var(--text-muted);
            margin-top: 8px;
            font-weight: 400;
        }

        /* BUSCADOR ESTILIZADO */
        .search-container {
            padding: 10px 20px 25px;
        }

        .search-box {
            position: relative;
            width: 100%;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.04);
            border-radius: 16px;
        }

        .search-box i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 16px;
        }

        .search-input {
            width: 100%;
            background: var(--card-bg);
            border: 1px solid rgba(0, 0, 0, 0.06);
            padding: 16px 16px 16px 50px;
            border-radius: 16px;
            color: var(--text-dark);
            font-size: 15px;
            outline: none;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            border-color: var(--accent-primary);
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }

        .section-title {
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 2px;
            color: var(--text-muted);
            text-transform: uppercase;
            padding: 0 20px;
            margin-bottom: 15px;
        }

        /* NUEVA ESTRUCTURA: CUADRÍCULA DE CATEGORÍAS DE 2 EN 2 */
        .categories-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            padding: 0 20px 30px;
        }

        /* Cada bloque ahora contiene el botón y su respectivo desplegable ocupando todo el ancho */
        .category-block {
            display: contents;
            /* Permite que el contenido fluya dinámicamente */
        }

        .grid-button {
            background: var(--card-bg);
            border: 1px solid rgba(0, 0, 0, 0.04);
            border-radius: var(--border-radius);
            padding: 20px 14px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .grid-button:active {
            transform: scale(0.96);
        }

        .grid-button.active {
            background: var(--text-dark);
            border-color: var(--text-dark);
        }

        .image-container {
            position: relative;
            width: 75px;
            height: 75px;
            margin-bottom: 12px;
        }

        .category-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid var(--bg-main);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.08);
        }

        .category-title {
            font-size: 15px;
            font-weight: 700;
            color: var(--text-dark);
            line-height: 1.2;
            transition: color 0.3s;
        }

        .grid-button.active .category-title {
            color: #ffffff;
        }

        .indicator-dot {
            position: absolute;
            bottom: 8px;
            font-size: 11px;
            color: var(--accent-primary);
            font-weight: bold;
            transition: color 0.3s;
        }

        .grid-button.active .indicator-dot {
            color: var(--accent-secondary);
        }

        /* CONTENEDOR DESPLEGABLE COMPLETO (Ocupa las 2 columnas de la cuadrícula de forma limpia) */
        .accordion-content {
            grid-column: span 2;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .products-container {
            padding: 8px 4px 20px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        /* TARJETAS DE PRODUCTOS TOTALMENTE REDISEÑADAS */
        .product-card {
            background: var(--card-bg);
            border-radius: var(--border-radius);
            padding: 16px;
            display: flex;
            align-items: center;
            gap: 14px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(0, 0, 0, 0.02);
            animation: fadeIn 0.4s ease;
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

        .product-details {
            flex: 1;
        }

        .product-header-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 4px;
        }

        .product-title {
            font-size: 15px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .product-price {
            font-size: 16px;
            font-weight: 800;
            color: var(--price-tag);
            background: rgba(225, 29, 72, 0.06);
            padding: 3px 8px;
            border-radius: 8px;
            white-space: nowrap;
        }

        .product-description {
            font-size: 12px;
            color: var(--text-muted);
            line-height: 1.4;
        }

        /* FOOTER DE ALTA CALIDAD */
        .premium-footer {
            background: var(--card-bg);
            padding: 40px 20px 30px;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            gap: 30px;
            margin-top: auto;
            border-radius: 30px 30px 0 0;
            box-shadow: 0 -10px 30px rgba(0, 0, 0, 0.02);
        }

        .footer-block-title {
            font-size: 14px;
            color: var(--text-dark);
            font-weight: 700;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .footer-block-title i {
            color: var(--accent-primary);
        }

        .schedule-box {
            background: var(--bg-main);
            border-radius: 16px;
            padding: 16px;
            color: var(--text-dark);
            font-size: 13px;
            line-height: 1.6;
            border: 1px solid rgba(0, 0, 0, 0.02);
        }

        .map-wrapper {
            border-radius: var(--border-radius);
            overflow: hidden;
            border: 1px solid rgba(0, 0, 0, 0.05);
            height: 170px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
        }

        .map-wrapper iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        .copyright {
            text-align: center;
            font-size: 11px;
            color: var(--text-muted);
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            padding-top: 20px;
        }

        /* BOTÓN FLOTANTE WHATSAPP */
        .whatsapp-btn {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: #25D366;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 26px;
            position: fixed;
            right: 20px;
            bottom: 25px;
            z-index: 200;
            box-shadow: 0 8px 24px rgba(37, 211, 102, 0.4);
            text-decoration: none;
            transition: transform 0.2s;
        }

        .whatsapp-btn:active {
            transform: scale(0.9);
        }
    </style>
</head>

<body>

    <header class="brand-header">
        <span class="brand-badge">Menú Digital</span>
        <h1 class="brand-title">{{ $user->name }}</h1>
        <p class="brand-subtitle">Bienvenidos · Calidad & Sabor</p>
    </header>

    <div class="search-container">
        <div class="search-box">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="input-busqueda" class="search-input" placeholder="Buscar tu platillo favorito..."
                oninput="buscarEnTiempoReal()">
        </div>
    </div>

    <h2 class="section-title">Categorías</h2>

    <div class="categories-grid" id="menu-categorias">
        @forelse ($user->categories as $index => $category)
            <div class="category-block">

                <button onclick="toggleMenu({{ $index }})" class="grid-button" id="btn-cat-{{ $index }}">
                    <div class="image-container">
                        <img src="{{ $category->image ? asset('storage/' . $category->image) : 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=1200&auto=format&fit=crop' }}"
                            class="category-image" alt="{{ $category->name }}">
                    </div>
                    <h3 class="category-title">{{ $category->name }}</h3>
                    <span id="icon-{{ $index }}" class="indicator-dot"><i class="fa-solid fa-chevron-down"></i>
                        Ver</span>
                </button>

                <div id="content-{{ $index }}" class="accordion-content">
                    <div class="products-container">
                        @forelse ($category->products as $product)
                            <div class="product-card">
                                <div class="product-details">
                                    <div class="product-header-row">
                                        <h4 class="product-title">{{ $product->name }}</h4>
                                        <span class="product-price">${{ number_format($product->price, 2) }}</span>
                                    </div>
                                    <p class="product-description">{{ $product->description }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="product-card" style="justify-content: center; background: rgba(0,0,0,0.02)">
                                <p style="color: var(--text-muted); font-size: 13px; text-align: center;">
                                    No hay productos disponibles por el momento.
                                </p>
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>
        @empty
            <div style="grid-column: span 2; text-align: center; color: var(--text-muted); padding: 40px 20px;">
                <p>Este negocio aún no tiene categorías cargadas.</p>
            </div>
        @endforelse
    </div>

    <footer class="premium-footer">
        <div>
            <h4 class="footer-block-title"><i class="fa-solid fa-clock"></i> Horarios de Atención</h4>
            <div class="schedule-box">
                {!! nl2br(e($user->schedule)) !!}
            </div>
        </div>

        <div>
            <h4 class="footer-block-title"><i class="fa-solid fa-location-dot"></i> Ubicación</h4>
            <div class="map-wrapper">
                <iframe src="{{ $user->map_url }}" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <div class="copyright">
            <p>© {{ date('Y') }} {{ $user->name }}. Todos los derechos reservados.</p>
        </div>
    </footer>

    <a href="https://wa.me/{{ $user->whatsapp }}" target="_blank" class="whatsapp-btn">
        <i class="fab fa-whatsapp"></i>
    </a>

    <script>
        function toggleMenu(index) {
            const content = document.getElementById(`content-${index}`);
            const button = document.getElementById(`btn-cat-${index}`);
            const icon = document.getElementById(`icon-${index}`);

            const allContents = document.querySelectorAll(".accordion-content");
            const allButtons = document.querySelectorAll(".grid-button");
            const allIcons = document.querySelectorAll(".indicator-dot");

            // Cerrar otros acordeones abiertos
            allContents.forEach((item, i) => {
                if (i !== index) {
                    item.style.maxHeight = null;
                    allButtons[i].classList.remove("active");
                    allIcons[i].innerHTML = '<i class="fa-solid fa-chevron-down"></i> Ver';
                }
            });

            // Alternar el estado del acordeón seleccionado
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
                button.classList.remove("active");
                icon.innerHTML = '<i class="fa-solid fa-chevron-down"></i> Ver';
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
                button.classList.add("active");
                icon.innerHTML = '<i class="fa-solid fa-chevron-up"></i> Cerrar';

                // Desplazamiento suave al producto abierto
                setTimeout(() => {
                    button.scrollIntoView({
                        behavior: 'smooth',
                        block: 'nearest'
                    });
                }, 300);
            }
        }

        function buscarEnTiempoReal() {
            const query = document.getElementById('input-busqueda').value.toLowerCase();
            const categories = document.querySelectorAll('.category-block');
            const gridContainer = document.getElementById('menu-categorias');

            categories.forEach((categoryBlock, index) => {
                const btn = categoryBlock.querySelector('.grid-button');
                const products = categoryBlock.querySelectorAll('.product-card');
                let countVisibleProducts = 0;

                products.forEach(product => {
                    const titleElement = product.querySelector('.product-title');
                    const descElement = product.querySelector('.product-description');

                    if (titleElement) {
                        const title = titleElement.innerText.toLowerCase();
                        const description = descElement ? descElement.innerText.toLowerCase() : '';

                        if (title.includes(query) || description.includes(query)) {
                            product.style.display = 'flex';
                            countVisibleProducts++;
                        } else {
                            product.style.display = 'none';
                        }
                    }
                });

                const accordionContent = categoryBlock.querySelector('.accordion-content');
                const icon = categoryBlock.querySelector('.indicator-dot');

                if (query.length > 0) {
                    if (countVisibleProducts > 0) {
                        // Cambiar temporalmente la estructura para visualización de búsqueda limpia
                        btn.style.display = 'flex';
                        btn.classList.add('active');
                        accordionContent.style.maxHeight = accordionContent.scrollHeight + "px";
                        icon.innerHTML = '<i class="fa-solid fa-chevron-up"></i>';
                    } else {
                        btn.style.display = 'none';
                        accordionContent.style.maxHeight = null;
                    }
                } else {
                    // Restaurar todo a su estado normal de cuadrícula por defecto
                    btn.style.display = 'flex';
                    btn.classList.remove('active');
                    accordionContent.style.maxHeight = null;
                    icon.innerHTML = '<i class="fa-solid fa-chevron-down"></i> Ver';
                }
            });
        }
    </script>
</body>

</html>
