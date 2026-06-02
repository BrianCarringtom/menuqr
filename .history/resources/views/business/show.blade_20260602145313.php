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
            /* Color base ultra oscuro mientras carga la imagen */
            color: var(--text-main);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            position: relative;
        }

        /* CAPA DE FONDO FIJO PREMIUM: Imagen estable en el fondo del celular sin estirarse */
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

        /* Branding / Identidad del local con espacio elegante al inicio */
        .brand-section {
            text-align: center;
            padding: 15px 20px 25px;
            margin-top: 80px;
            margin-bottom: 70px;
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

        /* BARRA DE BÚSQUEDA INTERACTIVA (SIN ZOOM INESTABLE) */
        .search-box-container {
            padding: 0 20px 25px;
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
            /* Clave: Al ser 16px o más, iOS y Android no fuerzan zoom visual */
            outline: none;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            background: rgba(255, 255, 255, 0.12);
            border-color: var(--accent-orange);
        }

        /* Sección del menú general */
        .menu-section-title {
            font-size: 22px;
            font-weight: 600;
            padding: 0 20px;
            margin-bottom: 18px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        /* Bloques de Categorías (Acordeones estilizados) */
        .category-block {
            margin-bottom: 14px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            padding-bottom: 12px;
        }

        .accordion-button {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: transparent;
            border: none;
            color: white;
            padding: 10px 20px;
            cursor: pointer;
            text-align: left;
        }

        .category-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .menu-image {
            width: 58px;
            height: 58px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.03);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
            flex-shrink: 0;
            transition: transform 0.3s ease, border-color 0.3s ease;
        }

        .accordion-button:hover .menu-image {
            transform: scale(1.05);
            border-color: var(--accent-orange);
        }

        .category-title {
            font-size: 20px;
            font-weight: 600;
            color: var(--text-main);
            letter-spacing: 0.5px;
            transition: color 0.3s ease;
        }

        .accordion-button:hover .category-title {
            color: var(--accent-orange);
        }

        .accordion-icon {
            font-size: 24px;
            color: var(--accent-orange);
            font-weight: 300;
            transition: transform 0.3s ease;
        }

        /* Contenido desplegable */
        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0.25, 1, 0.5, 1);
        }

        .products-list {
            padding: 15px 16px 20px;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        /* Tarjetas de productos premium */
        .product-card {
            background-color: var(--card-bg);
            border-radius: 24px;
            padding: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #1c1c1e;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            transition: transform 0.2s ease;
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
            font-size: 11.5px;
            color: #555560;
            line-height: 1.4;
            margin-bottom: 12px;
        }

        .product-price {
            font-size: 19px;
            font-weight: 700;
            color: var(--price-pink);
        }

        /* FOOTER PREMIUM INTEGRADO */
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
            filter: none;
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

    <h2 class="menu-section-title">LO QUE OFRECEMOS</h2>

    <div id="menu-categorias">
        @forelse ($user->categories as $index => $category)
            <div class="category-block">

                <button onclick="toggleMenu({{ $index }})" class="accordion-button"
                    id="btn-cat-{{ $index }}">
                    <div class="category-left">
                        <img src="{{ $category->image ? asset('storage/' . $category->image) : 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=1200&auto=format&fit=crop' }}"
                            class="menu-image" alt="{{ $category->name }}">
                        <h2 class="category-title">{{ $category->name }}</h2>
                    </div>
                    <span id="icon-{{ $index }}" class="accordion-icon">+</span>
                </button>

                <div id="content-{{ $index }}" class="accordion-content">
                    <div class="products-list">
                        @forelse ($category->products as $product)
                            <div class="product-card">
                                <div class="product-info">
                                    <h3 class="product-title">{{ $product->name }}</h3>
                                    <p class="product-description">{{ $product->description }}</p>
                                    <span class="product-price">${{ number_format($product->price, 2) }}</span>
                                </div>
                            </div>
                        @empty
                            <p style="color: var(--text-muted); font-size: 13px; text-align: center; padding: 15px;">
                                No hay productos en esta categoría actualmente.
                            </p>
                        @endforelse
                    </div>
                </div>

            </div>
        @empty
            <div class="text-center" style="color: var(--text-muted); padding: 40px 20px;">
                <p class="text-xl">Este negocio aún no tiene un menú cargado.</p>
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
        function toggleMenu(index) {
            const content = document.getElementById(`content-${index}`);
            const icon = document.getElementById(`icon-${index}`);
            const allContents = document.querySelectorAll(".accordion-content");
            const allIcons = document.querySelectorAll(".accordion-icon");

            allContents.forEach((item, i) => {
                if (i !== index) {
                    item.style.maxHeight = null;
                    allIcons[i].innerText = "+";
                }
            });

            if (content.style.maxHeight) {
                content.style.maxHeight = null;
                icon.innerText = "+";
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
                icon.innerText = "−";
            }
        }

        function buscarEnTiempoReal() {
            const query = document.getElementById('input-busqueda').value.toLowerCase();
            const categories = document.querySelectorAll('.category-block');

            categories.forEach(categoryBlock => {
                const products = categoryBlock.querySelectorAll('.product-card');
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

                const accordionContent = categoryBlock.querySelector('.accordion-content');
                const accordionIcon = categoryBlock.querySelector('.accordion-icon');

                if (query.length > 0) {
                    if (countVisibleProducts > 0) {
                        categoryBlock.style.display = 'block';
                        accordionContent.style.maxHeight = accordionContent.scrollHeight + "px";
                        accordionIcon.innerText = "−";
                    } else {
                        categoryBlock.style.display = 'none';
                    }
                } else {
                    categoryBlock.style.display = 'block';
                    accordionContent.style.maxHeight = null;
                    accordionIcon.innerText = "+";
                }
            });
        }
    </script>
</body>

</html>
