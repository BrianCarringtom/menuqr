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
            min-height: 100vh;
        }

        /* HAMBURGUESA */
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
            padding: 40px;
            overflow-y: auto;
        }

        /* PORTADA (NO SE TOCA DISEÑO) */
        .cover {
            position: relative;
        }

        .cover-img {
            width: 100%;
            height: 340px;
            border-radius: 25px;
            overflow: hidden;
        }

        .cover-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .cover-overlay {
            position: absolute;
            top: 0;
            left: 0;
            height: 340px;
            width: 100%;
            border-radius: 25px;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
        }

        .profile-img {
            position: absolute;
            bottom: -60px;
            left: 50px;
        }

        .profile-img img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 6px solid white;
            object-fit: cover;
        }

        .edit-cover {
            position: absolute;
            bottom: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            padding: 10px 15px;
            border-radius: 12px;
            cursor: pointer;
            color: white;
            font-size: 14px;
        }

        /* GRID (solo responsive) */
        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-top: 80px;
        }

        .card {
            background: white;
            border-radius: 20px;
            border: 1px solid #eee;
            padding: 35px;
        }

        .card h2 {
            margin: 0;
            font-size: 28px;
        }

        .card h3 {
            margin-bottom: 20px;
            color: #c9a227;
        }

        .card p {
            color: #666;
        }

        .btn {
            display: inline-block;
            background: #c9a227;
            color: white;
            padding: 12px 20px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background: #a8831f;
        }

        .input {
            width: 100%;
            padding: 14px;
            border-radius: 12px;
            border: 1px solid #ddd;
        }

        /* OVERLAY */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
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

        /* RESPONSIVE (SIN MOVER TU DISEÑO) */
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

            .grid {
                grid-template-columns: 1fr;
            }

            /* SOLO ajuste imagen */
            .cover-img {
                height: 220px;
            }
        }
    </style>
</head>

<body>

    <!-- HAMBURGUESA -->
    <div class="menu-toggle" id="menuToggle">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <!-- OVERLAY -->
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
                    <a href="/business/gestion"><i class="fas fa-boxes"></i> Gestión de Producto</a>
                </div>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>

            <button class="logout-btn"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Cerrar sesión
            </button>
        </div>

        <!-- MAIN -->
        <div class="main">

            <!-- TU CONTENIDO ORIGINAL SIN CAMBIOS -->
            <!-- (todo lo de portada y grid queda igual) -->

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
