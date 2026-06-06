<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $user->name }} - Menú Digital</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Patrick+Hand&display=swap"
        rel="stylesheet">

    <style>
        :root {
            /* Colores de la paleta de referencia */
            --bg-page: #f9f1e1;
            /* Crema suave */
            --yellow-main: #fcc006;
            /* Amarillo intenso */
            --blue-accent: #004dff;
            /* Azul vibrante */
            --text-dark: #1c1c1e;
            /* Negro texto */
            --text-hand: #000000;
            /* Negro para fuente 'Patrick Hand' */
            --white: #ffffff;

            /* Fuentes */
            --font-main: 'Poppins', sans-serif;
            --font-hand: 'Patrick Hand', cursive;
            /* Fuente tipo "escrito a mano" */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            background-color: var(--bg-page);
            color: var(--text-dark);
            font-family: var(--font-main);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            position: relative;
            /* Patrón sutil para dar textura de papel, como en la imagen */
            background-image: radial-gradient(rgba(0, 0, 0, 0.03) 1px, transparent 1px);
            background-size: 20px 20px;
        }

        /* Branding / Identidad - Estilo Header Imagen 0 */
        .brand-section {
            text-align: center;
            padding: 40px 20px;
            position: relative;
        }

        .brand-section::after {
            /* Decoración de pincel azul debajo del header */
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 150px;
            height: 10px;
            background: var(--blue-accent);
            border-radius: 5px;
            opacity: 0.3;
        }

        .logo-wrapper {
            display: inline-block;
            margin-bottom: 10px;
        }

        .logo-content i {
            font-size: 40px;
            color: var(--blue-accent);
        }

        .brand-title {
            font-family: var(--font-hand);
            /* Fuente "escrito a mano" */
            font-size: 50px;
            color: var(--yellow-main);
            line-height: 1;
            text-transform: uppercase;
            text-shadow: 2px 2px 0px rgba(0, 0, 0, 0.1);
        }

        .brand-subtitle {
            font-family: var(--font-hand);
            font-size: 18px;
            color: var(--text-dark);
            background: var(--yellow-main);
            display: inline-block;
            padding: 2px 15px;
            border-radius: 5px;
            margin-top: 5px;
            font-weight: bold;
        }

        /* BUSCADOR - Integrado con estilo manuscrito */
        .search-box-container {
            padding: 10px 20px;
            max-width: 500px;
            margin: 0 auto;
        }

        .search-wrapper {
            position: relative;
        }

        .search-wrapper i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-dark);
            font-size: 16px;
        }

        .search-input {
            width: 100%;
            background: var(--white);
            border: 2px solid var(--text-dark);
            padding: 12px 15px 12px 45px;
            border-radius: 25px;
            color: var(--text-dark);
            font-size: 16px;
            font-family: var(--font-main);
            outline: none;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            border-color: var(--blue-accent);
            box-shadow: 0 0 10px rgba(0, 77, 255, 0.2);
        }

        /* TÍTULO DE SECCIONES - Con línea "hand-drawn" */
        .menu-section-title {
            font-family: var(--font-hand);
            font-size: 28px;
            padding: 15px 20px;
            margin-top: 15px;
            color: var(--text-dark);
            text-transform: uppercase;
            text-align: center;
            position: relative;
        }

        .menu-section-title::after {
            /* Línea garabateada debajo del título */
            content: "";
            position: absolute;
            bottom: 5px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: rgba(0, 0, 0, 0.1);
            border-radius: 2px;
        }

        /* CATEGORÍAS (SCROLL HORIZONTAL) */
        .categories-horizontal-scroll {
            display: flex;
            gap: 15px;
            overflow-x: auto;
            padding: 10px 20px 20px;
            scrollbar-width: none;
            /* Oculta barra en Firefox */
        }

        .categories-horizontal-scroll::-webkit-scrollbar {
            display: none;
            /* Oculta barra en Chrome/Safari */
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
            gap: 5px;
        }

        .tab-image-wrapper {
            position: relative;
            width: 75px;
            height: 75px;
            border-radius: 50%;
            padding: 5px;
            background: var(--white);
            border: 3px solid var(--text-dark);
            transition: all 0.3s ease;
            overflow: hidden;
            box-shadow: 4px 4px 0px rgba(0, 0, 0, 0.1);
        }

        .tab-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .tab-btn-title {
            font-family: var(--font-hand);
            font-size: 15px;
            color: var(--text-dark);
            font-weight: bold;
            max-width: 80px;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Estado Activo de Categoría - Colores de referencia */
        .category-tab-btn.active .tab-image-wrapper {
            background: var(--yellow-main);
            border-color: var(--text-dark);
            transform: scale(1.05) translateY(-3px);
            box-shadow: 6px 6px 0px rgba(0, 0, 0, 0.2);
        }

        .category-tab-btn.active .tab-btn-title {
            color: var(--blue-accent);
            text-decoration: underline;
        }

        /* CONTENEDOR DE PRODUCTOS (Paneles de Tabs) */
        .products-container {
            padding: 10px 20px 30px;
            max-width: 600px;
            margin: 0 auto;
        }

        .category-products-panel {
            display: none;
            /* Ocultos por defecto */
            flex-direction: column;
            gap: 20px;
        }

        .category-products-panel.active {
            display: flex;
            animation: fadeIn 0.3s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* TARJETAS DE PRODUCTOS - Estilo "Menu List" Imagen 0 */
        .product-card {
            background-color: transparent;
            /* Sin fondo de tarjeta */
            border-bottom: 2px dashed rgba(0, 0, 0, 0.15);
            /* Línea divisoria */
            padding-bottom: 15px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            position: relative;
        }

        .product-card:last-child {
            border-bottom: none;
        }

        .product-info {
            flex: 1;
            padding-right: 15px;
        }

        .product-title {
            font-family: var(--font-hand);
            /* Fuente manuscrita */
            font-size: 20px;
            font-weight: bold;
            color: var(--text-dark);
            text-transform: uppercase;
        }

        .product-description {
            font-family: var(--font-main);
            font-size: 13px;
            color: rgba(0, 0, 0, 0.6);
            line-height: 1.3;
            margin-top: 2px;
        }

        .product-price {
            font-family: var(--font-main);
            font-size: 18px;
            font-weight: 700;
            color: var(--text-dark);
            background: var(--yellow-main);
            padding: 3px 8px;
            border-radius: 5px;
            white-space: nowrap;
            align-self: center;
        }

        /* Elementos Gráficos Decorativos "Manchados" como en imagen 0 */
        .product-card::before {
            content: "";
            position: absolute;
            left: -15px;
            top: 50%;
            transform: translateY(-50%);
            width: 8px;
            height: 8px;
            background: var(--blue-accent);
            border-radius: 50%;
            opacity: 0.5;
        }

        /* FOOTER PREMIUM - Mismo estilo, colores de referencia */
        .premium-footer {
            background: var(--white);
            padding: 40px 20px 30px;
            border-top: 3px solid var(--text-dark);
            display: flex;
            flex-direction: column;
            gap: 30px;
            margin-top: auto;
            position: relative;
        }

        /* Decoración de pincel azul arriba del footer */
        .premium-footer::before {
            content: "";
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 20px;
            background: var(--blue-accent);
            border-radius: 10px;
        }

        .footer-block {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
        }

        .footer-title-block {
            font-family: var(--font-hand);
            font-size: 20px;
            color: var(--text-dark);
            font-weight: bold;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .footer-title-block i {
            color: var(--blue-accent);
            font-size: 16px;
        }

        .schedule-card {
            background: var(--bg-page);
            border: 2px solid var(--text-dark);
            border-radius: 12px;
            padding: 15px;
            color: var(--text-dark);
            font-size: 14px;
            line-height: 1.5;
            box-shadow: 4px 4px 0px rgba(0, 0, 0, 0.05);
        }

        .map-container-premium {
            border-radius: 12px;
            overflow: hidden;
            border: 2px solid var(--text-dark);
            box-shadow: 4px 4px 0px rgba(0, 0, 0, 0.05);
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
            color: rgba(0, 0, 0, 0.5);
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            padding-top: 15px;
        }

        /* BOTÓN DE WHATSAPP FLOTANTE */
        .whatsapp-float {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            background: #25D366;
            /* Verde original */
            border: 2px solid var(--text-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-dark);
            /* Icono negro sobre verde */
            font-size: 28px;
            position: fixed;
            right: 20px;
            bottom: 25px;
            z-index: 200;
            box-shadow: 4px 4px 0px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            transition: transform 0.2s ease;
        }

        .whatsapp-float:active {
            transform: scale(0.9) translateY(3px);
            box-shadow: 2px 2px 0px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>

    <section class="brand-section">
        <div class="logo-wrapper">
            <div class="logo-content">
                <i class="fa-solid fa-fire-burner"></i>
            </div>
        </div>
        <h1 class="brand-title">{{ $user->name }}</h1>
        <p class="brand-subtitle">MENÚ DIGITAL</p>
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
                        <span class="product-price">${{ number_format($product->price, 2) }}</span>
                    </div>
                @empty
                    <p
                        style="color: rgba(0,0,0,0.5); font-size: 13px; text-align: center; padding: 30px 15px; width: 100%; font-style: italic;">
                        No hay productos en esta categoría actualmente.
                    </p>
                @endforelse
            </div>
        @empty
            <div class="text-center" style="color: rgba(0,0,0,0.5); padding: 40px 20px; width: 100%;">
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
        // Cambiar de categoría al dar clic arriba
        function switchTab(index) {
            // Limpiar buscador al cambiar manualmente de categoría para mejor experiencia
            document.getElementById('input-busqueda').value = "";
            restablecerFiltros();

            // Quitar clase activa a todos los botones y paneles
            document.querySelectorAll('.category-tab-btn').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.category-products-panel').forEach(panel => panel.classList.remove('active'));

            // Activar el seleccionado
            document.getElementById(`tab-btn-${index}`).classList.add('active');
            document.getElementById(`panel-${index}`).classList.add('active');
        }

        // Restablecer visibilidad de tarjetas
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
                // Si escribe algo, buscamos de manera global abriendo visibilidad donde haya coincidencias
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

                    // Si esta pestaña tiene resultados, la hacemos visible temporalmente para mostrar el producto hallado
                    if (tieneCoincidencias > 0) {
                        panel.classList.add('active');
                        tabs[index].classList.add('active');
                    } else {
                        panel.classList.remove('active');
                        tabs[index].classList.remove('active');
                    }
                });
            } else {
                // Si borra el buscador, regresamos al estado inicial (Pestaña index 0 activa por defecto)
                panels.forEach(panel => panel.classList.remove('active'));
                tabs.forEach(tab => tab.classList.remove('active'));
                restablecerFiltros();

                // Activa la primera por defecto
                if (panels[0]) panels[0].classList.add('active');
                if (tabs[0]) tabs[0].classList.add('active');
            }
        }
    </script>
</body>

</html>
