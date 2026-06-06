<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $user->name }} - Menú Digital</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;700&family=Poppins:wght@400;600;700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --bg-main: #0a0118;
            --pinata-orange: #ff6f00;
            --pinata-pink: #ff007f;
            --pinata-purple: #7b2cbf;
            --pinata-cyan: #00b4d8;
            --pinata-yellow: #ffd600;
            --text-white: #ffffff;
            --text-muted: #bdafcd;
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
            background-color: var(--bg-main);
            color: var(--text-white);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            position: relative;
        }

        /* FONDO ESTILO LOGO DIFUMINADO DE MARCA AGUA */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                radial-gradient(circle at 80% 20%, rgba(255, 0, 127, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 10% 80%, rgba(0, 180, 216, 0.15) 0%, transparent 50%),
                linear-gradient(rgba(10, 1, 24, 0.94), rgba(10, 1, 24, 0.98)),
                url("{{ $user->image ? asset('storage/' . $user->image) : 'https://images.unsplash.com/photo-1513151233558-d860c5398176?q=80&w=600' }}");
            background-size: cover;
            background-position: center;
            z-index: -1;
        }

        /* CABECERA ESTILO PIÑATA ARTESANAL */
        .brand-header {
            text-align: center;
            padding: 50px 20px 40px;
            background: linear-gradient(135deg, var(--pinata-purple) 0%, #3a0ca3 100%);
            border-bottom: 6px dashed var(--pinata-yellow);
            position: relative;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            margin-bottom: 30px;
        }

        .brand-header::after {
            content: "";
            position: absolute;
            bottom: -12px;
            left: 0;
            width: 100%;
            height: 12px;
            background-image: linear-gradient(-45deg, var(--pinata-yellow) 6px, transparent 0), linear-gradient(45deg, var(--pinata-yellow) 6px, transparent 0);
            background-position: left top;
            background-repeat: repeat-x;
            background-size: 12px 12px;
        }

        .brand-logo-shape {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 75px;
            height: 75px;
            background: var(--pinata-pink);
            border: 3px solid var(--text-white);
            border-radius: 50%;
            margin-bottom: 15px;
            box-shadow: 0 0 25px rgba(255, 0, 127, 0.6);
            animation: swing 3s ease-in-out infinite alternate;
        }

        @keyframes swing {
            0% {
                transform: rotate(-8deg);
            }

            100% {
                transform: rotate(8deg);
            }
        }

        .brand-logo-shape i {
            font-size: 32px;
            color: var(--text-white);
        }

        .brand-name {
            font-family: 'Fredoka', sans-serif;
            font-size: 38px;
            color: var(--text-white);
            text-shadow: 3px 3px 0px var(--pinata-orange), 6px 6px 0px rgba(0, 0, 0, 0.3);
            line-height: 1;
        }

        /* BUSCADOR */
        .search-box-container {
            padding: 0 20px;
            margin-bottom: 30px;
        }

        .search-wrapper {
            position: relative;
        }

        .search-wrapper i {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--pinata-cyan);
            font-size: 18px;
        }

        .search-input {
            width: 100%;
            background: rgba(255, 255, 255, 0.06);
            border: 2px solid rgba(255, 255, 255, 0.1);
            padding: 16px 16px 16px 55px;
            border-radius: 50px;
            color: white;
            font-size: 16px;
            outline: none;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            background: rgba(255, 255, 255, 0.1);
            border-color: var(--pinata-cyan);
            box-shadow: 0 0 15px rgba(0, 180, 216, 0.3);
        }

        /* CONTENEDOR DE CATEGORÍAS ASIMÉTRICO / DINÁMICO */
        .categories-grid-flux {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            padding: 0 20px;
            margin-bottom: 25px;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* TARJETA GIGANTE INICIAL (ESTRUCTURA NUEVA) */
        .category-giant-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.03) 0%, rgba(255, 255, 255, 0.08) 100%);
            border: 2px solid rgba(255, 255, 255, 0.08);
            border-radius: 28px;
            padding: 24px 16px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);

            /* Animación base de tamaño gigante */
            height: 170px;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Círculos de color de fondo inspirados en la foto de piñatas */
        .category-giant-card::before {
            content: "";
            position: absolute;
            width: 90px;
            height: 90px;
            border-radius: 50%;
            z-index: 1;
            opacity: 0.15;
            transition: all 0.5s ease;
            bottom: -15px;
            right: -15px;
        }

        /* Variación multicolor */
        .category-giant-card:nth-child(4n+1)::before {
            background: var(--pinata-orange);
        }

        .category-giant-card:nth-child(4n+2)::before {
            background: var(--pinata-pink);
        }

        .category-giant-card:nth-child(4n+3)::before {
            background: var(--pinata-cyan);
        }

        .category-giant-card:nth-child(4n+4)::before {
            background: var(--pinata-yellow);
        }

        .category-giant-card:nth-child(4n+1) .img-blob-frame {
            background: var(--pinata-orange);
        }

        .category-giant-card:nth-child(4n+2) .img-blob-frame {
            background: var(--pinata-pink);
        }

        .category-giant-card:nth-child(4n+3) .img-blob-frame {
            background: var(--pinata-cyan);
        }

        .category-giant-card:nth-child(4n+4) .img-blob-frame {
            background: var(--pinata-yellow);
        }

        /* Contenedor de imagen tipo diseño piñata central */
        .img-blob-frame {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            padding: 3px;
            border: 2px solid var(--text-white);
            z-index: 2;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            margin-bottom: 12px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .img-blob-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .category-giant-title {
            font-family: 'Fredoka', sans-serif;
            font-size: 18px;
            font-weight: 700;
            color: var(--text-white);
            z-index: 2;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            max-width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* -------------------------------------------------------------
           EFECTO MAGICO: CUANDO SE SELECCIONA Y SE HACE PEQUEÑA
        ------------------------------------------------------------- */

        /* Modificación del contenedor global al haber una activa */
        .categories-grid-flux.has-active {
            grid-template-columns: 1fr;
            /* Pasan a ser filas completas compactas */
            gap: 10px;
        }

        /* La tarjeta seleccionada se vuelve pequeña, horizontal y destacada */
        .category-giant-card.active {
            height: 65px;
            flex-direction: row;
            justify-content: space-between;
            padding: 0 20px;
            background: rgba(255, 255, 255, 0.12);
            grid-column: 1 / -1;
            /* Ocupa todo el ancho */
            border-radius: 16px;
        }

        .category-giant-card.active:nth-child(4n+1) {
            border-color: var(--pinata-orange);
            box-shadow: 0 0 15px rgba(255, 111, 0, 0.2);
        }

        .category-giant-card.active:nth-child(4n+2) {
            border-color: var(--pinata-pink);
            box-shadow: 0 0 15px rgba(255, 0, 127, 0.2);
        }

        .category-giant-card.active:nth-child(4n+3) {
            border-color: var(--pinata-cyan);
            box-shadow: 0 0 15px rgba(0, 180, 216, 0.2);
        }

        .category-giant-card.active:nth-child(4n+4) {
            border-color: var(--pinata-yellow);
            box-shadow: 0 0 15px rgba(255, 214, 0, 0.2);
        }

        .category-giant-card.active .img-blob-frame {
            width: 42px;
            height: 42px;
            margin-bottom: 0;
            transform: scale(1) rotate(-5deg);
        }

        .category-giant-card.active .category-giant-title {
            font-size: 20px;
            margin-left: -40px;
            /* Alínea al centro en modo horizontal */
        }

        /* Agregar icono de cierre/regreso dinámico */
        .category-giant-card.active::after {
            content: "\f00d";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            color: var(--text-white);
            font-size: 16px;
            opacity: 0.7;
        }

        /* Ocultar las tarjetas que NO están activas cuando hay una seleccionada */
        .category-giant-card.hidden-by-active {
            height: 0;
            padding: 0;
            margin: 0;
            opacity: 0;
            border: none;
            pointer-events: none;
            overflow: hidden;
        }

        /* CONTENEDOR DE PRODUCTOS ABAJO */
        .products-flux-wrapper {
            padding: 0 20px 40px;
        }

        .products-panel {
            display: none;
            flex-direction: column;
            gap: 14px;
        }

        .products-panel.show-active {
            display: flex;
            animation: elasticShow 0.5s ease forwards;
        }

        @keyframes elasticShow {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* TARJETAS DE PRODUCTOS */
        .product-modern-card {
            background: linear-gradient(135deg, #160a2c 0%, #0d031c 100%);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }

        .product-details {
            flex: 1;
            padding-right: 12px;
        }

        .product-name-text {
            font-size: 17px;
            font-weight: 700;
            color: var(--text-white);
            margin-bottom: 4px;
        }

        .product-desc-text {
            font-size: 12px;
            color: var(--text-muted);
            line-height: 1.5;
            margin-bottom: 10px;
        }

        .product-badge-price {
            display: inline-block;
            background: rgba(255, 255, 255, 0.07);
            padding: 5px 14px;
            border-radius: 30px;
            color: var(--pinata-yellow);
            font-weight: 700;
            font-size: 16px;
            border: 1px solid rgba(255, 214, 0, 0.2);
        }

        /* FOOTER UNIVERSAL */
        .premium-footer {
            background: #05000d;
            padding: 40px 20px 30px;
            border-top: 4px solid var(--pinata-pink);
            display: flex;
            flex-direction: column;
            gap: 30px;
            margin-top: auto;
        }

        .footer-title-block {
            font-family: 'Fredoka', sans-serif;
            font-size: 16px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-title-block i {
            color: var(--pinata-cyan);
            background: rgba(0, 180, 216, 0.1);
            padding: 10px;
            border-radius: 12px;
        }

        .schedule-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 16px 20px;
            color: var(--text-muted);
            font-size: 14px;
            line-height: 1.6;
        }

        .map-container-premium {
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.08);
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
            color: rgba(255, 255, 255, 0.2);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            padding-top: 20px;
        }

        /* BOTÓN WHATSAPP */
        .whatsapp-float {
            width: 56px;
            height: 56px;
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
            box-shadow: 0 10px 25px rgba(37, 211, 102, 0.3);
            text-decoration: none;
        }
    </style>
</head>

<body>

    <!-- HEADER CON IMAGEN DE LOGO DINÁMICA -->
    <header class="brand-header">
        <div class="brand-logo-shape">
            @if ($user->image)
                <img src="{{ asset('storage/' . $user->image) }}" alt="Logo {{ $user->name }}"
                    style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
            @else
                <i class="fa-solid fa-shapes"></i>
            @endif
        </div>
        <h1 class="brand-name">{{ $user->name }}</h1>
    </header>

    <!-- BUSCADOR -->
    <div class="search-box-container">
        <div class="search-wrapper">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="input-busqueda" class="search-input" placeholder="¿Qué buscas hoy?..."
                oninput="buscarEnTiempoReal()">
        </div>
    </div>

    <!-- SECCIÓN INTERACTIVA DINÁMICA DE CATEGORÍAS -->
    <div class="categories-grid-flux" id="grid-categorias">
        @foreach ($user->categories as $index => $category)
            <div onclick="selectCategory({{ $index }})" class="category-giant-card"
                id="giant-card-{{ $index }}">
                <div class="img-blob-frame">
                    <img src="{{ $category->image ? asset('storage/' . $category->image) : 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=200&auto=format&fit=crop' }}"
                        alt="{{ $category->name }}">
                </div>
                <span class="category-giant-title">{{ $category->name }}</span>
            </div>
        @endforeach
    </div>

    <!-- CONTENEDOR DE PRODUCTOS -->
    <div class="products-flux-wrapper">
        @forelse ($user->categories as $index => $category)
            <div class="products-panel" id="panel-{{ $index }}">
                @forelse ($category->products as $product)
                    <div class="product-modern-card" data-title="{{ strtolower($product->name) }}"
                        data-desc="{{ strtolower($product->description) }}">
                        <div class="product-details">
                            <h3 class="product-name-text">{{ $product->name }}</h3>
                            <p class="product-desc-text">{{ $product->description }}</p>
                            <span class="product-badge-price">${{ number_format($product->price, 2) }}</span>
                        </div>
                    </div>
                @empty
                    <p
                        style="color: var(--text-muted); font-size: 13.5px; text-align: center; padding: 30px 10px; width: 100%;">
                        No hay productos en esta categoría actualmente.
                    </p>
                @endforelse
            </div>
        @empty
            <div style="color: var(--text-muted); padding: 40px 20px; width: 100%; text-align: center;">
                <p>Este negocio no cuenta con categorías.</p>
            </div>
        @endforelse
    </div>

    <!-- FOOTER -->
    <footer class="premium-footer">
        <div class="footer-block">
            <h4 class="footer-title-block"><i class="fa-solid fa-calendar-alt"></i> Horarios de Atención</h4>
            <div class="schedule-card">
                {!! nl2br(e($user->schedule)) !!}
            </div>
        </div>

        <div class="footer-block">
            <h4 class="footer-title-block"><i class="fa-solid fa-map-pin"></i> Ubicación del Local</h4>
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

    <!-- WHATSAPP -->
    <a href="https://wa.me/{{ $user->whatsapp }}" target="_blank" class="whatsapp-float">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- LÓGICA DE CONTROL VISUAL TOTAL -->
    <script>
        function selectCategory(index) {
            // Limpiar buscador para evitar conflictos visuales
            document.getElementById('input-busqueda').value = "";
            restablecerTarjetasOcultas();

            const grid = document.getElementById('grid-categorias');
            const selectedCard = document.getElementById(`giant-card-${index}`);
            const selectedPanel = document.getElementById(`panel-${index}`);

            const isAlreadyActive = selectedCard.classList.contains('active');

            // 1. SI YA ESTABA ACTIVA: Volvemos al estado inicial gigante para todas
            if (isAlreadyActive) {
                grid.classList.remove('has-active');
                selectedCard.classList.remove('active');
                selectedPanel.classList.remove('show-active');

                document.querySelectorAll('.category-giant-card').forEach(card => {
                    card.classList.remove('hidden-by-active');
                });
            }
            // 2. SI NO ESTABA ACTIVA: Encogemos la seleccionada y ocultamos el resto
            else {
                grid.classList.add('has-active');

                // Limpiar estados previos de otras categorías
                document.querySelectorAll('.category-giant-card').forEach(card => {
                    card.classList.remove('active');
                    card.classList.add('hidden-by-active');
                });
                document.querySelectorAll('.products-panel').forEach(panel => {
                    panel.classList.remove('show-active');
                });

                // Activar únicamente la actual (se vuelve pequeña)
                selectedCard.classList.remove('hidden-by-active');
                selectedCard.classList.add('active');
                selectedPanel.classList.add('show-active');

                // Auto Scroll suave hasta el encabezado de la categoría
                setTimeout(() => {
                    selectedCard.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }, 250);
            }
        }

        function restablecerTarjetasOcultas() {
            document.querySelectorAll('.product-modern-card').forEach(card => {
                card.style.display = 'flex';
            });
            document.querySelectorAll('.category-giant-card').forEach(card => {
                card.style.display = 'flex';
            });
        }

        // BÚSQUEDA EN TIEMPO REAL INTEGRADA CON EL NUEVO MODELO DE MOSAICOS
        function buscarEnTiempoReal() {
            const query = document.getElementById('input-busqueda').value.toLowerCase();
            const grid = document.getElementById('grid-categorias');
            const cards = document.querySelectorAll('.category-giant-card');
            const panels = document.querySelectorAll('.products-panel');

            if (query.length > 0) {
                // Al buscar, forzamos la vista compacta pequeña de categorías para mostrar listas eficientemente
                grid.classList.add('has-active');

                panels.forEach((panel, index) => {
                    const productCards = panel.querySelectorAll('.product-modern-card');
                    let coincidencias = 0;

                    productCards.forEach(card => {
                        const title = card.getAttribute('data-title');
                        const desc = card.getAttribute('data-desc');

                        if (title.includes(query) || desc.includes(query)) {
                            card.style.display = 'flex';
                            coincidencias++;
                        } else {
                            card.style.display = 'none';
                        }
                    });

                    if (coincidencias > 0) {
                        cards[index].classList.remove('hidden-by-active');
                        cards[index].classList.add('active');
                        panel.classList.add('show-active');
                    } else {
                        cards[index].classList.add('hidden-by-active');
                        cards[index].classList.remove('active');
                        panel.classList.remove('show-active');
                    }
                });
            } else {
                // Al vaciar la búsqueda, regresamos todas al estado gigante inicial
                grid.classList.remove('has-active');
                restablecerTarjetasOcultas();
                cards.forEach(card => card.classList.remove('active', 'hidden-by-active'));
                panels.forEach(panel => panel.classList.remove('show-active'));
            }
        }
    </script>
</body>

</html>
