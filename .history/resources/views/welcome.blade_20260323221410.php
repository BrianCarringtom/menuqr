<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carringtom</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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

        nav {
            display: flex;
            gap: 20px;
        }

        nav a {
            text-decoration: none;
            color: #334155;
            font-weight: 500;
        }

        .btn {
            background: #22c55e;
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
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
            justify-content: space-between;
            padding: 0 10%;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.8)),
                url('https://images.unsplash.com/photo-1492724441997-5dc865305da7');
            background-size: cover;
            color: white;
        }

        .hero-text {
            max-width: 550px;
        }

        .hero h1 {
            font-size: 55px;
            line-height: 1.1;
        }

        .hero p {
            margin: 20px 0;
            color: #cbd5f5;
        }

        .badges {
            display: flex;
            gap: 15px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .badge {
            background: rgba(255, 255, 255, 0.1);
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 13px;
        }

        /* MOCKUP */
        .hero img {
            width: 350px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        /* LOGOS */
        .logos {
            padding: 40px 10%;
            text-align: center;
        }

        .logos img {
            width: 120px;
            margin: 20px;
            opacity: 0.6;
        }

        /* HOW */
        .how {
            padding: 80px 10%;
            text-align: center;
        }

        .steps {
            display: flex;
            gap: 40px;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 40px;
        }

        .step {
            max-width: 250px;
        }

        .step i {
            font-size: 35px;
            color: #22c55e;
            margin-bottom: 10px;
        }

        /* FEATURES */
        .features {
            padding: 80px 10%;
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }

        .feature {
            background: white;
            padding: 25px;
            border-radius: 20px;
            max-width: 260px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        .feature i {
            font-size: 30px;
            color: #22c55e;
            margin-bottom: 10px;
        }

        /* TESTIMONIOS */
        .testimonials {
            background: #ecfdf5;
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

        .testimonial {
            background: white;
            padding: 25px;
            border-radius: 20px;
            max-width: 300px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        }

        .testimonial img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .stars {
            color: gold;
            margin-bottom: 10px;
        }

        /* CTA */
        .cta {
            padding: 80px 10%;
            text-align: center;
            background: #020617;
            color: white;
        }

        .cta h2 {
            margin-bottom: 20px;
        }

        /* FOOTER */
        footer {
            padding: 40px 10%;
            background: #020617;
            color: #94a3b8;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        footer div {
            margin: 10px 0;
        }

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

            .hero {
                flex-direction: column;
                text-align: center;
            }

            .hero img {
                margin-top: 30px;
                width: 90%;
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
            <a href="#">Negocios</a>
            <a href="#">Contacto</a>
        </nav>

        <a href="#" class="btn">Entrar</a>
    </header>

    <section class="hero">
        <div class="hero-text">
            <h1>Tu negocio digital en minutos 🚀</h1>
            <p>Crea menús QR, atrae más clientes y mejora tu imagen profesional.</p>

            <a href="#" class="btn">Comenzar gratis</a>

            <div class="badges">
                <div class="badge">✔ Sin instalación</div>
                <div class="badge">✔ Fácil de usar</div>
                <div class="badge">✔ Más ventas</div>
            </div>
        </div>

        <img src="https://images.unsplash.com/photo-1581090700227-1e8a7c6bce6d">
    </section>

    <section class="logos">
        <p>Empresas que confían en nosotros</p>
        <img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg">
        <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg">
        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg">
    </section>

    <section class="how">
        <h2>¿Cómo funciona?</h2>

        <div class="steps">
            <div class="step">
                <i class="fas fa-user-plus"></i>
                <h3>Regístrate</h3>
                <p>Crea tu cuenta gratis</p>
            </div>

            <div class="step">
                <i class="fas fa-edit"></i>
                <h3>Crea tu menú</h3>
                <p>Agrega productos fácil</p>
            </div>

            <div class="step">
                <i class="fas fa-qrcode"></i>
                <h3>Comparte QR</h3>
                <p>Clientes acceden rápido</p>
            </div>
        </div>
    </section>

    <section class="features">
        <div class="feature">
            <i class="fas fa-mobile-alt"></i>
            <h3>100% Responsive</h3>
            <p>Se adapta a cualquier dispositivo</p>
        </div>

        <div class="feature">
            <i class="fas fa-bolt"></i>
            <h3>Rápido</h3>
            <p>Carga en segundos</p>
        </div>

        <div class="feature">
            <i class="fas fa-lock"></i>
            <h3>Seguro</h3>
            <p>Protección de datos</p>
        </div>
    </section>

    <section class="testimonials">
        <h2>Clientes felices</h2>

        <div class="cards">

            <div class="testimonial">
                <img src="https://randomuser.me/api/portraits/men/32.jpg">
                <div class="stars">★★★★★</div>
                <p>"Subí mis ventas rápido"</p>
                <strong>- Carlos</strong>
            </div>

            <div class="testimonial">
                <img src="https://randomuser.me/api/portraits/women/44.jpg">
                <div class="stars">★★★★★</div>
                <p>"Se ve muy profesional"</p>
                <strong>- Ana</strong>
            </div>

        </div>
    </section>

    <section class="cta">
        <h2>Empieza hoy 🚀</h2>
        <a href="#" class="btn">Crear mi negocio</a>
    </section>

    <footer>
        <div>© 2026 Carringtom</div>
        <div>Contacto | Soporte | Privacidad</div>
    </footer>

    <script>
        function toggleMenu() {
            document.getElementById("menu").classList.toggle("active");
        }
    </script>

</body>

</html>
