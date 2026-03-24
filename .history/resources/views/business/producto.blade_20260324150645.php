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
            font-weight: 600;
            color: #111827;
        }

        .header p {
            margin-top: 3px;
            color: #6b7280;
            font-size: 15px;
        }

        .header-box {
            font-size: 15px;
            color: #374151;
            background: #f9fafb;
            padding: 8px 14px;
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

        /* CARDS */
        .box {
            background: white;
            border-radius: 14px;
            padding: 20px;
            border: 1px solid #e5e7eb;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .box-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 14px;
        }

        .box-header h3 {
            margin: 0;
            font-size: 20px;
            color: #111827;
            font-weight: 600;
        }

        .icon-box {
            width: 36px;
            height: 36px;
            background: #f9fafb;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #eee;
        }

        .box p {
            color: #6b7280;
            font-size: 15px;
            margin-bottom: 14px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        input,
        select,
        textarea {
            padding: 13px;
            border-radius: 10px;
            border: 1px solid #d1d5db;
            font-size: 15px;
            background: #fafafa;
        }

        /* BOTONES */
        .btn-gold {
            background: #c9a227;
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.25s ease;
            padding: 13px;
        }

        .btn-gold:hover {
            background: #b8911f;
            box-shadow: 0 8px 18px rgba(201, 162, 39, 0.35);
        }

        .btn-gold:active {
            transform: scale(0.97);
            box-shadow: 0 4px 10px rgba(201, 162, 39, 0.2);
        }

        /* TOAST */
        #toast-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(4px);
            z-index: 9999;
        }

        #toast {
            background: white;
            color: #111827;
            padding: 20px 30px;
            border-radius: 16px;
            font-size: 16px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.18);
            border-left: 6px solid #16a34a;
            animation: toastIn 0.4s ease;
        }

        #toast i {
            color: #16a34a;
            font-size: 22px;
        }

        @keyframes toastIn {
            from {
                opacity: 0;
                transform: scale(0.9) translateY(20px);
            }

            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        @keyframes toastOut {
            to {
                opacity: 0;
                transform: scale(0.9) translateY(20px);
            }
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
                padding: 15px;
            }

            .grid {
                grid-template-columns: 1fr;
            }
        }

        /* OCULTAR ☰ CUANDO SE ABRE */
        .sidebar.active~.main .menu-toggle {
            display: none;
        }

        @media (max-width: 900px) {

            .main {
                overflow-y: auto;
                height: auto;
                min-height: 100vh;
                padding: 70px 15px 15px 15px;
            }

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

            <!-- HEADER -->
            <div class="header">
                <div>
                    <h1>Panel de Control</h1>
                    <p>Gestión profesional de tu negocio</p>
                </div>

                <div class="header-box">
                    <i class="fas fa-store" style="color:#c9a227;"></i> Mi negocio
                </div>
            </div>

            <!-- TOAST -->
            @if (session('success'))
                <div id="toast-overlay">
                    <div id="toast">
                        <i class="fas fa-check-circle"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <!-- GRID -->
            <div class="grid">

                <!-- CATEGORÍA -->
                <div class="box">
                    <div>
                        <div class="box-header">
                            <h3>Categorías</h3>
                            <div class="icon-box">
                                <i class="fas fa-folder" style="color:#c9a227;"></i>
                            </div>
                        </div>

                        <p>Organiza tu catálogo</p>

                        <form method="POST" action="/business/category">
                            @csrf

                            <input type="text" name="category" placeholder="Nombre de la categoría" required>

                            <button type="submit" class="btn-gold" style="margin-top:30px;">
                                Crear Categoría
                            </button>
                        </form>
                    </div>
                </div>

                <!-- PRODUCTO -->
                <div class="box">
                    <div>
                        <div class="box-header">
                            <h3>Productos</h3>
                            <div class="icon-box">
                                <i class="fas fa-box" style="color:#c9a227;"></i>
                            </div>
                        </div>

                        <p>Añade productos</p>

                        <form method="POST" action="/business/product">
                            @csrf

                            <input type="text" name="name" placeholder="Nombre del producto" required>
                            <input type="number" name="price" placeholder="Precio" step="0.01" required>

                            <select name="category" required>
                                <option value="" disabled selected>Seleccionar categoría</option>
                                @foreach (auth()->user()->categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>

                            <textarea name="description" rows="2" placeholder="Descripción del producto" required></textarea>

                            <button type="submit" class="btn-gold" style="margin-top:20px;">
                                Agregar Producto
                            </button>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script>
        setTimeout(() => {
            const overlay = document.getElementById('toast-overlay');
            if (overlay) {
                overlay.style.animation = "toastOut 0.4s forwards";
                setTimeout(() => overlay.remove(), 200);
            }
        }, 1000);
    </script>

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
