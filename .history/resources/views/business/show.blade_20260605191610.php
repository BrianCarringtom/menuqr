<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $user->name }} - Menú Tradicional</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Fuentes que emulan el estilo elegante y cursivo de imagen_2.jpg -->
    <link
        href="https://fonts.googleapis.com/css2?family=Lobster&family=Playfair+Display:ital,wght@0,700;1,700&family=Poppins:wght@400;600;700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --bg-crema: #fdf6ec;
            /* Fondo beige/crema idéntico a imagen_2.jpg */
            --rosa-mexicano: #e6007e;
            /* Rosa vibrante de los títulos */
            --verde-tradicional: #00a650;
            /* Verde brillante del título y chiles */
            --naranja-calido: #f37023;
            /* Naranja de los subtítulos */
            --amarillo-pedidos: #ffcb42;
            /* Amarillo del botón de pedidos */
            --texto-oscuro: #3a2512;
            /* Café oscuro rústico para textos generales */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            background-color: var(--bg-crema);
            color: var(--texto-oscuro);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            position: relative;
        }

        /* DISEÑO DE BANDERINES TRADICIONALES EN LA CABECERA (Inspirado en imagen_2.jpg) */
        .banderines-container {
            width: 100%;
            display: flex;
            justify-content: space-around;
            padding: 10px 5px 0;
            overflow: hidden;
            pointer-events: none;
        }

        .banderin {
            width: 32px;
            height: 38px;
            clip-path: polygon(0% 0%, 100% 0%, 100% 80%, 50% 100%, 0% 80%);
            opacity: 0.85;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 10px;
        }

        .b-verde {
            background-color: var(--verde-tradicional);
        }

        .b-rosa {
            background-color: var(--rosa-mexicano);
        }

        .b-naranja {
            background-color: var(--naranja-calido);
        }

        .b-amarillo {
            background-color: var(--amarillo-pedidos);
        }

        .b-morado {
            background-color: #8c52ff;
        }

        /* CABECERA ESTILO IMAGEN_2.JPG */
        .brand-section {
            text-align: center;
            padding: 15px 20px 25px;
            position: relative;
        }

        .brand-subtitle-top {
            font-family: 'Lobster', cursive;
            font-size: 42px;
            color: var(--verde-tradicional);
            line-height: 1;
            margin-bottom: -5px;
        }

        .brand-title {
            font-family: 'Lobster', cursive;
            font-size: 48px;
            color: var(--rosa-mexicano);
            line-height: 1.1;
            text-shadow: 1px 1px 0px #ffffff;
        }

        /* BUSCADOR ADAPTADO AL ESTILO TRADICIONAL */
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
            color: var(--texto-oscuro);
            opacity: 0.6;
            font-size: 16px;
        }

        .search-input {
            width: 100%;
            background: #ffffff;
            border: 2px dashed var(--naranja-calido);
            padding: 14px 16px 14px 46px;
            border-radius: 50px;
            color: var(--texto-oscuro);
            font-size: 16px;
            font-weight: 600;
            outline: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03);
        }

        /* SECCIÓN DE BOTÓN DE WHATSAPP / PEDIDOS ESTILO BANNER DE LA IMAGEN */
        .pedidos-banner {
            background-color: var(--amarillo-pedidos);
            color: var(--texto-oscuro);
            font-weight: 700;
            text-align: center;
            padding: 12px 20px;
            border-radius: 50px;
            margin: 0 20px 25px;
            font-size: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
            border: 2px solid #ffffff;
        }

        .menu-section-title {
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-size: 24px;
            font-weight: 700;
            text-align: center;
            color: var(--texto-oscuro);
            margin-bottom: 20px;
            position: relative;
        }

        .menu-section-title::after {
            content: "✦ ✦ ✦";
            display: block;
            font-size: 12px;
            color: var(--naranja-calido);
            letter-spacing: 4px;
            margin-top: 2px;
        }

        /* ESTRUCTURA DE 2 CATEGORÍAS POR FILA EN CELULAR */
        .categories-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
            padding: 0 20px 30px;
        }

        /* Permitimos que el contenido del acordeón rompa la rejilla ocupando ambas columnas */
        .category-block {
            display: contents;
        }

        /* BOTÓN DE CATEGORÍA TRADICIONAL */
        .accordion-button {
            background: #ffffff;
            border: 2px solid #ffffff;
            border-radius: 24px;
            padding: 16px 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            cursor: pointer;
            box-shadow: 0 6px 15px rgba(58, 37, 18, 0.06);
            transition: transform 0.2s, border-color 0.2s;
        }

        .accordion-button:active {
            transform: scale(0.95);
        }

        /* Colores dinámicos alternados por CSS para simular la variedad de la imagen */
        .category-block:nth-child(4n+1) .category-title {
            color: var(--rosa-mexicano);
        }

        .category-block:nth-child(4n+2) .category-title {
            color: var(--verde-tradicional);
        }

        .category-block:nth-child(4n+3) .category-title {
            color: var(--naranja-calido);
        }

        .category-block:nth-child(4n+4) .category-title {
            color: #8c52ff;
        }

        .category-block:nth-child(4n+1) .accordion-button.active {
            border-color: var(--rosa-mexicano);
        }

        .category-block:nth-child(4n+2) .accordion-button.active {
            border-color: var(--verde-tradicional);
        }

        .category-block:nth-child(4n+3) .accordion-button.active {
            border-color: var(--naranja-calido);
        }

        .category-block:nth-child(4n+4) .accordion-button.active {
            border-color: #8c52ff;
        }

        /* IMAGEN REDONDA EN LA CATEGORÍA CON MARCO DE COLOR VIBRANTE */
        .menu-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            border: 3px solid #ffffff;
        }

        .category-block:nth-child(4n+1) .menu-image {
            box-shadow: 0 0 0 3px var(--rosa-mexicano);
        }

        .category-block:nth-child(4n+2) .menu-image {
            box-shadow: 0 0 0 3px var(--verde-tradicional);
        }

        .category-block:nth-child(4n+3) .menu-image {
            box-shadow: 0 0 0 3px var(--naranja-calido);
        }

        .category-block:nth-child(4n+4) .menu-image {
            box-shadow: 0 0 0 3px #8c52ff;
        }

        .category-title {
            font-family: 'Lobster', cursive;
            font-size: 20px;
            font-weight: 400;
            line-height: 1.2;
            margin-top: 4px;
        }

        .view-more-text {
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--texto-oscuro);
            opacity: 0.5;
            margin-top: 6px;
        }

        /* CONTENIDO DESPLEGABLE EXPANDIDO A ANCHO COMPLETO (2 COLUMNAS) */
        .accordion-content {
            grid-column: span 2;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0.25, 1, 0.5, 1);
        }

        .products-list {
            padding: 10px 5px 20px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        /* TARJETAS DE PRODUCTOS: ESTILO LIMPIO CON PUNTOS DE PRECIO TIPO MENÚ TRADICIONAL */
        .product-card {
            background: #ffffff;
            border-radius: 18px;
            padding: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(58, 37, 18, 0.05);
        }

        .product-top-row {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            gap: 8px;
        }

        .product-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 17px;
            color: var(--texto-oscuro);
        }

        /* Efecto de puntos guía decorativos (como en el Pozole/Guarniciones de la imagen) */
        .product-dots {
            flex: 1;
            border-bottom: 2px dotted rgba(58, 37, 18, 0.2);
            margin: 0 4px;
            position: relative;
            top: -4px;
        }

        .product-price {
            font-family: 'Playfair Display', serif;
            font-size: 18px;
            font-weight: 700;
            color: var(--texto-oscuro);
        }

        .product-description {
            font-size: 12.5px;
            color: var(--texto-oscuro);
            opacity: 0.75;
            margin-top: 4px;
            line-height: 1.4;
        }

        /* FOOTER PREMIUM RE-ESTILIZADO TRADICIONAL */
        .premium-footer {
            background: #ffffff;
            padding: 35px 20px 25px;
            border-top: 3px solid var(--naranja-calido);
            display: flex;
            flex-direction: column;
            gap: 25px;
            margin-top: auto;
            border-radius: 24px 24px 0 0;
        }

        .footer-title-block {
            font-family: 'Playfair Display', serif;
            font-size: 16px;
            color: var(--texto-oscuro);
            font-weight: 700;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-title-block i {
            color: var(--rosa-mexicano);
        }

        .schedule-card {
            background: var(--bg-crema);
            border: 1px dashed var(--naranja-calido);
            border-radius: 14px;
            padding: 14px;
            color: var(--texto-oscuro);
            font-size: 13.5px;
            line-height: 1.6;
            font-weight: 500;
        }

        .map-container-premium {
            border-radius: 16px;
            overflow: hidden;
            border: 2px solid var(--bg-crema);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.06);
            height: 150px;
        }

        .map-container-premium iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        .copyright-section {
            text-align: center;
            font-size: 11px;
            color: var(--texto-oscuro);
            opacity: 0.6;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            padding-top: 20px;
        }

        /* BOTÓN DE WHATSAPP FLOTANTE ADAPTADO */
        .whatsapp-float {
            width: 54px;
            height: 54px;
            border-radius: 50%;
            background: var(--verde-tradicional);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 26px;
            position: fixed;
            right: 20px;
            bottom: 25px;
            z-index: 200;
            box-shadow: 0 6px 18px rgba(0, 166, 80, 0.4);
            text-decoration: none;
            transition: transform 0.2s;
            border: 2px solid white;
        }

        .whatsapp-float:active {
            transform: scale(0.9);
        }
    </style>
