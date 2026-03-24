<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carringtom Pro</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- ICONOS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f4f7f5;
            color: #1e293b;
        }

        /* NAVBAR */
        header {
            position: fixed;
            width: 90%;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background: white;
            padding: 15px 30px;
            border-radius: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        header h2 {
            color: #16a34a;
        }

        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #334155;
            font-weight: 500;
        }

        .btn-login {
            background: #16a34a;
            color: white;
            padding: 8px 18px;
            border-radius: 20px;
            text-decoration: none;
        }

        /* HERO */
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            padding: 0 10%;
            color: white;

            background:
                linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.5)),
                url('https://images.unsplash.com/photo-1507089947368-19c1da9775ae');

            background-size: cover;
            background-position: center;
        }

        .hero-content {
            max-width: 600px;
        }

        .hero h1 {
            font-size: 60px;
            line-height: 1.1;
        }

        .hero p {
            margin: 20px 0;
            color: #e2e8f0;
        }

        .btn-main {
            background: #22c55e;
            padding: 14px 28px;
            border-radius: 30px;
            text-decoration: none;
            color: white;
            font-weight: 600;
            display: inline-block;
        }

        /* BUSCADOR FLOTANTE */
        .search-box {
            position: relative;
            margin-top: -50px;
            display: flex;
            justify-content: center;
        }

        .search-container {
            background: white;
            padding: 15px;
            border-radius: 50px;
            width: 70%;
            display: flex;
            justify-content: space-between;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .search-container input {
            border: none;
            outline: none;
            width: 100%;
            padding: 10px;
        }

        .search-btn {
            background: #16a34a;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 30px;
            cursor: pointer;
        }

        /* SECCION INFO */
        .info {
            padding: 80px 10%;
            display: flex;
            gap: 40px;
            align-items: center;
            flex-wrap: wrap;
        }

        .info img {
            width: 400px;
            border-radius: 20px;
        }

        .info-text {
            max-width: 500px;
        }

        .info-text h2 {
            margin-bottom: 15px;
        }

        .info-text p {
            color: #64748b;
        }

        /* CARDS */
        .section {
            padding: 60px 10%;
            text-align: center;
        }

        .cards {
            display: flex;
            gap: 30px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 40px;
        }

        .card {
            background: white;
            border-radius: 20px;
            width: 300px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-content {
            padding: 20px;
        }

        .card h3 {
            margin-bottom: 10px;
        }

        .card p {
            color: #64748b;
            font-size: 14px;
        }

        .card button {
            margin-top: 15px;
            padding: 10px 20px;
            border: none;
            background: #22c55e;
            color: white;
            border-radius: 20px;
            cursor: pointer;
        }

        /* TESTIMONIOS */
        .testimonials {
            background: #ecfdf5;
            padding: 60px 10%;
            text-align: center;
        }

        .testimonial {
            max-width: 600px;
            margin: auto;
            font-style: italic;
        }

        /* FOOTER */
        footer {
            padding: 30px;
            text-align: center;
            background: #020617;
            color: #94a3b8;
        }

        /* RESPONSIVE */
        @media(max-width: 768px) {
            .hero h1 {
                font-size: 40px;
            }

            .search-container {
                width: 90%;
            }

            .info {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <!-- NAV -->
    <header>
        <h2>Carringtom</h2>
        <nav>
            <a href="#">Inicio</a>
            <a href="#">Servicios</a>
            <a href="#">Negocios</a>
            <a href="#">Contacto</a>
        </nav>
        <a href="/login" class="btn-login"><i class="fa fa-user"></i> Login</a>
    </header>

    <!-- HERO -->
    <section class="hero">
        <div class="hero-content">
            <h1>Crea tu negocio digital fácilmente</h1>
            <p>Convierte tu menú en una experiencia moderna con QR y diseño profesional.</p>
            <a href="/login" class="btn-main">Comenzar</a>
        </div>
    </section>

    <!-- BUSCADOR -->
    <div class="search-box">
        <div class="search-container">
            <input type="text" placeholder="Buscar negocio...">
            <button class="search-btn"><i class="fa fa-search"></i></button>
        </div>
    </div>

    <!-- INFO -->
    <section class="info">
        <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2">
        <div class="info-text">
            <h2>Bienvenido a Carringtom</h2>
            <p>Digitaliza tu negocio, muestra tus productos y atrae más clientes con tecnología QR moderna.</p>
            <a href="#" class="btn-main">Explorar</a>
        </div>
    </section>

    <!-- CARDS -->
    <section class="section">
        <h2>Tipos de negocios</h2>

        <div class="cards">

            <div class="card">
                <img src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df">
                <div class="card-content">
                    <h3>Restaurantes</h3>
                    <p>Menú digital elegante con QR.</p>
                    <button>Ver más</button>
                </div>
            </div>

            <div class="card">
                <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93">
                <div class="card-content">
                    <h3>Cafeterías</h3>
                    <p>Diseño moderno para tus productos.</p>
                    <button>Ver más</button>
                </div>
            </div>

            <div class="card">
                <img src="https://images.unsplash.com/photo-1521590832167-7bcbfaa6381f">
                <div class="card-content">
                    <h3>Barberías</h3>
                    <p>Servicios visibles y atractivos.</p>
                    <button>Ver más</button>
                </div>
            </div>

        </div>
    </section>

    <!-- TESTIMONIOS -->
    <section class="testimonials">
        <h2>Lo que dicen nuestros usuarios</h2>
        <p class="testimonial">"Carringtom cambió mi negocio, ahora tengo más clientes gracias al QR."</p>
    </section>

    <!-- FOOTER -->
    <footer>
        © 2026 Carringtom - Diseño Profesional 🚀
    </footer>

</body>

</html>
