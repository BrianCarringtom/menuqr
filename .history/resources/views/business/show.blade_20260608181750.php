<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $user->name }} - Catálogo Digital</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Lobster&family=Playfair+Display:ital,wght@0,600;1,600&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --bg-crema: #fdf6ec;
            /* Fondo tradicional crema cálido */
            --rosa-mexicano: #e6007e;
            --verde-tradicional: #00a650;
            --naranja-calido: #f37023;
            --amarillo-sol: #ffcb42;
            --texto-oscuro: #3a2512;
            /* Café rústico oscuro */
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
            overflow-x: hidden;
        }

        /* Guirnalda de banderines decorativos superiores */
        .banderines-container {
            width: 100%;
            display: flex;
            justify-content: space-around;
            padding: 10px 5px 0;
            overflow: hidden;
        }

        .banderin {
            width: 28px;
            height: 34px;
            clip-path: polygon(0% 0%, 100% 0%, 100% 80%, 50% 100%, 0% 80%);
            opacity: 0.9;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 9px;
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
            background-color: var(--amarillo-sol);
        }

        .b-morado {
            background-color: #8c52ff;
        }

        .brand-section {
            text-align: center;
            padding: 20px 20px 25px;
        }

        .brand-title {
            font-family: 'Lobster', cursive;
            font-size: 44px;
            color: var(--rosa-mexicano);
            line-height: 1.1;
            text-shadow: 1px 1px 0px #ffffff;
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
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--texto-oscuro);
            opacity: 0.5;
            font-size: 16px;
        }

        .search-input {
            width: 100%;
            background: #ffffff;
            border: 2px dashed var(--naranja-calido);
            padding: 13px 16px 13px 48px;
            border-radius: 50px;
            color: var(--texto-oscuro);
            font-size: 15px;
            font-weight: 500;
            outline: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
        }

        /* CONTENEDOR PRINCIPAL DEL FILTRADO */
        .catalog-container {
            display: flex;
            flex-direction: column;
            gap: 24px;
            padding: 0 15px 40px;
        }

        /* ESTRUCTURA FILA INTERCALADA (ZIG-ZAG 2 COLUMNAS) */
        .category-row {
            display: grid;
            grid-template-columns: 125px 1fr;
            /* Bloque fijo a la izquierda, productos a la derecha */
            gap: 12px;
            align-items: center;
            background: rgba(255, 255, 255, 0.4);
            padding: 10px;
            border-radius: 28px;
            border: 1px solid rgba(255, 255, 255, 0.7);
        }

        /* Invierte el orden de las columnas en las filas pares de manera automática */
        .category-row:nth-child(even) {
            grid-template-columns: 1fr 125px;
        }

        /* BLOQUE FIJO DE LA CATEGORÍA */
        .category-badge-card {
            background: #ffffff;
            border-radius: 22px;
            padding: 14px 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            box-shadow: 0 4px 12px rgba(58, 37, 18, 0.05);
            width: 100%;
            height: 155px;
            justify-content: center;
        }

        /* Mueve el bloque fijo a la derecha en filas pares */
        .category-row:nth-child(even) .category-badge-card {
            grid-column: 2;
        }

        /* Control de Colores Vibrantes Tradicionales por Fila */
        .category-row:nth-child(4n+1) .cat-name {
            color: var(--rosa-mexicano);
        }

        .category-row:nth-child(4n+2) .cat-name {
            color: var(--verde-tradicional);
        }

        .category-row:nth-child(4n+3) .cat-name {
            color: var(--naranja-calido);
        }

        .category-row:nth-child(4n+4) .cat-name {
            color: #8c52ff;
        }

        .cat-thumb {
            width: 68px;
            height: 68px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 8px;
            border: 2px solid #ffffff;
        }

        .category-row:nth-child(4n+1) .cat-thumb {
            box-shadow: 0 0 0 3px var(--rosa-mexicano);
        }

        .category-row:nth-child(4n+2) .cat-thumb {
            box-shadow: 0 0 0 3px var(--verde-tradicional);
        }

        .category-row:nth-child(4n+3) .cat-thumb {
            box-shadow: 0 0 0 3px var(--naranja-calido);
        }

        .category-row:nth-child(4n+4) .cat-thumb {
            box-shadow: 0 0 0 3px #8c52ff;
        }

        .cat-name {
            font-family: 'Lobster', cursive;
            font-size: 17px;
            line-height: 1.2;
            word-break: break-word;
        }

        /* CONTENEDOR DE PRODUCTOS (SLIDER LATERAL FLUIDO) */
        .products-slider-container {
            width: 100%;
            overflow-x: auto;
            display: flex;
            gap: 10px;
            padding: 5px 2px 8px;
            scroll-snap-type: x mandatory;
            scrollbar-width: none;
            /* Oculta barra en Firefox */
        }

        .products-slider-container::-webkit-scrollbar {
            display: none;
            /* Oculta barra en Chrome/Safari */
        }

        /* Mueve el slider a la izquierda en filas pares */
        .category-row:nth-child(even) .products-slider-container {
            grid-column: 1;
            grid-row: 1;
        }

        /* TARJETA DE PRODUCTO COMPACTA PARA EL SLIDER */
        .product-slider-card {
            flex: 0 0 165px;
            /* Ancho fijo ideal para que se aprecien varios a la vez en pantalla */
            scroll-snap-align: start;
            background: #ffffff;
            border-radius: 20px;
            padding: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(58, 37, 18, 0.04);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 155px;
        }

        .prod-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 14.5px;
            color: var(--texto-oscuro);
            line-height: 1.3;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .prod-desc {
            font-size: 11px;
            opacity: 0.7;
            line-height: 1.3;
            margin-top: 4px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .prod-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 6px;
            padding-top: 6px;
            border-top: 1px dashed rgba(58, 37, 18, 0.1);
        }

        .prod-price {
            font-family: 'Playfair Display', serif;
            font-size: 15px;
            font-weight: 700;
            color: var(--texto-oscuro);
        }

        .hint-swipe {
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            opacity: 0.4;
            font-weight: 700;
        }

        /* FOOTER TRADICIONAL */
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
            height: 140px;
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
            box-shadow: 0 6px 18px rgba(0, 166, 80, 0.3);
            text-decoration: none;
            border: 2px solid white;
        }
    </style>