</head>

<body>

    <!-- Banderines Decorativos Superiores estilo imagen_2.jpg -->
    <div class="banderines-container">
        <div class="banderin b-verde"><i class="fa-solid fa-star"></i></div>
        <div class="banderin b-rosa"><i class="fa-solid fa-heart"></i></div>
        <div class="banderin b-naranja"><i class="fa-solid fa-utensils"></i></div>
        <div class="banderin b-amarillo"><i class="fa-solid fa-pepper-hot"></i></div>
        <div class="banderin b-morado"><i class="fa-solid fa-stroopwafel"></i></div>
        <div class="banderin b-verde"><i class="fa-solid fa-lemon"></i></div>
        <div class="banderin b-rosa"><i class="fa-solid fa-fire"></i></div>
    </div>

    <!-- Sección de Marca -->
    <section class="brand-section">
        <p class="brand-subtitle-top">Menú</p>
        <h1 class="brand-title">{{ $user->name }}</h1>
    </section>

    <!-- Botón directo de pedidos emulando el Banner Amarillo "Pedidos al..." de la imagen -->
    <a href="https://wa.me/{{ $user->whatsapp }}" target="_blank" class="pedidos-banner">
        <i class="fa-solid fa-phone"></i> Pedidos al: {{ $user->whatsapp }}
    </a>

    <!-- Barra de Búsqueda -->
    <div class="search-box-container">
        <div class="search-wrapper">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="input-busqueda" class="search-input" placeholder="¿Qué deseas ordenar hoy?..."
                oninput="buscarEnTiempoReal()">
        </div>
    </div>

    <h2 class="menu-section-title">Nuestras Especialidades</h2>

    <!-- Cuadrícula de 2 en 2 Categorías -->
    <div class="categories-grid" id="menu-categorias">
        @forelse ($user->categories as $index => $category)
            <div class="category-block">

                <!-- Botón / Celda de Categoría -->
                <button onclick="toggleMenu({{ $index }})" class="accordion-button"
                    id="btn-cat-{{ $index }}">
                    <img src="{{ $category->image ? asset('storage/' . $category->image) : 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=1200&auto=format&fit=crop' }}"
                        class="menu-image" alt="{{ $category->name }}">
                    <h3 class="category-title">{{ $category->name }}</h3>
                    <span id="icon-{{ $index }}" class="view-more-text">Ver opciones</span>
                </button>

                <!-- Desplegable que abarca las 2 columnas justo debajo de su fila -->
                <div id="content-{{ $index }}" class="accordion-content">
                    <div class="products-list">
                        @forelse ($category->products as $product)
                            <div class="product-card">
                                <div class="product-top-row">
                                    <h4 class="product-title">{{ $product->name }}</h4>
                                    <div class="product-dots"></div>
                                    <span class="product-price">${{ number_format($product->price, 2) }}</span>
                                </div>
                                <p class="product-description">{{ $product->description }}</p>
                            </div>
                        @empty
                            <div class="product-card"
                                style="text-align: center; background: transparent; border-style: dashed;">
                                <p style="font-size: 13px; opacity: 0.7;">Próximamente más delicias en esta sección.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>
        @empty
            <div style="grid-column: span 2; text-align: center; padding: 40px 20px; opacity: 0.7;">
                <p>El menú se encuentra en actualización. ¡Vuelve pronto!</p>
            </div>
        @endforelse
    </div>

    <!-- Footer -->
    <footer class="premium-footer">
        <div>
            <h4 class="footer-title-block"><i class="fa-solid fa-calendar-days"></i> Horarios de Atención</h4>
            <div class="schedule-card">
                {!! nl2br(e($user->schedule)) !!}
            </div>
        </div>

        <div>
            <h4 class="footer-title-block"><i class="fa-solid fa-map-location-dot"></i> Nuestra Ubicación</h4>
            <div class="map-container-premium">
                <iframe src="{{ $user->map_url }}" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <div class="copyright-section">
            <p>© {{ date('Y') }} {{ $user->name }}. Tradición y Sabor.</p>
        </div>
    </footer>

    <!-- Botón de WhatsApp Extra -->
    <a href="https://wa.me/{{ $user->whatsapp }}" target="_blank" class="whatsapp-float">
        <i class="fab fa-whatsapp"></i>
    </a>

    <script>
        function toggleMenu(index) {
            const content = document.getElementById(`content-${index}`);
            const icon = document.getElementById(`icon-${index}`);
            const button = document.getElementById(`btn-cat-${index}`);

            const allContents = document.querySelectorAll(".accordion-content");
            const allIcons = document.querySelectorAll(".view-more-text");
            const allButtons = document.querySelectorAll(".accordion-button");

            allContents.forEach((item, i) => {
                if (i !== index) {
                    item.style.maxHeight = null;
                    allIcons[i].innerText = "Ver opciones";
                    allButtons[i].classList.remove("active");
                }
            });

            if (content.style.maxHeight) {
                content.style.maxHeight = null;
                icon.innerText = "Ver opciones";
                button.classList.remove("active");
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
                icon.innerText = "Ocultar";
                button.classList.add("active");

                setTimeout(() => {
                    button.scrollIntoView({
                        behavior: 'smooth',
                        block: 'nearest'
                    });
                }, 250);
            }
        }

        function buscarEnTiempoReal() {
            const query = document.getElementById('input-busqueda').value.toLowerCase();
            const categories = document.querySelectorAll('.category-block');

            categories.forEach(categoryBlock => {
                const btn = categoryBlock.querySelector('.accordion-button');
                const products = categoryBlock.querySelectorAll('.product-card');
                let countVisibleProducts = 0;

                products.forEach(product => {
                    const title = product.querySelector('.product-title').innerText.toLowerCase();
                    const description = product.querySelector('.product-description').innerText
                    .toLowerCase();

                    if (title.includes(query) || description.includes(query)) {
                        product.style.display = 'block';
                        countVisibleProducts++;
                    } else {
                        product.style.display = 'none';
                    }
                });

                const accordionContent = categoryBlock.querySelector('.accordion-content');
                const accordionIcon = categoryBlock.querySelector('.view-more-text');

                if (query.length > 0) {
                    if (countVisibleProducts > 0) {
                        categoryBlock.style.display = 'block';
                        btn.style.display = 'flex';
                        btn.classList.add('active');
                        accordionContent.style.maxHeight = accordionContent.scrollHeight + "px";
                        accordionIcon.innerText = "Ocultar";
                    } else {
                        btn.style.display = 'none';
                        accordionContent.style.maxHeight = null;
                    }
                } else {
                    categoryBlock.style.display = 'block';
                    btn.style.display = 'flex';
                    btn.classList.remove('active');
                    accordionContent.style.maxHeight = null;
                    accordionIcon.innerText = "Ver opciones";
                }
            });
        }
    </script>
</body>

</html>
