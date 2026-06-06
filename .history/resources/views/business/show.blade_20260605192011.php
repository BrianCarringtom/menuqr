<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $user->name }} - Catálogo Tradicional</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Fuentes estilo elegante y cursivo de imagen_2.jpg -->
    <link
        href="https://fonts.googleapis.com/css2?family=Lobster&family=Playfair+Display:ital,wght@0,700;1,700&family=Poppins:wght@400;600;700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --bg-crema: #fdf6ec;
            /* Fondo beige/crema de imagen_2.jpg */
            --rosa-mexicano: #e6007e;
            /* Rosa vibrante */
            --verde-tradicional: #00a650;
            /* Verde brillante */
            --naranja-calido: #f37023;
            /* Naranja */
            --amarillo-pedidos: #ffcb42;
            --texto-oscuro: #3a2512;
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
        }

        /* BANDERINES DE LA IMAGEN_2.JPG */
        .banderines-container {
            width: 100%;
            display: flex;
            justify-content: space-around;
            padding: 10px 5px 0;
            overflow: hidden;
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

        .brand-section {
            text-align: center;
            padding: 25px 20px 30px;
        }

        .brand-title {
            font-family: 'Lobster', cursive;
            font-size: 46px;
            color: var(--rosa-mexicano);
            line-height: 1.1;
        }

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
        }

        .search-input {
            width: 100%;
            background: #ffffff;
            border: 2px dashed var(--naranja-calido);
            padding: 14px 16px 14px 46px;
            border-radius: 50px;
            color: var(--texto-oscuro);
            font-size: 16px;
            outline: none;
        }

        .menu-section-title {
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-size: 24px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 20px;
        }

        .menu-section-title::after {
            content: "✦ ✦ ✦";
            display: block;
            font-size: 12px;
            color: var(--naranja-calido);
            margin-top: 2px;
        }

        /* REJILLA CORREGIDA: Fuerza estrictamente 2 columnas en celular */
        .categories-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr) !important;
            gap: 12px;
            padding: 0 15px 30px;
            width: 100%;
        }

        /* BOTÓN DE CATEGORÍA TRADICIONAL */
        .accordion-button {
            background: #ffffff;
            border: 2px solid #ffffff;
            border-radius: 24px;
            padding: 16px 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(58, 37, 18, 0.05);
            width: 100%;
            /* Ocupa exactamente su celda de la mitad de la pantalla */
        }

        /* Colores alternados basados en la posición del botón */
        .accordion-button:nth-child(4n+1) .category-title {
            color: var(--rosa-mexicano);
        }

        .accordion-button:nth-child(4n+2) .category-title {
            color: var(--verde-tradicional);
        }

        .accordion-button:nth-child(4n+3) .category-title {
            color: var(--naranja-calido);
        }

        .accordion-button:nth-child(4n+4) .category-title {
            color: #8c52ff;
        }

        .accordion-button:nth-child(4n+1).active {
            border-color: var(--rosa-mexicano);
        }

        .accordion-button:nth-child(4n+2).active {
            border-color: var(--verde-tradicional);
        }

        .accordion-button:nth-child(4n+3).active {
            border-color: var(--naranja-calido);
        }

        .accordion-button:nth-child(4n+4).active {
            border-color: #8c52ff;
        }

        .menu-image {
            width: 75px;
            height: 75px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 10px;
            border: 3px solid #ffffff;
        }

        .accordion-button:nth-child(4n+1) .menu-image {
            box-shadow: 0 0 0 3px var(--rosa-mexicano);
        }

        .accordion-button:nth-child(4n+2) .menu-image {
            box-shadow: 0 0 0 3px var(--verde-tradicional);
        }

        .accordion-button:nth-child(4n+3) .menu-image {
            box-shadow: 0 0 0 3px var(--naranja-calido);
        }

        .accordion-button:nth-child(4n+4) .menu-image {
            box-shadow: 0 0 0 3px #8c52ff;
        }

        .category-title {
            font-family: 'Lobster', cursive;
            font-size: 19px;
            line-height: 1.2;
        }

        .view-more-text {
            font-size: 11px;
            font-weight: 600;
            opacity: 0.5;
            margin-top: 6px;
        }

        /* CONTENIDO DESPLEGABLE: Ocupa las 2 columnas completas cuando se abre */
        .accordion-content {
            grid-column: span 2;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
            width: 100%;
        }

        .products-list {
            padding: 5px 0 15px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .product-card {
            background: #ffffff;
            border-radius: 18px;
            padding: 14px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.02);
            border: 1px solid rgba(58, 37, 18, 0.05);
        }

        .product-top-row {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
        }

        .product-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 16px;
        }

        .product-dots {
            flex: 1;
            border-bottom: 2px dotted rgba(58, 37, 18, 0.2);
            margin: 0 6px;
            position: relative;
            top: -4px;
        }

        .product-price {
            font-family: 'Playfair Display', serif;
            font-size: 17px;
            font-weight: 700;
        }

        .product-description {
            font-size: 12px;
            opacity: 0.75;
            margin-top: 4px;
            line-height: 1.4;
        }

        /* FOOTER PRESTIGIO TRADICIONAL */
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
            font-size: 13.5px;
        }

        .map-container-premium {
            border-radius: 16px;
            overflow: hidden;
            height: 150px;
            border: 2px solid var(--bg-crema);
        }

        .map-container-premium iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        .copyright-section {
            text-align: center;
            font-size: 11px;
            opacity: 0.6;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            padding-top: 20px;
        }

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
            border: 2px solid white;
        }
    </style>
