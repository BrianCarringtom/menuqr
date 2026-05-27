<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carringtom PRO</title>

    <!-- FUENTE -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- ICONOS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --secondary: #60a5fa;
            --bg: #06111f;
            --card: #0f172a;
            --white: #ffffff;
            --text: #cbd5e1;
            --border: rgba(255, 255, 255, 0.08);
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background:
                radial-gradient(circle at top left, rgba(37, 99, 235, 0.25), transparent 30%),
                radial-gradient(circle at bottom right, rgba(59, 130, 246, 0.18), transparent 30%),
                #020617;
            color: white;
            overflow-x: hidden;
        }

        section {
            position: relative;
            z-index: 2;
        }

        /* SCROLL */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(var(--primary), var(--secondary));
            border-radius: 20px;
        }

        /* NAVBAR */
        header {
            position: fixed;
            width: 92%;
            top: 18px;
            left: 50%;
            transform: translateX(-50%);
            padding: 16px 30px;
            border-radius: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;

            background: rgba(15, 23, 42, 0.72);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.08);

            box-shadow:
                0 10px 40px rgba(0, 0, 0, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.06);
        }

        header h2 {
            font-size: 28px;
            font-weight: 800;
            color: white;
            letter-spacing: 1px;
        }

        header h2 span {
            color: var(--secondary);
        }

        nav {
            display: flex;
            gap: 28px;
            align-items: center;
        }

        nav a {
            text-decoration: none;
            color: #e2e8f0;
            font-weight: 500;
            position: relative;
            transition: .3s;
        }

        nav a:hover {
            color: white;
        }

        nav a::after {
            content: "";
            position: absolute;
            width: 0%;
            height: 2px;
            left: 0;
            bottom: -6px;
            background: linear-gradient(to right, var(--secondary), var(--primary));
            transition: .3s;
            border-radius: 20px;
        }

        nav a:hover::after {
            width: 100%;
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 12px 22px;
            border-radius: 40px;
            text-decoration: none;
            font-weight: 600;
            transition: .4s;
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.35);
        }

        .btn-login:hover {
            transform: translateY(-3px) scale(1.03);
            box-shadow: 0 15px 35px rgba(37, 99, 235, 0.55);
        }

        .menu-toggle {
            display: none;
            font-size: 24px;
            cursor: pointer;
            color: white;
        }

        /* HERO PREMIUM */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 0 10%;
            position: relative;
            overflow: hidden;
            background:
                linear-gradient(to right, rgba(2, 6, 23, 0.92), rgba(2, 6, 23, 0.6)),
                url('https://images.unsplash.com/photo-1492724441997-5dc865305da7');
            background-size: cover;
            background-position: center;
        }

        /* Glow Effects */
        .hero::before {
            content: "";
            position: absolute;
            width: 500px;
            height: 500px;
            background: rgba(37, 99, 235, 0.28);
            filter: blur(130px);
            top: -150px;
            right: -100px;
            animation: glow 6s infinite alternate;
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(96, 165, 250, 0.2);
            filter: blur(100px);
            bottom: -120px;
            left: -120px;
        }

        @keyframes glow {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.15);
            }
        }

        .hero-content {
            max-width: 700px;
            position: relative;
            z-index: 5;
            animation: fadeUp 1.2s ease;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 18px;
            border-radius: 40px;
            margin-bottom: 28px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            color: #bfdbfe;
            font-size: 14px;
        }

        .hero h1 {
            font-size: 72px;
            line-height: 1.05;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .hero h1 span {
            background: linear-gradient(to right, #ffffff, #60a5fa);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            color: #cbd5e1;
            font-size: 18px;
            line-height: 1.8;
            margin-bottom: 35px;
            max-width: 620px;
        }

        .hero-buttons {
            display: flex;
            gap: 18px;
            flex-wrap: wrap;
        }

        .btn-main {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            padding: 16px 34px;
            border-radius: 40px;
            text-decoration: none;
            color: white;
            font-weight: 600;
            transition: .4s;
            box-shadow: 0 15px 35px rgba(37, 99, 235, 0.35);
        }

        .btn-main:hover {
            transform: translateY(-5px);
        }

        .btn-secondary {
            border: 1px solid rgba(255, 255, 255, 0.12);
            padding: 16px 30px;
            border-radius: 40px;
            text-decoration: none;
            color: white;
            background: rgba(255, 255, 255, 0.04);
            backdrop-filter: blur(10px);
            transition: .3s;
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.08);
        }

        /* FLOATING CARD */
        .floating-card {
            position: absolute;
            right: 8%;
            top: 55%;
            transform: translateY(-50%);
            width: 320px;
            padding: 25px;
            border-radius: 30px;
            background: rgba(15, 23, 42, 0.78);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
            animation: float 4s ease-in-out infinite;
        }

        .floating-card img {
            width: 100%;
            border-radius: 20px;
            margin-bottom: 20px;
            height: 180px;
            object-fit: cover;
        }

        .floating-card h3 {
            margin-bottom: 10px;
        }

        .floating-card p {
            color: #cbd5e1;
            font-size: 14px;
            line-height: 1.7;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(-50%);
            }

            50% {
                transform: translateY(-56%);
            }
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* STATS */
        .stats {
            margin-top: 45px;
            display: flex;
            gap: 25px;
            flex-wrap: wrap;
        }

        .stat {
            background: rgba(255, 255, 255, 0.05);
            padding: 20px 28px;
            border-radius: 24px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            min-width: 150px;
        }

        .stat h3 {
            font-size: 34px;
            margin-bottom: 5px;
            color: white;
        }

        .stat span {
            color: #93c5fd;
        }

        /* FEATURES */
        .features {
            padding: 100px 10%;
            display: flex;
            gap: 30px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .feature {
            width: 280px;
            text-align: center;
            padding: 40px 25px;
            border-radius: 28px;
            background: rgba(15, 23, 42, 0.7);
            border: 1px solid var(--border);
            transition: .4s;
            backdrop-filter: blur(10px);
        }

        .feature:hover {
            transform: translateY(-12px);
            border-color: rgba(96, 165, 250, 0.4);
            box-shadow: 0 20px 45px rgba(37, 99, 235, 0.2);
        }

        .feature i {
            font-size: 40px;
            margin-bottom: 18px;
            color: #60a5fa;
        }

        .feature h3 {
            margin-bottom: 10px;
        }

        .feature p {
            color: #94a3b8;
        }

        /* TITLES */
        .section {
            padding: 90px 10%;
            text-align: center;
        }

        .section h2,
        .gallery h2,
        .contact h2,
        .testimonials h2 {
            font-size: 48px;
            margin-bottom: 20px;
            font-weight: 800;
        }

        /* CARDS */
        .cards {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 50px;
        }

        .card {
            width: 320px;
            overflow: hidden;
            border-radius: 30px;
            background: rgba(15, 23, 42, 0.8);
            border: 1px solid var(--border);
            transition: .4s;
            position: relative;
        }

        .card:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 45px rgba(37, 99, 235, 0.2);
        }

        .card img {
            width: 100%;
            height: 230px;
            object-fit: cover;
            transition: .5s;
        }

        .card:hover img {
            transform: scale(1.08);
        }

        .card-content {
            padding: 25px;
        }

        .card-content p {
            color: #94a3b8;
            margin-top: 10px;
        }

        .card button {
            margin-top: 20px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 30px;
            font-weight: 600;
            cursor: pointer;
            transition: .3s;
        }

        .card button:hover {
            transform: scale(1.05);
        }

        /* GALLERY */
        .gallery {
            padding: 100px 10%;
            background: linear-gradient(to bottom, rgba(15, 23, 42, 0.5), transparent);
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-auto-rows: 220px;
            gap: 18px;
            margin-top: 50px;
        }

        .gallery-grid img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 22px;
            transition: .5s;
        }

        .gallery-grid img:hover {
            transform: scale(1.04);
            filter: brightness(1.1);
        }

        .gallery-grid img:nth-child(1) {
            grid-column: span 2;
            grid-row: span 2;
        }

        .gallery-grid img:nth-child(4) {
            grid-row: span 2;
        }

        /* ABOUT */
        .about {
            padding: 100px 10%;
            display: flex;
            gap: 60px;
            flex-wrap: wrap;
            align-items: center;
        }

        .about img {
            width: 450px;
            border-radius: 30px;
            object-fit: cover;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
        }

        .about-text {
            max-width: 550px;
        }

        .about-text h2 {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .about-text p {
            color: #94a3b8;
            line-height: 1.8;
        }

        .about-box {
            margin-top: 25px;
            padding: 25px;
            border-radius: 24px;
            background: rgba(15, 23, 42, 0.8);
            border: 1px solid var(--border);
        }

        /* TESTIMONIOS */
        .testimonials {
            padding: 100px 10%;
            background: linear-gradient(to top, rgba(37, 99, 235, 0.08), transparent);
        }

        .testimonial-container {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 50px;
        }

        .testimonial {
            width: 320px;
            padding: 35px 25px;
            border-radius: 28px;
            background: rgba(15, 23, 42, 0.85);
            border: 1px solid var(--border);
            transition: .4s;
        }

        .testimonial:hover {
            transform: translateY(-10px);
        }

        .testimonial img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 18px;
            border: 4px solid rgba(96, 165, 250, 0.25);
        }

        .testimonial p {
            color: #cbd5e1;
            line-height: 1.8;
            margin-bottom: 15px;
        }

        /* CONTACT */
        .contact {
            padding: 100px 10%;
        }

        .contact-container {
            display: flex;
            gap: 40px;
            flex-wrap: wrap;
            margin-top: 50px;
        }

        .contact-form,
        .contact-info {
            flex: 1;
        }

        .contact-form {
            padding: 35px;
            border-radius: 30px;
            background: rgba(15, 23, 42, 0.8);
            border: 1px solid var(--border);
            backdrop-filter: blur(10px);
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 16px;
            border-radius: 16px;
            border: 1px solid rgba(96, 165, 250, 0.18);
            margin-bottom: 18px;
            background: rgba(255, 255, 255, 0.04);
            color: white;
            outline: none;
        }

        .contact-form input::placeholder,
        .contact-form textarea::placeholder {
            color: #94a3b8;
        }

        .contact-form button {
            width: 100%;
            padding: 16px;
            border: none;
            border-radius: 40px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: .3s;
        }

        .contact-form button:hover {
            transform: translateY(-4px);
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 22px;
        }

        .contact-box {
            display: flex;
            align-items: center;
            gap: 18px;
            padding: 22px;
            border-radius: 24px;
            background: rgba(15, 23, 42, 0.8);
            border: 1px solid var(--border);
            transition: .4s;
        }

        .contact-box:hover {
            transform: translateX(10px);
        }

        .contact-box i {
            width: 55px;
            height: 55px;
            border-radius: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(37, 99, 235, 0.18);
            color: #60a5fa;
            font-size: 22px;
        }

        /* FOOTER */
        .footer {
            padding: 90px 10% 30px;
            background:
                linear-gradient(to top, rgba(2, 6, 23, 1), rgba(15, 23, 42, 0.95));
            border-top: 1px solid rgba(255, 255, 255, 0.06);
        }

        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 50px;
            margin-bottom: 50px;
        }

        .logo img {
            width: 75px;
            height: 75px;
            border-radius: 20px;
            background: white;
            padding: 10px;
            transition: .4s;
        }

        .logo img:hover {
            transform: scale(1.08) rotate(-3deg);
        }

        .brand h2 {
            margin: 18px 0 12px;
            font-size: 28px;
        }

        .brand p {
            color: #94a3b8;
            line-height: 1.8;
        }

        .footer-col h3 {
            margin-bottom: 20px;
            font-size: 20px;
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col ul li {
            margin-bottom: 15px;
            color: #cbd5e1;
            transition: .3s;
        }

        .footer-col ul li:hover {
            transform: translateX(8px);
            color: #60a5fa;
        }

        .footer-col ul li i {
            margin-right: 10px;
            color: #60a5fa;
        }

        .footer-col a {
            text-decoration: none;
            color: inherit;
        }

        .socials {
            margin-top: 22px;
        }

        .socials a {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            background: rgba(255, 255, 255, 0.06);
            color: white;
            margin-right: 10px;
            transition: .3s;
        }

        .socials a:hover {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            transform: translateY(-5px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding-top: 20px;
            text-align: center;
            color: #94a3b8;
        }

        /* RESPONSIVE */
        @media(max-width:1100px) {
            .floating-card {
                display: none;
            }

            .hero h1 {
                font-size: 58px;
            }
        }

        @media(max-width:768px) {

            header {
                padding: 15px 20px;
                border-radius: 22px;
            }

            nav {
                position: absolute;
                top: 85px;
                right: 0;
                width: 240px;
                flex-direction: column;
                align-items: flex-start;
                padding: 25px;
                border-radius: 25px;
                background: rgba(15, 23, 42, 0.96);
                display: none;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
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
                padding: 120px 7% 80px;
                text-align: center;
                justify-content: center;
            }

            .hero-content {
                max-width: 100%;
            }

            .hero h1 {
                font-size: 48px;
            }

            .hero p {
                font-size: 16px;
            }

            .hero-buttons {
                justify-content: center;
            }

            .stats {
                justify-content: center;
            }

            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .about {
                flex-direction: column;
                text-align: center;
            }

            .about img {
                width: 100%;
            }

            .contact-container {
                flex-direction: column;
            }

            .section h2,
            .gallery h2,
            .contact h2,
            .testimonials h2,
            .about-text h2 {
                font-size: 38px;
            }
        }

        @media(max-width:500px) {

            .hero h1 {
                font-size: 40px;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
            }

            .gallery-grid img:nth-child(1),
            .gallery-grid img:nth-child(4) {
                grid-column: auto;
                grid-row: auto;
            }

            .stat {
                width: 100%;
            }

            .feature,
            .card,
            .testimonial {
                width: 100%;
            }

            .section,
            .gallery,
            .about,
            .contact,
            .features,
            .testimonials,
            .footer {
                padding-left: 6%;
                padding-right: 6%;
            }
        }
    </style>
</head>

<body>

    <!-- NAV -->
    <header>
        <h2>Carring<span>tom</span></h2>

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

        <div class="hero-content">

            <div class="hero-badge">
                <i class="fas fa-bolt"></i>
                Plataforma premium para negocios digitales
            </div>

            <h1>Crea tu negocio digital <span>moderno y profesional</span> 🚀</h1>

            <p>
                Convierte tu menú en una experiencia premium con QR, diseño moderno
                y una presencia digital que haga ver tu negocio mucho más profesional.
            </p>

            <div class="hero-buttons">
                <a href="#" class="btn-main">Comenzar ahora</a>
                <a href="#" class="btn-secondary">Ver demo</a>
            </div>

            <div class="stats">
                <div class="stat">
                    <h3>+500</h3>
                    <span>Negocios</span>
                </div>

                <div class="stat">
                    <h3>+10k</h3>
                    <span>Clientes</span>
                </div>
            </div>

        </div>

        <!-- CARD FLOTANTE -->
        <div class="floating-card">
            <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4">

            <h3>Experiencia Premium</h3>

            <p>
                Diseños modernos, menús digitales, QR inteligentes y una experiencia
                visual enfocada en aumentar ventas.
            </p>
        </div>

    </section>

    <!-- FEATURES -->
    <section class="features">

        <div class="feature">
            <i class="fas fa-qrcode"></i>
            <h3>QR Inteligente</h3>
            <p>Acceso rápido sin apps</p>
        </div>

        <div class="feature">
            <i class="fas fa-mobile-alt"></i>
            <h3>Responsive</h3>
            <p>Perfecto en cualquier dispositivo</p>
        </div>

        <div class="feature">
            <i class="fas fa-chart-line"></i>
            <h3>Más clientes</h3>
            <p>Aumenta tus ventas</p>
        </div>

    </section>

    <!-- CARDS -->
    <section class="section">
        <h2>Tipos de negocios</h2>

        <div class="cards">

            <div class="card">
                <img src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df">

                <div class="card-content">
                    <h3>Restaurantes</h3>
                    <p>Menú digital elegante</p>
                    <button>Ver más</button>
                </div>
            </div>

            <div class="card">
                <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93">

                <div class="card-content">
                    <h3>Cafeterías</h3>
                    <p>Diseño moderno</p>
                    <button>Ver más</button>
                </div>
            </div>

            <div class="card">
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f">

                <div class="card-content">
                    <h3>Tiendas</h3>
                    <p>Catálogo atractivo</p>
                    <button>Ver más</button>
                </div>
            </div>

        </div>
    </section>

    <!-- GALERIA -->
    <section class="gallery">
        <h2 style="text-align:center;">Galería</h2>

        <div class="gallery-grid">
            <img src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df">
            <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93">
            <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4">
            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f">
            <img src="https://images.unsplash.com/photo-1542831371-d531d36971e6">
            <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085">
        </div>
    </section>

    <!-- ABOUT -->
    <section class="about">

        <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d">

        <div class="about-text">
            <h2>Sobre nosotros</h2>

            <p>
                Impulsamos negocios con tecnología moderna, experiencias digitales
                premium y diseños profesionales enfocados en conversión.
            </p>

            <div class="about-box">
                <h3>Misión</h3>
                <p>Ayudar a negocios a crecer digitalmente.</p>
            </div>

            <div class="about-box">
                <h3>Visión</h3>
                <p>Ser líderes en innovación digital en Latinoamérica.</p>
            </div>
        </div>

    </section>

    <!-- TESTIMONIOS -->
    <section class="testimonials">

        <h2 style="text-align:center;">Clientes felices</h2>

        <div class="testimonial-container">

            <div class="testimonial">
                <img src="https://randomuser.me/api/portraits/men/32.jpg">
                <p>"Aumenté mis ventas en 40%"</p>
                <strong>- Carlos</strong>
            </div>

            <div class="testimonial">
                <img src="https://randomuser.me/api/portraits/women/44.jpg">
                <p>"Mi menú ahora se ve profesional"</p>
                <strong>- Ana</strong>
            </div>

            <div class="testimonial">
                <img src="https://randomuser.me/api/portraits/men/75.jpg">
                <p>"Mis clientes ahora ordenan más rápido y fácil"</p>
                <strong>- Luis</strong>
            </div>

        </div>

    </section>

    <!-- CONTACT -->
    <section class="contact">

        <h2 style="text-align:center;">Contáctanos 🚀</h2>

        <div class="contact-container">

            <!-- FORM -->
            <div class="contact-form">
                <input type="text" placeholder="Tu nombre">
                <input type="email" placeholder="Tu correo">
                <textarea rows="5" placeholder="Escribe tu mensaje..."></textarea>

                <button>Enviar mensaje</button>
            </div>

            <!-- INFO -->
            <div class="contact-info">

                <div class="contact-box">
                    <i class="fas fa-envelope"></i>

                    <div>
                        <strong>Email</strong>
                        <p>brianisaac@carringtom.com</p>
                    </div>
                </div>

                <div class="contact-box">
                    <i class="fas fa-phone"></i>

                    <div>
                        <strong>Teléfono</strong>
                        <p>+52 961 105 0667</p>
                    </div>
                </div>

                <div class="contact-box">
                    <i class="fas fa-map-marker-alt"></i>

                    <div>
                        <strong>Ubicación</strong>
                        <p>México</p>
                    </div>
                </div>

            </div>

        </div>

    </section>

    <!-- FOOTER -->
    <footer class="footer">

        <div class="footer-container">

            <!-- Marca -->
            <div class="footer-col brand">

                <div class="logo">
                    <img src="/images/logo.png" alt="Carringtom Logo">
                </div>

                <h2>Carringtom</h2>

                <p>
                    Diseño web profesional que convierte visitantes en clientes 🚀
                </p>

            </div>

            <!-- Navegación -->
            <div class="footer-col">
                <h3>Explorar</h3>

                <ul>
                    <li><a href="#"><i class="fas fa-home"></i> Inicio</a></li>
                    <li><a href="#"><i class="fas fa-briefcase"></i> Servicios</a></li>
                    <li><a href="#"><i class="fas fa-user"></i> Nosotros</a></li>
                    <li><a href="#"><i class="fas fa-envelope"></i> Contacto</a></li>
                </ul>
            </div>

            <!-- Servicios -->
            <div class="footer-col">
                <h3>Servicios</h3>

                <ul>
                    <li><i class="fas fa-code"></i> Desarrollo Web</li>
                    <li><i class="fas fa-mobile-alt"></i> Apps Móviles</li>
                    <li><i class="fas fa-chart-line"></i> Marketing</li>
                    <li><i class="fas fa-search"></i> SEO</li>
                </ul>
            </div>

            <!-- Contacto -->
            <div class="footer-col">

                <h3>Contacto</h3>

                <ul>
                    <li><i class="fas fa-envelope"></i> brianisaac@carringtom.com</li>
                    <li><i class="fas fa-phone"></i> +52 961 105 0667</li>
                </ul>

                <div class="socials">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                </div>

            </div>

        </div>

        <div class="footer-bottom">
            <p>© 2026 Carringtom - Todos los derechos reservados</p>
        </div>

    </footer>

    <script>
        function toggleMenu() {
            document.getElementById("menu").classList.toggle("active");
        }
    </script>

</body>

</html>
