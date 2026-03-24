<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
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
        }

        .container {
            display: flex;
            height: 100vh;
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
            padding: 12px;
            margin-bottom: 10px;
            border-radius: 8px;
            text-decoration: none;
            color: #555;
            transition: 0.25s;
        }

        .menu a:hover {
            background: #fef9e7;
            color: #c9a227;
        }

        .logout-btn {
            background: #c9a227;
            border: none;
            padding: 12px;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            cursor: pointer;
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
        }

        /* WELCOME */
        .welcome-box {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            max-width: 700px;
            width: 100%;
            border: 1px solid #eee;
            text-align: center;
        }

        .welcome-box img {
            width: 100%;
            height: 260px;
            object-fit: cover;
        }

        .welcome-content {
            padding: 30px;
        }

        .welcome-content h1 {
            margin: 0;
            font-size: 28px;
            color: #1f2937;
        }

        .welcome-content h2 {
            margin: 10px 0;
            color: #c9a227;
            font-weight: 500;
        }

        .welcome-content p {
            color: #6b7280;
            margin-top: 10px;
        }

        /* HAMBURGUESA */
        .menu-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            background: #c9a227;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-size: 18px;
            z-index: 1001;
            cursor: pointer;
        }

        /* BOTÓN CERRAR */
        .close-menu {
            display: none;
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            font-size: 22px;
            cursor: pointer;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {

            .menu-toggle {
                display: block;
            }

            .sidebar {
                position: fixed;
                top: 0;
                left: -260px;
                height: 100%;
                z-index: 1000;
                transition: 0.3s;
            }

            .sidebar.active {
                left: 0;
            }

            .close-menu {
                display: block;
            }

            .main {
                padding: 20px;
            }
        }

        /* OCULTAR HAMBURGUESA CUANDO SE ABRE */
        .sidebar.active~.main .menu-toggle {
            display: none;
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- SIDEBAR -->
        <div class="sidebar">

            <button class="close-menu" onclick="toggleMenu()">
                <i class="fas fa-times"></i>
            </button>

            <div>
                <h2>BUSINESS</h2>

                <div class="menu">
                    <a href="/business"><i class="fas fa-chart-line"></i> Dashboard</a>
                    <a href="/business/profile"><i class="fas fa-user"></i> Perfil</a>
                    <a href="/business/producto"><i class="fas fa-file-alt"></i> Producto-Categoria</a>
                    <a href="/business/gestion"><i class="fas fa-boxes"></i> Gestion de Producto</a>
                </div>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <button class="logout-btn"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Cerrar sesión
            </button>
        </div>

        <!-- MAIN -->
        <div class="main">
            <button class="menu-toggle" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </button>

            <div class="welcome-box">
                <img src="/images/bienvenido.png" alt="Negocio">

                <div class="welcome-content">
                    <h1>Bienvenido a tu panel</h1>
                    <h2>{{ auth()->user()->name }}</h2>
                    <p>Gestiona tu negocio de forma profesional, clara y organizada.</p>
                </div>
            </div>

        </div>

    </div>

    <script>
        function toggleMenu() {
            const sidebar = document.querySelector('.sidebar');
            const btn = document.querySelector('.menu-toggle');

            sidebar.classList.toggle('active');

            if (sidebar.classList.contains('active')) {
                btn.style.display = 'none';
            } else {
                btn.style.display = 'block';
            }
        }
    </script>

</body>

</html>
