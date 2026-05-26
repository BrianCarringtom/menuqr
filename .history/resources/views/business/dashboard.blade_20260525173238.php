<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Dashboard</title>

    <!-- Fuente -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f9fafb;
            color: #1f2937;
            overflow-x: hidden;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* =======================
           SIDEBAR
        ======================= */

        .sidebar {
            width: 240px;
            background: white;
            border-right: 1px solid #eee;
            padding: 25px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: 0.35s ease;
            z-index: 1000;
        }

        .sidebar h2 {
            text-align: center;
            color: #c9a227;
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 35px;
            font-size: 26px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px;
            border-radius: 12px;
            text-decoration: none;
            color: #555;
            transition: 0.3s ease;
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }

        .menu a i {
            color: #c9a227;
            font-size: 16px;
            min-width: 20px;
        }

        .menu a:hover {
            background: #fef9e7;
            color: #c9a227;
            transform: translateX(4px);
        }

        .menu a.active {
            background: #fef9e7;
            color: #c9a227;
            font-weight: 600;
        }

        .logout-btn {
            background: linear-gradient(135deg, #c9a227, #e0b93c);
            border: none;
            padding: 14px;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s ease;
            font-size: 15px;
            box-shadow: 0 8px 20px rgba(201, 162, 39, 0.2);
        }

        .logout-btn:hover {
            background: #a8831f;
            transform: translateY(-2px);
        }

        /* =======================
           MAIN
        ======================= */

        .main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            transition: 0.3s ease;
        }

        /* =======================
           WELCOME BOX
        ======================= */

        .welcome-box {
            background: white;
            border-radius: 22px;
            overflow: hidden;
            max-width: 750px;
            width: 100%;
            border: 1px solid #eee;
            text-align: center;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.06);
            animation: fadeUp 0.8s ease;
        }

        .welcome-box img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            transition: 0.4s ease;
        }

        .welcome-box:hover img {
            transform: scale(1.02);
        }

        .welcome-content {
            padding: 35px;
        }

        .welcome-content h1 {
            margin: 0;
            font-size: 34px;
            color: #1f2937;
            font-weight: 700;
        }

        .welcome-content h2 {
            margin: 12px 0;
            color: #c9a227;
            font-weight: 600;
            font-size: 24px;
        }

        .welcome-content p {
            color: #6b7280;
            margin-top: 12px;
            font-size: 16px;
            line-height: 1.7;
        }

        /* =======================
           HAMBURGUESA
        ======================= */

        .menu-toggle {
            display: none;
            position: fixed;
            top: 18px;
            left: 18px;
            background: #c9a227;
            color: white;
            border: none;
            width: 52px;
            height: 52px;
            border-radius: 14px;
            font-size: 20px;
            z-index: 1002;
            cursor: pointer;
            transition: 0.3s ease;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .menu-toggle:hover {
            background: #a8831f;
            transform: scale(1.05);
        }

        /* =======================
           BOTON CERRAR
        ======================= */

        .close-menu {
            display: none;
            position: absolute;
            top: 15px;
            right: 15px;
            background: #f3f4f6;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            font-size: 18px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .close-menu:hover {
            background: #e5e7eb;
            transform: rotate(90deg);
        }

        /* =======================
           OVERLAY
        ======================= */

        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(2px);
            opacity: 0;
            visibility: hidden;
            transition: 0.3s ease;
            z-index: 999;
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* =======================
           ANIMACION
        ======================= */

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(35px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* =======================
           TABLET
        ======================= */

        @media (max-width: 992px) {

            .menu-toggle {
                display: block;
            }

            .sidebar {
                position: fixed;
                top: 0;
                left: -260px;
                height: 100%;
                z-index: 1001;
                box-shadow: 0 0 40px rgba(0, 0, 0, 0.15);
            }

            .sidebar.active {
                left: 0;
            }

            .close-menu {
                display: block;
            }

            .main {
                width: 100%;
                padding: 90px 20px 25px;
            }

            .welcome-box {
                max-width: 100%;
            }

            .welcome-box img {
                height: 240px;
            }

            .welcome-content {
                padding: 28px;
            }

            .welcome-content h1 {
                font-size: 28px;
            }

            .welcome-content h2 {
                font-size: 22px;
            }

        }

        /* =======================
           CELULARES
        ======================= */

        @media (max-width: 600px) {

            .sidebar {
                width: 260px;
                left: -260px;
                padding: 22px;
            }

            .welcome-box {
                border-radius: 18px;
            }

            .welcome-box img {
                height: 200px;
            }

            .welcome-content {
                padding: 22px;
            }

            .welcome-content h1 {
                font-size: 23px;
                line-height: 1.4;
            }

            .welcome-content h2 {
                font-size: 18px;
            }

            .welcome-content p {
                font-size: 14px;
                line-height: 1.6;
            }

            .menu a {
                padding: 13px;
                font-size: 14px;
            }

            .logout-btn {
                padding: 13px;
                font-size: 14px;
            }

            .menu-toggle {
                width: 48px;
                height: 48px;
                font-size: 18px;
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
        <div class="sidebar" id="sidebar">

            <button class="close-menu" onclick="toggleMenu()">
                <i class="fas fa-times"></i>
            </button>

            <div>

                <h2>BUSINESS</h2>

                <div class="menu">

                    <a href="/business" class="active">
                        <i class="fas fa-chart-line"></i>
                        Dashboard
                    </a>

                    <a href="/business/profile">
                        <i class="fas fa-user"></i>
                        Perfil
                    </a>

                    <a href="/business/producto">
                        <i class="fas fa-file-alt"></i>
                        Producto-Categoria
                    </a>

                    <a href="/business/gestion">
                        <i class="fas fa-boxes"></i>
                        Gestión de Producto
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

                <img src="/images/bienvenido.png" alt="Negocio">

                <div class="welcome-content">

                    <h1>Bienvenido a tu panel</h1>

                    <h2>{{ auth()->user()->name }}</h2>

                    <p>
                        Gestiona tu negocio de forma profesional, clara y organizada.
                    </p>

                </div>

            </div>

        </div>

    </div>

    <script>

        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        function toggleMenu() {

            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');

        }

        // CERRAR MENU AL DAR CLICK EN OPCION
        document.querySelectorAll('.menu a').forEach(link => {

            link.addEventListener('click', () => {

                if (window.innerWidth <= 992) {

                    sidebar.classList.remove('active');
                    overlay.classList.remove('active');

                }

            });

        });

        // QUITAR MENU SI SE AGRANDA PANTALLA
        window.addEventListener('resize', () => {

            if (window.innerWidth > 992) {

                sidebar.classList.remove('active');
                overlay.classList.remove('active');

            }

        });

    </script>

</body>

</html>