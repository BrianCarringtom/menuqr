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
            background: #f4f7fe;
            /* Fondo claro premium */
            color: #1e293b;
            overflow-x: hidden;
        }

        .container {
            display: flex;
            min-height: 100vh;
            /* Sutiles esferas de color de fondo para dar profundidad */
            background-image:
                radial-gradient(circle at 80% 10%, rgba(37, 99, 235, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 20% 80%, rgba(29, 78, 216, 0.03) 0%, transparent 50%);
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 280px;
            background: #ffffff;
            border-right: 1px solid #e2e8f0;
            padding: 35px 24px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            z-index: 1000;
            box-shadow: 4px 0 24px rgba(0, 0, 0, 0.02);
        }

        .sidebar h2 {
            text-align: center;
            background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
            letter-spacing: 2px;
            font-size: 24px;
        }

        .menu {
            margin-top: 45px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 16px;
            margin-bottom: 10px;
            border-radius: 16px;
            text-decoration: none;
            color: #64748b;
            font-size: 15px;
            font-weight: 600;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .menu a i {
            width: 20px;
            text-align: center;
            font-size: 18px;
            color: #94a3b8;
            transition: all 0.25s;
        }

        /* Animación genial al pasar el mouse por los enlaces */
        .menu a:hover {
            background: rgba(37, 99, 235, 0.08);
            color: #1d4ed8;
            transform: translateX(4px);
        }

        .menu a:hover i {
            color: #1d4ed8;
            transform: scale(1.1);
        }

        .logout-btn {
            width: 100%;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            border: none;
            padding: 15px;
            border-radius: 16px;
            color: white;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 10px 20px rgba(15, 23, 42, 0.15);
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(15, 23, 42, 0.25);
            filter: brightness(1.2);
        }

        /* ================= MAIN CONTENT ================= */

        .main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            position: relative;
        }

        /* ================= WELCOME BOX (Estilo Zafiro) ================= */

        .welcome-box {
            position: relative;
            width: 100%;
            max-width: 1100px;
            min-height: 620px;
            border-radius: 36px;
            overflow: hidden;
            background: #ffffff;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.04),
                0 4px 12px rgba(37, 99, 235, 0.02);
            display: flex;
            align-items: center;
        }

        .welcome-box img {
            position: absolute;
            right: 5%;
            width: 45%;
            height: 80%;
            object-fit: contain;
            display: block;
            z-index: 1;
            pointer-events: none;
            animation: float 6s ease-in-out infinite;
            /* Animación de flotado suave */
        }

        /* Degradado azul moderno sobre la tarjeta principal */
        .welcome-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(105deg, #0f172a 0%, #1e3a8a 40%, #2563eb 100%);
            z-index: 0;
        }

        /* CONTENIDO INTERNO */
        .welcome-content {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            /* Alineado a la izquierda como la imagen de referencia */
            text-align: left;
            padding: 60px 80px;
            color: white;
            max-width: 65%;
        }

        .welcome-content h1 {
            font-size: 52px;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 8px;
            letter-spacing: -1px;
            color: #ffffff;
        }

        .welcome-content h2 {
            font-size: 42px;
            /* Texto degradado brillante para el nombre del usuario */
            background: linear-gradient(135deg, #38bdf8 0%, #60a5fa 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 20px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .welcome-content p {
            max-width: 480px;
            font-size: 17px;
            line-height: 1.7;
            color: #93c5fd;
            margin-bottom: 35px;
            font-weight: 400;
        }

        /* BOTÓN MODERNO CON EFECTO HOVER INTERESANTE */
        .welcome-btn {
            padding: 15px 35px;
            border-radius: 18px;
            background: #ffffff;
            color: #1e3a8a;
            text-decoration: none;
            font-size: 15px;
            font-weight: 700;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            border: 2px solid transparent;
        }

        .welcome-btn:hover {
            background: transparent;
            color: #ffffff;
            border-color: #ffffff;
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(255, 255, 255, 0.2);
        }

        /* Animación para que la ilustración flote en pantalla */
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-15px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        /* ================= MENUS MÓVILES ================= */

        .menu-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            width: 50px;
            height: 50px;
            border: none;
            border-radius: 16px;
            background: #ffffff;
            color: #2563eb;
            font-size: 20px;
            cursor: pointer;
            z-index: 1100;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        }

        .close-menu {
            display: none;
            position: absolute;
            top: 24px;
            right: 24px;
            background: #f1f5f9;
            border: none;
            width: 38px;
            height: 38px;
            border-radius: 12px;
            font-size: 18px;
            color: #64748b;
            cursor: pointer;
            transition: background 0.2s;
        }

        .close-menu:hover {
            background: #e2e8f0;
            color: #0f172a;
        }

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

        /* ================= RESPONSIVE TABLET ================= */

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
                box-shadow: 20px 0 50px rgba(15, 23, 42, 0.08);
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
                min-height: 550px;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .welcome-box img {
                display: none;
                /* Esconde la imagen estática en pantallas medianas si estorba */
            }

            .welcome-content {
                max-width: 100%;
                padding: 40px;
                align-items: center;
                text-align: center;
            }
        }

        /* ================= RESPONSIVE MÓVIL ================= */

        @media (max-width: 600px) {
            .main {
                padding: 90px 16px 20px;
            }

            .welcome-box {
                min-height: 440px;
                border-radius: 28px;
            }

            .welcome-content {
                padding: 30px 20px;
            }

            .welcome-content h1 {
                font-size: 36px;
            }

            .welcome-content h2 {
                font-size: 26px;
            }

            .welcome-content p {
                font-size: 15px;
                margin-bottom: 25px;
            }

            .welcome-btn {
                padding: 12px 28px;
                font-size: 14px;
                border-radius: 14px;
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
