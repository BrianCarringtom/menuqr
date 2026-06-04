<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Dashboard - Premium Gold</title>

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
            /* Fondo oscuro principal */
            background: #0b0f17;
            color: #f8fafc;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* ================= SIDEBAR ULTRA-MODERNA (OSCURA Y DORADA) ================= */

        .sidebar {
            width: 280px;
            background: #111827;
            border-right: 1px solid #1f2937;
            padding: 36px 24px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
        }

        .sidebar h2 {
            text-align: center;
            /* Oro premium */
            color: #d4af37;
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
            background: linear-gradient(90deg, #d4af37, #aa7c11);
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
            color: #9ca3af;
            font-size: 15px;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .menu a:hover {
            background: rgba(212, 175, 55, 0.1);
            color: #d4af37;
            transform: translateX(4px);
        }

        /* Botón de cerrar sesión con un rojo oscuro/elegante integrado al estilo */
        .logout-btn {
            width: 100%;
            background: rgba(239, 68, 68, 0.05);
            border: 1px solid rgba(239, 68, 68, 0.2);
            padding: 14px;
            border-radius: 12px;
            color: #f87171;
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
            box-shadow: 0 10px 15px -3px rgba(239, 68, 68, 0.3);
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
            background: #111827;
            padding: 28px 36px;
            border-radius: 24px;
            border: 1px solid #1f2937;
            box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.3);
        }

        .header h1 {
            margin: 0;
            font-size: 30px;
            font-weight: 800;
            color: #ffffff;
            letter-spacing: -0.5px;
        }

        .header p {
            margin-top: 4px;
            color: #9ca3af;
            font-size: 15px;
            font-weight: 500;
        }

        .header-box {
            font-size: 14px;
            font-weight: 700;
            color: #d4af37;
            background: rgba(212, 175, 55, 0.1);
            padding: 12px 20px;
            border-radius: 12px;
            border: 1px solid rgba(212, 175, 55, 0.3);
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* ================= GRID ================= */

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 32px;
        }

        /* ================= PREMIUM CARDS ================= */

        .box {
            background: #111827;
            border-radius: 24px;
            padding: 36px;
            border: 1px solid #1f2937;
            box-shadow: 0 4px 24px -2px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        }

        .box:hover {
            transform: translateY(-4px);
            border-color: rgba(212, 175, 55, 0.4);
            box-shadow: 0 20px 30px -10px rgba(0, 0, 0, 0.5);
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
            color: #ffffff;
            font-weight: 700;
            letter-spacing: -0.3px;
        }

        .icon-box {
            width: 48px;
            height: 48px;
            background: rgba(212, 175, 55, 0.1);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        /* Asignación de color dorado sutil uniforme para los contenedores de iconos */
        .box:nth-child(1) .icon-box,
        .box:nth-child(2) .icon-box {
            background: rgba(212, 175, 55, 0.08);
            border-color: rgba(212, 175, 55, 0.25);
        }

        .box p {
            color: #9ca3af;
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
            border: 1px solid #374151;
            font-size: 15px;
            font-weight: 500;
            color: #f3f4f6;
            background: #1f2937;
            outline: none;
            transition: all 0.2s ease;
        }

        input:hover,
        select:hover,
        textarea:hover {
            border-color: #4b5563;
        }

        input:focus,
        select:focus,
        textarea:focus {
            background: #1f2937;
            border-color: #d4af37;
            box-shadow: 0 0 0 4px rgba(212, 175, 55, 0.15);
        }

        textarea {
            resize: none;
        }

        /* Estilización para inputs de tipo archivo */
        input[type="file"] {
            background: #111827;
            border: 2px dashed #374151;
            cursor: pointer;
            padding: 12px;
        }

        input[type="file"]:hover {
            border-color: #d4af37;
            background: rgba(212, 175, 55, 0.05);
        }

        /* Option del select para navegadores basados en chromium */
        select option {
            background: #1f2937;
            color: #f3f4f6;
        }

        /* ================= BOTONES DORADO PREMIUM ================= */

        .btn-gold {
            background: linear-gradient(135deg, #d4af37 0%, #aa7c11 100%);
            color: #0b0f17;
            /* Texto oscuro para perfecto contraste */
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.25s ease;
            padding: 15px;
            box-shadow: 0 4px 14px rgba(212, 175, 55, 0.2);
        }

        .btn-gold:hover {
            background: linear-gradient(135deg, #e5c158 0%, #c59b27 100%);
            box-shadow: 0 6px 20px rgba(212, 175, 55, 0.35);
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
            background: rgba(11, 15, 23, 0.7);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            z-index: 9999;
        }

        #toast {
            background: #1f2937;
            color: #ffffff;
            padding: 20px 32px;
            border-radius: 20px;
            font-size: 16px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 14px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
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
            border: 1px solid #1f2937;
            border-radius: 14px;
            background: #111827;
            color: #ffffff;
            font-size: 20px;
            cursor: pointer;
            z-index: 1100;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .close-menu {
            display: none;
            position: absolute;
            top: 24px;
            right: 24px;
            background: #1f2937;
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 10px;
            font-size: 18px;
            cursor: pointer;
            color: #9ca3af;
        }

        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(11, 15, 23, 0.6);
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
                background: #111827;
                box-shadow: 20px 0 50px rgba(0, 0, 0, 0.6);
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
                        <i class="fas fa-chart-line" style="color: #d4af37;"></i>
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
                        <span style="color:#ffffff;">{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            <div class="grid">

                <div class="box">
                    <div class="box-header">
                        <h3>Categorías</h3>
                        <div class="icon-box">
                            <i class="fas fa-folder" style="color:#d4af37;"></i>
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
                            <i class="fas fa-box" style="color:#d4af37;"></i>
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