</head>

<body>

    <!-- Banderines -->
    <div class="banderines-container">
        <div class="banderin b-verde"><i class="fa-solid fa-star"></i></div>
        <div class="banderin b-rosa"><i class="fa-solid fa-heart"></i></div>
        <div class="banderin b-naranja"><i class="fa-solid fa-utensils"></i></div>
        <div class="banderin b-amarillo"><i class="fa-solid fa-pepper-hot"></i></div>
        <div class="banderin b-morado"><i class="fa-solid fa-stroopwafel"></i></div>
        <div class="banderin b-verde"><i class="fa-solid fa-lemon"></i></div>
        <div class="banderin b-rosa"><i class="fa-solid fa-fire"></i></div>
    </div>

    <!-- Nombre de la marca -->
    <section class="brand-section">
        <h1 class="brand-title">{{ $user->name }}</h1>
    </section>

    <!-- Buscador -->
    <div class="search-box-container">
        <div class="search-wrapper">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="input-busqueda" class="search-input" placeholder="Buscar categoría o producto..."
                oninput="buscarEnTiempoReal()">
        </div>
    </div>

    <h2 class="menu-section-title">Nuestras Especialidades</h2>

    <!-- Contenedor GRID limpio de 2 columnas -->
    <div class="categories-grid" id="menu-categorias">
        @forelse ($user->categories as $index => $category)

            <!-- El Botón es un elemento directo del Grid (Ocupa 1 celda, van de 2 en 2) -->
            <button onclick="toggleMenu({{ $index }}, this)" class="accordion-button"
                data-search-name="{{ strtolower($category->name) }}">
                <img src="{{ $category->image ? asset('storage/' . $category->image) : 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=1200&auto=format&fit=crop' }}"
                    class="menu-image" alt="{{ $category->name }}">
                <h3 class="category-title">{{ $category->name }}</h3>
                <span class="view-more-text">Ver opciones</span>
            </button>

            <!-- El Desplegable se rompe a ancho completo de 2 columnas justo abajo -->
            <div id="content-{{ $index }}" class="accordion-content">
                <div class="products-list">
                    @forelse ($category->products as $product)
                        <div class="product-card"
                            data-product-info="{{ strtolower($product->name . ' ' . $product->description) }}">
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
                            <p style="font-size: 12px; opacity: 0.7;">Próximamente más opciones.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        @empty
            <div style="grid-column: span 2; text-align: center; padding: 40px 20px; opacity: 0.7;">
                <p>El catálogo se encuentra en actualización.</p>
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
                <iframe src="{{ $user->map_url }}" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>

        <div class="copyright-section">
            <p>© {{ date('Y') }} {{ $user->name }}. Calidad y Tradición.</p>
        </div>
    </footer>

    <!-- WhatsApp Flotante -->
    <a href="https://wa.me/{{ $user->whatsapp }}" target="_blank" class="whatsapp-float">
        <i class="fab fa-whatsapp"></i>
    </a>

    <script>
        function toggleMenu(index, button) {
            const content = document.getElementById(`content-${index}`);
            const icon = button.querySelector(".view-more-text");

            const allContents = document.querySelectorAll(".accordion-content");
            const allButtons = document.querySelectorAll(".accordion-button");

            allContents.forEach((item, i) => {
                if (item !== content) {
                    item.style.maxHeight = null;
                    const otherBtn = allButtons[i];
                    if (otherBtn) {
                        const otherIcon = otherBtn.querySelector(".view-more-text");
                        if (otherIcon) otherIcon.innerText = "Ver opciones";
                        otherBtn.classList.remove("active");
                    }
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
            const buttons = document.querySelectorAll('.accordion-button');
            const contents = document.querySelectorAll('.accordion-content');

            buttons.forEach((btn, index) => {
                const content = contents[index];
                const catName = btn.getAttribute('data-search-name');
                const products = content.querySelectorAll('.product-card');
                let hasVisibleProduct = false;

                products.forEach(product => {
                    const info = product.getAttribute('data-product-info');
                    if (info.includes(query)) {
                        product.style.display = 'block';
                        hasVisibleProduct = true;
                    } else {
                        product.style.display = 'none';
                    }
                });

                const icon = btn.querySelector(".view-more-text");

                if (query.length > 0) {
                    if (catName.includes(query) || hasVisibleProduct) {
                        btn.style.display = 'flex';
                        btn.classList.add('active');
                        content.style.maxHeight = content.scrollHeight + "px";
                        if (icon) icon.innerText = "Ocultar";
                    } else {
                        btn.style.display = 'none';
                        content.style.maxHeight = null;
                    }
                } else {
                    btn.style.display = 'flex';
                    btn.classList.remove('active');
                    content.style.maxHeight = null;
                    if (icon) icon.innerText = "Ver opciones";
                }
            });
        }
    </script>
</body>

</html>
