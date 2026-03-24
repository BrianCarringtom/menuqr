<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carringtom</title>

    <!-- FUENTE -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- ICONOS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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

        /* ===== FONDO PRO ===== */
        body::before {
            content: "";
            position: fixed;
            width: 200%;
            height: 200%;
            background:
                radial-gradient(circle at 20% 30%, #00ffcc33, transparent),
                radial-gradient(circle at 80% 70%, #6366f133, transparent),
                radial-gradient(circle at 50% 50%, #22c55e22, transparent);
            animation: bgMove 15s infinite alternate;
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
            z-index: 100;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            backdrop-filter: blur(12px);
            background: rgba(2, 6, 23, 0.7);
            border-bottom: 1px solid #1e293b;
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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 20px;
            text-align: center;

            background:
                linear-gradient(rgba(2, 6, 23, 0.8), rgba(2, 6, 23, 0.95)),
                url('https://images.unsplash.com/photo-1498050108023-c5249f4df085');

            background-size: cover;
        }

        .hero h1 {
            font-size: 65px;
        }

        .hero span {
            color: #00ffcc;
        }

        .btn {
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

        /* ===== STATS ===== */
        .stats {
            display: flex;
            justify-content: center;
            gap: 50px;
            padding: 40px;
            flex-wrap: wrap;
        }

        .stat {
            text-align: center;
        }

        .stat h2 {
            color: #00ffcc;
            font-size: 35px;
        }

        /* ===== FEATURES ===== */
        .features {
            padding: 80px 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 30px;
        }

        .feature {
            padding: 30px;
            border-radius: 20px;
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid #1e293b;
            backdrop-filter: blur(10px);
            transition: 0.4s;
        }

        .feature i {
            font-size: 30px;
            margin-bottom: 15px;
            color: #00ffcc;
        }

        .feature:hover {
            transform: translateY(-10px);
            box-shadow: 0 0 25px #00ffcc33;
        }

        /* ===== TESTIMONIOS ===== */
        .testimonials {
            padding: 80px 20px;
            display: flex;
            gap: 30px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .testimonial {
            width: 300px;
            padding: 25px;
            border-radius: 20px;
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid #1e293b;
        }

        /* ===== FOOTER ===== */
        footer {
            padding: 40px;
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
            <a href="#">Funciones</a>
            <a href="#">Testimonios</a>
            <a href="/login">Login</a>
        </nav>
    </header>

    <!-- HERO -->
    <section class="hero">
        <h1>Crea tu negocio <span>digital</span> 🚀</h1>
        <p>Menús QR, diseño moderno y herramientas para crecer.</p>
        <a href="/login" class="btn">Empezar ahora</a>
    </section>

    <!-- STATS -->
    <section class="stats">
        <div class="stat">
            <h2>+500</h2>
            <p>Negocios</p>
        </div>
        <div class="stat">
            <h2>+10k</h2>
            <p>Usuarios</p>
        </div>
        <div class="stat">
            <h2>99%</h2>
            <p>Satisfacción</p>
        </div>
    </section>

    <!-- FEATURES -->
    <section class="features">
        <div class="feature">
            <i class="fas fa-bolt"></i>
            <h3>Rápido</h3>
            <p>Crea tu menú en minutos.</p>
        </div>

        <div class="feature">
            <i class="fas fa-mobile-alt"></i>
            <h3>Responsive</h3>
            <p>Perfecto en cualquier dispositivo.</p>
        </div>

        <div class="feature">
            <i class="fas fa-chart-line"></i>
            <h3>Crecimiento</h3>
            <p>Aumenta tus ventas.</p>
        </div>
    </section>

    <!-- TESTIMONIOS -->
    <section class="testimonials">
        <div class="testimonial">
            <p>"Me ayudó a modernizar mi restaurante."</p>
            <strong>- Cliente feliz</strong>
        </div>

        <div class="testimonial">
            <p>"Fácil y rápido, lo recomiendo."</p>
            <strong>- Cafetería</strong>
        </div>

        <div class="testimonial">
            <p>"Mi negocio ahora se ve profesional."</p>
            <strong>- Barbería</strong>
        </div>
    </section>

    <!-- CTA FINAL -->
    <section class="hero" style="min-height:60vh;">
        <h1>Empieza hoy 🚀</h1>
        <a href="/login" class="btn">Crear cuenta</a>
    </section>

    <!-- FOOTER -->
    <footer>
        © 2026 Carringtom - Nivel PRO 🔥
    </footer>

</body>

</html>