</head>

<body>

    <div class="banderines-container">
        <div class="banderin b-verde"><i class="fa-solid fa-star"></i></div>
        <div class="banderin b-rosa"><i class="fa-solid fa-heart"></i></div>
        <div class="banderin b-naranja"><i class="fa-solid fa-scissors"></i></div>
        <div class="banderin b-amarillo"><i class="fa-solid fa-sparkles"></i></div>
        <div class="banderin b-morado"><i class="fa-solid fa-face-smile"></i></div>
        <div class="banderin b-verde"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
        <div class="banderin b-rosa"><i class="fa-solid fa-crown"></i></div>
    </div>

    <section class="brand-section">
        <h1 class="brand-title">{{ $user->name }}</h1>
    </section>

    <div class="search-box-container">
        <div class="search-wrapper">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="input-busqueda" class="search-input"
                placeholder="Buscar servicios o categorías..." oninput="buscarEnTiempoReal()">
        </div>
    </div>

    <div class="catalog-container" id="contenedor-catalogo">
        @forelse ($user->categories as $category)
            <div class="category-row" data-cat-name="{{ strtolower($category->name) }}">

                <div class="category-badge-card">
                    <img src="{{ $category->image ? asset('storage/' . $category->image) : 'https://images.unsplash.com/photo-1560066984-138dadb4c035?q=80&w=1000&auto=format&fit=crop' }}"
                        class="cat-thumb" alt="{{ $category->name }}">
                    <h3 class="cat-name">{{ $category->name }}</h3>
                </div>

                <div class="products-slider-container">
                    @forelse ($category->products as $product)
                        <div class="product-slider-card"
                            data-product-info="{{ strtolower($product->name . ' ' . $product->description) }}">
                            <div>
                                <h4 class="prod-title">{{ $product->name }}</h4>
                                <p class="prod-desc">{{ $product->description }}</p>
                            </div>
                            <div class="prod-footer">
                                <span class="prod-price">${{ number_format($product->price, 2) }}</span>
                                <span class="hint-swipe"><i class="fa-solid fa-arrow-right-long"></i></span>
                            </div>
                        </div>
                    @empty
                        <div class="product-slider-card"
                            style="justify-content: center; align-items: center; border-style: dashed; background: transparent;">
                            <p style="font-size: 11px; opacity: 0.6; text-align: center;">Próximamente más opciones.</p>
                        </div>
                    @endforelse
                </div>

            </div>
        @empty
            <div style="text-align: center; padding: 40px 20px; opacity: 0.7;">
                <p>El catálogo se encuentra en actualización en este momento.</p>
            </div>
        @endforelse
    </div>

    <footer class="premium-footer">
        <div>
            <h4 class="footer-title-block"><i class="fa-solid fa-calendar-days"></i> Horarios de Atención</h4>
            <div class="schedule-card">
                {!! nl2br(e($user->schedule)) !!}
            </div>
        </div>

        <div>
            <h4 class="footer-title-block"><i class="fa-solid fa-map-location-dot"></i> Ubicación</h4>
            <div class="map-container-premium">
                <iframe src="{{ $user->map_url }}" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>

        <div class="copyright-section">
            <p>© {{ date('Y') }} {{ $user->name }}. Calidad y Estilo Tradicional.</p>
        </div>
    </footer>

    <a href="https://wa.me/{{ $user->whatsapp }}" target="_blank" class="whatsapp-float">
        <i class="fab fa-whatsapp"></i>
    </a>

    <script>
        function buscarEnTiempoReal() {
            const query = document.getElementById('input-busqueda').value.toLowerCase();
            const rows = document.querySelectorAll('.category-row');

            rows.forEach(row => {
                const categoryName = row.getAttribute('data-cat-name');
                const products = row.querySelectorAll('.product-slider-card');
                let hasMatchingProduct = false;

                products.forEach(product => {
                    const info = product.getAttribute('data-product-info');
                    if (info && info.includes(query)) {
                        product.style.display = 'flex';
                        hasMatchingProduct = true;
                    } else if (info) {
                        product.style.display = 'none';
                    }
                });

                if (query.length > 0) {
                    if (categoryName.includes(query) || hasMatchingProduct) {
                        row.style.display = 'grid';
                    } else {
                        row.style.display = 'none';
                    }
                } else {
                    row.style.display = 'grid';
                    products.forEach(product => product.style.display = 'flex');
                }
            });
        }
    </script>
</body>

</html>
