<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Dashboard</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Fira+Code:wght@400;600&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #090d16;
            /* Fondo oscuro profundo */
            background-image:
                radial-gradient(at 0% 0%, rgba(16, 185, 129, 0.05) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(6, 182, 212, 0.08) 0px, transparent 50%),
                radial-gradient(at 50% 100%, rgba(139, 92, 246, 0.05) 0px, transparent 50%);
            color: #e2e8f0;
            overflow-x: hidden;
            min-height: 100vh;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 260px;
            background: rgba(13, 20, 35, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-right: 1px solid rgba(6, 182, 212, 0.15);
            padding: 28px 22px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
        }

        .sidebar h2 {
            text-align: center;
            color: #06b6d4;
            /* Cian Neón */
            font-family: 'Fira Code', monospace;
            font-weight: 700;
            letter-spacing: 4px;
            font-size: 22px;
            text-shadow: 0 0 15px rgba(6, 182, 212, 0.4);
            position: relative;
        }

        .sidebar h2::after {
            content: '_';
            animation: pulse 1s infinite;
        }

        @keyframes pulse {
            50% {
                opacity: 0;
            }
        }

        .menu {
            margin-top: 45px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 15px 16px;
            margin-bottom: 12px;
            border-radius: 12px;
            text-decoration: none;
            color: #94a3b8;
            font-size: 15px;
            font-weight: 500;
            border: 1px solid transparent;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .menu a:hover {
            background: rgba(6, 182, 212, 0.08);
            color: #06b6d4;
            border-color: rgba(6, 182, 212, 0.3);
            transform: translateX(5px);
            box-shadow: -4px 0 15px rgba(6, 182, 212, 0.1);
        }

        .logout-btn {
            width: 100%;
            background: transparent;
            border: 1px solid rgba(239, 68, 68, 0.4);
            padding: 15px;
            border-radius: 12px;
            color: #fca5a5;
            vertical-align: middle;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.25s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.15);
            color: #ef4444;
            border-color: #ef4444;
            box-shadow: 0 0 15px rgba(239, 68, 68, 0.2);
        }

        /* ================= MAIN ================= */

        .main {
            flex: 1;
            padding: 28px;
            display: flex;
            flex-direction: column;
            gap: 22px;
            min-height: 100vh;
        }

        /* ================= HEADER ================= */

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            background: rgba(13, 20, 35, 0.6);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            padding: 22px 24px;
            border-radius: 18px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        }

        .header h1 {
            margin: 0;
            font-size: 30px;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: -0.5px;
        }

        .header p {
            margin-top: 6px;
            color: #94a3b8;
            font-size: 15px;
        }

        .header-box {
            font-family: 'Fira Code', monospace;
            font-size: 14px;
            color: #10b981;
            /* Verde Hacker */
            background: rgba(16, 185, 129, 0.06);
            padding: 12px 18px;
            border-radius: 12px;
            border: 1px solid rgba(16, 185, 129, 0.25);
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: inset 0 0 10px rgba(16, 185, 129, 0.03);
        }

        /* ================= GRID ================= */

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
        }

        /* ================= CARDS ================= */

        .box {
            background: rgba(13, 20, 35, 0.6);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 18px;
            padding: 28px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, border-color 0.3s ease;
        }

        .box:hover {
            border-color: rgba(6, 182, 212, 0.25);
            transform: translateY(-2px);
        }

        .box-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .box-header h3 {
            margin: 0;
            font-size: 22px;
            color: #ffffff;
            font-weight: 700;
        }

        .icon-box {
            width: 44px;
            height: 44px;
            background: rgba(6, 182, 212, 0.08);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(6, 182, 212, 0.2);
        }

        .box p {
            color: #94a3b8;
            font-size: 15px;
            margin-bottom: 22px;
            line-height: 1.6;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 15px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 15px;
            background: rgba(8, 12, 21, 0.7);
            color: #ffffff;
            outline: none;
            transition: all 0.25s ease;
        }

        input::placeholder,
        textarea::placeholder {
            color: #475569;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #06b6d4;
            box-shadow: 0 0 0 3px rgba(6, 182, 212, 0.15);
            background: rgba(8, 12, 21, 0.9);
        }

        /* Estilo para los select options en modo oscuro */
        select option {
            background: #0d1423;
            color: #ffffff;
        }

        /* Estilo para el input file */
        input[type="file"] {
            padding: 12px;
            cursor: pointer;
            font-size: 14px;
            color: #94a3b8;
        }

        input[type="file"]::-webkit-file-upload-button {
            background: rgba(6, 182, 212, 0.15);
            border: 1px solid rgba(6, 182, 212, 0.3);
            border-radius: 8px;
            color: #06b6d4;
            padding: 6px 12px;
            margin-right: 10px;
            transition: 0.2s;
        }

        input[type="file"]::-webkit-file-upload-button:hover {
            background: rgba(6, 182, 212, 0.3);
        }

        textarea {
            resize: none;
        }

        /* ================= BOTONES ================= */

        .btn-gold {
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            color: #ffffff;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.25s ease;
            padding: 15px;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            box-shadow: 0 4px 15px rgba(6, 182, 212, 0.2);
        }

        .btn-gold:hover {
            background: linear-gradient(135deg, #22d3ee 0%, #06b6d4 100%);
            box-shadow: 0 6px 20px rgba(6, 182, 212, 0.35);
        }

        .btn-gold:active {
            transform: scale(0.98);
        }

        /* ================= TOAST ================= */

        #toast-overlay {
            position: fixed;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(5, 8, 15, 0.6);
            backdrop-filter: blur(5px);
            z-index: 9999;
        }

        #toast {
            background: #0d1423;
            color: #ffffff;
            padding: 22px 30px;
            border-radius: 16px;
            font-size: 16px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 14px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(22, 163, 74, 0.3);
            border-left: 6px solid #16a34a;
            animation: toastIn 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        #toast i {
            color: #10b981;
            font-size: 24px;
            text-shadow: 0 0 10px rgba(16, 185, 129, 0.3);
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

        /* ================= HAMBURGUESA ================= */

        .menu-toggle {
            display: none;
            position: fixed;
            top: 18px;
            left: 18px;
            width: 52px;
            height: 52px;
            border: 1px solid rgba(6, 182, 212, 0.3);
            border-radius: 12px;
            background: rgba(13, 20, 35, 0.8);
            backdrop-filter: blur(10px);
            color: #06b6d4;
            font-size: 20px;
            cursor: pointer;
            z-index: 1100;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            align-items: center;
            justify-content: center;
        }

        /* ================= CERRAR ================= */

        .close-menu {
            display: none;
            position: absolute;
            top: 18px;
            right: 18px;
            background: none;
            border: none;
            font-size: 22px;
            cursor: pointer;
            color: #94a3b8;
            transition: color 0.2s;
        }

        .close-menu:hover {
            color: #ef4444;
        }

        /* ================= OVERLAY ================= */

        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(5, 8, 15, 0.7);
            backdrop-filter: blur(4px);
            opacity: 0;
            visibility: hidden;
            transition: 0.3s ease;
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
            }

            .sidebar {
                position: fixed;
                top: 0;
                left: -280px;
                width: 260px;
                height: 100%;
                box-shadow: 15px 0 40px rgba(0, 0, 0, 0.5);
                background: #0d1423;
            }

            .sidebar.active {
                left: 0;
            }

            .close-menu {
                display: block;
            }

            .main {
                padding: 90px 20px 24px;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .header-box {
                width: 100%;
                justify-content: center;
            }
        }

        /* ================= MÓVIL ================= */

        @media (max-width: 600px) {

            .main {
                padding: 85px 14px 22px;
                gap: 18px;
            }

            .header {
                padding: 22px 18px;
                border-radius: 16px;
            }

            .header h1 {
                font-size: 24px;
                line-height: 1.3;
            }

            .header p {
                font-size: 14px;
            }

            .header-box {
                font-size: 13px;
                padding: 12px;
            }

            .box {
                padding: 22px;
                border-radius: 16px;
            }

            .box-header h3 {
                font-size: 19px;
            }

            .box p {
                font-size: 14px;
            }

            input,
            select,
            textarea {
                font-size: 14px;
                padding: 14px;
            }

            .btn-gold {
                width: 100%;
                padding: 14px;
                font-size: 14px;
            }

            .menu a {
                font-size: 14px;
                padding: 14px;
            }

            .logout-btn {
                font-size: 14px;
                padding: 14px;
            }

            #toast {
                width: calc(100% - 30px);
                padding: 18px;
                font-size: 14px;
            }

            .menu-toggle {
                width: 48px;
                height: 48px;
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

                    <a href="/business">
                        <i class="fas fa-chart-line" style="color: #06b6d4;"></i>
                        Dashboard
                    </a>

                    <a href="/business/profile">
                        <i class="fas fa-user" style="color: #a78bfa;"></i>
                        Perfil
                    </a>

                    <a href="/business/producto">
                        <i class="fas fa-file-alt" style="color: #10b981;"></i>
                        Producto-Categoria
                    </a>

                    <a href="/business/gestion">
                        <i class="fas fa-boxes" style="color: #f59e0b;"></i>
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

                    <i class="fas fa-crown"></i>

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
                    <div id="toast" style="border-left:6px solid #dc2626; border-color: rgba(220, 38, 38, 0.3);">
                        <i class="fas fa-triangle-exclamation"
                            style="color:#dc2626; text-shadow: 0 0 10px rgba(220, 38, 38, 0.3);"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            <div class="grid">

                <div class="box">

                    <div class="box-header">

                        <h3>Categorías</h3>

                        <div class="icon-box">
                            <i class="fas fa-folder" style="color:#10b981;"></i>
                        </div>

                    </div>

                    <p>
                        Organiza tu catálogo profesionalmente.
                    </p>

                    <form method="POST" action="/business/category" enctype="multipart/form-data">

                        @csrf

                        <input type="text" name="category" placeholder="Nombre de la categoría" required>

                        <input type="file" name="image" accept="image/*" required>

                        <button type="submit" class="btn-gold" style="margin-top:10px;">

                            Crear Categoría

                        </button>

                    </form>

                </div>

                <div class="box">

                    <div class="box-header">

                        <h3>Productos</h3>

                        <div class="icon-box">
                            <i class="fas fa-box" style="color:#06b6d4;"></i>
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

                overlay.style.animation = "toastOut 0.4s forwards";

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
