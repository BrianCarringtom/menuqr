<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carringtom</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

    <!-- QR Library -->
    <script src="https://cdn.jsdelivr.net/npm/qrcodejs/qrcode.min.js"></script>

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #0f172a;
            color: white;
        }

        header {
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(2, 6, 23, 0.8);
            backdrop-filter: blur(10px);
        }

        header h2 {
            color: #00ffcc;
        }

        header a {
            color: white;
            text-decoration: none;
            border: 1px solid #00ffcc;
            padding: 8px 18px;
            border-radius: 10px;
            transition: 0.3s;
        }

        header a:hover {
            background: #00ffcc;
            color: black;
        }

        .hero {
            text-align: center;
            padding: 120px 20px;
            animation: fadeIn 1.5s ease;
        }

        .hero h1 {
            font-size: 55px;
        }

        .hero span {
            color: #00ffcc;
        }

        .btn {
            margin-top: 30px;
            display: inline-block;
            background: #00ffcc;
            color: black;
            padding: 14px 30px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn:hover {
            transform: scale(1.1);
        }

        .cards {
            display: flex;
            gap: 25px;
            justify-content: center;
            flex-wrap: wrap;
            padding: 60px 20px;
        }

        .card {
            background: #020617;
            border-radius: 15px;
            width: 260px;
            overflow: hidden;
            transition: 0.4s;
        }

        .card:hover {
            transform: translateY(-10px) scale(1.03);
        }

        .card img {
            width: 100%;
            height: 160px;
            object-fit: cover;
        }

        .card h3 {
            margin: 15px;
        }

        .card p {
            margin: 0 15px 20px;
            color: #94a3b8;
        }

        .qr-section {
            text-align: center;
            padding: 80px 20px;
        }

        #qrcode {
            margin-top: 20px;
            display: inline-block;
            padding: 20px;
            background: white;
            border-radius: 15px;
        }

        footer {
            text-align: center;
            padding: 20px;
            background: #020617;
            color: #94a3b8;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <header>
        <h2>Carringtom</h2>
        <a href="/login">Login</a>
    </header>

    <section class="hero">
        <h1>Haz tu idea <span>realidad</span> 🚀</h1>
        <p>Crea tu negocio digital, sube tu menú y compártelo con QR</p>
        <a href="/login" class="btn">Comenzar</a>
    </section>

    <section class="cards">

        <div class="card">
            <img src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df">
            <h3>Restaurantes</h3>
            <p>Menú digital con QR.</p>
        </div>

        <div class="card">
            <img src="https://images.unsplash.com/photo-1512690459411-b9245aed614b">
            <h3>Cafeterías</h3>
            <p>Presenta tus productos.</p>
        </div>

        <div class="card">
            <img src="https://images.unsplash.com/photo-1585747860715-2ba37e788b70">
            <h3>Barberías</h3>
            <p>Servicios y precios en línea.</p>
        </div>

    </section>

    <section class="qr-section">
        <h2>Tu QR listo en segundos 📱</h2>
        <p>Comparte tu negocio con un simple escaneo</p>

        <div id="qrcode"></div>
    </section>

    <footer>
        © 2026 Carringtom - Tu idea hecha realidad
    </footer>

    <script>
        // 🔥 QR dinámico (simulación)
        new QRCode(document.getElementById("qrcode"), {
            text: "https://tusitio.com/fonda-maricela",
            width: 150,
            height: 150
        });
    </script>

</body>

</html>
