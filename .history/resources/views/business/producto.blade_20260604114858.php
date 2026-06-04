<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
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
            background: #f8fafc;
            color: #0f172a;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* ================= SIDEBAR ULTRA-MODERNA ================= */

        .sidebar {
            width: 280px;
            background: #ffffff;
            border-right: 1px solid #e2e8f0;
            padding: 36px 24px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
        }

        .sidebar h2 {
            text-align: center;
            color: #1d4ed8;
            font-weight: 800;
            letter-spacing: 2px;
            font-size: 22px;
            position: relative;
            padding-bottom: 12px;
        }

        .sidebar h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 35%;
            width: 30%;
            height: 3px;
            background: #2563eb;
            border-radius: 2px;
        }

        .menu {
            margin-top: 50px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 16px;
            margin-bottom: 8px;
            border-radius: 12px;
            text-decoration: none;
            color: #64748b;
            font-size: 15px;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .menu a:hover {
            background: #eff6ff;
            color: #1d4ed8;
            transform: translateX(4px);
        }

        .logout-btn {
            width: 100%;
            background: #fff5f5;
            border: 1px solid #fee2e2;
            padding: 14px;
            border-radius: 12px;
            color: #ef4444;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.2s ease;
        }

        .logout-btn:hover {
            background: #ef4444;
            border-color: #ef4444;
            color: white;
            box-shadow: 0 10px 15px -3px rgba(239, 68, 68, 0.2);
        }

        /* ================= MAIN CONTENT ================= */

        .main {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            gap: 32px;
            min-height: 100vh;
            max-width: 1400px;
            margin: 0 auto;
            width: 100%;
        }

        /* ================= HEADER CONTEMPORÁNEO ================= */

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 24px;
            background: #ffffff;
            padding: 28px 36px;
            border-radius: 24px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 20px -2px rgba(148, 163, 184, 0.06);
        }

        .header h1 {
            margin: 0;
            font-size: 30px;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.5px;
        }

        .header p {
            margin-top: 4px;
            color: #64748b;
            font-size: 15px;
            font-weight: 500;
        }

        .header-box {
            font-size: 14px;
            font-weight: 700;
            color: #1d4ed8;
            background: #eff6ff;
            padding: 12px 20px;
            border-radius: 12px;
            border: 1px solid #bfdbfe;
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.6);
        }

        /* ================= GRID ================= */

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 32px;
        }

        /* ================= PREMIUM CARDS ================= */

        .box {
            background: #ffffff;
            border-radius: 24px;
            padding: 36px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 24px -2px rgba(148, 163, 184, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .box:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 30px -10px rgba(148, 163, 184, 0.15);
        }

        .box-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 14px;
        }

        .box-header h3 {
            margin: 0;
            font-size: 22px;
            color: #0f172a;
            font-weight: 700;
            letter-spacing: -0.3px;
        }

        .icon-box {
            width: 48px;
            height: 48px;
            background: #f0fdf4;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #dcfce7;
        }

        /* Cambiar fondo dinámico para el icono basado en la caja */
        .box:nth-child(1) .icon-box {
            background: #eff6ff;
            border-color: #bfdbfe;
        }

        .box:nth-child(2) .icon-box {
            background: #f0fdf4;
            border-color: #bbf7d0;
        }

        .box p {
            color: #64748b;
            font-size: 15px;
            margin-bottom: 24px;
            line-height: 1.6;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        /* ================= CONTROLES DE FORMULARIO ================= */

        input,
        select,
        textarea {
            width: 100%;
            padding: 14px 16px;
            border-radius: 12px;
            border: 1px solid #cbd5e1;
            font-size: 15px;
            font-weight: 500;
            color: #334155;
            background: #f8fafc;
            outline: none;
            transition: all 0.2s ease;
        }

        input:hover,
        select:hover,
        textarea:hover {
            border-color: #94a3b8;
        }

        input:focus,
        select:focus,
        textarea:focus {
            background: #ffffff;
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
        }

        textarea {
            resize: none;
        }

        /* Estilización para inputs de tipo archivo */
        input[type="file"] {
            background: #ffffff;
            border: 2px dashed #cbd5e1;
            cursor: pointer;
            padding: 12px;
        }

        input[type="file"]:hover {
            border-color: #2563eb;
            background: #eff6ff;
        }

        /* ================= BOTONES AZUL REY ================= */

        .btn-gold {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.25s ease;
            padding: 15px;
            box-shadow: 0 4px 14px rgba(37, 99, 235, 0.3);
        }

        .btn-gold:hover {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.45);
            transform: translateY(-1px);
        }

        .btn-gold:active {
            transform: scale(0.98);
        }

        /* ================= TOAST SYSTEM ================= */

        #toast-overlay {
            position: fixed;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(15, 23, 42, 0.3);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            z-index: 9999;
        }

        #toast {
            background: white;
            color: #0f172a;
            padding: 20px 32px;
            border-radius: 20px;
            font-size: 16px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 14px;
            box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.25);
            border-left: 6px solid #10b981;
            animation: toastIn 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        #toast i {
            color: #10b981;
            font-size: 24px;
        }

        @keyframes toastIn {
            from {
                opacity: 0;
                transform: scale(0.95) translateY(15px);
            }

            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        @keyframes toastOut {
            to {
                opacity: 0;
                transform: scale(0.95) translateY(15px);
            }
        }

        /* ================= HAMBURGUESA / RESPONSIVE ================= */

        .menu-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            width: 50px;
            height: 50px;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            background: #ffffff;
            color: #0f172a;
            font-size: 20px;
            cursor: pointer;
            z-index: 1100;
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.08);
        }

        .close-menu {
            display: none;
            position: absolute;
            top: 24px;
            right: 24px;
            background: #f1f5f9;
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 10px;
            font-size: 18px;
            cursor: pointer;
            color: #64748b;
        }

        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.4);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* ================= TABLET CONFIG ================= */

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
                box-shadow: 20px 0 50px rgba(15, 23, 42, 0.15);
            }

            .sidebar.active {
                left: 0;
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
                padding: 24px;
            }

            .header-box {
                width: 100%;
                justify-content: center;
            }
        }

        /* ================= MÓVIL CONFIG ================= */

        @media (max-width: 600px) {
            .main {
                padding: 90px 16px 24px;
                gap: 20px;
            }

            .header h1 {
                font-size: 24px;
            }

            .box {
                padding: 24px 20px;
            }

            .box-header h3 {
                font-size: 20px;
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
                    Plan: {{ ucfirst(auth()->user()->plan) }}
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
                    <div id="toast" style="border-left:6px solid #dc2626;">
                        <i class="fas fa-triangle-exclamation" style="color:#dc2626;"></i>
                        <span style="color:#1e293b;">{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            <div class="grid">

                <div class="box">
                    <div class="box-header">
                        <h3>Categorías</h3>
                        <div class="icon-box">
                            <i class="fas fa-folder" style="color:#2563eb;"></i>
                        </div>
                    </div>

                    <p>Organiza tu catálogo profesionalmente.</p>

                    <form method="POST" action="/business/category" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="category" placeholder="Nombre de la categoría" required>
                        <input type="file" name="image" accept="image/*" required>
                        <button type="submit" class="btn-gold" style="margin-top:8px;">
                            Crear Categoría
                        </button>
                    </form>
                </div>

                <div class="box">
                    <div class="box-header">
                        <h3>Productos</h3>
                        <div class="icon-box">
                            <i class="fas fa-box" style="color:#10b981;"></i>
                        </div>
                    </div>

                    <p>Añade nuevos productos a tu catálogo.</p>

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
        // TOAST SYSTEM
        let toastTime = 1300;

        @if (session('error'))
            toastTime = 3000;
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

        // MENU INTERACTION
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

        // RESET MENÚ EN RESIZE
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
