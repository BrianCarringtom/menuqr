<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carringtom PRO</title>

    <!-- FUENTE -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

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

        body {
            background: #f8fafc;
            color: #1e293b;
        }

        /* NAVBAR */
        header {
            position: fixed;
            width: 90%;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background: white;
            padding: 15px 25px;
            border-radius: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        header h2 {
            color: #22c55e;
        }

        nav {
            display: flex;
            gap: 20px;
        }

        nav a {
            text-decoration: none;
            color: #334155;
            font-weight: 500;
        }

        .btn-login {
            background: #22c55e;
            color: white;
            padding: 8px 18px;
            border-radius: 20px;
            text-decoration: none;
        }

        /* MENU MOBILE */
        .menu-toggle {
            display: none;
            font-size: 22px;
            cursor: pointer;
        }

        /* HERO */
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            padding: 0 10%;
            color: white;
            background:
                linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.7)),
                url('https://images.unsplash.com/photo-1492724441997-5dc865305da7');
            background-size: cover;
            background-position: center;
        }

        .hero-content {
            max-width: 600px;
            margin-top: 60px;
            /* ajusta este valor */
        }

        .hero h1 {
            font-size: 60px;
            line-height: 1.1;
        }

        .hero p {
            margin: 20px 0;
            color: #e2e8f0;
        }

        .btn-main {
            background: #22c55e;
            padding: 14px 28px;
            border-radius: 30px;
            text-decoration: none;
            color: white;
            font-weight: 600;
        }

        /* STATS */
        .stats {
            margin-top: 30px;
            display: flex;
            gap: 30px;
        }

        .stat h3 {
            font-size: 28px;
        }

        .stat span {
            font-size: 14px;
            color: #cbd5f5;
        }

        /* BENEFICIOS */
        .features {
            padding: 80px 10%;
            display: flex;
            gap: 40px;
            justify-content: center;
            flex-wrap: wrap;
            text-align: center;
        }

        .feature {
            max-width: 250px;
        }

        .feature i {
            font-size: 35px;
            color: #22c55e;
            margin-bottom: 15px;
        }

        /* CARDS */
        .section {
            padding: 50px 10%;
            text-align: center;
        }

        .cards {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 40px;
        }

        .card {
            background: white;
            border-radius: 20px;
            width: 300px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-content {
            padding: 20px;
        }

        .card button {
            margin-top: 15px;
            background: #22c55e;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
        }

        /* TESTIMONIOS */
        .testimonials {
            background: #ecfdf5;
            padding: 80px 10%;
        }

        .testimonial-container {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .testimonial {
            background: white;
            padding: 25px;
            border-radius: 20px;
            max-width: 300px;
            text-align: center;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        }

        .testimonial img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        /* FOOTER PRO */
        .footer {
            background: linear-gradient(135deg, #16a34a, #15803d);
            color: #ffffff;
            padding: 90px 10% 30px;
            position: relative;
            overflow: hidden;
        }

        /* efecto glow fondo */
        .footer::before {
            content: "";
            position: absolute;
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.08);
            filter: blur(120px);
            top: -100px;
            left: -100px;
        }

        /* layout */
        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 60px;
            margin-bottom: 50px;
            position: relative;
            z-index: 2;
        }

        /* marca */
        .brand {
            display: flex;
            flex-direction: column;
        }

        /* LOGO PRO */
        .logo img {
            width: 65px;
            height: 65px;
            object-fit: contain;
            border-radius: 16px;
            background: #ffffff;
            padding: 8px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
            transition: 0.4s;
        }

        /* hover brutal */
        .logo img:hover {
            transform: scale(1.12) rotate(-3deg);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
        }

        /* título marca */
        .brand h2 {
            font-size: 26px;
            font-weight: 800;
            margin: 12px 0 10px;
        }

        /* descripción */
        .brand p {
            font-size: 14px;
            line-height: 1.7;
            opacity: 0.9;
            max-width: 280px;
        }

        /* títulos */
        .footer-col h3 {
            margin-bottom: 18px;
            font-size: 18px;
            font-weight: 600;
            position: relative;
        }

        /* línea decorativa */
        .footer-col h3::after {
            content: "";
            width: 40px;
            height: 3px;
            background: #bbf7d0;
            display: block;
            margin-top: 6px;
            border-radius: 10px;
        }

        /* listas */
        .footer-col ul {
            list-style: none;
            padding: 0;
        }

        .footer-col ul li {
            margin-bottom: 12px;
            font-size: 14px;
            transition: 0.3s;
            display: flex;
            align-items: center;
        }

        /* iconos */
        .footer-col ul li i {
            margin-right: 10px;
            font-size: 14px;
            color: #bbf7d0;
        }

        /* hover moderno */
        .footer-col ul li:hover {
            transform: translateX(8px);
            color: #bbf7d0;
        }

        /* links */
        .footer-col a {
            text-decoration: none;
            color: inherit;
        }

        /* redes */
        .socials {
            margin-top: 18px;
        }

        /* botones redes PRO */
        .socials a {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin-right: 10px;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(8px);
            color: #ffffff;
            transition: 0.3s;
        }

        /* hover redes */
        .socials a:hover {
            background: #ffffff;
            color: #16a34a;
            transform: translateY(-6px) scale(1.1);
        }

        /* footer bottom */
        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding-top: 18px;
            text-align: center;
            font-size: 14px;
            opacity: 0.85;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .footer {
                padding: 70px 6% 25px;
            }

            .footer-container {
                gap: 40px;
            }

            .brand {
                align-items: center;
                text-align: center;
            }
        }

        /* RESPONSIVE */
        @media(max-width: 768px) {

            nav {
                position: absolute;
                top: 80px;
                right: 0;
                background: white;
                flex-direction: column;
                width: 200px;
                padding: 20px;
                display: none;
            }

            nav.active {
                display: flex;
            }

            .menu-toggle {
                display: block;
            }

            .hero h1 {
                font-size: 40px;
            }

            .stats {
                flex-direction: column;
            }
        }

        /* GALERIA COLLAGE */
        .gallery {
            background: #ecfdf5;
            padding: 80px 10%;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-auto-rows: 200px;
            gap: 15px;
            margin-top: 40px;
        }

        .gallery-grid img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 15px;
            transition: 0.4s;
        }

        .gallery-grid img:hover {
            transform: scale(1.05);
        }

        /* EFECTO COLLAGE */
        .gallery-grid img:nth-child(1) {
            grid-column: span 2;
            grid-row: span 2;
        }

        .gallery-grid img:nth-child(4) {
            grid-row: span 2;
        }

        /* CONOCENOS */
        .about {
            padding: 80px 10%;
            display: flex;
            gap: 40px;
            flex-wrap: wrap;
            align-items: center;
        }

        .about img {
            width: 400px;
            border-radius: 20px;
        }

        .about-text {
            max-width: 500px;
        }

        .about-box {
            margin-top: 20px;
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        /* CONTACTO PRO */
        .contact {
            padding: 100px 10%;
            background: white;
            color: black;
        }

        .contact h2 {
            margin-bottom: 50px;
            font-size: 32px;
        }

        .contact-container {
            display: flex;
            gap: 40px;
            flex-wrap: wrap;
        }

        /* FORM */
        .contact-form {
            flex: 1;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 14px;
            border: 2px solid #22c55e;
            border-radius: 12px;
            /* border: none; */
            margin-bottom: 15px;
            background: rgba(255, 255, 255, 0.08);
            color: white;
        }

        .contact-form input::placeholder,
        .contact-form textarea::placeholder {
            color: #94a3b8;
        }

        .contact-form button {
            width: 100%;
            background: #22c55e;
            padding: 14px;
            border-radius: 30px;
            border: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .contact-form button:hover {
            transform: scale(1.05);
            background: #16a34a;
        }

        /* INFO */
        .contact-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 20px;
        }

        .contact-box {
            display: flex;
            align-items: center;
            gap: 15px;
            background: rgba(255, 255, 255, 0.05);
            padding: 15px;
            border-radius: 15px;
            transition: 0.3s;
        }

        .contact-box i {
            font-size: 20px;
            color: #22c55e;
        }

        .contact-box:hover {
            transform: translateX(10px);
            background: rgba(255, 255, 255, 0.1);
        }

        /* RESPONSIVE */
        @media(max-width:768px) {
            .contact-container {
                flex-direction: column;
            }
        }

        /* RESPONSIVE */
        @media(max-width:768px) {
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
            <p>Convierte tu menú en una experiencia moderna con QR y diseño profesional.</p>
            <a href="#" class="btn-main">Comenzar</a>

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

    <section class="about">
        <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d">

        <div class="about-text">
            <h2>Sobre nosotros</h2>
            <p>Impulsamos negocios con tecnología moderna y diseño profesional.</p>

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
        <h2 style="text-align:center; margin-bottom:40px;">Clientes felices</h2>

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

    <section class="contact">
        <h2 style="text-align:center;">Contáctanos 🚀</h2>

        <div class="contact-container">

            <!-- FORM -->
            <div class="contact-form">
                <input type="text" placeholder="Tu nombre">
                <input type="email" placeholder="Tu correo">
                <textarea rows="5" placeholder="Escribe tu mensaje..."></textarea>
                <button style="color: #f8fafc">Enviar mensaje</button>
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
                <p>Diseño web profesional que convierte visitantes en clientes 🚀</p>

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
