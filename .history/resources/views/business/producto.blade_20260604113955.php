<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Dashboard</title>

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
            background: #ffffff;
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
            border-right: 1px solid #f1f5f9;
            padding: 32px 24px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
        }

        .sidebar h2 {
            text-align: left;
            color: #1d4ed8;
            font-weight: 800;
            letter-spacing: 1.5px;
            font-size: 22px;
            padding-left: 12px;
            margin-bottom: 8px;
        }

        .menu {
            margin-top: 35px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            margin-bottom: 6px;
            border-radius: 10px;
            text-decoration: none;
            color: #64748b;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .menu a:hover {
            background: #f0f5ff;
            color: #1d4ed8;
        }

        /* Simulación de estado activo genérico por si necesitas usarlo en tu Blade */
        .menu a.active {
            background: #eff6ff;
            color: #1d4ed8;
            font-weight: 600;
        }

        .logout-btn {
            width: 100%;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 14px;
            border-radius: 10px;
            color: #64748b;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .logout-btn:hover {
            background: #f1f5f9;
            color: #0f172a;
            border-color: #cbd5e1;
        }

        /* ================= MAIN ================= */

        .main {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            gap: 32px;
            min-height: 100vh;
            background: #ffffff;
        }

        /* ================= HEADER ================= */

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            background: #ffffff;
            padding: 0 0 24px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            color: #0f172a;
            letter-spacing: -0.5px;
        }

        .header p {
            margin-top: 4px;
            color: #64748b;
            font-size: 14px;
        }

        .header-box {
            font-size: 14px;
            font-weight: 500;
            color: #1e3a8a;
            background: #eff6ff;
            padding: 10px 16px;
            border-radius: 99s9px;
            /* Formato píldora pill modern */
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        /* ================= GRID ================= */

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 32px;
        }

        /* ================= CARDS ================= */

        .box {
            background: #ffffff;
            border-radius: 16px;
            padding: 32px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.02);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .box:hover {
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04);
        }

        .box-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .box-header h3 {
            margin: 0;
            font-size: 20px;
            color: #0f172a;
            font-weight: 700;
        }

        .icon-box {
            width: 40px;
            height: 40px;
            background: #eff6ff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .box p {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 24px;
            line-height: 1.5;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px 16px;
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            font-size: 14px;
            background: #ffffff;
            color: #0f172a;
            outline: none;
            transition: all 0.2s ease;
        }

        input::placeholder,
        textarea::placeholder {
            color: #94a3b8;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
            background: #ffffff;
        }

        input[type="file"] {
            padding: 10px;
            background: #f8fafc;
            cursor: pointer;
            border-style: dashed;
        }

        textarea {
            resize: none;
        }

        /* ================= BOTONES ================= */

        .btn-gold {
            background: #1d4ed8;
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s ease;
            padding: 14px;
            box-shadow: 0 4px 12px rgba(29, 78, 216, 0.15);
        }

        .btn-gold:hover {
            background: #2563eb;
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.25);
        }

        .btn-gold:active {
            transform: scale(0.99);
        }

        /* ================= TOAST ================= */

        #toast-overlay {
            position: fixed;
            inset: 0;
            display: flex;
            align-items: flex-top;
            justify-content: center;
            background: rgba(15, 23, 42, 0.15);
            backdrop-filter: blur(4px);
            z-index: 9999;
            padding-top: 40px;
        }

        #toast {
            background: white;
            color: #0f172a;
            padding: 16px 24px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.1);
            border: 1px solid #e2e8f0;
            border-left: 4px solid #10b981;
            animation: toastIn 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        #toast i {
            color: #10b981;
            font-size: 18px;
        }

        @keyframes toastIn {
            from {
                opacity: 0;
                transform: translateY(-20px) scale(0.95);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes toastOut {
            to {
                opacity: 0;
                transform: translateY(-20px) scale(0.95);
            }
        }

        /* ================= HAMBURGUESA ================= */

        .menu-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            width: 44px;
            height: 44px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            background: #ffffff;
            color: #0f172a;
            font-size: 18px;
            cursor: pointer;
            z-index: 1100;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        /* ================= CERRAR ================= */

        .close-menu {
            display: none;
            position: absolute;
            top: 24px;
            right: 24px;
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: #64748b;
        }

        /* ================= OVERLAY ================= */

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

        /* ================= TABLET ================= */

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
                box-shadow: 20px 0 80px rgba(15, 23, 42, 0.08);
            }

            .sidebar.active {
                transform: translateX(300px);
            }

            .close-menu {
                display: block;
            }

            .main {
                padding: 100px 24px 32px;
            }

            .grid {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
                padding-bottom: 20px;
            }

            .header-box {
                width: auto;
            }
        }

        /* ================= MÓVIL ================= */

        @media (max-width: 600px) {

            .main {
                padding: 88px 16px 24px;
                gap: 24px;
            }

            .header h1 {
                font-size: 24px;
            }

            .box {
                padding: 24px;
            }

            .box-header h3 {
                font-size: 18px;
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
                        Producto-Categoria
                    </a>

                    <a href="/business/gestion">
                        <i class="fas fa-boxes"></i>
                        Gestion de Producto
                    </a>

                </div>

            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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

            <div class="header">

                <div>
                    <h1>Panel de Control</h1>
                    <p>Gestión profesional de tu negocio</p>
                </div>

                <div class="header-box">

                    <i class="fas fa-crown" style="color:#1d4ed8;"></i>

                    Plan:
                    {{ ucfirst(auth()->user()->plan) }}

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

            @if (session('error'))
                <div id="toast-overlay">
                    <div id="toast" style="border-left:4px solid #ef4444;">
                        <i class="fas fa-triangle-exclamation" style="color:#ef4444;"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            <div class="grid">

                <div class="box">

                    <div class="box-header">

                        <h3>Categorías</h3>

                        <div class="icon-box">
                            <i class="fas fa-folder" style="color:#1d4ed8;"></i>
                        </div>

                    </div>

                    <p>
                        Organiza tu catálogo profesionalmente.
                    </p>

                    <form method="POST" action="/business/category" enctype="multipart/form-data">

                        @csrf

                        <input type="text" name="category" placeholder="Nombre de la categoría" required>

                        <input type="file" name="image" accept="image/*" required>

                        <button type="submit" class="btn-gold" style="margin-top:4px;">

                            Crear Categoría

                        </button>

                    </form>

                </div>

                <div class="box">

                    <div class="box-header">

                        <h3>Productos</h3>

                        <div class="icon-box">
                            <i class="fas fa-box" style="color:#1d4ed8;"></i>
                        </div>

                    </div>

                    <p>
                        Añade nuevos productos a tu catálogo.
                    </p>

                    <form method="POST" action="/business/product">

                        @csrf

                        <input type="text" name="name" placeholder="Nombre del producto" required>

                        <input type="number" name="price" placeholder="Precio" step="0.01" required>

                        <select name="category" required>

                            <option value="" disabled selected>
                                Seleccionar categoría
                            </option>

                            @foreach (auth()->user()->categories as $cat)
                                <option value="{{ $cat->id }}">
                                    {{ $cat->name }}
                                </option>
                            @endforeach

                        </select>

                        <textarea name="description" rows="3" placeholder="Descripción del producto" required></textarea>

                        <button type="submit" class="btn-gold">
                            Agregar Producto
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <script>
        // TOAST
        let toastTime = 1300; // éxito

        @if (session('error'))
            toastTime = 3000; // error
        @endif

        setTimeout(() => {

            const overlay = document.getElementById('toast-overlay');

            if (overlay) {

                overlay.style.animation = "toastOut 0.3s forwards";

                setTimeout(() => {
                    overlay.remove();
                }, 250);
            }

        }, toastTime);

        // MENÚ
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

        // RESETEAR MENÚ
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
            }
        });
    </script>

</body>

</html>
