<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Dashboard - Royal Glass Minimalist</title>

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
            background: #f8fafc;
            color: #0f172a;
            overflow-x: hidden;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* ================= SIDEBAR ================= */
        .sidebar {
            width: 280px;
            background: #ffffff;
            border-right: 1px solid #e2e8f0;
            padding: 32px 24px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
        }

        .sidebar h2 {
            text-align: left;
            padding-left: 12px;
            color: #1e40af;
            /* Azul Rey Principal */
            font-weight: 800;
            letter-spacing: 1.5px;
            font-size: 22px;
        }

        .menu {
            margin-top: 40px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 16px;
            margin-bottom: 8px;
            border-radius: 12px;
            text-decoration: none;
            color: #64748b;
            font-size: 15px;
            font-weight: 500;
            transition: all 0.2s ease-in-out;
        }

        .menu a i {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        /* Hover estilo 2026 en Azul Rey */
        .menu a:hover {
            background: #eff6ff;
            color: #2563eb;
            transform: scale(1.02);
        }

        /* Estado activo o seleccionado (opcional para cuando se requiera) */
        .menu a.active {
            background: #1e40af;
            color: #ffffff;
        }

        .logout-btn {
            width: 100%;
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
            padding: 14px;
            border-radius: 12px;
            color: #64748b;
            weight: 600;
            font-size: 15px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.2s ease;
        }

        .logout-btn:hover {
            background: #fee2e2;
            color: #ef4444;
            border-color: #fca5a5;
        }

        /* ================= MAIN CONTENT ================= */
        .main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px;
            position: relative;
        }

        /* ================= WELCOME BOX (HERO) ================= */
        .welcome-box {
            position: relative;
            width: 100%;
            max-width: 1150px;
            min-height: 680px;
            border-radius: 28px;
            overflow: hidden;
            background: #0b1329;
            /* Fondo oscuro elegante */
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08);
        }

        .welcome-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            opacity: 0.4;
            /* Combinación moderna con el fondo */
        }

        /* Overlay con gradiente Azul Rey a Profundo */
        .welcome-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(30, 64, 175, 0.85) 0%, rgba(15, 23, 42, 0.95) 100%);
            z-index: 1;
        }

        /* CONTENIDO INTERNO */
        .welcome-content {
            position: absolute;
            inset: 0;
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 48px;
            color: white;
        }

        .welcome-content h1 {
            font-size: 52px;
            font-weight: 800;
            letter-spacing: -1px;
            margin-bottom: 12px;
        }

        .welcome-content h2 {
            font-size: 28px;
            color: #93c5fd;
            /* Azul celeste suave para destacar el nombre */
            margin-bottom: 24px;
            font-weight: 500;
        }

        .welcome-content p {
            max-width: 580px;
            font-size: 17px;
            line-height: 1.7;
            color: #cbd5e1;
            margin-bottom: 32px;
        }

        /* BOTÓN MODERNO GLASSMORPHISM */
        .welcome-btn {
            padding: 14px 32px;
            border-radius: 12px;
            background: #ffffff;
            color: #1e40af;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
            transition: all 0.2s ease-in-out;
        }

        .welcome-btn:hover {
            background: #f8fafc;
            transform: translateY(-2px);
            box-shadow: 0 20px 30px -10px rgba(30, 64, 175, 0.3);
        }

        /* ================= MENÚ HAMBURGUESA ================= */
        .menu-toggle {
            display: none;
            position: fixed;
            top: 24px;
            left: 24px;
            width: 48px;
            height: 48px;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            background: #ffffff;
            color: #0f172a;
            font-size: 18px;
            cursor: pointer;
            z-index: 1100;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            align-items: center;
            justify-content: center;
        }

        .close-menu {
            display: none;
            position: absolute;
            top: 24px;
            right: 24px;
            background: none;
            border: none;
            font-size: 22px;
            color: #64748b;
            cursor: pointer;
        }

        /* OVERLAY MÓVIL */
        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.3);
            backdrop-filter: blur(4px);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* ================= RESPONSIVE (TABLET) ================= */
        @media (max-width: 992px) {
            .menu-toggle {
                display: flex;
            }

            .sidebar {
                position: fixed;
                top: 0;
                left: -300px;
                width: 280px;
                height: 100%;
                transform: translateX(0);
                box-shadow: 20px 0 50px rgba(0, 0, 0, 0.05);
            }

            .sidebar.active {
                transform: translateX(300px);
            }

            .close-menu {
                display: block;
            }

            .main {
                width: 100%;
                padding: 96px 24px 24px;
            }

            .welcome-box {
                min-height: 580px;
            }

            .welcome-content h1 {
                font-size: 38px;
            }

            .welcome-content h2 {
                font-size: 24px;
            }
        }

        /* ================= RESPONSIVE (MÓVIL) ================= */
        @media (max-width: 600px) {
            .main {
                padding: 88px 16px 16px;
            }

            .welcome-box {
                min-height: 480px;
                border-radius: 20px;
            }

            .welcome-content {
                padding: 24px;
            }

            .welcome-content h1 {
                font-size: 28px;
            }

            .welcome-content h2 {
                font-size: 20px;
                margin-bottom: 16px;
            }

            .welcome-content p {
                font-size: 14px;
                margin-bottom: 24px;
            }

            .welcome-btn {
                padding: 12px 24px;
                font-size: 14px;
                width: 100%;
                text-align: center;
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
                        Producto-Categoría
                    </a>

                    <a href="/business/gestion">
                        <i class="fas fa-boxes"></i>
                        Gestión de Producto
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
                        Gestiona tu negocio de forma profesional, moderna y organizada desde un solo lugar.
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
                menuBtn.style.visibility = 'hidden';
                menuBtn.style.opacity = '0';
                document.body.style.overflow = 'hidden';
            } else {
                menuBtn.style.visibility = 'visible';
                menuBtn.style.opacity = '1';
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
                menuBtn.style.visibility = 'visible';
                menuBtn.style.opacity = '1';
            }
        });
    </script>

</body>

</html>
