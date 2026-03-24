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
            background: #0f172a;
            color: #e2e8f0;
        }

        /* NAV */
        header {
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 8%;
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(10px);
            z-index: 1000;
        }

        .logo {
            font-weight: 700;
            font-size: 20px;
            color: white;
        }

        nav {
            display: flex;
            gap: 30px;
        }

        nav a {
            text-decoration: none;
            color: #cbd5f5;
            font-size: 14px;
        }

        .btn {
            background: #3b82f6;
            padding: 10px 20px;
            border-radius: 30px;
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        /* MOBILE */
        .menu-toggle {
            display: none;
            font-size: 22px;
            cursor: pointer;
        }

        /* HERO */
        .hero {
            padding: 140px 8% 80px;
            text-align: center;
        }

        .hero h1 {
            font-size: 60px;
            max-width: 800px;
            margin: auto;
            line-height: 1.1;
        }

        .hero p {
            margin-top: 20px;
            color: #94a3b8;
            font-size: 18px;
        }

        .hero-buttons {
            margin-top: 30px;
        }

        .btn-outline {
            border: 1px solid #3b82f6;
            padding: 10px 20px;
            border-radius: 30px;
            margin-left: 10px;
            color: #3b82f6;
            text-decoration: none;
        }

        /* GRID PRODUCT */
        .mockup {
            margin-top: 60px;
            display: flex;
            justify-content: center;
        }

        .mockup img {
            width: 800px;
            max-width: 100%;
            border-radius: 20px;
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.5);
        }

        /* FEATURES */
        .features {
            padding: 100px 8%;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
        }

        .feature {
            background: #1e293b;
            padding: 30px;
            border-radius: 20px;
        }

        .feature i {
            font-size: 25px;
            color: #3b82f6;
            margin-bottom: 10px;
        }

        /* TESTIMONIOS */
        .testimonials {
            padding: 100px 8%;
            text-align: center;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .card {
            background: #1e293b;
            padding: 25px;
            border-radius: 20px;
        }

        .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        /* CTA */
        .cta {
            padding: 100px 8%;
            text-align: center;
        }

        .cta h2 {
            font-size: 40px;
        }

        footer {
            padding: 40px;
            text-align: center;
            color: #64748b;
        }

        /* RESPONSIVE */
        @media(max-width:768px) {

            nav {
                position: absolute;
                top: 70px;
                right: 0;
                background: #1e293b;
                flex-direction: column;
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
                font-size: 38px;
            }

        }
    </style>
</head>

<body>

    <header>
        <div class="logo">Carringtom</div>

        <i class="fas fa-bars menu-toggle" onclick="toggleMenu()"></i>

        <nav id="menu">
            <a href="#">Producto</a>
            <a href="#">Soluciones</a>
            <a href="#">Precios</a>
            <a href="#">Contacto</a>
        </nav>

        <a href="#" class="btn">Entrar</a>
    </header>

    <section class="hero">
        <h1>Convierte tu negocio en digital sin complicarte</h1>
        <p>Crea menús QR, mejora tu imagen y atrae más clientes desde cualquier dispositivo.</p>

        <div class="hero-buttons">
            <a href="#" class="btn">Empezar gratis</a>
            <a href="#" class="btn-outline">Ver demo</a>
        </div>

        <div class="mockup">
            <img src="https://images.unsplash.com/photo-1551281044-8d8d0cbbf4c9">
        </div>
    </section>

    <section class="features">

        <div class="feature">
            <i class="fas fa-qrcode"></i>
            <h3>QR Inteligente</h3>
            <p>Comparte tu menú en segundos sin apps.</p>
        </div>

        <div class="feature">
            <i class="fas fa-mobile-alt"></i>
            <h3>Diseño adaptable</h3>
            <p>Perfecto en móvil, tablet y PC.</p>
        </div>

        <div class="feature">
            <i class="fas fa-chart-line"></i>
            <h3>Más ventas</h3>
            <p>Aumenta la visibilidad de tu negocio.</p>
        </div>

    </section>

    <section class="testimonials">
        <h2>Negocios reales ya confían</h2>

        <div class="cards">

            <div class="card">
                <img class="avatar" src="https://randomuser.me/api/portraits/men/32.jpg">
                <p>"Ahora mi negocio se ve profesional"</p>
                <strong>- Carlos</strong>
            </div>

            <div class="card">
                <img class="avatar" src="https://randomuser.me/api/portraits/women/44.jpg">
                <p>"Fácil y rápido de usar"</p>
                <strong>- Ana</strong>
            </div>

        </div>
    </section>

    <section class="cta">
        <h2>Empieza gratis hoy 🚀</h2>
        <a href="#" class="btn">Crear cuenta</a>
    </section>

    <footer>
        © 2026 Carringtom
    </footer>

    <script>
        function toggleMenu() {
            document.getElementById("menu").classList.toggle("active");
        }
    </script>

</body>

</html>
