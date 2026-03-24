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
            height: 100vh;
        }

        /* ================= SIDEBAR ================= */
        .sidebar {
            width: 240px;
            background: white;
            border-right: 1px solid #eee;
            padding: 25px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: 0.3s;
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

        /* ================= MAIN ================= */
        .main {
            flex: 1;
            background: #f4f6f9;
            padding: 22px 28px;
            display: flex;
            flex-direction: column;
            gap: 18px;
            height: 100vh;
            overflow: hidden;
        }

        /* HEADER */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            padding: 16px 20px;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
        }

        .header h1 {
            margin: 0;
            font-size: 26px;
        }

        .header p {
            margin: 0;
            color: #6b7280;
        }

        .header-box {
            padding: 8px 14px;
            background: #f9fafb;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
        }

        /* GRID */
        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
            flex: 1;
        }

        .box {
            background: white;
            border-radius: 14px;
            padding: 20px;
            border: 1px solid #e5e7eb;
        }

        .box-header {
            display: flex;
            justify-content: space-between;
        }

        .icon-box {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f9fafb;
            border-radius: 10px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 13px;
            border-radius: 10px;
            border: 1px solid #d1d5db;
            background: #fafafa;
        }

        .btn-gold {
            background: #c9a227;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        /* ================= HAMBURGUESA ================= */
        .menu-toggle {
            display: none;
            position: fixed;
            top: 18px;
            left: 18px;
            z-index: 1002;
            background: white;
            padding: 10px;
            border-radius: 10px;
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

        /* CLOSE */
        .close-sidebar {
            display: none;
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 20px;
            cursor: pointer;
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

        /* ================= RESPONSIVE ================= */
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

            .grid {
                grid-template-columns: 1fr;
            }

            .main {
                padding: 18px;
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

            <div class="header">
                <div>
                    <h1>Panel de Control</h1>
                    <p>Gestión profesional de tu negocio</p>
                </div>

                <div class="header-box">
                    <i class="fas fa-store" style="color:#c9a227;"></i> Mi negocio
                </div>
            </div>

            @if (session('success'))
                <div id="toast-overlay">
                    <div id="toast">
                        <i class="fas fa-check-circle"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <div class="grid">

                <div class="box">
                    <h3>Categorías</h3>

                    <form method="POST" action="/business/category">
                        @csrf
                        <input type="text" name="category" placeholder="Nombre categoría">
                        <button class="btn-gold">Crear</button>
                    </form>
                </div>

                <div class="box">
                    <h3>Productos</h3>

                    <form method="POST" action="/business/product">
                        @csrf
                        <input type="text" name="name" placeholder="Producto">
                        <input type="number" name="price" placeholder="Precio">

                        <button class="btn-gold">Agregar</button>
                    </form>
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
