<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carringtom</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: radial-gradient(circle at top, #0f172a, #020617);
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
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        header h2 {
            color: #00ffcc;
            font-weight: 700;
            letter-spacing: 1px;
        }

        header a {
            color: #00ffcc;
            text-decoration: none;
            border: 1px solid #00ffcc;
            padding: 8px 18px;
            border-radius: 30px;
            transition: 0.3s;
        }

        header a:hover {
            background: #00ffcc;
            color: black;
            box-shadow: 0 0 15px #00ffcc;
        }

        /* HERO */
        .hero {
            padding: 120px 20px;
            text-align: center;
            position: relative;

            background:
                linear-gradient(rgba(2, 6, 23, 0.85), rgba(15, 23, 42, 0.95)),
                url('https://images.unsplash.com/photo-1697206165469-9227e6e3aa0a?fm=jpg&q=60&w=3000');

            background-size: cover;
            background-position: center;
        }

        .hero h1 {
            font-size: 60px;
            margin-bottom: 20px;
            font-weight: 700;
            background: linear-gradient(90deg, #00ffcc, #38bdf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            font-size: 20px;
            color: #cbd5f5;
            max-width: 600px;
            margin: auto;
        }

        /* BOTÓN */
        .btn {
            margin-top: 35px;
            display: inline-block;
            background: linear-gradient(135deg, #00ffcc, #38bdf8);
            color: black;
            padding: 14px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
            box-shadow: 0 10px 25px rgba(0, 255, 204, 0.2);
        }

        .btn:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 15px 35px rgba(0, 255, 204, 0.4);
        }

        /* SECCIONES */
        .section {
            padding: 80px 20px;
            text-align: center;
        }

        .section h2 {
            font-size: 36px;
            margin-bottom: 15px;
        }

        .section p {
            color: #94a3b8;
            max-width: 600px;
            margin: auto;
        }

        /* CARDS */
        .cards {
            margin-top: 40px;
            display: flex;
            gap: 30px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .card {
            background: rgba(2, 6, 23, 0.7);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            width: 260px;
            overflow: hidden;
            transition: 0.4s;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .card:hover {
            transform: translateY(-10px) scale(1.03);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6);
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .card h3 {
            margin: 15px 0 5px;
        }

        .card p {
            padding: 0 15px 20px;
            color: #cbd5f5;
        }

        /* QR */
        .qr-container {
            margin-top: 30px;
            display: flex;
            justify-content: center;
        }

        .qr {
            width: 220px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 255, 204, 0.3);
            transition: 0.3s;
        }

        .qr:hover {
            transform: scale(1.08);
        }

        /* FOOTER */
        footer {
            padding: 25px;
            text-align: center;
            background: rgba(2, 6, 23, 0.8);
            color: #94a3b8;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
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
            Crea tu negocio digital, comparte tu menú con QR y luce profesional desde el primer día.
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
                <p>Convierte tu menú en una experiencia digital elegante.</p>
            </div>

            <div class="card">
                <img
                    src="https://i0.wp.com/foodandpleasure.com/wp-content/uploads/2022/04/cafeterias-coyoacan-cafenegro.jpg">
                <h3>Cafeterías</h3>
                <p>Muestra tus productos con estilo moderno y atractivo.</p>
            </div>

            <div class="card">
                <img src="https://images.unsplash.com/photo-1585747860715-2ba37e788b70">
                <h3>Barberías</h3>
                <p>Organiza servicios, precios y promociones fácilmente.</p>
            </div>

        </div>
    </section>

    <!-- CTA -->
    <section class="section">
        <h2>Todo en un solo lugar</h2>
        <p>
            Desde fondas hasta negocios premium, Carringtom digitaliza tu marca.
        </p>

        <div class="qr-container">
            <img src="https://g4c7y7r6.delivery.rocketcdn.me/wp-content/uploads/2025/05/do-qr-codes-expire-over-time.png"
                alt="QR Code" class="qr">
        </div>

        <a href="/login" class="btn">Crear mi negocio</a>
    </section>

    <!-- FOOTER -->
    <footer>
        © 2026 Carringtom - Tu idea hecha realidad
    </footer>

</body>

</html>
