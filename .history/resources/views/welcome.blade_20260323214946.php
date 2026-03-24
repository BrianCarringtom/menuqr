<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carringtom</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #020617;
            color: white;
            overflow-x: hidden;
        }

        /* ===== FONDO ANIMADO PRO ===== */
        body::before {
            content: "";
            position: fixed;
            width: 200%;
            height: 200%;
            background:
                radial-gradient(circle at 20% 30%, #00ffcc33, transparent),
                radial-gradient(circle at 80% 70%, #6366f133, transparent),
                radial-gradient(circle at 50% 50%, #22c55e22, transparent);
            animation: bgMove 12s infinite alternate ease-in-out;
            z-index: -1;
        }

        @keyframes bgMove {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(-100px, -50px);
            }
        }

        /* ===== HEADER ===== */
        header {
            position: sticky;
            top: 0;
            z-index: 100;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            backdrop-filter: blur(12px);
            background: rgba(2, 6, 23, 0.6);
            border-bottom: 1px solid #1e293b;
        }

        header h2 {
            color: #00ffcc;
        }

        nav a {
            margin-left: 20px;
            text-decoration: none;
            color: #cbd5f5;
            transition: 0.3s;
        }

        nav a:hover {
            color: #00ffcc;
        }

        /* ===== HERO ===== */
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            flex-direction: column;

            background:
                linear-gradient(rgba(2, 6, 23, 0.8), rgba(2, 6, 23, 0.9)),
                url('https://images.unsplash.com/photo-1498050108023-c5249f4df085');

            background-size: cover;
        }

        .hero h1 {
            font-size: 65px;
            animation: fadeUp 1s ease;
        }

        .hero span {
            color: #00ffcc;
        }

        .hero p {
            margin-top: 20px;
            color: #94a3b8;
            max-width: 600px;
        }

        /* ===== BOTÓN ===== */
        .btn {
            margin-top: 30px;
            padding: 15px 30px;
            border-radius: 12px;
            background: linear-gradient(45deg, #00ffcc, #22c55e);
            color: black;
            font-weight: bold;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn:hover {
            transform: scale(1.08);
            box-shadow: 0 0 30px #00ffcc;
        }

        /* ===== SECCIÓN FEATURES ===== */
        .features {
            padding: 100px 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .feature {
            background: rgba(15, 23, 42, 0.6);
            padding: 30px;
            border-radius: 20px;
            backdrop-filter: blur(10px);
            border: 1px solid #1e293b;
            transition: 0.4s;
        }

        .feature:hover {
            transform: translateY(-10px);
            box-shadow: 0 0 25px #00ffcc33;
        }

        /* ===== SHOWCASE ===== */
        .showcase {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            padding: 80px 20px;
            gap: 40px;
            justify-content: center;
        }

        .showcase img {
            width: 400px;
            border-radius: 20px;
            box-shadow: 0 0 40px #000;
            transition: 0.4s;
        }

        .showcase img:hover {
            transform: scale(1.05);
        }

        .showcase-text {
            max-width: 400px;
        }

        /* ===== CARDS ===== */
        .cards {
            display: flex;
            gap: 30px;
            justify-content: center;
            flex-wrap: wrap;
            padding: 60px 20px;
        }

        .card {
            width: 260px;
            border-radius: 20px;
            overflow: hidden;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid #1e293b;
            transition: 0.4s;
        }

        .card:hover {
            transform: translateY(-12px) scale(1.03);
            box-shadow: 0 0 30px #00ffcc44;
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .card h3 {
            margin: 15px;
        }

        .card p {
            margin: 0 15px 20px;
            color: #94a3b8;
        }

        /* ===== ANIMACIÓN ===== */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ===== FOOTER ===== */
        footer {
            padding: 30px;
            text-align: center;
            border-top: 1px solid #1e293b;
            color: #94a3b8;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header>
        <h2>Carringtom</h2>
        <nav>
            <a href="#">Inicio</a>
            <a href="#">Servicios</a>
            <a href="#">Demo</a>
            <a href="/login">Login</a>
        </nav>
    </header>

    <!-- HERO -->
    <section class="hero">
        <h1>Crea tu negocio <span>digital</span> 🚀</h1>
        <p>Menús QR, diseño moderno y herramientas para crecer rápido.</p>
        <a href="/login" class="btn">Empezar ahora</a>
    </section>

    <!-- FEATURES -->
    <section class="features">
        <div class="feature">
            <h3>⚡ Rápido</h3>
            <p>Crea tu menú en minutos.</p>
        </div>
        <div class="feature">
            <h3>📱 Responsive</h3>
            <p>Perfecto en cualquier dispositivo.</p>
        </div>
        <div class="feature">
            <h3>🎯 Profesional</h3>
            <p>Diseño moderno que vende.</p>
        </div>
    </section>

    <!-- SHOWCASE -->
    <section class="showcase">
        <img src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df">
        <div class="showcase-text">
            <h2>Control total de tu negocio</h2>
            <p>Administra productos, precios y comparte con QR.</p>
            <a href="/login" class="btn">Probar ahora</a>
        </div>
    </section>

    <!-- CARDS -->
    <section class="cards">
        <div class="card">
            <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93">
            <h3>Cafeterías</h3>
            <p>Diseño elegante para tu menú.</p>
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

    <!-- CTA FINAL -->
    <section class="hero" style="height: 60vh;">
        <h1>Empieza hoy 🚀</h1>
        <p>No te quedes atrás, digitaliza tu negocio.</p>
        <a href="/login" class="btn">Crear cuenta</a>
    </section>

    <!-- FOOTER -->
    <footer>
        © 2026 Carringtom - Nivel Startup 🔥
    </footer>

</body>

</html>
