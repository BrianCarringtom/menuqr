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

        /* ===== FONDO ANIMADO ===== */
        body::before {
            content: "";
            position: fixed;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at 30% 30%, #00ffcc33, transparent),
                radial-gradient(circle at 70% 70%, #6366f133, transparent);
            animation: moveBg 10s infinite alternate;
            z-index: -1;
        }

        @keyframes moveBg {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(-100px, -100px);
            }
        }

        /* ===== HEADER ===== */
        header {
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            backdrop-filter: blur(10px);
            background: rgba(2, 6, 23, 0.6);
            border-bottom: 1px solid #1e293b;
        }

        header h2 {
            color: #00ffcc;
        }

        header a {
            text-decoration: none;
            color: white;
            border: 1px solid #00ffcc;
            padding: 10px 18px;
            border-radius: 10px;
            transition: 0.3s;
        }

        header a:hover {
            background: #00ffcc;
            color: black;
            box-shadow: 0 0 15px #00ffcc;
        }

        /* ===== HERO ===== */
        .hero {
            height: 90vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;

            background:
                linear-gradient(rgba(2, 6, 23, 0.8), rgba(2, 6, 23, 0.9)),
                url('https://images.unsplash.com/photo-1697206165469-9227e6e3aa0a?fm=jpg&q=80');

            background-size: cover;
            background-position: center;
        }

        .hero h1 {
            font-size: 60px;
            margin-bottom: 20px;
            animation: fadeUp 1s ease;
        }

        .hero p {
            color: #cbd5f5;
            max-width: 600px;
            animation: fadeUp 1.5s ease;
        }

        /* ===== BOTÓN PRO ===== */
        .btn {
            margin-top: 30px;
            padding: 14px 30px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: bold;
            color: black;
            background: linear-gradient(45deg, #00ffcc, #22c55e);
            transition: 0.3s;
            position: relative;
        }

        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0 0 25px #00ffcc;
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

        /* ===== SECCIÓN ===== */
        .section {
            padding: 80px 20px;
            text-align: center;
        }

        .section h2 {
            margin-bottom: 30px;
        }

        /* ===== CARDS ===== */
        .cards {
            display: flex;
            gap: 30px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .card {
            width: 280px;
            border-radius: 20px;
            overflow: hidden;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid #1e293b;
            transition: 0.4s;
            animation: fadeUp 1s ease;
        }

        .card:hover {
            transform: translateY(-10px) scale(1.03);
            box-shadow: 0 0 25px #00ffcc33;
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .card h3 {
            margin: 15px 0;
        }

        .card p {
            color: #94a3b8;
            padding: 0 15px 20px;
        }

        /* ===== QR ===== */
        .qr-container {
            margin-top: 30px;
        }

        .qr {
            width: 220px;
            border-radius: 15px;
            transition: 0.3s;
        }

        .qr:hover {
            transform: scale(1.1);
            box-shadow: 0 0 25px #00ffcc;
        }

        /* ===== FOOTER ===== */
        footer {
            padding: 25px;
            text-align: center;
            background: rgba(2, 6, 23, 0.8);
            border-top: 1px solid #1e293b;
            color: #94a3b8;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 40px;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header>
        <h2>Carringtom</h2>
        <a href="/login">Login</a>
    </header>

    <!-- HERO -->
    <section class="hero">
        <h1>Haz tu idea realidad 🚀</h1>
        <p>
            Lleva tu negocio al siguiente nivel con menús digitales y QR modernos.
        </p>
        <a href="/login" class="btn">Comenzar ahora</a>
    </section>

    <!-- SERVICIOS -->
    <section class="section">
        <h2>¿Qué puedes hacer?</h2>

        <div class="cards">

            <div class="card">
                <img src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df">
                <h3>Restaurantes</h3>
                <p>Menús digitales modernos con QR.</p>
            </div>

            <div class="card">
                <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93">
                <h3>Cafeterías</h3>
                <p>Diseños elegantes para tus productos.</p>
            </div>

            <div class="card">
                <img src="https://images.unsplash.com/photo-1585747860715-2ba37e788b70">
                <h3>Barberías</h3>
                <p>Servicios y precios digitales.</p>
            </div>

        </div>
    </section>

    <!-- CTA -->
    <section class="section">
        <h2>Todo en un solo lugar</h2>
        <p>Digitaliza tu negocio fácil y rápido.</p>

        <div class="qr-container">
            <img src="https://g4c7y7r6.delivery.rocketcdn.me/wp-content/uploads/2025/05/do-qr-codes-expire-over-time.png"
                class="qr">
        </div>

        <a href="/login" class="btn">Crear mi negocio</a>
    </section>

    <!-- FOOTER -->
    <footer>
        © 2026 Carringtom - Diseño PRO 🚀
    </footer>

</body>

</html>
