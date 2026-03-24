<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carringtom PRO</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        /* ===== RESET ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #020617;
            color: white;
            line-height: 1.7;
        }

        /* ===== FONDO ANIMADO ===== */
        body::before {
            content: "";
            position: fixed;
            width: 200%;
            height: 200%;
            background:
                radial-gradient(circle at 20% 30%, #00ffcc33, transparent),
                radial-gradient(circle at 80% 70%, #6366f133, transparent),
                radial-gradient(circle at 50% 50%, #22c55e22, transparent);
            animation: bgMove 15s infinite alternate ease-in-out;
            z-index: -1;
        }

        @keyframes bgMove {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(-120px, -80px);
            }
        }

        /* ===== HEADER ===== */
        header {
            position: sticky;
            top: 0;
            padding: 18px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            backdrop-filter: blur(12px);
            background: rgba(2, 6, 23, 0.7);
            border-bottom: 1px solid #1e293b;
        }

        header h2 {
            color: #00ffcc;
            font-weight: 700;
            letter-spacing: 1px;
        }

        nav a {
            margin-left: 30px;
            color: #cbd5f5;
            text-decoration: none;
            font-size: 15px;
            transition: 0.3s;
        }

        nav a:hover {
            color: #00ffcc;
        }

        /* ===== HERO ===== */
        .hero {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 40px 20px;

            background:
                linear-gradient(rgba(2, 6, 23, 0.85), rgba(2, 6, 23, 0.95)),
                url('https://images.unsplash.com/photo-1498050108023-c5249f4df085');

            background-size: cover;
        }

        .hero h1 {
            font-size: clamp(32px, 6vw, 70px);
            max-width: 900px;
            line-height: 1.2;
        }

        .hero span {
            color: #00ffcc;
        }

        .hero p {
            margin-top: 20px;
            color: #94a3b8;
            max-width: 600px;
            font-size: 18px;
        }

        /* ===== BOTÓN ===== */
        .btn {
            margin-top: 35px;
            padding: 15px 35px;
            border-radius: 14px;
            background: linear-gradient(45deg, #00ffcc, #22c55e);
            color: black;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn:hover {
            transform: scale(1.08);
            box-shadow: 0 0 40px #00ffcc;
        }

        /* ===== FEATURES ===== */
        .features {
            padding: 120px 30px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 40px;
            max-width: 1200px;
            margin: auto;
        }

        .feature {
            padding: 35px;
            border-radius: 20px;
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid #1e293b;
            backdrop-filter: blur(10px);
            text-align: center;
            transition: 0.4s;
        }

        .feature i {
            font-size: 30px;
            margin-bottom: 15px;
            color: #00ffcc;
        }

        .feature h3 {
            margin-bottom: 10px;
        }

        .feature p {
            color: #94a3b8;
        }

        .feature:hover {
            transform: translateY(-10px);
            box-shadow: 0 0 30px #00ffcc33;
        }

        /* ===== SHOWCASE ===== */
        .showcase {
            padding: 120px 30px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
            max-width: 1200px;
            margin: auto;
        }

        .showcase img {
            width: 100%;
            border-radius: 20px;
            transition: 0.4s;
        }

        .showcase img:hover {
            transform: scale(1.05);
        }

        .showcase-text h2 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        .showcase-text p {
            color: #94a3b8;
        }

        /* ===== CARDS ===== */
        .cards {
            padding: 100px 30px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: auto;
        }

        .card {
            border-radius: 20px;
            overflow: hidden;
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid #1e293b;
            transition: 0.4s;
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card h3 {
            margin: 15px;
        }

        .card p {
            margin: 0 15px 20px;
            color: #94a3b8;
        }

        .card:hover {
            transform: translateY(-12px) scale(1.03);
            box-shadow: 0 0 35px #00ffcc44;
        }

        /* ===== CTA ===== */
        .cta {
            text-align: center;
            padding: 120px 20px;
        }

        .cta h2 {
            font-size: 40px;
        }

        .cta p {
            margin-top: 15px;
            color: #94a3b8;
        }

        /* ===== FOOTER ===== */
        footer {
            padding: 40px;
            text-align: center;
            border-top: 1px solid #1e293b;
            color: #94a3b8;
        }

        /* ===== RESPONSIVE ===== */
        @media(max-width:900px) {
            .showcase {
                grid-template-columns: 1fr;
                text-align: center;
            }

            header {
                padding: 15px 20px;
            }

            nav a {
                margin-left: 15px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

    <header>
        <h2>Carringtom</h2>
        <nav>
            <a href="#">Inicio</a>
            <a href="#">Servicios</a>
            <a href="#">Demo</a>
            <a href="/login">Login</a>
        </nav>
    </header>

    <section class="hero">
        <h1>Crea tu negocio <span>digital</span> 🚀</h1>
        <p>Menús QR, diseño moderno y herramientas para crecer rápido.</p>
        <a href="/login" class="btn">Empezar ahora</a>
    </section>

    <section class="features">
        <div class="feature">
            <i class="fas fa-bolt"></i>
            <h3>Ultra rápido</h3>
            <p>Crea tu menú en minutos sin complicaciones.</p>
        </div>

        <div class="feature">
            <i class="fas fa-mobile-screen"></i>
            <h3>100% Responsive</h3>
            <p>Se adapta perfecto a cualquier dispositivo.</p>
        </div>

        <div class="feature">
            <i class="fas fa-chart-line"></i>
            <h3>Escalable</h3>
            <p>Crece tu negocio sin límites.</p>
        </div>
    </section>

    <section class="showcase">
        <img src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df">
        <div class="showcase-text">
            <h2>Control total de tu negocio</h2>
            <p>Administra productos, precios y comparte con QR de forma profesional.</p>
            <a href="/login" class="btn">Probar ahora</a>
        </div>
    </section>

    <section class="cards">
        <div class="card">
            <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93">
            <h3>Cafeterías</h3>
            <p>Diseño elegante y atractivo.</p>
        </div>

        <div class="card">
            <img src="https://images.unsplash.com/photo-1585747860715-2ba37e788b70">
            <h3>Barberías</h3>
            <p>Servicios claros y modernos.</p>
        </div>

        <div class="card">
            <img src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df">
            <h3>Restaurantes</h3>
            <p>Menús digitales con QR.</p>
        </div>
    </section>

    <section class="cta">
        <h2>Empieza hoy 🚀</h2>
        <p>No te quedes atrás, digitaliza tu negocio.</p>
        <a href="/login" class="btn">Crear cuenta</a>
    </section>

    <footer>
        © 2026 Carringtom - Nivel Startup 🔥
    </footer>

</body>

</html>
