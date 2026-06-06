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
            --bg-main: #f8fafc;
            --card-bg: #ffffff;
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --accent-color: #3b82f6;
            /* Azul moderno universal */
            --border-color: #e2e8f0;
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
            color: var(--text-dark);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* LOGO DE FONDO COMO MARCA DE AGUA CENTRADA UNIVERSAL */
        body::before {
            content: "";
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            height: 300px;
            background: url("{{ $user->image ? asset('storage/' . $user->image) : 'https://images.unsplash.com/photo-1557683316-973673baf926?q=80&w=500&auto=format&fit=crop' }}");
            background-size: cover;
            background-position: center;
            border-radius: 50%;
            opacity: 0.03;
            z-index: -1;
            pointer-events: none;
        }

        /* BRAND SECTION NEUTRA Y ELEGANTE */
        .brand-section {
            text-align: center;
            padding: 40px 20px 20px;
        }

        .brand-title {
            font-size: 32px;
            font-weight: 700;
            color: var(--text-dark);
            line-height: 1.2;
            margin-bottom: 6px;
        }

        .brand-subtitle {
            font-size: 12px;
            color: var(--text-muted);
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 500;
        }

        /* BUSCADOR INTELIGENTE */
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
            color: var(--text-muted);
            font-size: 16px;
        }

        .search-input {
            width: 100%;
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            padding: 14px 16px 14px 48px;
            border-radius: 16px;
            color: var(--text-dark);
            font-size: 16px;
            outline: none;
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.03);
            transition: all 0.3s ease;
        }

        .search-input:focus {
            border-color: var(--accent-color);
            box-shadow: 0 4px 20px rgba(59, 130, 246, 0.12);
        }

        /* CONTENEDOR EN REPETICIÓN ESTRICTA DE 2 EN 2 POR FILA */
        .categories-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            padding: 0 20px 25px;
        }

        .category-block {
            background: var(--card-bg);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.04);
            border: 1px solid var(--border-color);
            transition: transform 0.2s ease, border-color 0.2s ease;
        }

        .category-block.active-cat {
            border-color: var(--accent-color);
            transform: scale(0.96);
        }

        .grid-button {
            width: 100%;
            background: transparent;
            border: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 12px;
            cursor: pointer;
            text-align: center;
        }

        .category-image-wrapper {
            width: 75px;
            height: 75px;
            border-radius: 16px;
            overflow: hidden;
            margin-bottom: 12px;
            border: 1px solid var(--border-color);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .category-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .category-title {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-dark);
            line-height: 1.3;
            word-break: break-word;
        }

        /* CONTENEDOR DESPLEGABLE QUE OCUPA LAS 2 COLUMNAS AUTOMÁTICAMENTE */
        .products-dropdown-container {
            grid-column: span 2;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0.25, 1, 0.5, 1);
        }

        .products-list {
            padding: 4px 2px 16px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        /* TARJETAS DE PRODUCTOS / SERVICIOS UNIVERSALES */
        .product-card {
            background-color: var(--card-bg);
            border-radius: 16px;
            padding: 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 8px rgba(15, 23, 42, 0.02);
            border: 1px solid var(--border-color);
            animation: fadeIn 0.3s ease-out forwards;
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

        .product-info {
            flex: 1;
            padding-right: 16px;
            text-align: left;
        }

        .product-title {
            font-size: 15px;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 4px;
        }

        .product-description {
            font-size: 12px;
            color: var(--text-muted);
            line-height: 1.4;
        }

        .product-price-badge {
            background-color: #eff6ff;
            color: var(--accent-color);
            font-weight: 600;
            font-size: 14px;
            padding: 8px 14px;
            border-radius: 10px;
            white-space: nowrap;
        }

        /* SECCIÓN DE INFORMACIÓN DEL NEGOCIO (FOOTER) */
        .premium-footer {
            background: var(--card-bg);
            padding: 35px 20px 25px;
            border-top: 1px solid var(--border-color);
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
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-title-block i {
            color: var(--accent-color);
        }

        .schedule-card {
            background: var(--bg-main);
            border-radius: 12px;
            padding: 14px 16px;
            color: var(--text-dark);
            font-size: 13px;
            line-height: 1.6;
            border-left: 3px solid var(--accent-color);
        }

        .map-container-premium {
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
            height: 150px;
            border: 1px solid var(--border-color);
        }

        .map-container-premium iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        .copyright-section {
            text-align: center;
            font-size: 11px;
            color: var(--text-muted);
            border-top: 1px solid var(--border-color);
            padding-top: 20px;
        }

        /* BOTÓN FLOTANTE WHATSAPP */
        .whatsapp-float {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: #25D366;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            position: fixed;
            right: 20px;
            bottom: 25px;
            z-index: 200;
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.3);
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
        <h1 class="brand-title">{{ $user->name }}</h1>
        <p class="brand-subtitle">Catálogo de Productos</p>
    </section>

    <div class="search-box-container">
        <div class="search-wrapper">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="input-busqueda" class="search-input" placeholder="Buscar..."
                oninput="buscarEnTiempoReal()">
        </div>
    </div>

    <div class="categories-grid" id="menu-categorias">
        @forelse ($user->categories as $index => $category)

            <div class="category-block" id="cat-block-{{ $index }}">
                <button onclick="toggleMenu({{ $index }})" class="grid-button" id="btn-cat-{{ $index }}">
                    <div class="category-image-wrapper">
                        <img src="{{ $category->image ? asset('storage/' . $category->image) : 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=1200&auto=format&fit=crop' }}"
                            class="category-image" alt="{{ $category->name }}">
                    </div>
                    <h3 class="category-title">{{ $category->name }}</h3>
                </button>
            </div>

            <div id="content-{{ $index }}" class="products-dropdown-container">
                <div class="products-list">
                    @forelse ($category->products as $product)
                        <div class="product-card">
                            <div class="product-info">
                                <h4 class="product-title">{{ $product->name }}</h4>
                                <p class="product-description">{{ $product->description }}</p>
                            </div>
                            <div class="product-price-badge">
                                ${{ number_format($product->price, 2) }}
                            </div>
                        </div>
                    @empty
                        <p
                            style="color: var(--text-muted); font-size: 13px; text-align: center; padding: 15px; background: white; border-radius: 14px;">
                            No hay registros disponibles en esta categoría.
                        </p>
                    @endforelse
                </div>
            </div>

        @empty
            <div class="text-center" style="color: var(--text-muted); padding: 40px 20px; grid-column: span 2;">
                <p style="font-size: 14px;">No hay datos cargados actualmente.</p>
            </div>
        @endforelse
    </div>

    <footer class="premium-footer">
        <div class="footer-block">
            <h4 class="footer-title-block"><i class="fa-solid fa-clock"></i> Horarios disponibles</h4>
            <div class="schedule-card">
                {!! nl2br(e($user->schedule)) !!}
            </div>
        </div>

        <div class="footer-block">
            <h4 class="footer-title-block"><i class="fa-solid fa-location-dot"></i> Dirección y Ubicación</h4>
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
        function toggleMenu(index) {
            const content = document.getElementById(`content-${index}`);
            const block = document.getElementById(`cat-block-${index}`);
            const allContents = document.querySelectorAll(".products-dropdown-container");
            const allBlocks = document.querySelectorAll(".category-block");

            allContents.forEach((item, i) => {
                if (i !== index) {
                    item.style.maxHeight = null;
                    allBlocks[i].classList.remove('active-cat');
                }
            });

            if (content.style.maxHeight) {
                content.style.maxHeight = null;
                block.classList.remove('active-cat');
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
                block.classList.add('active-cat');

                setTimeout(() => {
                    block.scrollIntoView({
                        behavior: 'smooth',
                        block: 'nearest'
                    });
                }, 250);
            }
        }

        function buscarEnTiempoReal() {
            const query = document.getElementById('input-busqueda').value.toLowerCase();
            const categories = document.querySelectorAll('.category-block');

            categories.forEach((categoryBlock, index) => {
                const associatedDropdown = document.getElementById(`content-${index}`);
                const products = associatedDropdown.querySelectorAll('.product-card');
                let countVisibleProducts = 0;

                products.forEach(product => {
                    const title = product.querySelector('.product-title').innerText.toLowerCase();
                    const description = product.querySelector('.product-description').innerText
                    .toLowerCase();

                    if (title.includes(query) || description.includes(query)) {
                        product.style.display = 'flex';
                        countVisibleProducts++;
                    } else {
                        product.style.display = 'none';
                    }
                });

                if (query.length > 0) {
                    if (countVisibleProducts > 0) {
                        categoryBlock.style.display = 'block';
                        categoryBlock.classList.add('active-cat');
                        associatedDropdown.style.maxHeight = associatedDropdown.scrollHeight + "px";
                    } else {
                        categoryBlock.style.display = 'none';
                        categoryBlock.classList.remove('active-cat');
                        associatedDropdown.style.maxHeight = null;
                    }
                } else {
                    categoryBlock.style.display = 'block';
                    categoryBlock.classList.remove('active-cat');
                    associatedDropdown.style.maxHeight = null;
                }
            });
        }
    </script>
</body>

</html>
