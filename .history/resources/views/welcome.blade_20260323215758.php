<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carringtom</title>

    <!-- ICONOS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- FUENTE -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #0f172a;
            color: white;
        }

        /* NAV */
        nav {
            display: flex;
            justify-content: space-between;
            padding: 20px 50px;
            background: rgba(2, 6, 23, 0.7);
            backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
        }

        .logo {
            color: #00ffcc;
            font-weight: 700;
        }

        .nav-links a {
            margin: 0 15px;
            color: #cbd5f5;
            text-decoration: none;
        }

        .btn {
            background: linear-gradient(135deg, #00ffcc, #00c3ff);
            padding: 10px 20px;
            border-radius: 10px;
            color: black;
            text-decoration: none;
            font-weight: bold;
        }

        /* HERO */
        .hero {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            padding: 80px;
            background:
                linear-gradient(rgba(2, 6, 23, 0.7), rgba(15, 23, 42, 0.9)),
                url('https://images.unsplash.com/photo-1556740738-b6a63e27c4df');
            background-size: cover;
        }

        .hero h1 {
            font-size: 50px;
        }

        .hero p {
            color: #cbd5f5;
            margin: 20px 0;
        }

        .hero img {
            width: 100%;
            border-radius: 15px;
        }

        /* SECTION */
        section {
            padding: 80px 50px;
            text-align: center;
        }

        h2 {
            margin-bottom: 15px;
        }

        p {
            color: #94a3b8;
        }

        /* FEATURES */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 40px;
        }

        .card {
            background: #020617;
            padding: 25px;
            border-radius: 15px;
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card i {
            font-size: 28px;
            color: #00ffcc;
        }

        /* IMAGE SECTION */
        .image-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            gap: 40px;
        }

        .image-section img {
            width: 100%;
            border-radius: 15px;
        }

        /* TESTIMONIOS */
        .testimonials {
            background: #020617;
        }

        .testimonial {
            background: #0f172a;
            padding: 20px;
            border-radius: 15px;
        }

        .stars {
            color: gold;
        }

        /* CTA */
        .cta {
            background: linear-gradient(135deg, #00ffcc, #00c3ff);
            color: black;
        }

        /* FOOTER */
        footer {
            text-align: center;
            padding: 30px;
            color: #94a3b8;
        }

        /* RESPONSIVE */
        @media(max-width:900px) {
            .hero {
                grid-template-columns: 1fr;
                text-align: center;
                padding: 50px;
            }

            .image-section {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <!-- NAV -->
    <nav>
        <div class="logo"><i class="fa-solid fa-bolt"></i> Carringtom</div>
        <div class="nav-links">
            <a href="#">Inicio</a>
            <a href="#">Servicios</a>
            <a href="#">Precios</a>
            <a href="#">Contacto</a>
        </div>
        <a href="/login" class="btn">Entrar</a>
    </nav>

    <!-- HERO -->
    <section class="hero">
        <div>
            <h1>Digitaliza tu negocio 🚀</h1>
            <p>Crea menús QR, atrae clientes y haz crecer tu negocio.</p>
            <a href="/login" class="btn">Comenzar</a>
        </div>
        <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836">
    </section>

    <!-- FEATURES -->
    <section>
        <h2>Todo lo que necesitas</h2>
        <div class="grid">
            <div class="card"><i class="fa-solid fa-qrcode"></i>
                <h3>QR</h3>
            </div>
            <div class="card"><i class="fa-solid fa-mobile"></i>
                <h3>Responsive</h3>
            </div>
            <div class="card"><i class="fa-solid fa-chart-line"></i>
                <h3>Estadísticas</h3>
            </div>
            <div class="card"><i class="fa-solid fa-lock"></i>
                <h3>Seguridad</h3>
            </div>
        </div>
    </section>

    <!-- IMAGE SECTION -->
    <section class="image-section">
        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f">
        <div>
            <h2>Control total</h2>
            <p>Administra tu negocio desde cualquier lugar.</p>
        </div>
    </section>

    <!-- TESTIMONIOS -->
    <section class="testimonials">
        <h2>Lo que dicen nuestros clientes</h2>

        <div class="grid">
            <div class="testimonial">
                <p>"Aumenté mis ventas gracias al QR"</p>
                <div class="stars">★★★★★</div>
                <strong>- Cliente</strong>
            </div>

            <div class="testimonial">
                <p>"Muy fácil de usar y profesional"</p>
                <div class="stars">★★★★★</div>
                <strong>- Usuario</strong>
            </div>

            <div class="testimonial">
                <p>"Mis clientes aman el menú digital"</p>
                <div class="stars">★★★★★</div>
                <strong>- Negocio</strong>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta">
        <h2>Empieza hoy</h2>
        <p>Haz crecer tu negocio digital</p>
        <a href="/login" class="btn">Crear cuenta</a>
    </section>

    <!-- FOOTER -->
    <footer>
        © 2026 Carringtom - Profesional 🚀
    </footer>

</body>

</html>
