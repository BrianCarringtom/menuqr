<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #0f172a;
            color: white;
        }

        a {
            text-decoration: none;
        }

        /* BOTON HAMBURGUESA */
        .hamburger {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            font-size: 24px;
            cursor: pointer;
            z-index: 1001;
            color: #fff;
        }

        /* SIDEBAR / MEGA MENU */
        .sidebar {
            position: fixed;
            top: 0;
            left: -300px;
            /* fuera de la pantalla */
            width: 280px;
            height: 100vh;
            background: linear-gradient(180deg, #1f2937, #020617);
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.4);
            transition: left 0.4s ease;
            z-index: 1000;
        }

        .sidebar.active {
            left: 0;
        }

        /* BOTON CERRAR */
        .close-btn {
            display: none;
            font-size: 22px;
            margin-bottom: 20px;
            cursor: pointer;
            color: #fff;
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo h2 {
            color: #ef4444;
            font-size: 26px;
            margin: 0;
        }

        .logo span {
            font-size: 12px;
            color: #9ca3af;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .menu-title {
            font-size: 12px;
            color: #6b7280;
            margin: 10px 0;
            padding-left: 5px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            border-radius: 10px;
            color: #e5e7eb;
            transition: all 0.25s ease;
            position: relative;
        }

        .menu a i {
            width: 20px;
            text-align: center;
        }

        .menu a:hover {
            background: #374151;
            transform: translateX(5px);
        }

        .active {
            background: linear-gradient(90deg, #2563eb, #1d4ed8);
            color: white;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.4);
        }

        .active::before {
            content: "";
            position: absolute;
            left: -20px;
            top: 0;
            height: 100%;
            width: 4px;
            background: #3b82f6;
            border-radius: 0 5px 5px 0;
        }

        .logout-btn {
            background: transparent;
            border: 1px solid #ef4444;
            color: #ef4444;
            padding: 12px;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s;
            margin-bottom: 25px;
        }

        .logout-btn:hover {
            background: #ef4444;
            color: white;
        }

        /* MAIN CONTENT */
        .main {
            padding: 30px;
            min-height: 100vh;
            margin-left: 280px;
            transition: margin-left 0.4s ease;
        }

        /* ANIMACIÓN RESPONSIVE */
        @media screen and (max-width: 992px) {
            .hamburger {
                display: block;
            }

            .sidebar {
                left: -300px;
            }

            .sidebar.active {
                left: 0;
            }

            .close-btn {
                display: block;
            }

            .main {
                margin-left: 0;
            }
        }

        /* ANIMACIÓN DE APERTURA */
        .sidebar,
        .main {
            transition: all 0.4s ease;
        }
    </style>
</head>

<body data-page="{{ $page ?? 'dashboard' }}">
    <!-- BOTON HAMBURGUESA -->
    <div class="hamburger" id="hamburger"><i class="fas fa-bars"></i></div>

    <div class="sidebar" id="sidebar">
        <div>
            <div class="close-btn" id="close-btn"><i class="fas fa-times"></i></div>
            <div class="logo">
                <h2>ADMIN</h2>
                <span>Panel de control</span>
            </div>

            <div class="menu">
                <div class="menu-title">GENERAL</div>
                <a href="/admin" class="{{ request()->is('admin') ? 'active' : '' }}">
                    <i class="fas fa-chart-line"></i> Dashboard
                </a>
                <a href="/admin/users" class="{{ request()->is('admin/users') ? 'active' : '' }}">
                    <i class="fas fa-users"></i> Usuarios
                </a>
            </div>
        </div>

        <form id="logout-form" action="/logout" method="POST" style="display:none;">@csrf</form>
        <button class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> Cerrar sesión
        </button>
    </div>

    <div class="main" id="main-content">
        @yield('content')
    </div>

    <script>
        const hamburger = document.getElementById('hamburger');
        const sidebar = document.getElementById('sidebar');
        const closeBtn = document.getElementById('close-btn');

        hamburger.addEventListener('click', () => {
            sidebar.classList.add('active');
        });

        closeBtn.addEventListener('click', () => {
            sidebar.classList.remove('active');
        });

        // Cerrar sidebar al hacer clic fuera
        window.addEventListener('click', e => {
            if (!sidebar.contains(e.target) && !hamburger.contains(e.target)) {
                sidebar.classList.remove('active');
            }
        });
    </script>
</body>

</html>
