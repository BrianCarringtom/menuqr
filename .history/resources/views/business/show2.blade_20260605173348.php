<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $user->name }} - Catálogo Digital</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Importamos Playfair Display y Montserrat para emular el estilo tipográfico de la imagen -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,600;0,700;1,700&family=Playfair+Display:ital,wght@0,700;1,700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --brand-blue: #1e3d8f;
            /* Azul marino de la parte superior de imagen_2.jpg */
            --brand-red: #d1242a;
            /* Rojo vibrante de los acentos en imagen_2.jpg */
            --bg-clean: #fcfcfc;
            /* Blanco limpio de fondo */
            --text-dark: #111111;
            /* Negro sólido para títulos de productos */
            --text-muted: #555555;
            /* Gris oscuro para descripciones legibles */
            --font-serif: 'Playfair Display', Georgia, serif;
            --font-sans: 'Montserrat', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: var(--font-sans);
            -webkit-tap-highlight-color: transparent;
        }

        body {
            background-color: var(--bg-clean);
            color: var(--text-dark);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* HEADER PREMIUM - Inspirado directamente en el esquema superior de imagen_2.jpg */
        .brand-section {
            text-align: center;
            padding: 50px 20px 60px;
            background: var(--brand-blue);
            position: relative;
            color: #ffffff;
            border-bottom: 8px solid var(--brand-red);
        }

        /* Forma diagonal decorativa que rompe la estructura tradicional */
        .brand-section::after {
            content: "";
            position: absolute;
            bottom: -30px;
            left: 0;
            width: 100%;
            height: 40px;
            background: var(--brand-red);
            transform: skewY(-2deg);
            z-index: 1;
        }

        .brand-title {
            font-family: var(--font-serif);
            font-size: 42px;
            font-weight: 700;
            font-style: italic;
            color: #ffffff;
            line-height: 1.1;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .brand-subtitle {
            font-size: 13px;
            font-weight: 600;
            color: #ffffff;
            letter-spacing: 2px;
            text-transform: uppercase;
            opacity: 0.9;
        }

        /* BUSCADOR INTERACTIVO COLOCOADO EN LA ZONA DE TRANSICIÓN */
        .search-box-container {
            padding: 0 20px;
            margin-top: -22px;
            position: relative;
            z-index: 10;
            max-width: 500px;
            width: 100%;
            align-self: center;
        }

        .search-wrapper {
            position: relative;
            width: 100%;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            border-radius: 30px;
        }

        .search-wrapper i {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--brand-blue);
            font-size: 16px;
        }

        .search-input {
            width: 100%;
            background: #ffffff;
            border: 3px solid var(--brand-blue);
            padding: 14px 16px 14px 50px;
            border-radius: 30px;
            color: var(--text-dark);
            font-size: 16px;
            font-weight: 600;
            outline: none;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            border-color: var(--brand-red);
        }

        /* SECCIÓN GENERAL */
        .menu-section-title {
            font-family: var(--font-serif);
            font-size: 24px;
            font-weight: 700;
            font-style: italic;
            color: var(--brand-blue);
            text-align: center;
            margin: 50px 20px 25px;
            position: relative;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .menu-section-title::after {
            content: "";
            display: block;
            width: 50px;
            height: 3px;
            background: var(--brand-red);
            margin: 8px auto 0;
        }

        /* NUEVA ESTRUCTURA: ACORDEONES FLUIDOS SIN CONTENEDORES APILADOS */
        #menu-categorias {
            max-width: 650px;
            width: 100%;
            margin: 0 auto 50px;
            padding: 0 20px;
        }

        .category-block {
            margin-bottom: 18px;
            background: #ffffff;
            border-left: 6px solid var(--brand-blue);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .category-block:focus-within,
        .category-block:hover {
            border-left-color: var(--brand-red);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        }

        .accordion-button {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: transparent;
            border: none;
            color: var(--text-dark);
            padding: 16px 20px;
            cursor: pointer;
            text-align: left;
        }

        .category-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .menu-image {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid var(--brand-blue);
            flex-shrink: 0;
        }

        .category-title {
            font-family: var(--font-serif);
            font-size: 20px;
            font-weight: 700;
            color: var(--brand-blue);
        }

        .accordion-icon {
            font-size: 22px;
            color: var(--brand-red);
            font-weight: 700;
        }

        /* CONTENIDO DESPLEGABLE */
        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0.25, 1, 0.5, 1);
            background: #fafafa;
        }

        .products-list {
            padding: 10px 20px 25px;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        /* TARJETAS DE PRODUCTOS: DISEÑO ASIMÉTRICO (Inspirado en la limpieza de imagen_2.jpg) */
        .product-card {
            background-color: #ffffff;
            border: 1px solid #eef0f5;
            padding: 18px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            position: relative;
            transition: transform 0.2s ease;
        }

        .product-card::before {
            content: "";
            position: absolute;
            left: 0;
            top: 15%;
            height: 70%;
            width: 3px;
            background: var(--brand-red);
            opacity: 0;
            transition: opacity 0.2s;
        }

        .product-card:hover::before {
            opacity: 1;
        }

        .product-info {
            flex: 1;
            padding-right: 20px;
        }

        .product-title {
            font-family: var(--font-sans);
            font-size: 16px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 4px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .product-description {
            font-size: 13px;
            color: var(--text-muted);
            line-height: 1.5;
        }

        /* Contenedor del precio alineado a la derecha con el estilo limpio de la imagen */
        .product-price {
            font-family: var(--font-serif);
            font-size: 20px;
            font-weight: 700;
            font-style: italic;
            color: var(--brand-blue);
            white-space: nowrap;
            background: rgba(30, 61, 143, 0.06);
            padding: 4px 10px;
            border-radius: 4px;
        }

        /* FOOTER ESTILO BANNER - Emulando la franja roja inferior de imagen_2.jpg */
        .premium-footer {
            background: var(--brand-blue);
            color: #ffffff;
            padding: 45px 20px 30px;
            display: flex;
            flex-direction: column;
            gap: 35px;
            margin-top: auto;
            position: relative;
            border-top: 6px solid var(--brand-red);
        }

        .footer-block {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        .footer-title-block {
            font-family: var(--font-serif);
            font-size: 18px;
            font-style: italic;
            color: #ffffff;
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            letter-spacing: 0.5px;
        }

        .footer-title-block i {
            color: #ffffff;
            background: var(--brand-red);
            padding: 8px;
            border-radius: 6px;
            font-size: 14px;
        }

        .schedule-card {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 16px;
            color: #ffffff;
            font-size: 14px;
            line-height: 1.6;
            font-weight: 400;
        }

        .map-container-premium {
            border-radius: 8px;
            overflow: hidden;
            border: 3px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            height: 170px;
        }

        .map-container-premium iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        .copyright-section {
            text-align: center;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.6);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 25px;
        }

        /* BOTÓN DE WHATSAPP FLOTANTE ADAPTADO */
        .whatsapp-float {
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
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
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
        <p class="brand-subtitle">Catálogo Digital</p>
    </section>

    <div class="search-box-container">
        <div class="search-wrapper">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="input-busqueda" class="search-input" placeholder="¿Qué estás buscando hoy?..."
                oninput="buscarEnTiempoReal()">
        </div>
    </div>

    <h2 class="menu-section-title">Explorar Opciones</h2>

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
                                </div>
                                <span class="product-price">${{ number_format($product->price, 2) }}</span>
                            </div>
                        @empty
                            <p style="color: var(--text-muted); font-size: 13px; text-align: center; padding: 15px;">
                                No hay elementos disponibles en esta categoría actualmente.
                            </p>
                        @endforelse
                    </div>
                </div>

            </div>
        @empty
            <div class="text-center" style="color: var(--text-muted); padding: 40px 20px;">
                <p class="text-xl">No hay categorías ni elementos cargados por el momento.</p>
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
