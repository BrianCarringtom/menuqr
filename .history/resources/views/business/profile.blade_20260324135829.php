<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Business Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
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
            min-height: 100vh;
        }

        /* OVERLAY */
        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
            opacity: 0;
            visibility: hidden;
            transition: 0.3s;
            z-index: 1000;
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* HAMBURGER */
        .menu-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1002;
            background: white;
            border-radius: 10px;
            padding: 10px;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .menu-toggle span {
            display: block;
            width: 25px;
            height: 3px;
            margin: 5px 0;
            background: #1f2937;
        }

        .menu-toggle.hide {
            opacity: 0;
            pointer-events: none;
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
            position: relative;
            transition: 0.3s;
        }

        .close-sidebar {
            display: none;
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 20px;
            cursor: pointer;
        }

        .sidebar h2 {
            text-align: center;
            color: #c9a227;
            letter-spacing: 2px;
        }

        .menu {
            margin-top: 30px;
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
            transition: 0.2s;
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

        /* MAIN (igual estilo del ejemplo) */
        .main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .welcome-box {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            max-width: 750px;
            width: 100%;
            border: 1px solid #eee;
            text-align: center;
        }

        .welcome-box img {
            width: 100%;
            height: 280px;
            object-fit: cover;
        }

        .welcome-content {
            padding: 30px;
        }

        .welcome-content h1 {
            margin: 0;
            font-size: 28px;
        }

        .welcome-content h2 {
            margin: 10px 0;
            color: #c9a227;
        }

        .welcome-content p {
            color: #6b7280;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {

            .menu-toggle {
                display: block;
            }

            .sidebar {
                position: fixed;
                left: -260px;
                top: 0;
                height: 100%;
                z-index: 1001;
            }

            .sidebar.active {
                left: 0;
            }

            .close-sidebar {
                display: block;
            }

            .main {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- MENU -->
    <div class="menu-toggle" id="menuToggle">
        <span></span><span></span><span></span>
    </div>

    <div class="overlay" id="overlay"></div>

    <div class="container">

        <!-- SIDEBAR -->
        <div class="sidebar" id="sidebar">

            <i class="fas fa-times close-sidebar" id="closeSidebar"></i>

            <div>
                <h2>BUSINESS</h2>

                <div class="menu">
                    <a href="/business"><i class="fas fa-chart-line"></i> Dashboard</a>
                    <a href="/business/profile"><i class="fas fa-user"></i> Perfil</a>
                    <a href="/business/producto"><i class="fas fa-file-alt"></i> Producto-Categoria</a>
                    <a href="/business/gestion"><i class="fas fa-boxes"></i> Gestión</a>
                </div>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>

            <button class="logout-btn"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Cerrar sesión
            </button>
        </div>

        <!-- MAIN -->
        <div class="main">

            <div class="welcome-box">

                <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836">

                <div class="welcome-content">
                    <h1>Bienvenido a tu panel</h1>
                    <h2>{{ Auth::user()->name }}</h2>
                    <p>Gestiona tu negocio de forma profesional, clara y organizada.</p>
                </div>

            </div>

        </div>

    </div>

    <script>
        const toggle = document.getElementById("menuToggle");
        const sidebar = document.getElementById("sidebar");
        const overlay = document.getElementById("overlay");
        const closeBtn = document.getElementById("closeSidebar");

        function openMenu() {
            sidebar.classList.add("active");
            overlay.classList.add("active");
            toggle.classList.add("hide");
        }

        function closeMenu() {
            sidebar.classList.remove("active");
            overlay.classList.remove("active");
            toggle.classList.remove("hide");
        }

        toggle.addEventListener("click", openMenu);
        overlay.addEventListener("click", closeMenu);
        closeBtn.addEventListener("click", closeMenu);
    </script>

</body>

</html>
