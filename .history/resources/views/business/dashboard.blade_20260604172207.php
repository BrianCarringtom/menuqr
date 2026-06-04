<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
            color: #1520A6;
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
            background: #e8eaff;
            color: #1520A6;
            transform: translateX(3px);
        }

        .logout-btn {
            width: 100%;
            background: #1520A6;
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
            background: #0f177a;
        }

        /* ================= MAIN (OPTIMIZADO Y MODERNO) ================= */

        .main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            position: relative;
            background: #f3f4f6; /* Un fondo sutilmente más estructurado */
        }

        /* ================= WELCOME ================= */

        .welcome-box {
            position: relative;
            width: 100%;
            max-width: 1100px;
            min-height: 600px;
            border-radius: 24px; /* Bordes modernos pero no exagerados */
            overflow: hidden;
            background: linear-gradient(135deg, #0f172a, #1e293b); /* Fondo alternativo elegante */
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .welcome-box img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; /* Cambiado a cover para un diseño inmersivo */
            display: block;
        }

        /* CAPA OSCURA MODERNA (GRADIENTE EN CAPAS) */
        .welcome-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, 
                rgba(15, 23, 42, 0.4) 0%, 
                rgba(15, 23, 42, 0.75) 60%, 
                rgba(15, 23, 42, 0.95) 100%
            );
            z-index: 1;
        }

        /* CONTENIDO ESTILIZADO */
        .welcome-content {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 40px 60px;
            color: white;
            max-width: 800px;
        }

        .welcome-content h1 {
            font-size: 52px;
            font-weight: 800;
            margin-bottom: 8px;
            letter-spacing: -1px;
            line-height: 1.2;
            text-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .welcome-content h2 {
            font-size: 28px;
            color: #1520A6;
            margin-bottom: 24px;
            font-weight: 700;
            background: #ffffff; /* Color de fondo interno del tag */
            padding: 6px 20px;
            border-radius: 999px;
            display: inline-block;
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
            text-shadow: none; /* Quitamos la sombra fea sobre fondo blanco */
        }

        .welcome-content p {
            max-width: 580px;
            font-size: 18px;
            line-height: 1.7;
            color: #e2e8f0;
            font-weight: 400;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.4);
            margin-bottom: 32px;
        }

        /* BOTÓN HOVER MODERNO CON CRISTAL */
        .welcome-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 32px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            color: white;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            letter-spacing: 0.3px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .welcome-btn:hover {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.4);
            transform: translateY(-3px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.2);
        }
        
        .welcome-btn i {
            font-size: 13px;
            transition: transform 0.3s ease;
        }
        
        .welcome-btn:hover i {
            transform: translateX(3px);
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
            background: #1520A6;
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
                min-height: 500px;
                border-radius: 20px;
            }

            .welcome-content {
                padding: 30px;
            }

            .welcome-content h1 {
                font-size: 38px;
            }

            .welcome-content h2 {
                font-size: 22px;
                margin-bottom: 20px;
            }

            .welcome-content p {
                font-size: 16px;
            }
        }

        /* ================= MÓVIL ================= */

        @media (max-width: 600px) {

            .main {
                padding: 85px 14px 22px;
            }

            .welcome-box {
                min-height: 450px;
                border-radius: 16px;
            }

            .welcome-content {
                padding: 24px 16px;
                transform: none; /* Removido el desajuste de TranslateY que rompía el flujo */
            }

            .welcome-content h1 {
                font-size: 28px;
                line-height: 1.2;
            }

            .welcome-content h2 {
                font-size: 18px;
                padding: 4px 14px;
                margin-bottom: 16px;
            }

            .welcome-content p {
                font-size: 14px;
                line-height: 1.6;
                margin-bottom: 24px;
            }

            .welcome-btn {
                padding: 12px 24px;
                font-size: 14px;
                width: 100%;
                justify-content: center;
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

    <div class="overlay" onclick="toggleMenu()"></div>

    <div class="container">

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

        <div class="main">

            <button class="menu-toggle" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </button>

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
                        <i class="fas fa-arrow-right"></i>
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