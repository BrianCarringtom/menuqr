<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #0b0f19; /* Fondo general más oscuro para resaltar la interfaz moderno */
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

        /* ================= MAIN (REDISEÑO TOP INTERNACIONAL 2026) ================= */

        .main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px;
            position: relative;
            background: #f4f6fc; /* Contraste limpio con el menú */
            overflow: hidden;
        }

        /* Efectos de luces "Aurora" de fondo para dar profundidad de última generación */
        .main::before, .main::after {
            content: "";
            position: absolute;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            filter: blur(130px);
            opacity: 0.4;
            z-index: 0;
            pointer-events: none;
        }
        .main::before {
            top: -10%;
            right: -5%;
            background: #1520A6;
        }
        .main::after {
            bottom: -10%;
            left: -5%;
            background: #4f46e5;
        }

        /* ================= WELCOME BOX (DISEÑO PREMIUM) ================= */

        .welcome-box {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 1150px;
            height: 82vh;
            min-height: 650px;
            border-radius: 36px;
            overflow: hidden;
            box-shadow: 0 30px 70px rgba(21, 32, 166, 0.12);
            display: flex;
            align-items: center;
            justify-content: flex-start; /* Contenido cargado sutilmente hacia la izquierda */
            padding: 0 80px;
        }

        /* Imagen de fondo modo Canvas cinematográfico */
        .welcome-box img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            z-index: 1;
        }

        /* Overlay con degradado premium hacia negro/azul oscuro */
        .welcome-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, 
                rgba(11, 15, 25, 0.9) 0%, 
                rgba(11, 15, 25, 0.75) 40%, 
                rgba(11, 15, 25, 0.2) 100%);
            z-index: 2;
        }

        /* Tarjeta de cristal flotante para el texto (Glassmorphism Avanzado) */
        .welcome-content {
            position: relative;
            z-index: 3;
            width: 100%;
            max-width: 540px;
            padding: 50px;
            background: rgba(255, 255, 255, 0.04);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 28px;
            color: white;
            text-align: left; /* Alineación moderna a la izquierda */
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
        }

        /* Tag decorativo superior de bienvenida */
        .welcome-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 99px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #e0e7ff;
            margin-bottom: 24px;
        }
        .welcome-tag i {
            color: #6366f1;
            animation: pulse 2s infinite;
        }

        .welcome-content h1 {
            font-size: 46px;
            font-weight: 800;
            line-height: 1.15;
            margin-bottom: 6px;
            letter-spacing: -1px;
            background: linear-gradient(to right, #ffffff, #e0e7ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .welcome-content h2 {
            font-size: 28px;
            color: #ffffff;
            margin-bottom: 20px;
            font-weight: 600;
            letter-spacing: -0.5px;
        }

        .welcome-content p {
            font-size: 16px;
            line-height: 1.65;
            color: #9ca3af;
            margin-bottom: 36px;
            font-weight: 400;
        }

        /* Botón Interactuable Estilo Neomorfismo Líquido */
        .welcome-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 34px;
            border-radius: 16px;
            background: #ffffff;
            color: #1520A6;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            box-shadow: 0 4px 20px rgba(255, 255, 255, 0.15);
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .welcome-btn i {
            transition: transform 0.3s ease;
        }

        .welcome-btn:hover {
            background: #f3f4f6;
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(255, 255, 255, 0.25);
            color: #0f177a;
        }

        .welcome-btn:hover i {
            transform: translateX(4px);
        }

        @keyframes pulse {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.2); opacity: 0.7; }
            100% { transform: scale(1); opacity: 1; }
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

        /* ================= ADAPTACIÓN RESPONSIVA (TABLET Y MÓVIL) ================= */

        @media (max-width: 1024px) {
            .welcome-box {
                padding: 0 40px;
                justify-content: center;
            }
            .welcome-content {
                text-align: center;
                max-width: 600px;
            }
            .welcome-tag {
                justify-content: center;
            }
            .welcome-overlay {
                background: linear-gradient(135deg, rgba(11, 15, 25, 0.9) 0%, rgba(11, 15, 25, 0.6) 100%);
            }
        }

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
                padding: 90px 20px 30px;
            }

            .welcome-box {
                height: 72vh;
                min-height: 520px;
                border-radius: 28px;
            }
        }

        @media (max-width: 600px) {
            .main {
                padding: 85px 12px 20px;
            }

            .welcome-box {
                height: 76vh;
                min-height: 480px;
                border-radius: 24px;
                padding: 0 16px;
            }

            .welcome-content {
                padding: 35px 20px;
                border-radius: 20px;
            }

            .welcome-content h1 {
                font-size: 28px;
            }

            .welcome-content h2 {
                font-size: 20px;
                margin-bottom: 14px;
            }

            .welcome-content p {
                font-size: 14px;
                margin-bottom: 24px;
            }

            .welcome-btn {
                padding: 12px 28px;
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

            <button class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
                    <div class="welcome-tag">
                        <i class="fas fa-bolt"></i> Workspace Activo
                    </div>
                    <h1>Bienvenido a tu panel</h1>
                    <h2>{{ auth()->user()->name }}</h2>
                    <p>
                        Gestiona tu negocio de forma profesional,
                        moderna y organizada desde un solo lugar.
                    </p>
                    <a href="/{{ auth()->user()->slug }}" class="welcome-btn">
                        Ver mi página <i class="fas fa-arrow-right"></i>
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