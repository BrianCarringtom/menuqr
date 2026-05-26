<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Business Dashboard</title>

    <!-- Fuente -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #f9fafb;
            color: #1f2937;
            overflow-x: hidden;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 240px;
            background: white;
            border-right: 1px solid #eee;
            padding: 25px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: 0.3s ease;
        }

        .sidebar h2 {
            text-align: center;
            color: #c9a227;
            font-weight: 600;
            letter-spacing: 2px;
        }

        .menu {
            margin-top: 40px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px;
            margin-bottom: 10px;
            border-radius: 10px;
            text-decoration: none;
            color: #555;
            transition: 0.25s;
            font-size: 15px;
        }

        .menu a:hover {
            background: #fef9e7;
            color: #c9a227;
        }

        .logout-btn {
            background: #c9a227;
            border: none;
            padding: 14px;
            border-radius: 10px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #a8831f;
        }

        /* MAIN */
        .main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            width: 100%;
        }

        /* WELCOME */
        .welcome-box {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            width: 100%;
            max-width: 750px;
            border: 1px solid #eee;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .welcome-box img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .welcome-content {
            padding: 30px;
        }

        .welcome-content h1 {
            margin: 0;
            font-size: 32px;
            color: #1f2937;
        }

        .welcome-content h2 {
            margin: 10px 0;
            color: #c9a227;
            font-weight: 500;
            font-size: 24px;
        }

        .welcome-content p {
            color: #6b7280;
            margin-top: 10px;
            font-size: 16px;
            line-height: 1.6;
        }

        /* HAMBURGUESA */
        .menu-toggle {
            display: none;
            position: fixed;
            top: 15px;
            left: 15px;
            background: #c9a227;
            color: white;
            border: none;
            width: 48px;
            height: 48px;
            border-radius: 12px;
            font-size: 20px;
            z-index: 2000;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        /* BOTÓN CERRAR */
        .close-menu {
            display: none;
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
        }

        /* OVERLAY */
        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
            z-index: 999;
            display: none;
        }

        .overlay.active {
            display: block;
        }

        /* RESPONSIVE */
        @media (max-width: 992px) {

            .menu-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .sidebar {
                position: fixed;
                top: 0;
                left: -260px;
                height: 100%;
                z-index: 1000;
                box-shadow: 5px 0 25px rgba(0, 0, 0, 0.08);
            }

            .sidebar.active {
                left: 0;
            }

            .close-menu {
                display: block;
            }

            .main {
                padding: 80px 15px 20px;
            }

            .welcome-box {
                border-radius: 16px;
            }

            .welcome-box img {
                height: auto;
                max-height: 250px;
                object-fit: cover;
            }

            .welcome-content {
                padding: 25px 20px;
            }

            .welcome-content h1 {
                font-size: 24px;
            }

            .welcome-content h2 {
                font-size: 20px;
            }

            .welcome-content p {
                font-size: 15px;
            }
        }

        /* CELULARES PEQUEÑOS */
        @media (max-width: 480px) {

            .welcome-content h1 {
                font-size: 21px;
            }

            .welcome-content h2 {
                font-size: 18px;
            }

            .welcome-content p {
                font-size: 14px;
            }

            .menu a {
                font-size: 14px;
                padding: 12px;
            }

            .sidebar {
                width: 85%;
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
                        Gestiona tu negocio de forma profesional,
                        clara y organizada.
                    </p>

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

        // Cerrar menú automáticamente al agrandar pantalla
        window.addEventListener('resize', () => {

            if (window.innerWidth > 992) {

                document.querySelector('.sidebar')
                    .classList.remove('active');

                document.querySelector('.overlay')
                    .classList.remove('active');
            }
        });
    </script>

</body>

</html>
