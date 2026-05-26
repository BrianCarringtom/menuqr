<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Dashboard</title>

    <!-- Fuente -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --gold: #c9a227;
            --gold-dark: #a8831f;
            --dark: #111827;
            --gray: #6b7280;
            --light: #f8fafc;
            --white: #ffffff;
            --border: rgba(255, 255, 255, 0.08);
        }

        body {
            font-family: 'Inter', sans-serif;
            background:
                radial-gradient(circle at top left, rgba(201, 162, 39, 0.15), transparent 30%),
                radial-gradient(circle at bottom right, rgba(201, 162, 39, 0.08), transparent 30%),
                #0f172a;
            min-height: 100vh;
            overflow-x: hidden;
            color: white;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* OVERLAY */
        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.55);
            backdrop-filter: blur(3px);
            opacity: 0;
            visibility: hidden;
            transition: 0.35s ease;
            z-index: 998;
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* SIDEBAR */
        .sidebar {
            width: 290px;
            background: rgba(15, 23, 42, 0.96);
            backdrop-filter: blur(18px);
            border-right: 1px solid var(--border);
            padding: 28px 22px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 999;
            transition: 0.4s ease;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.35);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 35px;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            border-radius: 15px;
            background: linear-gradient(135deg, var(--gold), #f4d03f);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: #111;
            font-weight: bold;
            box-shadow: 0 10px 30px rgba(201, 162, 39, 0.3);
        }

        .logo h2 {
            font-size: 22px;
            font-weight: 700;
            color: white;
            letter-spacing: 1px;
        }

        .logo span {
            color: var(--gold);
        }

        .menu-title {
            color: rgba(255, 255, 255, 0.45);
            font-size: 13px;
            text-transform: uppercase;
            margin-bottom: 18px;
            letter-spacing: 2px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .menu a {
            text-decoration: none;
            color: rgba(255, 255, 255, 0.82);
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 16px 18px;
            border-radius: 18px;
            transition: 0.3s ease;
            font-size: 15px;
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }

        .menu a::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg,
                    rgba(201, 162, 39, 0.18),
                    transparent);
            transform: translateX(-100%);
            transition: 0.4s ease;
        }

        .menu a:hover::before,
        .menu a.active::before {
            transform: translateX(0);
        }

        .menu a:hover,
        .menu a.active {
            background: rgba(255, 255, 255, 0.05);
            color: white;
            transform: translateX(5px);
        }

        .menu a i {
            width: 22px;
            text-align: center;
            color: var(--gold);
            font-size: 17px;
        }

        .logout-btn {
            width: 100%;
            border: none;
            background: linear-gradient(135deg, var(--gold), #e6c14d);
            color: #111827;
            padding: 15px;
            border-radius: 18px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.35s ease;
            box-shadow: 0 15px 30px rgba(201, 162, 39, 0.25);
        }

        .logout-btn:hover {
            transform: translateY(-3px);
            background: linear-gradient(135deg, #f4d03f, var(--gold));
        }

        /* BOTON HAMBURGUESA */
        .menu-toggle {
            position: fixed;
            top: 20px;
            left: 20px;
            width: 52px;
            height: 52px;
            border-radius: 16px;
            border: none;
            background: linear-gradient(135deg, var(--gold), #f4d03f);
            color: #111827;
            font-size: 20px;
            cursor: pointer;
            z-index: 1001;
            display: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            transition: 0.3s ease;
        }

        .menu-toggle:hover {
            transform: scale(1.05);
        }

        /* BOTON CERRAR */
        .close-menu {
            position: absolute;
            top: 18px;
            right: 18px;
            width: 42px;
            height: 42px;
            border-radius: 12px;
            border: none;
            background: rgba(255, 255, 255, 0.08);
            color: white;
            font-size: 18px;
            cursor: pointer;
            display: none;
            transition: 0.3s ease;
        }

        .close-menu:hover {
            background: rgba(255, 255, 255, 0.14);
            transform: rotate(90deg);
        }

        /* MAIN */
        .main {
            flex: 1;
            margin-left: 290px;
            padding: 45px;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: 0.4s ease;
            width: 100%;
        }

        /* CARD */
        .welcome-box {
            width: 100%;
            max-width: 950px;
            background: rgba(255, 255, 255, 0.07);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 35px;
            overflow: hidden;
            backdrop-filter: blur(18px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.35);
            animation: fadeUp 1s ease;
        }

        .welcome-image {
            position: relative;
            overflow: hidden;
        }

        .welcome-image::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to top,
                    rgba(15, 23, 42, 0.9),
                    transparent 60%);
        }

        .welcome-box img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            transition: 0.5s ease;
        }

        .welcome-box:hover img {
            transform: scale(1.03);
        }

        .welcome-content {
            padding: 45px;
            position: relative;
        }

        .tag {
            display: inline-block;
            padding: 10px 18px;
            border-radius: 999px;
            background: rgba(201, 162, 39, 0.12);
            color: var(--gold);
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 22px;
            border: 1px solid rgba(201, 162, 39, 0.2);
        }

        .welcome-content h1 {
            font-size: 42px;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 14px;
        }

        .welcome-content h2 {
            color: var(--gold);
            font-size: 24px;
            margin-bottom: 18px;
            font-weight: 600;
        }

        .welcome-content p {
            color: rgba(255, 255, 255, 0.72);
            font-size: 17px;
            line-height: 1.8;
            max-width: 700px;
        }

        /* STATS */
        .stats {
            margin-top: 35px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 22px;
            padding: 25px;
            border: 1px solid rgba(255, 255, 255, 0.06);
            transition: 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-6px);
            background: rgba(255, 255, 255, 0.08);
        }

        .stat-card i {
            font-size: 24px;
            color: var(--gold);
            margin-bottom: 15px;
        }

        .stat-card h3 {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .stat-card span {
            color: rgba(255, 255, 255, 0.65);
            font-size: 14px;
        }

        /* ANIMACIONES */
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

        /* TABLET */
        @media (max-width: 1100px) {

            .main {
                padding: 30px;
            }

            .welcome-content h1 {
                font-size: 34px;
            }

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* MOVIL */
        @media (max-width: 900px) {

            .menu-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .close-menu {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .sidebar {
                left: -100%;
                width: 290px;
            }

            .sidebar.active {
                left: 0;
            }

            .main {
                margin-left: 0;
                padding: 90px 18px 25px;
            }

            .welcome-box img {
                height: 250px;
            }

            .welcome-content {
                padding: 28px 22px;
            }

            .welcome-content h1 {
                font-size: 28px;
            }

            .welcome-content h2 {
                font-size: 20px;
            }

            .welcome-content p {
                font-size: 15px;
            }

            .stats {
                grid-template-columns: 1fr;
            }
        }

        /* CELULARES PEQUEÑOS */
        @media (max-width: 480px) {

            .welcome-box {
                border-radius: 25px;
            }

            .welcome-box img {
                height: 200px;
            }

            .welcome-content h1 {
                font-size: 24px;
            }

            .welcome-content h2 {
                font-size: 18px;
            }

            .tag {
                font-size: 12px;
            }

            .stat-card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- OVERLAY -->
    <div class="overlay" id="overlay" onclick="toggleMenu()"></div>

    <!-- BOTON HAMBURGUESA -->
    <button class="menu-toggle" id="menuBtn" onclick="toggleMenu()">
        <i class="fas fa-bars"></i>
    </button>

    <div class="container">

        <!-- SIDEBAR -->
        <aside class="sidebar" id="sidebar">

            <button class="close-menu" onclick="toggleMenu()">
                <i class="fas fa-times"></i>
            </button>

            <div>

                <div class="logo">
                    <div class="logo-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>

                    <h2>BUSI<span>NESS</span></h2>
                </div>

                <p class="menu-title">Menú principal</p>

                <nav class="menu">

                    <a href="/business" class="active">
                        <i class="fas fa-chart-line"></i>
                        Dashboard
                    </a>

                    <a href="/business/profile">
                        <i class="fas fa-user"></i>
                        Perfil
                    </a>

                    <a href="/business/producto">
                        <i class="fas fa-layer-group"></i>
                        Producto - Categoría
                    </a>

                    <a href="/business/gestion">
                        <i class="fas fa-box-open"></i>
                        Gestión de Productos
                    </a>

                </nav>
            </div>

            <div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                    @csrf
                </form>

                <button class="logout-btn"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                    <i class="fas fa-sign-out-alt"></i>
                    Cerrar sesión

                </button>

            </div>

        </aside>

        <!-- MAIN -->
        <main class="main">

            <div class="welcome-box">

                <div class="welcome-image">
                    <img src="/images/bienvenido.png" alt="Dashboard">
                </div>

                <div class="welcome-content">

                    <span class="tag">
                        PANEL ADMINISTRATIVO
                    </span>

                    <h1>
                        Bienvenido a tu panel profesional
                    </h1>

                    <h2>
                        {{ auth()->user()->name }}
                    </h2>

                    <p>
                        Gestiona tu negocio de manera moderna, elegante y totalmente responsive.
                        Accede rápidamente a tus módulos, administra productos y mantén todo organizado
                        desde cualquier dispositivo.
                    </p>

                    <!-- STATS -->
                    <div class="stats">

                        <div class="stat-card">
                            <i class="fas fa-chart-pie"></i>
                            <h3>+98%</h3>
                            <span>Rendimiento</span>
                        </div>

                        <div class="stat-card">
                            <i class="fas fa-users"></i>
                            <h3>1.2K</h3>
                            <span>Clientes activos</span>
                        </div>

                        <div class="stat-card">
                            <i class="fas fa-box"></i>
                            <h3>350+</h3>
                            <span>Productos</span>
                        </div>

                    </div>

                </div>

            </div>

        </main>

    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        function toggleMenu() {

            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');

        }

        // CERRAR MENU AL DAR CLICK EN LINK EN MOVIL
        document.querySelectorAll('.menu a').forEach(link => {

            link.addEventListener('click', () => {

                if (window.innerWidth <= 900) {

                    sidebar.classList.remove('active');
                    overlay.classList.remove('active');

                }

            });

        });

        // EVITAR QUE QUEDE ABIERTO AL REDIMENSIONAR
        window.addEventListener('resize', () => {

            if (window.innerWidth > 900) {

                sidebar.classList.remove('active');
                overlay.classList.remove('active');

            }

        });
    </script>

</body>

</html>
