<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carringtom</title>

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #020617, #0f172a);
            color: white;
        }

        /* HEADER */
        header {
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(2, 6, 23, 0.7);
            backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        header h2 {
            color: #00ffcc;
            font-weight: 700;
        }

        header a {
            color: white;
            text-decoration: none;
            border: 1px solid #00ffcc;
            padding: 10px 18px;
            border-radius: 10px;
            transition: 0.3s;
        }

        header a:hover {
            background: #00ffcc;
            color: black;
        }

        /* HERO */
        .hero {
            padding: 120px 20px;
            text-align: center;
            background:
                linear-gradient(rgba(2, 6, 23, 0.7), rgba(15, 23, 42, 0.9)),
                url('https://images.unsplash.com/photo-1697206165469-9227e6e3aa0a?fm=jpg&q=60&w=3000');

            background-size: cover;
            background-position: center;
        }

        .hero h1 {
            font-size: 55px;
            margin-bottom: 20px;
            animation: fadeDown 1s ease;
        }

        .hero p {
            font-size: 18px;
            color: #cbd5f5;
            max-width: 600px;
            margin: auto;
            animation: fadeUp 1.2s ease;
        }

        .btn {
            margin-top: 30px;
            display: inline-block;
            background: linear-gradient(135deg, #00ffcc, #00c3ff);
            color: black;
            padding: 14px 28px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 255, 204, 0.4);
        }

        /* SECTIONS */
        .section {
            padding: 80px 20px;
            text-align: center;
        }

        .section h2 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        .section p {
            color: #94a3b8;
            margin-bottom: 40px;
        }

        /* CARDS */
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 25px;
            max-width: 1100px;
            margin: auto;
        }

        .card {
            background: rgba(2, 6, 23, 0.7);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            overflow: hidden;
            transition: 0.4s;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .card-content {
            padding: 20px;
        }

        .card i {
            font-size: 28px;
            margin-bottom: 10px;
            color: #00ffcc;
        }

        .card h3 {
            margin-bottom: 10px;
        }

        .card p {
            font-size: 14px;
            color: #94a3b8;
        }

        /* QR */
        .qr-container {
            margin-top: 30px;
        }

        .qr {
            width: 220px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.6);
        }

        /* FOOTER */
        footer {
            padding: 30px;
            text-align: center;
            background: #020617;
            color: #94a3b8;
        }

        /* ANIMATIONS */
        @keyframes fadeDown {
            from {
                opacity: 0;
                transform: translateY(-40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 35px;
            }

            header {
                padding: 15px 20px;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header>
        <h2><i class="fa-solid fa-bolt"></i> Carringtom</h2>
        <a href="/login"><i class="fa-solid fa-user"></i> Login</a>
    </header>

    <!-- HERO -->
    <section class="hero">
        <h1>Haz tu idea realidad 🚀</h1>
        <p>
            Crea tu negocio digital, comparte tu menú con QR y haz crecer tu marca de forma profesional.
        </p>
        <a href="/login" class="btn"><i class="fa-solid fa-rocket"></i> Comenzar ahora</a>
    </section>

    <!-- SERVICIOS -->
    <section class="section">
        <h2>¿Qué puedes hacer?</h2>
        <p>Soluciones digitales para todo tipo de negocios</p>

        <div class="cards">

            <div class="card">
                <img src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df">
                <div class="card-content">
                    <i class="fa-solid fa-utensils"></i>
                    <h3>Restaurantes</h3>
                    <p>Menús digitales modernos con QR.</p>
                </div>
            </div>

            <div class="card">
                <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93">
                <div class="card-content">
                    <i class="fa-solid fa-mug-hot"></i>
                    <h3>Cafeterías</h3>
                    <p>Muestra productos de forma atractiva.</p>
                </div>
            </div>

            <div class="card">
                <img src="https://images.unsplash.com/photo-1585747860715-2ba37e788b70">
                <div class="card-content">
                    <i class="fa-solid fa-scissors"></i>
                    <h3>Barberías</h3>
                    <p>Publica servicios y precios fácilmente.</p>
                </div>
            </div>

        </div>
    </section>

    <!-- CTA -->
    <section class="section">
        <h2>Todo en un solo lugar</h2>
        <p>
            Lleva tu negocio al siguiente nivel con una presencia digital moderna.
        </p>

        <div class="qr-container">
            <img src="https://g4c7y7r6.delivery.rocketcdn.me/wp-content/uploads/2025/05/do-qr-codes-expire-over-time.png"
                class="qr">
        </div>

        <a href="/login" class="btn"><i class="fa-solid fa-store"></i> Crear mi negocio</a>
    </section>

    <!-- FOOTER -->
    <footer>
        © 2026 Carringtom - Diseño pro 🚀
    </footer>

</body>

</html>
