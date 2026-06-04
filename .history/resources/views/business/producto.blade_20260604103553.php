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
            background: #f8fafc;
            color: #0f172a;
            overflow-x: hidden;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 270px;
            background: white;
            border-right: 1px solid #e2e8f0;
            padding: 32px 24px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
        }

        .sidebar h2 {
            text-align: center;
            color: #1e40af;
            /* Azul Rey */
            font-weight: 800;
            letter-spacing: 2px;
            font-size: 22px;
            margin-bottom: 10px;
        }

        .menu {
            margin-top: 40px;
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
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .menu a:hover {
            background: #eff6ff;
            /* Fondo Azul muy suave */
            color: #2563eb;
            /* Azul Rey Brillante */
            transform: translateX(4px);
        }

        /* Clase utilitaria por si deseas marcar el enlace activo dinámicamente */
        .menu a.active {
            background: #2563eb;
            color: white;
        }

        .logout-btn {
            width: 100%;
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
            padding: 14px;
            border-radius: 12px;
            color: #64748b;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .logout-btn:hover {
            background: #fee2e2;
            color: #ef4444;
            border-color: #fca5a5;
        }

        /* ================= MAIN ================= */

        .main {
            flex: 1;
            padding: 32px;
            display: flex;
            flex-direction: column;
            gap: 24px;
            min-height: 100vh;
        }

        /* ================= HEADER ================= */

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            background: white;
            padding: 24px 28px;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.02);
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            color: #0f172a;
        }

        .header p {
            margin-top: 4px;
            color: #64748b;
            font-size: 15px;
        }

        .header-box {
            font-size: 14px;
            font-weight: 600;
            color: #1e40af;
            background: #eff6ff;
            padding: 12px 20px;
            border-radius: 12px;
            border: 1px solid #bfdbfe;
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* ================= GRID ================= */

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        /* ================= CARDS ================= */

        .box {
            background: white;
            border-radius: 20px;
            padding: 32px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.02);
        }

        .box-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .box-header h3 {
            margin: 0;
            font-size: 22px;
            color: #0f172a;
            font-weight: 700;
        }

        .icon-box {
            width: 46px;
            height: 46px;
            background: #eff6ff;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #dbeafe;
        }

        .icon-box i {
            color: #2563eb !important;
            /* Fuerza el color azul rey en los iconos del box */
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

        input,
        select,
        textarea {
            width: 100%;
            padding: 14px 16px;
            border-radius: 12px;
            border: 1px solid #cbd5e1;
            font-size: 15px;
            background: #fff;
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
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.15);
        }

        input[type="file"] {
            background: #f8fafc;
            cursor: pointer;
            padding: 12px;
        }

        textarea {
            resize: none;
        }

        /* ================= BOTONES ================= */

        .btn-gold {
            /* Mantenemos el nombre de la clase para no romper tu estructura HTML */
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.2s ease;
            padding: 15px;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
        }

        .btn-gold:hover {
            background: #1d4ed8;
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.3);
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
            background: rgba(15, 23, 42, 0.3);
            backdrop-filter: blur(6px);
            z-index: 9999;
        }

        #toast {
            background: white;
            color: #0f172a;
            padding: 20px 32px;
            border-radius: 16px;
            font-size: 16px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 14px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
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

        /* ================= HAMBURGUESA ================= */

        .menu-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            width: 48px;
            height: 48px;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            background: white;
            color: #0f172a;
            font-size: 18px;
            cursor: pointer;
            z-index: 1100;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            align-items: center;
            justify-content: center;
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
            transition: color 0.2s;
        }

        .close-menu:hover {
            color: #0f172a;
        }

        /* ================= OVERLAY ================= */

        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.4);
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
                left: -290px;
                width: 270px;
                height: 100%;
                box-shadow: 20px 0 25px -5px rgba(0, 0, 0, 0.05);
            }

            .sidebar.active {
                left: 0;
            }

            .close-menu {
                display: block;
            }

            .main {
                padding: 96px 24px 24px;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                padding: 22px 24px;
            }

            .header-box {
                width: 100%;
                justify-content: center;
            }
        }

        /* ================= MÓVIL ================= */

        @media (max-width: 600px) {
            .main {
                padding: 88px 16px 20px;
                gap: 20px;
            }

            .header {
                padding: 20px;
                border-radius: 16px;
            }

            .header h1 {
                font-size: 24px;
            }

            .header p {
                font-size: 14px;
            }

            .box {
                padding: 24px;
                border-radius: 16px;
            }

            .box-header h3 {
                font-size: 19px;
            }

            input,
            select,
            textarea {
                font-size: 14px;
                padding: 12px 14px;
            }

            .btn-gold {
                padding: 14px;
                font-size: 14px;
            }

            #toast {
                width: calc(100% - 32px);
                padding: 16px 24px;
                font-size: 14px;
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
                    <a href="/business" class="active" style="color: white; background: #2563eb;">
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
                    <div id="toast" style="border-left:6px solid #ef4444;">
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
                            <i class="fas fa-folder"></i>
                        </div>
                    </div>

                    <p>Organiza tu catálogo profesionalmente.</p>

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
                            <i class="fas fa-box"></i>
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
                if (!sidebar.classList.contains('active')) {
                    menuBtn.style.display = 'flex';
                }
            }
        });
    </script>

</body>

</html>
