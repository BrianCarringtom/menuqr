<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Business Dashboard</title>

    <!-- Fuente -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --gold: #c9a227;
            --gold-dark: #a8831f;
            --bg: #f4f6f9;
            --text: #1f2937;
            --gray: #6b7280;
            --white: #ffffff;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
            overflow-x: hidden;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 260px;
            background: var(--white);
            border-right: 1px solid #e5e7eb;
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            transition: .3s ease;
            z-index: 1000;
        }

        .logo {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo h2 {
            color: var(--gold);
            font-size: 26px;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .menu a {
            text-decoration: none;
            color: #4b5563;
            padding: 14px 16px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            gap: 14px;
            transition: .25s;
            font-size: 15px;
            font-weight: 500;
        }

        .menu a i {
            width: 20px;
            text-align: center;
        }

        .menu a:hover {
            background: #fff8e1;
            color: var(--gold);
            transform: translateX(4px);
        }

        .logout-btn {
            width: 100%;
            border: none;
            background: var(--gold);
            color: white;
            padding: 15px;
            border-radius: 14px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: .3s;
        }

        .logout-btn:hover {
            background: var(--gold-dark);
        }

        /* ================= MAIN ================= */

        .main {
            flex: 1;
            padding: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .welcome-box {
            width: 100%;
            max-width: 950px;
            background: white;
            border-radius: 30px;
            overflow: hidden;
            display: grid;
            grid-template-columns: 1fr 1fr;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.06);
        }

        .welcome-image {
            background: #f8f8f8;
            min-height: 500px;
        }

        .welcome-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .welcome-content {
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .badge {
            background: #fff4d6;
            color: var(--gold);
            width: fit-content;
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 25px;
        }

        .welcome-content h1 {
            font-size: 42px;
            line-height: 1.1;
            margin-bottom: 18px;
            color: var(--text);
        }

        .welcome-content h2 {
            font-size: 24px;
            color: var(--gold);
            margin-bottom: 20px;
            font-weight: 600;
        }

        .welcome-content p {
            color: var(--gray);
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .welcome-btn {
            width: fit-content;
            padding: 15px 28px;
            border-radius: 14px;
            border: none;
            background: var(--gold);
            color: white;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: .3s;
        }

        .welcome-btn:hover {
            background: var(--gold-dark);
            transform: translateY(-2px);
        }

        /* ================= HAMBURGUESA ================= */

        .menu-toggle {
            position: fixed;
            top: 20px;
            left: 20px;
            width: 50px;
            height: 50px;
            border: none;
            border-radius: 14px;
            background: var(--gold);
            color: white;
            font-size: 20px;
            cursor: pointer;
            display: none;
            z-index: 2000;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .close-menu {
            display: none;
            position: absolute;
            top: 18px;
            right: 18px;
            border: none;
            background: none;
            font-size: 22px;
            cursor: pointer;
            color: #666;
        }

        /* ================= OVERLAY ================= */

        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
            opacity: 0;
            visibility: hidden;
            transition: .3s;
            z-index: 999;
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* ================= RESPONSIVE ================= */

        @media(max-width: 1100px) {

            .welcome-content {
                padding: 40px;
            }

            .welcome-content h1 {
                font-size: 34px;
            }
        }

        @media(max-width: 900px) {

            .menu-toggle {
                display: block;
            }

            .sidebar {
                position: fixed;
                top: 0;
                left: -280px;
                height: 100%;
                width: 260px;
                box-shadow: 10px 0 30px rgba(0, 0, 0, 0.1);
            }

            .sidebar.active {
                left: 0;
            }

            .close-menu {
                display: block;
            }

            .main {
                padding: 90px 18px 25px;
            }

            .welcome-box {
                grid-template-columns: 1fr;
                border-radius: 24px;
            }

            .welcome-image {
                min-height: 260px;
            }

            .welcome-content {
                padding: 35px 25px;
                text-align: center;
                align-items: center;
            }

            .welcome-content h1 {
                font-size: 30px;
            }

            .welcome-content h2 {
                font-size: 22px;
            }

            .welcome-content p {
                font-size: 15px;
            }
        }

        @media(max-width: 500px) {

            .main {
                padding: 85px 14px 20px;
            }

            .welcome-box {
                border-radius: 22px;
            }

            .welcome-image {
                min-height: 220px;
            }

            .welcome-content {
                padding: 28px 20px;
            }

            .welcome-content h1 {
                font-size: 25px;
            }

            .welcome-content h2 {
                font-size: 19px;
            }

            .welcome-content p {
                font-size: 14px;
                line-height: 1.7;
            }

            .welcome-btn {
                width: 100%;
            }

            .sidebar {
                width: 82%;
            }
        }
    </style>
</head>

<body>

    <!-- OVERLAY -->
    <div class="overlay" onclick="toggleMenu()"></div>

    <!-- BOTÓN HAMBURGUESA -->
    <button class="menu-toggle" onclick="toggleMenu()">
        <i class="fas fa-bars"></i>
    </button>

    <div class="container">

        <!-- SIDEBAR -->
        <div class="sidebar">

            <button class="close-menu" onclick="toggleMenu()">
                <i class="fas fa-times"></i>
            </button>

            <div>

                <div class="logo">
                    <h2>BUSINESS</h2>
                </div>

                <div class="menu">

                    <a href="/business">
                        <i class="fas fa-chart-line"></i>
                        Dashboard
                    </a>

                    <a href="/business/profile">
                        <i class="fas fa-user"></i>
                        Perfil
                    </a>

                    <a href="/business/producto">
                        <i class="fas fa-layer-group"></i>
                        Producto Categoría
                    </a>

                    <a href="/business/gestion">
                        <i class="fas fa-boxes"></i>
                        Gestión Productos
                    </a>

                </div>

            </div>

            <div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                <button class="logout-btn"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                    <i class="fas fa-sign-out-alt"></i>
                    Cerrar sesión

                </button>

            </div>

        </div>

        <!-- MAIN -->
        <div class="main">

            <div class="welcome-box">

                <!-- IMAGEN -->
                <div class="welcome-image">
                    <img src="/images/bienvenido.png" alt="Negocio">
                </div>

                <!-- CONTENIDO -->
                <div class="welcome-content">

                    <div class="badge">
                        PANEL EMPRESARIAL
                    </div>

                    <h1>
                        Bienvenido a tu panel de negocio
                    </h1>

                    <h2>
                        {{ auth()->user()->name }}
                    </h2>

                    <p>
                        Administra tus productos, categorías y operaciones
                        desde un solo lugar con una interfaz moderna,
                        organizada y completamente responsive.
                    </p>

                    <button class="welcome-btn">
                        Comenzar ahora
                    </button>

                </div>

            </div>

        </div>

    </div>

    <script>
        function toggleMenu() {

            const sidebar = document.querySelector('.sidebar');
            const overlay = document.querySelector('.overlay');

            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        }

        // Cierra el menú si se agranda la pantalla
        window.addEventListener('resize', () => {

            if (window.innerWidth > 900) {

                document.querySelector('.sidebar')
                    .classList.remove('active');

                document.querySelector('.overlay')
                    .classList.remove('active');
            }
        });
    </script>

</body>

</html>
