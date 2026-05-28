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
            --dark: #020617;
            --card: #0f172a;
            --text: #cbd5e1;
            --white: #ffffff;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: var(--dark);
            color: white;
            overflow-x: hidden;
        }

        section {
            position: relative;
            z-index: 2;
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
            padding: 16px 28px;
            border-radius: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;

            background: rgba(15, 23, 42, 0.75);
            backdrop-filter: blur(18px);

            border: 1px solid rgba(255, 255, 255, 0.08);

            box-shadow:
                0 10px 40px rgba(0, 0, 0, 0.35);
        }

        header h2 {
            font-size: 28px;
            font-weight: 800;
            color: white;
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
            transform: translateY(-3px);
        }

        .menu-toggle {
            display: none;
            font-size: 24px;
            cursor: pointer;
        }

        /* HERO */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 130px 10% 90px;
            position: relative;
            overflow: hidden;

            background:
                linear-gradient(to right,
                    rgba(2, 6, 23, 0.96),
                    rgba(2, 6, 23, 0.72)),
                url('https://images.unsplash.com/photo-1492724441997-5dc865305da7');

            background-size: cover;
            background-position: center;
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 500px;
            height: 500px;
            background: rgba(37, 99, 235, 0.28);
            filter: blur(140px);
            top: -150px;
            right: -100px;
            animation: glow 5s infinite alternate;
        }

        @keyframes glow {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.2);
            }
        }

        .hero-content {
            max-width: 760px;
            position: relative;
            z-index: 5;
            animation: fadeUp 1.2s ease;
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

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 18px;
            border-radius: 40px;
            margin-bottom: 28px;

            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);

            border: 1px solid rgba(255, 255, 255, 0.08);

            color: #bfdbfe;
            font-size: 14px;
        }

        .hero h1 {
            font-size: 72px;
            line-height: 1.02;
            margin-bottom: 24px;
            font-weight: 800;
            letter-spacing: -2px;
        }

        .hero h1 span {
            background: linear-gradient(to right, white, #60a5fa);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            font-size: 18px;
            color: #cbd5e1;
            line-height: 1.9;
            margin-bottom: 38px;
            max-width: 620px;
        }

        .btn-main {
            display: inline-block;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            padding: 16px 34px;
            border-radius: 40px;
            text-decoration: none;
            color: white;
            font-weight: 600;
            transition: .4s;

            box-shadow:
                0 15px 35px rgba(37, 99, 235, 0.35);
        }

        .btn-main:hover {
            transform: translateY(-5px);
        }

        /* IMAGENES HERO */
        .hero-images {
            margin-top: 50px;
            display: flex;
            gap: 20px;
            flex-wrap: nowrap;
            align-items: center;
        }

        .hero-images img {
            width: 165px;
            height: 125px;
            object-fit: cover;

            border-radius: 26px;

            border: 1px solid rgba(255, 255, 255, 0.08);

            box-shadow:
                0 15px 35px rgba(0, 0, 0, 0.3);

            transition: .4s;
        }

        .hero-images img:nth-child(2) {
            transform: translateY(22px);
        }

        .hero-images img:hover {
            transform: translateY(-10px) scale(1.05);
        }

        .hero-images img:nth-child(2):hover {
            transform: translateY(10px) scale(1.05);
        }

        /* FEATURES */
        .features {
            padding: 100px 10%;
            background: white;
            color: #0f172a;

            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
        }

        .feature {
            width: 280px;
            text-align: center;
            padding: 40px 25px;
            border-radius: 28px;
            background: #f8fafc;
            transition: .4s;
            border: 1px solid #e2e8f0;
        }

        .feature:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 45px rgba(37, 99, 235, 0.12);
        }

        .feature i {
            font-size: 42px;
            margin-bottom: 18px;
            color: var(--primary);
        }

        .feature p {
            color: #475569;
            margin-top: 10px;
        }

        /* SECTION */
        .section {
            padding: 100px 10%;
            background:
                linear-gradient(to bottom, #071426, #081a33);
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: 50px;
            margin-bottom: 15px;
        }

        .section-title p {
            color: #94a3b8;
            max-width: 700px;
            margin: auto;
            line-height: 1.8;
        }

        /* CARDS */
        .cards {
            display: flex;
            gap: 30px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .card {
            width: 320px;
            border-radius: 30px;
            overflow: hidden;
            background: rgba(15, 23, 42, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.06);
            transition: .4s;
        }

        .card:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 45px rgba(37, 99, 235, 0.2);
        }

        .card img {
            width: 100%;
            height: 240px;
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
            margin-top: 10px;
            color: #94a3b8;
        }

        .card button {
            margin-top: 20px;
            padding: 12px 24px;
            border-radius: 30px;
            border: none;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            cursor: pointer;
            font-weight: 600;
        }

        /* GALERIA */
        .gallery {
            padding: 100px 10%;
            background: white;
            color: #0f172a;
        }

        .gallery-grid {
            margin-top: 50px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-auto-rows: 220px;
            gap: 18px;
        }

        .gallery-grid img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 24px;
            transition: .5s;
        }

        .gallery-grid img:hover {
            transform: scale(1.03);
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
            align-items: center;
            gap: 60px;
            flex-wrap: wrap;

            background:
                linear-gradient(to bottom, #081a33, #06111f);
        }

        .about img {
            width: 450px;
            border-radius: 30px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
        }

        .about-text {
            flex: 1;
        }

        .about-text h2 {
            font-size: 50px;
            margin-bottom: 20px;
        }

        .about-text p {
            color: #94a3b8;
            line-height: 1.9;
        }

        .about-boxes {
            margin-top: 30px;
            display: grid;
            gap: 20px;
        }

        .about-box {
            background: rgba(15, 23, 42, 0.8);
            border-radius: 25px;
            padding: 25px;
            border: 1px solid rgba(255, 255, 255, 0.06);
        }

        .about-box h3 {
            margin-bottom: 10px;
        }

        /* TESTIMONIOS */
        .testimonials {
            padding: 100px 10%;
            background: white;
            color: #0f172a;
        }

        .testimonial-container {
            margin-top: 50px;
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .testimonial {
            width: 320px;
            background: #f8fafc;
            border-radius: 28px;
            padding: 35px 25px;
            text-align: center;
            transition: .4s;
            border: 1px solid #e2e8f0;
        }

        .testimonial:hover {
            transform: translateY(-10px);
        }

        .testimonial img {
            width: 85px;
            height: 85px;
            border-radius: 50%;
            object-fit: cover;
            margin: auto auto 18px;
        }

        .testimonial p {
            color: #475569;
            line-height: 1.8;
            margin-bottom: 15px;
        }

        /* CONTACT */
        .contact {
            padding: 100px 10%;
            background:
                linear-gradient(to bottom, #081a33, #020617);
        }

        .contact-container {
            margin-top: 50px;
            display: flex;
            gap: 40px;
            flex-wrap: wrap;
        }

        .contact-form,
        .contact-info {
            flex: 1;
        }

        .contact-form {
            background: rgba(15, 23, 42, 0.8);
            border-radius: 30px;
            padding: 35px;
            border: 1px solid rgba(255, 255, 255, 0.06);
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 16px;
            margin-bottom: 18px;
            border-radius: 16px;
            border: 1px solid rgba(96, 165, 250, 0.15);
            background: rgba(255, 255, 255, 0.04);
            color: white;
            outline: none;
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
        }

        .contact-box {
            display: flex;
            align-items: center;
            gap: 18px;
            padding: 24px;
            border-radius: 24px;
            background: rgba(15, 23, 42, 0.8);
            margin-bottom: 20px;
            border: 1px solid rgba(255, 255, 255, 0.06);
        }

        .contact-box i {
            width: 58px;
            height: 58px;
            border-radius: 18px;
            background: rgba(37, 99, 235, 0.2);
            display: flex;
            justify-content: center;
            align-items: center;
            color: #60a5fa;
            font-size: 22px;
        }

        /* FOOTER */
        .footer {
            padding: 90px 10% 30px;
            background: #020617;
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
            border-radius: 22px;
            background: white;
            padding: 10px;
        }

        .brand h2 {
            margin: 18px 0 10px;
            font-size: 28px;
        }

        .brand p {
            color: #94a3b8;
            line-height: 1.8;
        }

        .footer-col h3 {
            margin-bottom: 20px;
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
            margin-top: 20px;
        }

        .socials a {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            background: rgba(255, 255, 255, 0.08);
            color: white;
            margin-right: 10px;
            transition: .3s;
        }

        .socials a:hover {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            transform: translateY(-5px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.06);
            padding-top: 20px;
            text-align: center;
            color: #94a3b8;
        }

        /* RESPONSIVE */
        @media(max-width:1100px) {
            .hero h1 {
                font-size: 58px;
            }
        }

        @media(max-width:768px) {

            header {
                padding: 15px 20px;
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
            }

            nav.active {
                display: flex;
            }

            .menu-toggle {
                display: block;
            }

            .btn-login {
                display: inline-flex;
                align-items: center;
                justify-content: center;

                padding: 10px 18px;
                font-size: 14px;

                border-radius: 30px;
                white-space: nowrap;
            }

            .hero {
                padding: 130px 7% 80px;
                text-align: center;
                justify-content: center;
            }

            .hero h1 {
                font-size: 48px;
            }

            .hero-images {
                justify-content: center;
                gap: 12px;
                margin-top: 35px;
                flex-wrap: nowrap;
            }

            .hero-images img {
                width: 110px;
                height: 130px;

                object-fit: cover;
                object-position: center;
                background: rgba(255, 255, 255, 0.04);
                padding: 4px;

                border-radius: 20px;

                border: 1px solid rgba(255, 255, 255, 0.12);

                box-shadow:
                    0 10px 25px rgba(0, 0, 0, 0.35);

                transition: .4s;
            }

            .hero-images img:nth-child(1) {
                transform: translateY(8px);
            }

            .hero-images img:nth-child(2) {
                transform: translateY(-10px);
            }

            .hero-images img:nth-child(3) {
                transform: translateY(8px);
            }

            .hero-images img:hover {
                transform: scale(1.05);
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

        @media(max-width:430px) {

            header {
                padding: 12px 14px;
            }

            header h2 {
                font-size: 22px;
            }

            .btn-login {
                padding: 8px 14px;
                font-size: 13px;
            }

            .menu-toggle {
                font-size: 22px;
            }

        }

        /* BOTON WHATSAPP */
        .whatsapp-float {
            position: fixed;
            right: 22px;
            bottom: 22px;

            width: 65px;
            height: 65px;

            border-radius: 50%;

            background: linear-gradient(135deg, #25d366, #1ebe5d);

            display: flex;
            justify-content: center;
            align-items: center;

            color: white;
            font-size: 32px;

            text-decoration: none;

            z-index: 9999;

            transition: .35s;
        }

        .whatsapp-float:hover {
            transform: translateY(-6px) scale(1.08);
            box-shadow:
                0 20px 40px rgba(37, 211, 102, 0.55);
        }

        /* EFECTO PULSO */
        .whatsapp-float::before {
            content: "";
            position: absolute;

            width: 100%;
            height: 100%;

            border-radius: 50%;

            background: rgba(37, 211, 102, 0.45);

            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: .7;
            }

            70% {
                transform: scale(1.5);
                opacity: 0;
            }

            100% {
                transform: scale(1.5);
                opacity: 0;
            }
        }

        .whatsapp-float i {
            position: relative;
            z-index: 2;
        }

        @media(max-width:500px) {
            .whatsapp-float {
                width: 58px;
                height: 58px;
                font-size: 28px;

                right: 16px;
                bottom: 20px;
            }
        }

        @media(max-width:340px) {
            .whatsapp-float {
                width: 58px;
                height: 58px;
                font-size: 28px;

                right: 16px;
                bottom: 10px;
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
            <a href="#negocios">Negocios</a>
            <a href="#galeria">Galeria</a>
            <a href="#contacto">Contacto</a>
        </nav>

        <a href="/login" class="btn-login">Login</a>

    </header>

    <!-- HERO -->
    <section class="hero" id="inicio">

        <div class="hero-content">

            <div class="hero-badge">
                <i class="fas fa-bolt"></i>
                Plataforma premium para negocios digitales
            </div>

            <h1>
                Crea tu negocio digital
                <span>moderno y profesional</span> 🚀
            </h1>

            <p>
                Lleva tu menú a otro nivel con QR, diseño moderno y presencia profesional.
            </p>

            <a href="#features" class="btn-main">Comenzar ahora</a>

            <div class="hero-images">
                <img src="/images/welcome1.jpeg">
                <img src="/images/welcome2.jpg">
                <img src="/images/welcome3.jpg">
            </div>

        </div>

    </section>

    <!-- FEATURES -->
    <section class="features" id="features">

        <div class="feature">
            <i class="fas fa-qrcode"></i>
            <h3>QR Inteligente</h3>
            <p>Acceso rápido sin aplicaciones externas.</p>
        </div>

        <div class="feature">
            <i class="fas fa-mobile-alt"></i>
            <h3>Responsive</h3>
            <p>Diseño perfecto en celular, tablet y PC.</p>
        </div>

        <div class="feature">
            <i class="fas fa-chart-line"></i>
            <h3>Más clientes</h3>
            <p>Convierte visitas en ventas reales.</p>
        </div>

    </section>

    <!-- TIPOS NEGOCIOS -->
    <section class="section" id="negocios">

        <div class="section-title">
            <h2>Tipos de negocios</h2>
            <p>
                Diseños modernos y premium adaptados para restaurantes,
                cafeterías, tiendas y cualquier tipo de negocio digital.
            </p>
        </div>

        <div class="cards">

            <div class="card">
                <img src="/images/restaurante.jpg">

                <div class="card-content">
                    <h3>Restaurantes</h3>
                    <p>Menús digitales elegantes y modernos.</p>
                    <button>Ver más</button>
                </div>
            </div>

            <div class="card">
                <img src="/images/snack.jpeg">

                <div class="card-content">
                    <h3>Snacks</h3>
                    <p>Diseño visual atractivo para destacar.</p>
                    <button>Ver más</button>
                </div>
            </div>

            <div class="card">
                <img src="/images/barberia.jpeg">

                <div class="card-content">
                    <h3>Barberia</h3>
                    <p>Catálogos digitales profesionales.</p>
                    <button>Ver más</button>
                </div>
            </div>

        </div>

    </section>

    <!-- GALERIA -->
    <section class="gallery" id="galeria">

        <div class="section-title">
            <h2>Galería</h2>
            <p>
                Experiencias visuales modernas para negocios que quieren verse
                premium y profesionales.
            </p>
        </div>

        <div class="gallery-grid">
            <img src="/images/galeria1.webp">
            <img src="/images/galeria2.png">
            <img src="/images/galeria3.jpg">
            <img src="/images/galeria4.jpg">
            <img src="/images/galeria5.jpeg">
            <img src="/images/galeria6.jpg">
        </div>

    </section>

    <!-- ABOUT -->
    <section class="about" id="nosotros">

        <img src="/images/about.png">

        <div class="about-text">

            <h2>Sobre nosotros</h2>

            <p>
                Impulsamos negocios con tecnología moderna, diseño premium
                y experiencias digitales enfocadas en aumentar presencia,
                clientes y ventas.
            </p>

            <div class="about-boxes">

                <div class="about-box">
                    <h3>Misión</h3>
                    <p>
                        Ayudar a negocios a crecer digitalmente con herramientas
                        modernas y experiencias visuales profesionales.
                    </p>
                </div>

                <div class="about-box">
                    <h3>Visión</h3>
                    <p>
                        Ser líderes en innovación digital y diseño premium
                        para negocios en Latinoamérica.
                    </p>
                </div>

            </div>

        </div>

    </section>

    <!-- TESTIMONIOS -->
    <section class="testimonials">

        <div class="section-title">
            <h2>Clientes felices</h2>
            <p>
                Negocios que transformaron su imagen y aumentaron sus ventas
                gracias a Carringtom.
            </p>
        </div>

        <div class="testimonial-container">

            <div class="testimonial">
                <img src="/images/testimonia1.jpg">

                <p>
                    "Aumenté mis ventas en más del 40% gracias al nuevo diseño digital."
                </p>

                <strong>- Carlos</strong>
            </div>

            <div class="testimonial">
                <img src="/images/testimonia2.jpg">

                <p>
                    "Mi negocio ahora luce moderno y mucho más profesional."
                </p>

                <strong>- Ana</strong>
            </div>

            <div class="testimonial">
                <img src="/images/testimonia3.jpg">

                <p>
                    "Los clientes encuentran mi menú más rápido y visualmente atractivo."
                </p>

                <strong>- Luis</strong>
            </div>

        </div>

    </section>

    <!-- CONTACT -->
    <section class="contact" id="contacto">

        <div class="section-title">
            <h2>Contáctanos 🚀</h2>
            <p>
                Lleva tu negocio al siguiente nivel con una experiencia digital moderna.
            </p>
        </div>

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
                        <p>+52 961 123 4567</p>
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

            <!-- BRAND -->
            <div class="footer-col brand">

                <div class="logo">
                    <img src="/images/logo.png" alt="Carringtom">
                </div>

                <h2>Carringtom</h2>

                <p>
                    Diseño web profesional y experiencias digitales premium
                    para negocios modernos 🚀
                </p>

            </div>

            <!-- LINKS -->
            <div class="footer-col">

                <h3>Explorar</h3>

                <ul>
                    <li><a href="#inicio"><i class="fas fa-home"></i> Inicio</a></li>
                    <li><a href="#negocios"><i class="fas fa-briefcase"></i> Negocios</a></li>
                    <li><a href="#nosotros"><i class="fas fa-user"></i> Nosotros</a></li>
                    <li><a href="#contacto"><i class="fas fa-envelope"></i> Contacto</a></li>
                </ul>

            </div>

            <!-- SERVICES -->
            <div class="footer-col">

                <h3>Servicios</h3>

                <ul>
                    <li><i class="fas fa-code"></i> Desarrollo Web</li>
                    <li><i class="fas fa-mobile-alt"></i> Apps móviles</li>
                    <li><i class="fas fa-chart-line"></i> Marketing</li>
                    <li><i class="fas fa-search"></i> SEO</li>
                </ul>

            </div>

            <!-- CONTACT -->
            <div class="footer-col">

                <h3>Contacto</h3>

                <ul>
                    <li><i class="fas fa-envelope"></i> brianisaac@carringtom.com</li>
                    <li><i class="fas fa-phone"></i> +52 961 123 4567</li>
                </ul>

                <div class="socials">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                </div>

            </div>

        </div>

        <div class="footer-bottom">
            © 2026 Carringtom - Todos los derechos reservados
        </div>

    </footer>

    <!-- BOTON WHATSAPP -->
    <a href="https://wa.me/529611234567" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <script>
        function toggleMenu() {
            document.getElementById("menu").classList.toggle("active");
        }
    </script>

</body>

</html>
