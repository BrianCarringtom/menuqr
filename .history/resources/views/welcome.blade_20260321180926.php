<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carringtom</title>

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #0f172a;
            color: white;
        }

        header {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #020617;
        }

        header h2 {
            margin: 0;
            color: #00ffcc;
        }

        header a {
            color: white;
            text-decoration: none;
            border: 1px solid #00ffcc;
            padding: 8px 16px;
            border-radius: 8px;
        }

        .hero {
            padding: 100px 20px;
            text-align: center;
            background: linear-gradient(to right, #020617, #0f172a);
        }

        .hero h1 {
            font-size: 50px;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 18px;
            color: #cbd5f5;
        }

        .btn {
            margin-top: 30px;
            display: inline-block;
            background: #00ffcc;
            color: black;
            padding: 12px 25px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
        }

        .section {
            padding: 60px 20px;
            text-align: center;
        }

        .cards {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .card {
            background: #020617;
            padding: 20px;
            border-radius: 12px;
            width: 250px;
        }

        .card img {
            width: 100%;
            border-radius: 10px;
        }

        footer {
            padding: 20px;
            text-align: center;
            background: #020617;
            margin-top: 40px;
            color: #94a3b8;
        }

        .qr-container {
            display: flex;
            justify-content: center;
            /* centra horizontalmente */
        }

        .qr {
            width: 250px;
            /* tamaño del QR, ajusta a tu gusto */
            height: 200px;
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
            En Carringtom puedes crear tu negocio digital y compartir tu menú mediante código QR.
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
                <p>Sube tu menú digital y compártelo con QR.</p>
            </div>

            <div class="card">
                <div class="card-image">
                    <img src="https://images.unsplash.com/photo-1512690459411-b9245aed614b?auto=format&fit=crop&w=500&q=80"
                        alt="Cafetería">
                </div>
                <h3>Cafeterías</h3>
                <p>Muestra tus productos de forma moderna.</p>
            </div>

            <div class="card">
                <img src="https://images.unsplash.com/photo-1585747860715-2ba37e788b70">
                <h3>Barberías</h3>
                <p>Publica tus servicios y precios fácilmente.</p>
            </div>

        </div>
    </section>

    <!-- CTA -->
    <section class="section">
        <h2>Todo en un solo lugar</h2>
        <p>
            Fonda, restaurante, barbería o cualquier negocio...
            Carringtom te ayuda a digitalizarlo.
        </p>

        <!-- Imagen QR centrada -->
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
