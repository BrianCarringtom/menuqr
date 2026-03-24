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

        /* NAVBAR */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background: rgba(2, 6, 23, 0.7);
            backdrop-filter: blur(12px);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            font-weight: 700;
            font-size: 22px;
            color: #00ffcc;
        }

        .nav-links a {
            margin: 0 15px;
            text-decoration: none;
            color: #cbd5f5;
            transition: 0.3s;
        }

        .nav-links a:hover {
            color: #00ffcc;
        }

        .nav-btn {
            background: linear-gradient(135deg, #00ffcc, #00c3ff);
            padding: 10px 20px;
            border-radius: 10px;
            color: black;
            font-weight: bold;
            text-decoration: none;
        }

        /* HERO */
        .hero {
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            padding: 100px 50px;
            gap: 40px;
        }

        .hero-text h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .hero-text p {
            color: #94a3b8;
            margin-bottom: 25px;
        }

        .hero-buttons a {
            margin-right: 15px;
        }

        .btn-primary {
            background: #00ffcc;
            color: black;
            padding: 14px 25px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-secondary {
            border: 1px solid #00ffcc;
            padding: 14px 25px;
            border-radius: 10px;
            text-decoration: none;
            color: white;
        }

        .hero-img img {
            width: 100%;
            border-radius: 15px;
        }

        /* STATS */
        .stats {
            display: flex;
            justify-content: center;
            gap: 50px;
            padding: 40px;
            text-align: center;
        }

        .stats h2 {
            color: #00ffcc;
        }

        /* FEATURES */
        .features {
            padding: 80px 50px;
            text-align: center;
        }

        .features h2 {
            margin-bottom: 20px;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 40px;
        }

        .feature {
            background: #020617;
            padding: 25px;
            border-radius: 15px;
            transition: 0.3s;
        }

        .feature:hover {
            transform: translateY(-10px);
        }

        .feature i {
            font-size: 30px;
            color: #00ffcc;
            margin-bottom: 10px;
        }

        /* CTA */
        .cta {
            text-align: center;
            padding: 80px 20px;
            background: linear-gradient(135deg, #00ffcc, #00c3ff);
            color: black;
        }

        .cta a {
            margin-top: 20px;
            display: inline-block;
            background: black;
            color: white;
            padding: 14px 25px;
            border-radius: 10px;
            text-decoration: none;
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
            }

            nav {
                padding: 20px;
            }

            .stats {
                flex-direction: column;
                gap: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav>
        <div class="logo"><i class="fa-solid fa-bolt"></i> Carringtom</div>

        <div class="nav-links">
            <a href="#">Inicio</a>
            <a href="#">Servicios</a>
            <a href="#">Precios</a>
            <a href="#">Contacto</a>
        </div>

        <a href="/login" class="nav-btn">Entrar</a>
    </nav>

    <!-- HERO -->
    <section class="hero">

        <div class="hero-text">
            <h1>Convierte tu negocio en digital 🚀</h1>
            <p>
                Crea menús QR, gestiona tu negocio y atrae más clientes con una plataforma moderna.
            </p>

            <div class="hero-buttons">
                <a href="/login" class="btn-primary">Empezar</a>
                <a href="#" class="btn-secondary">Ver demo</a>
            </div>
        </div>

        <div class="hero-img">
            <img src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df">
        </div>

    </section>

    <!-- STATS -->
    <section class="stats">
        <div>
            <h2>+500</h2>
            <p>Negocios activos</p>
        </div>
        <div>
            <h2>+10k</h2>
            <p>Clientes atendidos</p>
        </div>
        <div>
            <h2>99%</h2>
            <p>Satisfacción</p>
        </div>
    </section>

    <!-- FEATURES -->
    <section class="features">
        <h2>Todo lo que necesitas</h2>
        <p>Herramientas diseñadas para crecer tu negocio</p>

        <div class="feature-grid">

            <div class="feature">
                <i class="fa-solid fa-qrcode"></i>
                <h3>QR Inteligente</h3>
                <p>Comparte tu menú al instante.</p>
            </div>

            <div class="feature">
                <i class="fa-solid fa-mobile"></i>
                <h3>100% Responsive</h3>
                <p>Perfecto en celular y tablet.</p>
            </div>

            <div class="feature">
                <i class="fa-solid fa-chart-line"></i>
                <h3>Analítica</h3>
                <p>Conoce a tus clientes.</p>
            </div>

            <div class="feature">
                <i class="fa-solid fa-lock"></i>
                <h3>Seguridad</h3>
                <p>Tus datos siempre protegidos.</p>
            </div>

        </div>
    </section>

    <!-- CTA -->
    <section class="cta">
        <h2>Empieza hoy mismo</h2>
        <p>Crea tu negocio digital en minutos</p>
        <a href="/login">Crear cuenta</a>
    </section>

    <!-- FOOTER -->
    <footer>
        © 2026 Carringtom - Plataforma profesional 🚀
    </footer>

</body>

</html>