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

        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 260px;
            background: #ffffff;
            border-right: 1px solid #ececec;
            padding: 28px 22px;
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
            letter-spacing: 3px;
            font-size: 24px;
        }

        .menu {
            margin-top: 45px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 15px 16px;
            margin-bottom: 12px;
            border-radius: 14px;
            text-decoration: none;
            color: #4b5563;
            font-size: 15px;
            font-weight: 500;
            transition: all 0.25s ease;
        }

        .menu a i {
            width: 18px;
            text-align: center;
            font-size: 16px;
        }

        .menu a:hover {
            background: #fff7df;
            color: #c9a227;
            transform: translateX(3px);
        }

        .logout-btn {
            width: 100%;
            background: #c9a227;
            border: none;
            padding: 15px;
            border-radius: 14px;
            color: white;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #aa861d;
        }

        /* ================= MAIN ================= */

        .main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            position: relative;
        }

        /* ================= WELCOME ================= */

        .welcome-box {
            position: relative;
            width: 100%;
            max-width: 1100px;
            min-height: 650px;
            border-radius: 32px;
            overflow: hidden;
            background: #000;
            box-shadow: 0 20px 55px rgba(0, 0, 0, 0.14);
        }

        .welcome-box img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
            background: #000;
        }

        /* OSCURECER UN POCO */
        .welcome-overlay {
            position: absolute;
            inset: 0;
            background:
                linear-gradient(to top,
                    rgba(0, 0, 0, 0.72),
                    rgba(0, 0, 0, 0.20),
                    rgba(0, 0, 0, 0.08));
        }

        /* CONTENIDO */
        .welcome-content {
            position: absolute;
            inset: 0;
            z-index: 2;

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

            text-align: center;
            padding: 40px;
            color: white;
        }

        .welcome-content h1 {
            font-size: 56px;
            font-weight: 700;
            margin-bottom: 14px;
            text-shadow: 0 8px 25px rgba(0, 0, 0, 0.45);
        }

        .welcome-content h2 {
            font-size: 30px;
            color: #f7d35b;
            margin-bottom: 18px;
            font-weight: 600;
            text-shadow: 0 5px 18px rgba(0, 0, 0, 0.4);
        }

        .welcome-content p {
            max-width: 650px;
            font-size: 17px;
            line-height: 1.8;
            color: rgba(255, 255, 255, 0.92);
            text-shadow: 0 4px 18px rgba(0, 0, 0, 0.45);
        }

        /* BOTÓN MÁS ELEGANTE */
        .welcome-btn {
            margin-top: 28px;
            padding: 10px 20px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.18);
            backdrop-filter: blur(10px);

            color: white;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;

            transition: 0.3s ease;
        }

        .welcome-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        /* ================= BOTÓN HAMBURGUESA ================= */

        .menu-toggle {
            display: none;
            position: fixed;
            top: 18px;
            left: 18px;
            width: 48px;
            height: 48px;
            border: none;
            border-radius: 14px;
            background: #c9a227;
            color: white;
            font-size: 18px;
            cursor: pointer;
            z-index: 1100;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.18);
        }

        /* ================= BOTÓN CERRAR ================= */

        .close-menu {
            display: none;
            position: absolute;
            top: 18px;
            right: 18px;
            background: none;
            border: none;
            font-size: 24px;
            color: #444;
            cursor: pointer;
        }

        /* ================= OVERLAY ================= */

        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
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

        /* ================= TABLET ================= */

        @media (max-width: 992px) {

            .menu-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .sidebar {
                position: fixed;
                top: 0;
                left: -280px;
                width: 260px;
                height: 100%;
                box-shadow: 10px 0 40px rgba(0, 0, 0, 0.12);
            }

            .sidebar.active {
                left: 0;
            }

            .close-menu {
                display: block;
            }

            .main {
                width: 100%;
                padding: 90px 22px 30px;
            }

            .welcome-box {
                min-height: 560px;
                border-radius: 26px;
            }

            .welcome-content h1 {
                font-size: 42px;
            }

            .welcome-content h2 {
                font-size: 24px;
            }

            .welcome-content p {
                font-size: 15px;
            }
        }

        /* ================= MÓVIL ================= */

        @media (max-width: 600px) {

            .main {
                padding: 85px 14px 22px;
            }

            .welcome-box {
                min-height: 420px;
                border-radius: 24px;
            }

            .welcome-box img {
                object-fit: contain;
                background: #000;
            }

            .welcome-content {
                padding: 42px;
            }

            .welcome-content h1 {
                font-size: 30px;
                line-height: 1.3;
            }

            .welcome-content h2 {
                font-size: 21px;
                margin-bottom: 14px;
            }

            .welcome-content p {
                font-size: 14px;
                line-height: 1.7;
            }

            .welcome-btn {
                margin-top: 22px;
                padding: 9px 17px;
                font-size: 12px;
            }

            .menu a {
                font-size: 14px;
                padding: 14px;
            }

            .logout-btn {
                font-size: 14px;
                padding: 14px;
            }

            .menu-toggle {
                width: 46px;
                height: 46px;
                font-size: 17px;
            }
        }
    </style>
</head>

<body>

    <!-- OVERLAY -->
    <div class="overlay" onclick="toggleMenu()"></div>

    <div class="container">

        <!-- SIDEBAR -->
        <div class="sidebar">

            <button class="close-menu" onclick="toggleMenu()">
                <i class="fas fa-times"></i>
            </button>

            <div>

                <h2>BUSINESS</h2>

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
                        <i class="fas fa-file-alt"></i>
                        Producto-Categoria
                    </a>

                    <a href="/business/gestion">
                        <i class="fas fa-boxes"></i>
                        Gestion de Producto
                    </a>

                </div>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>

            <button class="logout-btn"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                <i class="fas fa-sign-out-alt"></i>
                Cerrar sesión

            </button>

        </div>

        <!-- MAIN -->
        <div class="main">

            <button class="menu-toggle" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </button>

            <!-- WELCOME -->
            <div class="welcome-box">

                <img src="/images/bienvenido.png" alt="Negocio">

                <div class="welcome-overlay"></div>

                <div class="welcome-content">

                    <h1>Bienvenido a tu panel</h1>

                    <h2>{{ auth()->user()->name }}</h2>

                    <p>
                        Gestiona tu negocio de forma profesional,
                        moderna y organizada desde un solo lugar.
                    </p>

                    <a href="/{{ auth()->user()->slug }}" class="welcome-btn">
                        Ver mi página
                    </a>

                </div>

            </div>

        </div>

    </div>

    <script>
        function toggleMenu() {

            const sidebar = document.querySelector('.sidebar');
            const overlay = document.querySelector('.overlay');
            const menuBtn = document.querySelector('.menu-toggle');

            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');

            if (sidebar.classList.contains('active')) {

                menuBtn.style.display = 'none';
                document.body.style.overflow = 'hidden';

            } else {

                menuBtn.style.display = 'flex';
                document.body.style.overflow = 'auto';
            }
        }

        window.addEventListener('resize', () => {

            const sidebar = document.querySelector('.sidebar');
            const overlay = document.querySelector('.overlay');
            const menuBtn = document.querySelector('.menu-toggle');

            if (window.innerWidth > 992) {

                sidebar.classList.remove('active');
                overlay.classList.remove('active');
                menuBtn.style.display = 'none';
                document.body.style.overflow = 'auto';

            } else {

                menuBtn.style.display = 'flex';
            }
        });
    </script>

</body>

</html>