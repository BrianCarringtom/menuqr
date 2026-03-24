<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carringtom PRO</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
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

        /* NAV */
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
        }

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
        }

        .hero-content {
            max-width: 600px;
            transform: translateY(40px);
        }

        .hero h1 {
            font-size: 60px;
        }

        .hero p {
            margin: 20px 0;
            color: #e2e8f0;
        }

        .btn-main {
            background: #22c55e;
            padding: 14px 28px;
            border-radius: 30px;
            color: white;
            text-decoration: none;
        }

        .stats {
            display: flex;
            gap: 30px;
            margin-top: 30px;
        }

        .stat h3 {
            font-size: 28px;
        }

        .stat span {
            font-size: 14px;
            color: #cbd5f5;
        }

        /* FEATURES */
        .features {
            padding: 80px 10%;
            display: flex;
            gap: 40px;
            justify-content: center;
            flex-wrap: wrap;
            text-align: center;
        }

        .feature i {
            font-size: 35px;
            color: #22c55e;
            margin-bottom: 10px;
        }

        /* CARDS */
        .section {
            padding: 80px 10%;
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
            transition: .3s;
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

        /* GALERIA */
        .gallery {
            padding: 80px 10%;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 40px;
        }

        .gallery img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 15px;
            transition: .3s;
        }

        .gallery img:hover {
            transform: scale(1.05);
        }

        /* CONOCENOS */
        .about {
            padding: 80px 10%;
            display: flex;
            gap: 50px;
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

        /* CONTACTO */
        .contact {
            padding: 80px 10%;
            background: #ecfdf5;
        }

        .contact-container {
            display: flex;
            gap: 40px;
            flex-wrap: wrap;
        }

        .contact form {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .contact input,
        .contact textarea {
            padding: 12px;
            border-radius: 10px;
            border: 1px solid #ccc;
        }

        .contact button {
            background: #22c55e;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }

        .contact-info {
            flex: 1;
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
        }

        /* FOOTER */
        footer {
            background: #020617;
            color: #94a3b8;
            padding: 40px;
            text-align: center;
        }

        /* RESPONSIVE */
        @media(max-width:768px) {

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

    <header>
        <h2>Carringtom</h2>

        <i class="fas fa-bars menu-toggle" onclick="toggleMenu()"></i>

        <nav id="menu">
            <a href="#">Inicio</a>
            <a href="#">Servicios</a>
            <a href="#">Galería</a>
            <a href="#">Contacto</a>
        </nav>

        <a href="#" class="btn-login">Login</a>
    </header>

    <!-- HERO -->
    <section class="hero">
        <div class="hero-content">
            <h1>Crea tu negocio digital 🚀</h1>
            <p>Convierte tu menú en una experiencia moderna con QR.</p>
            <a href="#" class="btn-main">Comenzar</a>

            <div class="stats">
                <div class="stat">
                    <h3>+500</h3><span>Negocios</span>
                </div>
                <div class="stat">
                    <h3>+10k</h3><span>Clientes</span>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES -->
    <section class="features">
        <div class="feature"><i class="fas fa-qrcode"></i>
            <h3>QR Inteligente</h3>
        </div>
        <div class="feature"><i class="fas fa-mobile-alt"></i>
            <h3>Responsive</h3>
        </div>
        <div class="feature"><i class="fas fa-chart-line"></i>
            <h3>Más ventas</h3>
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
        </div>
    </section>

    <!-- CONOCENOS -->
    <section class="about">
        <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d">

        <div class="about-text">
            <h2>Sobre nosotros</h2>
            <p>Ayudamos a negocios a digitalizarse con tecnología moderna.</p>

            <div class="about-box">
                <h3>Misión</h3>
                <p>Impulsar negocios con soluciones digitales.</p>
            </div>

            <div class="about-box">
                <h3>Visión</h3>
                <p>Ser líderes en transformación digital.</p>
            </div>

        </div>
    </section>

    <!-- CONTACTO -->
    <section class="contact">
        <h2 style="text-align:center;">Contacto</h2>

        <div class="contact-container">

            <form>
                <input type="text" placeholder="Nombre">
                <input type="email" placeholder="Correo">
                <textarea placeholder="Mensaje"></textarea>
                <button>Enviar</button>
            </form>

            <div class="contact-info">
                <h3>Contáctanos</h3>
                <p><i class="fas fa-envelope"></i> contacto@carringtom.com</p>
                <p><i class="fas fa-phone"></i> +52 961 000 0000</p>
                <p><i class="fas fa-map"></i> México</p>
            </div>

        </div>
    </section>

    <!-- TESTIMONIOS -->
    <section class="testimonials">
        <h2 style="text-align:center;">Clientes felices</h2>

        <div class="testimonial-container">
            <div class="testimonial">
                <p>"Aumenté mis ventas 🚀"</p>
                <strong>- Carlos</strong>
            </div>

            <div class="testimonial">
                <p>"Diseño increíble"</p>
                <strong>- Ana</strong>
            </div>
        </div>
    </section>

    <footer>
        <p>© 2026 Carringtom PRO</p>
    </footer>

    <script>
        function toggleMenu() {
            document.getElementById("menu").classList.toggle("active");
        }
    </script>

</body>

</html>
