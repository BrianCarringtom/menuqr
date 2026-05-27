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
            --border: rgba(255, 255, 255, 0.15);
            --shadow: 0 10px 40px rgba(37, 99, 235, 0.12);
        }

        body {
            background: var(--bg);
            color: var(--text);
            overflow-x: hidden;
        }

        /* SCROLL */

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(var(--primary), #60a5fa);
            border-radius: 20px;
        }

        /* NAVBAR */

        header {
            position: fixed;
            width: 92%;
            top: 18px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(255, 255, 255, 0.82);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            padding: 16px 28px;
            border-radius: 70px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            box-shadow: 0 15px 45px rgba(15, 23, 42, 0.12);
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

        header h2 {
            font-size: 28px;
            font-weight: 800;
            background: linear-gradient(90deg, #2563eb, #60a5fa);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        nav {
            display: flex;
            gap: 28px;
            align-items: center;
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
            bottom: -6px;
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
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.25);
            transition: 0.4s;
        }

        .btn-login:hover {
            transform: translateY(-4px) scale(1.03);
            box-shadow: 0 15px 30px rgba(37, 99, 235, 0.4);
        }

        /* MOBILE */

        .menu-toggle {
            display: none;
            font-size: 24px;
            cursor: pointer;
            color: var(--primary);
        }

        /* HERO */

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 0 10%;
            position: relative;
            overflow: hidden;
            color: white;
            background:
                linear-gradient(rgba(2, 6, 23, 0.8),
                    rgba(15, 23, 42, 0.85)),
                url('https://images.unsplash.com/photo-1492724441997-5dc865305da7');
            background-size: cover;
            background-position: center;
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 600px;
            height: 600px;
            background: rgba(37, 99, 235, 0.25);
            filter: blur(120px);
            top: -150px;
            right: -120px;
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 400px;
            height: 400px;
            background: rgba(96, 165, 250, 0.2);
            filter: blur(120px);
            bottom: -100px;
            left: -100px;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 680px;
            margin-top: 70px;
            animation: fadeUp 1s ease;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(60px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero h1 {
            font-size: 72px;
            line-height: 1.05;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 18px;
            line-height: 1.8;
            color: #dbeafe;
            margin-bottom: 35px;
        }

        .btn-main {
            background: linear-gradient(135deg, var(--primary), #60a5fa);
            padding: 16px 34px;
            border-radius: 40px;
            text-decoration: none;
            color: white;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 15px 30px rgba(37, 99, 235, 0.35);
            transition: 0.4s;
        }

        .btn-main:hover {
            transform: translateY(-6px) scale(1.04);
        }

        .stats {
            margin-top: 45px;
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
        }

        .stat {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            padding: 24px;
            min-width: 180px;
            border-radius: 24px;
            transition: 0.4s;
        }

        .stat:hover {
            transform: translateY(-8px);
            background: rgba(255, 255, 255, 0.12);
        }

        .stat h3 {
            font-size: 34px;
            margin-bottom: 5px;
        }

        .stat span {
            color: #cbd5e1;
        }

        /* FEATURES */

        .features {
            padding: 110px 10%;
            display: flex;
            gap: 35px;
            justify-content: center;
            flex-wrap: wrap;
            position: relative;
        }

        .feature {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            padding: 40px 30px;
            border-radius: 28px;
            text-align: center;
            max-width: 320px;
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
            color: white;
            border-radius: 24px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            font-size: 30px;
            margin-bottom: 20px;
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.25);
        }

        .feature h3 {
            margin-bottom: 10px;
            font-size: 22px;
        }

        .feature p {
            color: var(--muted);
            line-height: 1.7;
        }

        /* SECTIONS */

        .section {
            padding: 100px 10%;
            text-align: center;
        }

        .section h2,
        .gallery h2,
        .contact h2,
        .testimonials h2,
        .about-text h2 {
            font-size: 46px;
            margin-bottom: 15px;
            color: var(--secondary);
            font-weight: 800;
        }

        .cards {
            display: flex;
            gap: 35px;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 60px;
        }

        .card {
            width: 320px;
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(14px);
            border-radius: 28px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: var(--shadow);
            transition: 0.45s;
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
            background: linear-gradient(135deg, var(--primary), #60a5fa);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 40px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.4s;
        }

        .card button:hover {
            transform: scale(1.05);
        }

        /* GALLERY */

        .gallery {
            background: linear-gradient(to bottom, #eff6ff, #dbeafe);
            padding: 100px 10%;
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
            border-radius: 24px;
            transition: 0.5s;
            box-shadow: var(--shadow);
        }

        .gallery-grid img:hover {
            transform: scale(1.04);
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
            padding: 110px 10%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 60px;
            flex-wrap: wrap;
        }

        .about img {
            width: 450px;
            border-radius: 30px;
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.12);
        }

        .about-text {
            max-width: 540px;
        }

        .about-text p {
            color: var(--muted);
            line-height: 1.9;
            margin-bottom: 20px;
        }

        .about-box {
            background: white;
            border-radius: 24px;
            padding: 28px;
            margin-top: 18px;
            box-shadow: var(--shadow);
            border-left: 5px solid var(--primary);
            transition: 0.4s;
        }

        .about-box:hover {
            transform: translateX(8px);
        }

        /* TESTIMONIALS */

        .testimonials {
            background: linear-gradient(135deg, #0f172a, #1e3a8a);
            padding: 110px 10%;
            color: white;
        }

        .testimonials h2 {
            color: white;
        }

        .testimonial-container {
            display: flex;
            gap: 30px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 50px;
        }

        .testimonial {
            max-width: 320px;
            padding: 35px;
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: 0.4s;
        }

        .testimonial:hover {
            transform: translateY(-10px);
        }

        .testimonial img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            margin-bottom: 18px;
            border: 4px solid rgba(255, 255, 255, 0.2);
        }

        .testimonial p {
            line-height: 1.8;
            color: #dbeafe;
            margin-bottom: 15px;
        }

        /* CONTACT */

        .contact {
            padding: 110px 10%;
            background: #f8fafc;
        }

        .contact-container {
            display: flex;
            gap: 35px;
            flex-wrap: wrap;
            margin-top: 60px;
        }

        .contact-form,
        .contact-info {
            flex: 1;
        }

        .contact-form {
            background: white;
            padding: 35px;
            border-radius: 30px;
            box-shadow: var(--shadow);
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 16px;
            border-radius: 18px;
            border: 2px solid #dbeafe;
            margin-bottom: 18px;
            outline: none;
            transition: 0.3s;
            color: var(--secondary);
        }

        .contact-form input:focus,
        .contact-form textarea:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 5px rgba(37, 99, 235, 0.1);
        }

        .contact-form button {
            width: 100%;
            background: linear-gradient(135deg, var(--primary), #60a5fa);
            color: white;
            border: none;
            padding: 16px;
            border-radius: 40px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.4s;
        }

        .contact-form button:hover {
            transform: translateY(-5px);
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 22px;
            justify-content: center;
        }

        .contact-box {
            background: white;
            padding: 22px;
            border-radius: 24px;
            display: flex;
            align-items: center;
            gap: 18px;
            box-shadow: var(--shadow);
            transition: 0.4s;
        }

        .contact-box:hover {
            transform: translateX(10px);
        }

        .contact-box i {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary), #60a5fa);
            color: white;
            border-radius: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 22px;
        }

        /* FOOTER */

        .footer {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #020617, #0f172a);
            color: white;
            padding: 100px 10% 30px;
        }

        .footer::before {
            content: "";
            position: absolute;
            width: 500px;
            height: 500px;
            background: rgba(37, 99, 235, 0.15);
            filter: blur(120px);
            top: -200px;
            left: -150px;
        }

        .footer-container {
            position: relative;
            z-index: 2;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 50px;
            margin-bottom: 60px;
        }

        .logo img {
            width: 72px;
            height: 72px;
            background: white;
            padding: 10px;
            border-radius: 20px;
            object-fit: contain;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
            transition: 0.4s;
        }

        .logo img:hover {
            transform: scale(1.08) rotate(-4deg);
        }

        .brand h2 {
            margin: 15px 0 10px;
            font-size: 28px;
        }

        .brand p {
            color: #cbd5e1;
            line-height: 1.8;
        }

        .footer-col h3 {
            margin-bottom: 20px;
            font-size: 20px;
            position: relative;
        }

        .footer-col h3::after {
            content: "";
            width: 50px;
            height: 4px;
            border-radius: 10px;
            background: linear-gradient(90deg, var(--primary), #60a5fa);
            display: block;
            margin-top: 8px;
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col ul li {
            margin-bottom: 14px;
            color: #cbd5e1;
            transition: 0.3s;
        }

        .footer-col ul li:hover {
            transform: translateX(8px);
            color: white;
        }

        .footer-col a {
            text-decoration: none;
            color: inherit;
        }

        .footer-col i {
            margin-right: 10px;
            color: #60a5fa;
        }

        .socials {
            margin-top: 20px;
        }

        .socials a {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin-right: 10px;
            background: rgba(255, 255, 255, 0.08);
            color: white;
            transition: 0.4s;
            backdrop-filter: blur(10px);
        }

        .socials a:hover {
            background: linear-gradient(135deg, var(--primary), #60a5fa);
            transform: translateY(-6px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding-top: 22px;
            text-align: center;
            color: #94a3b8;
        }

        /* RESPONSIVE */

        @media(max-width: 992px) {
            .hero h1 {
                font-size: 58px;
            }

            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width: 768px) {

            header {
                width: 94%;
                padding: 15px 22px;
            }

            nav {
                position: absolute;
                top: 85px;
                right: 0;
                width: 230px;
                padding: 25px;
                border-radius: 25px;
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(18px);
                box-shadow: 0 20px 45px rgba(0, 0, 0, 0.12);
                flex-direction: column;
                display: none;
                gap: 18px;
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
                padding: 0 7%;
                text-align: center;
            }

            .hero-content {
                margin-top: 100px;
            }

            .hero h1 {
                font-size: 42px;
            }

            .hero p {
                font-size: 15px;
            }

            .stats {
                justify-content: center;
            }

            .section h2,
            .gallery h2,
            .contact h2,
            .testimonials h2,
            .about-text h2 {
                font-size: 34px;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
            }

            .gallery-grid img:nth-child(1),
            .gallery-grid img:nth-child(4) {
                grid-column: auto;
                grid-row: auto;
            }

            .about {
                text-align: center;
            }

            .about img {
                width: 100%;
            }

            .contact-container {
                flex-direction: column;
            }

            .footer {
                padding: 80px 7% 30px;
            }

            .brand {
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <!-- NAV -->
    <header>
        <h2>Carringtom</h2>

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

            <h1>Crea tu negocio digital 🚀</h1>

            <p>
                Convierte tu menú en una experiencia moderna,
                elegante y profesional con tecnología QR,
                diseño premium y herramientas digitales.
            </p>

            <a href="#" class="btn-main">
                Comenzar ahora
                <i class="fas fa-arrow-right"></i>
            </a>

            <div class="stats">

                <div class="stat">
                    <h3>+500</h3>
                    <span>Negocios activos</span>
                </div>

                <div class="stat">
                    <h3>+10k</h3>
                    <span>Clientes felices</span>
                </div>

            </div>

        </div>
    </section>

    <!-- FEATURES -->
    <section class="features">

        <div class="feature">
            <i class="fas fa-qrcode"></i>
            <h3>QR Inteligente</h3>
            <p>Acceso instantáneo desde cualquier dispositivo sin aplicaciones.</p>
        </div>

        <div class="feature">
            <i class="fas fa-mobile-alt"></i>
            <h3>Diseño Responsive</h3>
            <p>Tu menú se verá increíble en celular, tablet y computadora.</p>
        </div>

        <div class="feature">
            <i class="fas fa-chart-line"></i>
            <h3>Más Ventas</h3>
            <p>Mejora la experiencia de tus clientes y aumenta conversiones.</p>
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
                    <p>Menús digitales premium y experiencia moderna.</p>
                    <button>Ver más</button>
                </div>
            </div>

            <div class="card">
                <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93">

                <div class="card-content">
                    <h3>Cafeterías</h3>
                    <p>Diseños minimalistas y visualmente atractivos.</p>
                    <button>Ver más</button>
                </div>
            </div>

            <div class="card">
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f">

                <div class="card-content">
                    <h3>Tiendas</h3>
                    <p>Catálogos modernos y experiencia elegante.</p>
                    <button>Ver más</button>
                </div>
            </div>

        </div>

    </section>

    <!-- GALLERY -->
    <section class="gallery">

        <h2 style="text-align:center;">Galería Profesional</h2>

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
                Ayudamos a negocios a transformarse digitalmente
                con diseño moderno, tecnología avanzada y una
                experiencia visual premium.
            </p>

            <div class="about-box">
                <h3>Misión</h3>
                <p>Impulsar negocios con soluciones digitales modernas.</p>
            </div>

            <div class="about-box">
                <h3>Visión</h3>
                <p>Convertirnos en líderes digitales en Latinoamérica.</p>
            </div>

        </div>

    </section>

    <!-- TESTIMONIOS -->
    <section class="testimonials">

        <h2 style="text-align:center;">Clientes felices</h2>

        <div class="testimonial-container">

            <div class="testimonial">
                <img src="https://randomuser.me/api/portraits/men/32.jpg">
                <p>"Aumenté mis ventas en un 40% gracias al menú digital."</p>
                <strong>- Carlos</strong>
            </div>

            <div class="testimonial">
                <img src="https://randomuser.me/api/portraits/women/44.jpg">
                <p>"Ahora mi negocio tiene una imagen más profesional."</p>
                <strong>- Ana</strong>
            </div>

            <div class="testimonial">
                <img src="https://randomuser.me/api/portraits/men/75.jpg">
                <p>"Mis clientes ordenan mucho más rápido y fácil."</p>
                <strong>- Luis</strong>
            </div>

        </div>

    </section>

    <!-- CONTACT -->
    <section class="contact">

        <h2 style="text-align:center;">Contáctanos 🚀</h2>

        <div class="contact-container">

            <div class="contact-form">

                <input type="text" placeholder="Tu nombre">
                <input type="email" placeholder="Tu correo">

                <textarea rows="5" placeholder="Escribe tu mensaje..."></textarea>

                <button>Enviar mensaje</button>

            </div>

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

            <div class="footer-col brand">

                <div class="logo">
                    <img src="/images/logo.png" alt="Carringtom Logo">
                </div>

                <h2>Carringtom</h2>

                <p>
                    Diseño web profesional y experiencias digitales
                    modernas que convierten visitantes en clientes.
                </p>

            </div>

            <div class="footer-col">

                <h3>Explorar</h3>

                <ul>
                    <li><a href="#"><i class="fas fa-home"></i> Inicio</a></li>
                    <li><a href="#"><i class="fas fa-briefcase"></i> Servicios</a></li>
                    <li><a href="#"><i class="fas fa-user"></i> Nosotros</a></li>
                    <li><a href="#"><i class="fas fa-envelope"></i> Contacto</a></li>
                </ul>

            </div>

            <div class="footer-col">

                <h3>Servicios</h3>

                <ul>
                    <li><i class="fas fa-code"></i> Desarrollo Web</li>
                    <li><i class="fas fa-mobile-alt"></i> Apps Móviles</li>
                    <li><i class="fas fa-chart-line"></i> Marketing</li>
                    <li><i class="fas fa-search"></i> SEO</li>
                </ul>

            </div>

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
            <p>© 2026 Carringtom — Todos los derechos reservados</p>
        </div>

    </footer>

    <script>
        function toggleMenu() {
            document.getElementById("menu").classList.toggle("active");
        }
    </script>

</body>

</html>