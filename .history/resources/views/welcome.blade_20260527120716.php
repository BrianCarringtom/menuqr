<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carringtom PRO</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- FUENTE -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- ICONOS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }

        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --secondary: #0f172a;
            --bg: #f1f5f9;
            --white: #ffffff;
            --text: #1e293b;
            --muted: #64748b;
            --shadow: 0 10px 40px rgba(37, 99, 235, 0.12);
        }

        body {
            background: var(--bg);
            color: var(--text);
            overflow-x: hidden;
        }

        img {
            max-width: 100%;
            display: block;
        }

        /* SCROLL */

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(var(--primary), #60a5fa);
            border-radius: 20px;
        }

        /* =========================
           NAVBAR
        ========================= */

        header {
            position: fixed;
            width: calc(100% - 40px);
            max-width: 1350px;
            top: 18px;
            left: 50%;
            transform: translateX(-50%);
            padding: 16px 28px;
            border-radius: 80px;
            background: rgba(255, 255, 255, 0.82);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            box-shadow: 0 15px 45px rgba(15, 23, 42, 0.1);
            animation: navbarShow 1s ease;
        }

        @keyframes navbarShow {
            from {
                opacity: 0;
                transform: translate(-50%, -40px);
            }

            to {
                opacity: 1;
                transform: translate(-50%, 0);
            }
        }

        .logo-text {
            font-size: 30px;
            font-weight: 800;
            background: linear-gradient(90deg, #2563eb, #60a5fa);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 28px;
        }

        nav a {
            text-decoration: none;
            color: var(--secondary);
            font-weight: 500;
            position: relative;
            transition: 0.3s;
        }

        nav a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -7px;
            width: 0%;
            height: 3px;
            border-radius: 10px;
            background: var(--primary);
            transition: 0.3s;
        }

        nav a:hover::after {
            width: 100%;
        }

        nav a:hover {
            color: var(--primary);
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary), #60a5fa);
            color: white;
            padding: 12px 24px;
            border-radius: 40px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.4s;
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.25);
        }

        .btn-login:hover {
            transform: translateY(-4px);
        }

        .menu-toggle {
            display: none;
            font-size: 24px;
            color: var(--primary);
            cursor: pointer;
        }

        /* =========================
           HERO NUEVO PRO
        ========================= */

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 140px 8% 100px;
            position: relative;
            overflow: hidden;
            background:
                linear-gradient(rgba(2, 6, 23, 0.82),
                    rgba(15, 23, 42, 0.88)),
                url('https://images.unsplash.com/photo-1492724441997-5dc865305da7');
            background-size: cover;
            background-position: center;
            color: white;
        }

        /* luces */

        .hero::before {
            content: "";
            position: absolute;
            width: 700px;
            height: 700px;
            background: rgba(37, 99, 235, 0.25);
            border-radius: 50%;
            filter: blur(120px);
            top: -250px;
            right: -180px;
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 500px;
            height: 500px;
            background: rgba(96, 165, 250, 0.2);
            border-radius: 50%;
            filter: blur(120px);
            bottom: -220px;
            left: -180px;
        }

        .hero-container {
            width: 100%;
            max-width: 1400px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 70px;
            position: relative;
            z-index: 2;
        }

        .hero-content {
            flex: 1;
            animation: fadeLeft 1.2s ease;
        }

        @keyframes fadeLeft {
            from {
                opacity: 0;
                transform: translateX(-60px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 18px;
            border-radius: 50px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            margin-bottom: 25px;
            font-size: 14px;
            color: #dbeafe;
        }

        .hero-badge i {
            color: #60a5fa;
        }

        .hero h1 {
            font-size: clamp(42px, 6vw, 82px);
            line-height: 1.05;
            font-weight: 800;
            margin-bottom: 25px;
        }

        .hero h1 span {
            background: linear-gradient(90deg, #60a5fa, #93c5fd);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            max-width: 650px;
            font-size: clamp(15px, 2vw, 19px);
            line-height: 1.9;
            color: #dbeafe;
            margin-bottom: 35px;
        }

        .hero-buttons {
            display: flex;
            gap: 18px;
            flex-wrap: wrap;
            margin-bottom: 40px;
        }

        .btn-main {
            background: linear-gradient(135deg, var(--primary), #60a5fa);
            color: white;
            text-decoration: none;
            padding: 16px 34px;
            border-radius: 40px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: 0.4s;
            box-shadow: 0 15px 30px rgba(37, 99, 235, 0.3);
        }

        .btn-main:hover {
            transform: translateY(-5px);
        }

        .btn-outline {
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            text-decoration: none;
            padding: 16px 30px;
            border-radius: 40px;
            font-weight: 500;
            backdrop-filter: blur(10px);
            transition: 0.4s;
        }

        .btn-outline:hover {
            background: rgba(255, 255, 255, 0.08);
        }

        .stats {
            display: flex;
            gap: 22px;
            flex-wrap: wrap;
        }

        .stat {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            padding: 22px;
            min-width: 180px;
            border-radius: 26px;
            transition: 0.4s;
        }

        .stat:hover {
            transform: translateY(-8px);
        }

        .stat h3 {
            font-size: 34px;
            margin-bottom: 6px;
        }

        .stat span {
            color: #dbeafe;
            font-size: 14px;
        }

        /* HERO IMAGE */

        .hero-image {
            flex: 1;
            display: flex;
            justify-content: center;
            animation: fadeRight 1.2s ease;
        }

        @keyframes fadeRight {
            from {
                opacity: 0;
                transform: translateX(60px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .hero-card {
            width: 100%;
            max-width: 520px;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(18px);
            border-radius: 35px;
            padding: 25px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
        }

        .hero-card img {
            width: 100%;
            height: 520px;
            object-fit: cover;
            border-radius: 25px;
        }

        /* =========================
           FEATURES
        ========================= */

        .features {
            padding: 110px 8%;
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .feature {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(14px);
            border-radius: 28px;
            padding: 40px 30px;
            max-width: 320px;
            text-align: center;
            box-shadow: var(--shadow);
            transition: 0.4s;
        }

        .feature:hover {
            transform: translateY(-12px);
        }

        .feature i {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary), #60a5fa);
            border-radius: 24px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            color: white;
            font-size: 30px;
            margin-bottom: 20px;
            box-shadow: 0 12px 25px rgba(37, 99, 235, 0.25);
        }

        .feature h3 {
            margin-bottom: 12px;
            font-size: 23px;
        }

        .feature p {
            color: var(--muted);
            line-height: 1.8;
        }

        /* =========================
           SECTION
        ========================= */

        .section {
            padding: 100px 8%;
            text-align: center;
        }

        .section h2 {
            font-size: clamp(32px, 5vw, 50px);
            margin-bottom: 20px;
            color: var(--secondary);
        }

        .cards {
            display: flex;
            justify-content: center;
            gap: 35px;
            flex-wrap: wrap;
            margin-top: 60px;
        }

        .card {
            width: 320px;
            background: white;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: 0.4s;
        }

        .card:hover {
            transform: translateY(-12px);
        }

        .card img {
            width: 100%;
            height: 230px;
            object-fit: cover;
            transition: 0.5s;
        }

        .card:hover img {
            transform: scale(1.08);
        }

        .card-content {
            padding: 28px;
        }

        .card-content h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .card-content p {
            color: var(--muted);
            margin-bottom: 20px;
        }

        .card button {
            border: none;
            background: linear-gradient(135deg, var(--primary), #60a5fa);
            color: white;
            padding: 12px 24px;
            border-radius: 40px;
            font-weight: 600;
            cursor: pointer;
        }

        /* =========================
           RESPONSIVE MASTER
        ========================= */

        @media(max-width: 1200px) {

            .hero-container {
                gap: 50px;
            }

            .hero-card img {
                height: 460px;
            }
        }

        @media(max-width: 992px) {

            .hero {
                padding-top: 150px;
                padding-bottom: 80px;
            }

            .hero-container {
                flex-direction: column;
                text-align: center;
            }

            .hero-content {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .hero p {
                margin-left: auto;
                margin-right: auto;
            }

            .stats {
                justify-content: center;
            }

            .hero-image {
                width: 100%;
            }

            .hero-card {
                max-width: 650px;
            }

            .hero-card img {
                height: 420px;
            }
        }

        @media(max-width: 768px) {

            header {
                width: calc(100% - 20px);
                padding: 14px 20px;
                border-radius: 25px;
            }

            nav {
                position: absolute;
                top: 85px;
                right: 0;
                width: 240px;
                padding: 25px;
                border-radius: 25px;
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(18px);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
                flex-direction: column;
                gap: 20px;
                display: none;
            }

            nav.active {
                display: flex;
            }

            .menu-toggle {
                display: block;
            }

            .btn-login {
                display: none;
            }

            .hero {
                padding: 130px 6% 80px;
            }

            .hero h1 {
                font-size: 44px;
            }

            .hero-buttons {
                width: 100%;
                justify-content: center;
            }

            .btn-main,
            .btn-outline {
                width: 100%;
                justify-content: center;
            }

            .hero-card img {
                height: 340px;
            }

            .stat {
                width: 100%;
                max-width: 260px;
            }

            .feature {
                width: 100%;
                max-width: 100%;
            }

            .card {
                width: 100%;
                max-width: 380px;
            }
        }

        @media(max-width: 480px) {

            .hero {
                padding: 120px 5% 70px;
            }

            .hero h1 {
                font-size: 36px;
            }

            .hero p {
                font-size: 15px;
                line-height: 1.8;
            }

            .hero-badge {
                font-size: 12px;
                padding: 10px 16px;
            }

            .hero-card {
                padding: 15px;
                border-radius: 24px;
            }

            .hero-card img {
                height: 260px;
                border-radius: 18px;
            }

            .stats {
                gap: 15px;
            }

            .stat {
                padding: 18px;
            }

            .stat h3 {
                font-size: 28px;
            }

            .logo-text {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <header>

        <div class="logo-text">Carringtom</div>

        <i class="fas fa-bars menu-toggle" onclick="toggleMenu()"></i>

        <nav id="menu">
            <a href="#">Inicio</a>
            <a href="#">Servicios</a>
            <a href="#">Negocios</a>
            <a href="#">Contacto</a>
        </nav>

        <a href="/login" class="btn-login">Login</a>

    </header>

    <!-- HERO -->
    <section class="hero">

        <div class="hero-container">

            <!-- TEXTO -->
            <div class="hero-content">

                <div class="hero-badge">
                    <i class="fas fa-star"></i>
                    Plataforma premium para negocios digitales
                </div>

                <h1>
                    Lleva tu negocio al siguiente
                    <span>nivel digital</span> 🚀
                </h1>

                <p>
                    Convierte tu menú o catálogo en una experiencia moderna,
                    elegante y profesional con QR inteligente, diseño premium
                    y herramientas visuales que impactan a tus clientes.
                </p>

                <div class="hero-buttons">

                    <a href="#" class="btn-main">
                        Comenzar ahora
                        <i class="fas fa-arrow-right"></i>
                    </a>

                    <a href="#" class="btn-outline">
                        Ver demostración
                    </a>

                </div>

                <div class="stats">

                    <div class="stat">
                        <h3>+500</h3>
                        <span>Negocios activos</span>
                    </div>

                    <div class="stat">
                        <h3>+10k</h3>
                        <span>Clientes felices</span>
                    </div>

                    <div class="stat">
                        <h3>99%</h3>
                        <span>Satisfacción</span>
                    </div>

                </div>

            </div>

            <!-- IMAGEN -->
            <div class="hero-image">

                <div class="hero-card">
                    <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4"
                        alt="Carringtom Hero">
                </div>

            </div>

        </div>

    </section>

    <!-- FEATURES -->
    <section class="features">

        <div class="feature">
            <i class="fas fa-qrcode"></i>
            <h3>QR Inteligente</h3>
            <p>Acceso instantáneo desde cualquier dispositivo sin instalar aplicaciones.</p>
        </div>

        <div class="feature">
            <i class="fas fa-mobile-alt"></i>
            <h3>Responsive</h3>
            <p>Perfecto para celulares, tablets y computadoras modernas.</p>
        </div>

        <div class="feature">
            <i class="fas fa-chart-line"></i>
            <h3>Más Ventas</h3>
            <p>Diseños optimizados para mejorar la experiencia y conversión.</p>
        </div>

    </section>

    <!-- NEGOCIOS -->
    <section class="section">

        <h2>Tipos de negocios</h2>

        <div class="cards">

            <div class="card">
                <img src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df">

                <div class="card-content">
                    <h3>Restaurantes</h3>
                    <p>Menús digitales elegantes y experiencia premium.</p>
                    <button>Ver más</button>
                </div>
            </div>

            <div class="card">
                <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93">

                <div class="card-content">
                    <h3>Cafeterías</h3>
                    <p>Diseño moderno y minimalista para tus clientes.</p>
                    <button>Ver más</button>
                </div>
            </div>

            <div class="card">
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f">

                <div class="card-content">
                    <h3>Tiendas</h3>
                    <p>Catálogos visuales modernos y atractivos.</p>
                    <button>Ver más</button>
                </div>
            </div>

        </div>

    </section>

    <script>
        function toggleMenu() {
            document.getElementById("menu").classList.toggle("active");
        }
    </script>

</body>

</html>