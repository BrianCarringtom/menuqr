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
            background: #0f172a;
            color: white;
        }

        /* HEADER */
        header {
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(2, 6, 23, 0.7);
            backdrop-filter: blur(10px);
        }

        header h2 {
            color: #38bdf8;
        }

        nav a {
            margin-left: 20px;
            text-decoration: none;
            color: white;
            font-size: 14px;
        }

        .btn-outline {
            border: 1px solid #38bdf8;
            padding: 8px 16px;
            border-radius: 8px;
        }

        /* HERO */
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;

            background:
                linear-gradient(rgba(2, 6, 23, 0.8), rgba(15, 23, 42, 0.9)),
                url('https://images.unsplash.com/photo-1556740738-b6a63e27c4df');

            background-size: cover;
            background-position: center;
        }

        .hero h1 {
            font-size: 60px;
            margin-bottom: 20px;
        }

        .hero span {
            color: #38bdf8;
        }

        .hero p {
            color: #cbd5f5;
            max-width: 600px;
            margin: auto;
        }

        .hero-buttons {
            margin-top: 30px;
        }

        .btn {
            background: #38bdf8;
            color: black;
            padding: 12px 25px;
            border-radius: 10px;
            text-decoration: none;
            margin: 10px;
            font-weight: bold;
        }

        /* SECTIONS */
        .section {
            padding: 100px 40px;
            text-align: center;
        }

        .section h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .section p {
            color: #94a3b8;
        }

        /* CARDS */
        .cards {
            display: flex;
            gap: 25px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 40px;
        }

        .card {
            background: #020617;
            width: 280px;
            border-radius: 15px;
            overflow: hidden;
            transition: 0.3s;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .card-content {
            padding: 20px;
        }

        .card h3 {
            margin-bottom: 10px;
        }

        /* DESTACADO */
        .featured {
            background: #020617;
        }

        /* PROMO */
        .promo {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            align-items: center;
            justify-content: center;
        }

        .promo img {
            width: 350px;
            border-radius: 20px;
        }

        .promo-text {
            max-width: 400px;
            text-align: left;
        }

        /* QR */
        .qr-box {
            background: #020617;
            padding: 30px;
            border-radius: 20px;
            display: inline-block;
            margin-top: 30px;
        }

        .qr {
            width: 200px;
        }

        /* FOOTER */
        footer {
            background: #020617;
            padding: 40px;
            text-align: center;
            color: #94a3b8;
        }

        /* RESPONSIVE */
        @media(max-width:768px) {
            .hero h1 {
                font-size: 40px;
            }

            .promo {
                flex-direction: column;
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
            <a href="#">Precios</a>
            <a href="/login" class="btn-outline">Login</a>
        </nav>
    </header>

    <!-- HERO -->
    <section class="hero">
        <div>
            <h1>Digitaliza tu <span>negocio</span></h1>
            <p>Crea tu menú digital, comparte con QR y lleva tu negocio al siguiente nivel.</p>

            <div class="hero-buttons">
                <a href="/login" class="btn">Comenzar</a>
                <a href="#" class="btn-outline">Ver demo</a>
            </div>
        </div>
    </section>

    <!-- SERVICIOS -->
    <section class="section">
        <h2>¿Qué puedes hacer?</h2>

        <div class="cards">
            <div class="card">
                <img src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df">
                <div class="card-content">
                    <h3>Restaurantes</h3>
                    <p>Menús digitales modernos con QR.</p>
                </div>
            </div>

            <div class="card">
                <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93">
                <div class="card-content">
                    <h3>Cafeterías</h3>
                    <p>Diseño atractivo para tus bebidas.</p>
                </div>
            </div>

            <div class="card">
                <img src="https://images.unsplash.com/photo-1585747860715-2ba37e788b70">
                <div class="card-content">
                    <h3>Barberías</h3>
                    <p>Servicios claros y profesionales.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- DESTACADO -->
    <section class="section featured">
        <h2>Diseños modernos</h2>
        <p>Inspirados en las mejores experiencias digitales</p>
    </section>

    <!-- PROMO -->
    <section class="section">
        <div class="promo">
            <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93">

            <div class="promo-text">
                <h2>Haz crecer tu negocio</h2>
                <p>Comparte tu menú con un simple QR y mejora la experiencia de tus clientes.</p>
                <a href="/login" class="btn">Crear ahora</a>
            </div>
        </div>
    </section>

    <!-- QR -->
    <section class="section">
        <h2>Escanea y prueba</h2>

        <div class="qr-box">
            <img src="https://g4c7y7r6.delivery.rocketcdn.me/wp-content/uploads/2025/05/do-qr-codes-expire-over-time.png"
                class="qr">
        </div>
    </section>

    <footer>
        © 2026 Carringtom - Plataforma digital para negocios 🚀
    </footer>

</body>

</html>
