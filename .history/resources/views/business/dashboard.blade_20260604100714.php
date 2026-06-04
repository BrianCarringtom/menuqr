<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #060713;
            /* Fondo espacio profundo */
            color: #e2e8f0;
            overflow-x: hidden;
        }

        .container {
            display: flex;
            min-height: 100vh;
            background: radial-gradient(circle at 80% 20%, rgba(99, 102, 241, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 20% 80%, rgba(219, 39, 119, 0.1) 0%, transparent 50%);
        }

        /* ================= SIDEBAR (Neo-Cyberpunk) ================= */

        .sidebar {
            width: 280px;
            background: rgba(10, 11, 28, 0.75);
            border-right: 1px solid rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            padding: 40px 24px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            z-index: 1000;
        }

        .sidebar h2 {
            text-align: center;
            background: linear-gradient(135deg, #00f2fe 0%, #4facfe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
            letter-spacing: 4px;
            font-size: 26px;
            text-shadow: 0 0 30px rgba(0, 242, 254, 0.3);
        }

        .menu {
            margin-top: 50px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 14px 18px;
            margin-bottom: 14px;
            border-radius: 16px;
            text-decoration: none;
            color: #94a3b8;
            font-size: 15px;
            font-weight: 600;
            border: 1px solid transparent;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .menu a i {
            width: 20px;
            text-align: center;
            font-size: 18px;
            color: #64748b;
            transition: color 0.3s;
        }

        .menu a:hover {
            background: linear-gradient(90deg, rgba(79, 172, 254, 0.15) 0%, rgba(0, 242, 254, 0.03) 100%);
            color: #00f2fe;
            border-color: rgba(0, 242, 254, 0.25);
            box-shadow: 0 8px 20px rgba(0, 242, 254, 0.1);
            transform: translateX(5px);
        }

        .menu a:hover i {
            color: #00f2fe;
            text-shadow: 0 0 10px rgba(0, 242, 254, 0.5);
        }

        .logout-btn {
            width: 100%;
            background: linear-gradient(135deg, #f43f5e 0%, #e11d48 100%);
            border: none;
            padding: 16px;
            border-radius: 16px;
            color: white;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 4px 20px rgba(225, 29, 72, 0.25);
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 24px rgba(225, 29, 72, 0.45);
            filter: brightness(1.1);
        }

        /* ================= MAIN AREA ================= */

        .main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            position: relative;
        }

        /* ================= WELCOME BOX (Futuristic Card) ================= */

        .welcome-box {
            position: relative;
            width: 100%;
            max-width: 1100px;
            min-height: 650px;
            border-radius: 36px;
            overflow: hidden;
            background: #020205;
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 30px 70px rgba(0, 0, 0, 0.8),
                0 0 50px rgba(99, 102, 241, 0.05);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .welcome-box img {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Cambiado a cover para un look inmersivo total */
            display: block;
            opacity: 0.4;
            /* Integra la imagen de fondo con el espacio oscuro */
            mix-blend-mode: luminosity;
        }

        /* Degradado Galáctico / Hacker sobre el fondo */
        .welcome-overlay {
            position: absolute;
            inset: 0;
            background:
                linear-gradient(135deg, rgba(6, 7, 19, 0.95) 0%, rgba(15, 12, 41, 0.6) 50%, rgba(6, 7, 19, 0.95) 100%),
                radial-gradient(circle at 50% 50%, rgba(0, 242, 254, 0.15) 0%, transparent 60%);
            z-index: 1;
        }

        /* CONTENIDO */
        .welcome-content {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 60px;
            color: white;
            max-width: 800px;
        }

        .welcome-content h1 {
            font-size: 58px;
            font-weight: 800;
            letter-spacing: -1px;
            margin-bottom: 12px;
            background: linear-gradient(to right, #ffffff, #94a3b8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .welcome-content h2 {
            font-size: 36px;
            background: linear-gradient(135deg, #a855f7 0%, #10b981 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 24px;
            font-weight: 800;
            letter-spacing: -0.5px;
            filter: drop-shadow(0 0 20px rgba(168, 85, 247, 0.3));
        }

        .welcome-content p {
            max-width: 580px;
            font-size: 18px;
            line-height: 1.7;
            color: #94a3b8;
            margin-bottom: 35px;
        }

        /* BOTÓN GLOWING MODERNO */
        .welcome-btn {
            padding: 14px 36px;
            border-radius: 20px;
            background: #ffffff;
            color: #060713;
            text-decoration: none;
            font-size: 15px;
            font-weight: 700;
            box-shadow: 0 15px 30px rgba(255, 255, 255, 0.15);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            border: 1px solid transparent;
        }

        .welcome-btn:hover {
            background: transparent;
            color: #ffffff;
            border-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 0 30px rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
        }

        /* ================= INTERFAZ MÓVIL / RESPONSIVE ================= */

        .menu-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            width: 52px;
            height: 52px;
            border: 1px solid rgba(0, 242, 254, 0.2);
            border-radius: 16px;
            background: rgba(10, 11, 28, 0.8);
            backdrop-filter: blur(10px);
            color: #00f2fe;
            font-size: 20px;
            cursor: pointer;
            z-index: 1100;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.5);
        }

        .close-menu {
            display: none;
            position: absolute;
            top: 24px;
            right: 24px;
            background: rgba(255, 255, 255, 0.05);
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 12px;
            font-size: 20px;
            color: #94a3b8;
            cursor: pointer;
            transition: all 0.2s;
        }

        .close-menu:hover {
            color: #f43f5e;
            background: rgba(244, 63, 94, 0.1);
        }

        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(2, 2, 5, 0.6);
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

        /* ================= TABLET (992px) ================= */

        @media (max-width: 992px) {
            .menu-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .sidebar {
                position: fixed;
                top: 0;
                left: -300px;
                width: 280px;
                height: 100%;
                background: #0a0b1c;
                box-shadow: 20px 0 60px rgba(0, 0, 0, 0.7);
            }

            .sidebar.active {
                left: 0;
            }

            .close-menu {
                display: block;
            }

            .main {
                width: 100%;
                padding: 100px 24px 40px;
            }

            .welcome-box {
                min-height: 580px;
                border-radius: 28px;
            }

            .welcome-content h1 {
                font-size: 46px;
            }

            .welcome-content h2 {
                font-size: 28px;
            }
        }

        /* ================= MÓVIL (600px) ================= */

        @media (max-width: 600px) {
            .main {
                padding: 95px 16px 24px;
            }

            .welcome-box {
                min-height: 480px;
                border-radius: 24px;
            }

            .welcome-content {
                padding: 30px 20px;
            }

            .welcome-content h1 {
                font-size: 34px;
            }

            .welcome-content h2 {
                font-size: 22px;
                margin-bottom: 16px;
            }

            .welcome-content p {
                font-size: 15px;
                line-height: 1.6;
                margin-bottom: 28px;
            }

            .welcome-btn {
                padding: 12px 28px;
                font-size: 14px;
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
                if (!sidebar.classList.contains('active')) {
                    menuBtn.style.display = 'flex';
                }
            }
        });
    </script>

</body>

</html>
