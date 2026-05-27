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
            --dark-card: #0f172a;
            --white: #ffffff;
            --text: #64748b;
            --border: rgba(255, 255, 255, 0.08);
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: var(--dark);
            overflow-x: hidden;
            color: white;
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

            background: rgba(15, 23, 42, 0.75);
            backdrop-filter: blur(18px);

            border: 1px solid rgba(255, 255, 255, 0.08);

            box-shadow:
                0 10px 40px rgba(0, 0, 0, 0.35),
                inset 0 1px 0 rgba(255, 255, 255, 0.04);
        }

        header h2 {
            font-size: 30px;
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

        nav a::after {
            content: "";
            width: 0%;
            height: 2px;
            background: linear-gradient(to right, var(--secondary), var(--primary));
            position: absolute;
            left: 0;
            bottom: -6px;
            transition: .3s;
        }

        nav a:hover::after {
            width: 100%;
        }

        nav a:hover {
            color: white;
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 12px 24px;
            border-radius: 40px;
            text-decoration: none;
            font-weight: 600;
            transition: .4s;
            box-shadow: 0 12px 30px rgba(37, 99, 235, 0.35);
        }

        .btn-login:hover {
            transform: translateY(-4px);
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
            padding: 0 10%;
            position: relative;
            overflow: hidden;

            background:
                linear-gradient(to right, rgba(2, 6, 23, 0.93), rgba(2, 6, 23, 0.6)),
                url('https://images.unsplash.com/photo-1492724441997-5dc865305da7');

            background-size: cover;
            background-position: center;
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 500px;
            height: 500px;
            background: rgba(37, 99, 235, 0.25);
            filter: blur(140px);
            top: -180px;
            right: -120px;
            animation: glow 6s infinite alternate;
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(96, 165, 250, 0.2);
            filter: blur(120px);
            bottom: -120px;
            left: -120px;
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
            max-width: 700px;
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
            padding: 12px 20px;
            border-radius: 50px;
            background: rgba(255, 255, 255, 0.08);
            margin-bottom: 30px;
            color: #bfdbfe;
            border: 1px solid rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
        }

        .hero h1 {
            font-size: 75px;
            line-height: 1.05;
            font-weight: 800;
            margin-bottom: 25px;
        }

        .hero h1 span {
            background: linear-gradient(to right, white, #60a5fa);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            color: #cbd5e1;
            font-size: 18px;
            line-height: 1.8;
            margin-bottom: 35px;
        }

        .btn-main {
            display: inline-block;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            padding: 16px 36px;
            border-radius: 50px;
            text-decoration: none;
            color: white;
            font-weight: 600;
            transition: .4s;
            box-shadow: 0 15px 35px rgba(37, 99, 235, 0.35);
        }

        .btn-main:hover {
            transform: translateY(-5px);
        }

        /* HERO IMAGES */
        .hero-images {
            display: flex;
            gap: 18px;
            margin-top: 45px;
            flex-wrap: wrap;
        }

        .hero-img {
            width: 110px;
            height: 110px;
            border-radius: 24px;
            overflow: hidden;
            border: 3px solid rgba(255, 255, 255, 0.1);
            transition: .4s;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.35);
        }

        .hero-img:hover {
            transform: translateY(-10px) scale(1.05);
        }

        .hero-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* FLOATING CARD */
        .floating-card {
            position: absolute;
            right: 8%;
            top: 55%;
            transform: translateY(-50%);
            width: 330px;
            padding: 25px;
            border-radius: 30px;
            background: rgba(15, 23, 42, 0.82);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.45);
            animation: float 4s ease-in-out infinite;
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

        .floating-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 20px;
            margin-bottom: 20px;
        }

        .floating-card p {
            color: #cbd5e1;
            line-height: 1.7;
            margin-top: 10px;
        }

        /* FEATURES */
        .features {
            padding: 110px 10%;
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;

            background:
                linear-gradient(to bottom, #ffffff 0%, #f8fbff 100%);
        }

        .feature {
            width: 290px;
            padding: 40px 30px;
            border-radius: 28px;
            background: white;
            text-align: center;
            transition: .4s;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
        }

        .feature:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 45px rgba(37, 99, 235, 0.2);
        }

        .feature i {
            font-size: 42px;
            color: var(--primary);
            margin-bottom: 20px;
        }

        .feature h3 {
            color: #0f172a;
            margin-bottom: 12px;
        }

        .feature p {
            color: #64748b;
        }

        /* SECTION */
        .section {
            padding: 110px 10%;
            text-align: center;

            background:
                linear-gradient(to bottom, #eff6ff 0%, #dbeafe 100%);
        }

        .section h2,
        .gallery h2,
        .about h2,
        .testimonials h2,
        .contact h2 {
            font-size: 50px;
            margin-bottom: 20px;
            color: #0f172a;
        }

        /* CARDS */
        .cards {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            margin-top: 50px;
        }

        .card {
            width: 320px;
            border-radius: 30px;
            overflow: hidden;
            background: white;
            transition: .4s;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
        }

        .card:hover {
            transform: translateY(-14px);
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

        .card-content h3 {
            color: #0f172a;
        }

        .card-content p {
            color: #64748b;
            margin-top: 10px;
        }

        .card button {
            margin-top: 20px;
            border: none;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 12px 24px;
            border-radius: 30px;
            font-weight: 600;
            cursor: pointer;
        }

        /* GALLERY */
        .gallery {
            padding: 110px 10%;
            background:
                linear-gradient(to bottom, #2563eb 0%, #1d4ed8 100%);
        }

        .gallery h2 {
            color: white;
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
            transition: .5s;
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
            gap: 60px;
            flex-wrap: wrap;

            background:
                linear-gradient(to bottom, #ffffff 0%, #f8fbff 100%);
        }

        .about img {
            width: 450px;
            border-radius: 30px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }

        .about-text {
            max-width: 550px;
        }

        .about-text p {
            color: #64748b;
            line-height: 1.8;
        }

        .about-box {
            margin-top: 25px;
            padding: 25px;
            border-radius: 24px;
            background: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .about-box h3 {
            color: #0f172a;
            margin-bottom: 10px;
        }

        /* TESTIMONIALS */
        .testimonials {
            padding: 110px 10%;

            background:
                linear-gradient(to bottom, #dbeafe 0%, #bfdbfe 100%);
        }

        .testimonial-container {
            display: flex;
            gap: 30px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 50px;
        }

        .testimonial {
            width: 320px;
            background: white;
            padding: 35px 25px;
            border-radius: 28px;
            text-align: center;
            transition: .4s;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        }

        .testimonial:hover {
            transform: translateY(-10px);
        }

        .testimonial img {
            width: 85px;
            height: 85px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 18px;
        }

        .testimonial p {
            color: #64748b;
            line-height: 1.8;
            margin-bottom: 15px;
        }

        .testimonial strong {
            color: #0f172a;
        }

        /* CONTACT */
        .contact {
            padding: 110px 10%;

            background:
                linear-gradient(to bottom, #2563eb 0%, #1e40af 100%);
        }

        .contact h2 {
            color: white;
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
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 16px;
            border-radius: 16px;
            border: none;
            margin-bottom: 18px;
            background: rgba(255, 255, 255, 0.12);
            color: white;
            outline: none;
        }

        .contact-form input::placeholder,
        .contact-form textarea::placeholder {
            color: #dbeafe;
        }

        .contact-form button {
            width: 100%;
            padding: 16px;
            border: none;
            border-radius: 40px;
            background: white;
            color: #2563eb;
            font-weight: 700;
            cursor: pointer;
        }

        .contact-box {
            display: flex;
            align-items: center;
            gap: 18px;
            padding: 24px;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.08);
            margin-bottom: 20px;
            backdrop-filter: blur(10px);
        }

        .contact-box i {
            width: 55px;
            height: 55px;
            border-radius: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(255, 255, 255, 0.15);
            font-size: 22px;
        }

        /* FOOTER */
        .footer {
            padding: 90px 10% 30px;
            background: #020617;
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
                background: rgba(15, 23, 42, 0.98);
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
                padding: 120px 7% 80px;
                text-align: center;
                justify-content: center;
            }

            .hero h1 {
                font-size: 50px;
            }

            .hero-images {
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

            .hero-img {
                width: 90px;
                height: 90px;
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

            <h1>
                Crea tu negocio digital
                <span>moderno y profesional</span> 🚀
            </h1>

            <p>
                Convierte tu menú en una experiencia premium con QR,
                diseño moderno y una presencia digital impactante.
            </p>

            <a href="#" class="btn-main">Comenzar ahora</a>

            <!-- IMAGENES -->
            <div class="hero-images">

                <div class="hero-img">
                    <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4">
                </div>

                <div class="hero-img">
                    <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93">
                </div>

                <div class="hero-img">
                    <img src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df">
                </div>

            </div>

        </div>

        <!-- CARD FLOTANTE -->
        <div class="floating-card">

            <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4">

            <h3>Experiencia Premium</h3>

            <p>
                Diseños modernos, QR inteligentes y una experiencia visual
                enfocada en aumentar ventas.
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

</body>

<script>
    function toggleMenu() {
        document.getElementById("menu").classList.toggle("active");
    }
</script>

</html>