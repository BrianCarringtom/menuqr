<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $user->name }} - Menú Digital</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,800;1,700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --bg-cream: #faf6f0;
            --mex-green: #006847;
            --mex-white: #ffffff;
            --mex-red: #ce1126;
            --text-dark: #2c2520;
            --text-muted: #70655e;
            --accent-gold: #f4b251;
            --accent-pink: #e03a83;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            background-color: var(--bg-cream);
            color: var(--text-dark);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* LOGO DE FONDO DIFUMINADO TIPO MARCA DE AGUA (ESTILO UNIVERSAL) */
        body::before {
            content: "";
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 280px;
            height: 280px;
            background: url("{{ $user->image ? asset('storage/' . $user->image) : 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?q=80&w=500&auto=format&fit=crop' }}");
            background-size: cover;
            background-position: center;
            border-radius: 50%;
            opacity: 0.04;
            z-index: -1;
            pointer-events: none;
        }

        /* DECORACIÓN ARTESANAL SUPERIOR (BANDERINES EN CSS) */
        .guirnalda {
            display: flex;
            justify-content: space-around;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            height: 18px;
            z-index: 10;
            overflow: hidden;
        }

        .banderin {
            width: 25px;
            height: 20px;
            clip-path: polygon(0% 0%, 100% 0%, 100% 100%, 50% 75%, 0% 100%);
            opacity: 0.85;
        }

        .banderin:nth-child(4n+1) {
            background-color: var(--mex-green);
        }

        .banderin:nth-child(4n+2) {
            background-color: var(--accent-gold);
        }

        .banderin:nth-child(4n+3) {
            background-color: var(--accent-pink);
        }

        .banderin:nth-child(4n+4) {
            background-color: var(--mex-red);
        }

        /* BRAND SECTION RE-ESTILIZADA */
        .brand-section {
            text-align: center;
            padding: 40px 20px 20px;
            position: relative;
        }

        .brand-title {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            font-weight: 800;
            color: var(--mex-green);
            line-height: 1.1;
            margin-bottom: 4px;
        }

        .brand-subtitle {
            font-size: 11px;
            color: var(--text-muted);
            letter-spacing: 4px;
            text-transform: uppercase;
            font-weight: 600;
        }

        /* BUSCADOR ESTILO LIMPIO */
        .search-box-container {
            padding: 0 20px 20px;
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
            background: #ffffff;
            border: 2px solid rgba(112, 101, 94, 0.15);
            padding: 14px 16px 14px 48px;
            border-radius: 30px;
            color: var(--text-dark);
            font-size: 16px;
            outline: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
            transition: all 0.3s ease;
        }

        .search-input:focus {
            border-color: var(--accent-gold);
            box-shadow: 0 6px 20px rgba(244, 178, 81, 0.15);
        }

        .menu-section-title {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            font-weight: 700;
            text-align: center;
            color: var(--mex-red);
            margin: 10px 0 20px;
            position: relative;
        }

        .menu-section-title::after {
            content: "❖";
            display: block;
            font-size: 12px;
            color: var(--accent-gold);
            margin-top: 2px;
        }

        /* CONTENEDOR EN GRID DE DOS EN DOS (2 COLUMNAS) */
        .categories-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
            padding: 0 20px 20px;
        }

        .category-block {
            background: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(70, 60, 50, 0.06);
            border: 1px solid rgba(112, 101, 94, 0.08);
            transition: transform 0.25s cubic-bezier(0.2, 0.8, 0.2, 1), box-shadow 0.25s ease;
        }

        .category-block.active-cat {
            border-color: var(--accent-gold);
            box-shadow: 0 10px 25px rgba(244, 178, 81, 0.15);
            transform: scale(0.97);
        }

        .grid-button {
            width: 100%;
            background: transparent;
            border: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 15px 10px;
            cursor: pointer;
            text-align: center;
        }

        .menu-image-container {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid var(--bg-cream);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.12);
            margin-bottom: 12px;
            position: relative;
        }

        .menu-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .category-title {
            font-family: 'Playfair Display', serif;
            font-size: 16px;
            font-weight: 700;
            color: var(--text-dark);
            line-height: 1.2;
            word-break: break-word;
        }

        /* CONTENEDOR DE PRODUCTOS UNIFICADO TRAS EL CLICK */
        .products-dropdown-container {
            grid-column: span 2;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0.25, 1, 0.5, 1);
        }

        .products-list {
            padding: 5px 2px 20px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        /* TARJETAS DE PRODUCTOS PREMIUM ESTILO MENÚ IMPRESO */
        .product-card {
            background-color: #ffffff;
            border-radius: 18px;
            padding: 14px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(112, 101, 94, 0.05);
            animation: fadeIn 0.3s ease forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .product-info {
            flex: 1;
            padding-right: 12px;
            text-align: left;
        }

        .product-title {
            font-family: 'Playfair Display', serif;
            font-size: 16px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 3px;
        }

        .product-description {
            font-size: 12px;
            color: var(--text-muted);
            line-height: 1.4;
        }

        .product-price-badge {
            background-color: #faf0f2;
            color: var(--mex-red);
            font-weight: 700;
            font-size: 15px;
            padding: 8px 14px;
            border-radius: 12px;
            white-space: nowrap;
            border: 1px dashed rgba(206, 17, 38, 0.2);
        }

        /* FOOTER ARTESANAL */
        .premium-footer {
            background: #ffffff;
            padding: 35px 20px 25px;
            border-top: 1px solid rgba(112, 101, 94, 0.1);
            display: flex;
            flex-direction: column;
            gap: 25px;
            margin-top: auto;
        }

        .footer-block {
            width: 100%;
        }

        .footer-title-block {
            font-family: 'Playfair Display', serif;
            font-size: 16px;
            color: var(--mex-green);
            font-weight: 700;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-title-block i {
            color: var(--mex-red);
        }

        .schedule-card {
            background: var(--bg-cream);
            border-radius: 14px;
            padding: 14px 16px;
            color: var(--text-dark);
            font-size: 13px;
            line-height: 1.6;
            border-left: 3px solid var(--accent-gold);
        }

        .map-container-premium {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            height: 150px;
            border: 1px solid rgba(0, 0, 0, 0.05);
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
            border-top: 1px solid rgba(112, 101, 94, 0.1);
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
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.4);
            text-decoration: none;
            transition: transform 0.3s ease;
        }

        .whatsapp-float:active {
            transform: scale(0.9);
        }
    </style>
</head>

<body>

    <div class="guirnalda">
        <div class="banderin"></div>
        <div class="banderin"></div>
        <div class="banderin"></div>
        <div class="banderin"></div>
        <div class="banderin"></div>
        <div class="banderin"></div>
        <div class="banderin"></div>
        <div class="banderin"></div>
        <div class="banderin"></div>
        <div class="banderin"></div>
        <div class="banderin"></div>
        <div class="banderin"></div>
        <div class="banderin"></div>
        <div class="banderin"></div>
        <div class="banderin"></div>
        <div class="banderin"></div>
    </div>

    <section class="brand-section">
        <h1 class="brand-title">{{ $user->name }}</h1>
        <p class="brand-subtitle">Menú Tradicional</p>
    </section>

    <div class="search-box-container">
        <div class="search-wrapper">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="input-busqueda" class="search-input" placeholder="¿Qué se te antoja hoy?..."
                oninput="buscarEnTiempoReal()">
        </div>
    </div>

    <h2 class="menu-section-title">Nuestra Carta</h2>

    <div class="categories-grid" id="menu-categorias">
        @forelse ($user->categories as $index => $category)

            <div class="category-block" id="cat-block-{{ $index }}">
                <button onclick="toggleMenu({{ $index }})" class="grid-button" id="btn-cat-{{ $index }}">
                    <div class="menu-image-container">
                        <img src="{{ $category->image ? asset('storage/' . $category->image) : 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=1200&auto=format&fit=crop' }}"
                            class="menu-image" alt="{{ $category->name }}">
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
                            No hay productos en esta categoría actualmente.
                        </p>
                    @endforelse
                </div>
            </div>

        @empty
            <div class="text-center" style="color: var(--text-muted); padding: 40px 20px; grid-column: span 2;">
                <p style="font-size: 15px;">Este negocio aún no tiene un menú cargado.</p>
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
            <h4 class="footer-title-block"><i class="fa-solid fa-location-dot"></i> Ubicación del Local</h4>
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

            // Cerrar otros dropdowns abiertos y resetear sus estilos visuales
            allContents.forEach((item, i) => {
                if (i !== index) {
                    item.style.maxHeight = null;
                    allBlocks[i].classList.remove('active-cat');
                }
            });

            // Manejar apertura/cierre dinámico con transiciones fluidas
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
                block.classList.remove('active-cat');
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
                block.classList.add('active-cat');

                // Hacer scroll sutil automático para centrar la categoría seleccionada
                setTimeout(() => {
                    block.scrollIntoView({
                        behavior: 'smooth',
                        block: 'nearest'
                    });
                }, 200);
            }
        }

        function buscarEnTiempoReal() {
            const query = document.getElementById('input-busqueda').value.toLowerCase();
            const categories = document.querySelectorAll('.category-block');
            const dropdowns = document.querySelectorAll('.products-dropdown-container');

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
