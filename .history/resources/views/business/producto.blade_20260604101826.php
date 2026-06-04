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
            background: #f4f6f9;
            color: #1f2937;
            overflow-x: hidden;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* ================= SIDEBAR ================= */
        .sidebar {
            width: 260px;
            background: white;
            border-right: 1px solid #ececec;
            padding: 28px 22px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
        }

        .sidebar h2 {
            text-align: center;
            color: #c9a227;
            font-weight: 700;
            letter-spacing: 3px;
            font-size: 24px;
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
            border-radius: 14px;
            text-decoration: none;
            color: #4b5563;
            font-size: 15px;
            font-weight: 500;
            transition: all 0.25s ease;
        }

        .menu a:hover,
        .menu a.active {
            background: #fff7df;
            color: #c9a227;
            transform: translateX(3px);
        }

        .logout-btn {
            width: 100%;
            background: #c9a227;
            border: none;
            padding: 15px;
            border-radius: 14px;
            color: white;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .logout-btn:hover {
            background: #aa861d;
        }

        .logout-btn:active {
            transform: scale(0.98);
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
            background: white;
            padding: 22px 24px;
            border-radius: 22px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.04);
        }

        .header h1 {
            margin: 0;
            font-size: 32px;
            font-weight: 700;
            color: #111827;
        }

        .header p {
            margin-top: 6px;
            color: #6b7280;
            font-size: 15px;
        }

        .header-box {
            font-size: 15px;
            font-weight: 600;
            color: #374151;
            background: #f9fafb;
            padding: 12px 18px;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* ================= GRID ================= */
        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
        }

        /* ================= CARDS ================= */
        .box {
            background: white;
            border-radius: 22px;
            padding: 28px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.04);
            display: flex;
            flex-direction: column;
        }

        .box-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 14px;
        }

        .box-header h3 {
            margin: 0;
            font-size: 24px;
            color: #111827;
            font-weight: 700;
        }

        .icon-box {
            width: 44px;
            height: 44px;
            background: #f9fafb;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #eee;
        }

        .box p {
            color: #6b7280;
            font-size: 15px;
            margin-bottom: 22px;
            line-height: 1.6;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 14px;
            margin-top: auto;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-group label {
            font-size: 14px;
            font-weight: 500;
            color: #4b5563;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 15px;
            border-radius: 14px;
            border: 1px solid #d1d5db;
            font-size: 15px;
            background: #fafafa;
            outline: none;
            transition: 0.3s ease;
            font-family: inherit;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #c9a227;
            box-shadow: 0 0 0 4px rgba(201, 162, 39, 0.12);
            background: white;
        }

        /* Input file estilizado */
        input[type="file"] {
            padding: 11px;
            background: #fafafa;
            cursor: pointer;
        }

        input[type="file"]::file-selector-button {
            background: #e5e7eb;
            border: none;
            padding: 4px 12px;
            border-radius: 8px;
            color: #374151;
            font-weight: 500;
            margin-right: 10px;
            transition: 0.2s;
        }

        input[type="file"]::file-selector-button:hover {
            background: #d1d5db;
        }

        textarea {
            resize: none;
        }

        /* ================= BOTONES ================= */
        .btn-gold {
            background: #c9a227;
            color: white;
            border: none;
            border-radius: 14px;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.25s ease;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-gold:hover {
            background: #b8911f;
            box-shadow: 0 10px 20px rgba(201, 162, 39, 0.28);
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
            background: rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(4px);
            z-index: 9999;
        }

        #toast {
            background: white;
            color: #111827;
            padding: 20px 28px;
            border-radius: 18px;
            font-size: 16px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 14px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.18);
            border-left: 6px solid #16a34a;
            animation: toastIn 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        #toast i {
            color: #16a34a;
            font-size: 24px;
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
            border: none;
            border-radius: 14px;
            background: #c9a227;
            color: white;
            font-size: 20px;
            cursor: pointer;
            z-index: 1010;
            box-shadow: 0 6px 20px rgba(201, 162, 39, 0.3);
            align-items: center;
            justify-content: center;
        }

        /* ================= CERRAR ================= */
        .close-menu {
            display: none;
            position: absolute;
            top: 24px;
            right: 22px;
            background: none;
            border: none;
            font-size: 22px;
            cursor: pointer;
            color: #6b7280;
            transition: color 0.2s;
        }

        .close-menu:hover {
            color: #111827;
        }

        /* ================= OVERLAY RESPONSIVE ================= */
        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
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

        /* ================= TABLET & MÓVIL ================= */
        @media (max-width: 992px) {
            .menu-toggle {
                display: flex;
            }

            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                transform: translateX(-280px);
                width: 260px;
                height: 100%;
                box-shadow: 10px 0 40px rgba(0, 0, 0, 0.08);
            }

            .sidebar.active {
                transform: translateX(0);
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
                gap: 16px;
            }

            .header-box {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 600px) {
            .main {
                padding: 85px 14px 22px;
                gap: 18px;
            }

            .header {
                padding: 22px 18px;
                border-radius: 20px;
            }

            .header h1 {
                font-size: 26px;
                line-height: 1.3;
            }

            .box {
                padding: 22px;
                border-radius: 20px;
            }

            .box-header h3 {
                font-size: 21px;
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
                        Gestión de Producto
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
                    <i class="fas fa-crown" style="color:#c9a227;"></i>
                    <span>Plan: {{ ucfirst(auth()->user()->plan) }}</span>
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
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            <div class="grid">

                <div class="box">
                    <div class="box-header">
                        <h3>Categorías</h3>
                        <div class="icon-box">
                            <i class="fas fa-folder" style="color:#c9a227;"></i>
                        </div>
                    </div>
                    <p>Organiza tu catálogo profesionalmente añadiendo nuevas secciones.</p>

                    <form method="POST" action="/business/category" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nombre de la Categoría</label>
                            <input type="text" name="category" placeholder="Ej. Entretenimiento, Servicios..."
                                required>
                        </div>

                        <div class="form-group">
                            <label>Imagen de Portada</label>
                            <input type="file" name="image" accept="image/*" required>
                        </div>

                        <button type="submit" class="btn-gold" style="margin-top:10px;">
                            <i class="fas fa-plus"></i> Crear Categoría
                        </button>
                    </form>
                </div>

                <div class="box">
                    <div class="box-header">
                        <h3>Productos</h3>
                        <div class="icon-box">
                            <i class="fas fa-box" style="color:#c9a227;"></i>
                        </div>
                    </div>
                    <p>Añade nuevos productos o servicios digitales a tu catálogo disponible.</p>

                    <form method="POST" action="/business/product" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nombre del Producto</label>
                            <input type="text" name="name" placeholder="Ej. Cuenta Netflix 1 Mes" required>
                        </div>

                        <div class="form-group">
                            <label>Precio ($)</label>
                            <input type="number" name="price" placeholder="0.00" step="0.01" min="0"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Categoría Asignada</label>
                            <select name="category" required>
                                <option value="" disabled selected>Selecciona una categoría</option>
                                @foreach (auth()->user()->categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea name="description" rows="3" placeholder="Detalles de la cuenta o servicio..." required></textarea>
                        </div>

                        <button type="submit" class="btn-gold">
                            <i class="fas fa-cart-plus"></i> Agregar Producto
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        // --- MANEJO DEL TOAST ---
        let toastTime = 1800; // Éxito dura un poco más para que se lea bien
        @if (session('error'))
            toastTime = 3500; // Error dura más tiempo
        @endif

        setTimeout(() => {
            const overlay = document.getElementById('toast-overlay');
            if (overlay) {
                overlay.style.animation = "toastOut 0.4s forwards";
                setTimeout(() => {
                    overlay.remove();
                }, 300);
            }
        }, toastTime);


        // --- MENÚ DESPLEGABLE (MOBILE UI) ---
        function toggleMenu() {
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.querySelector('.overlay');

            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');

            // Bloquear scroll de la pantalla si el menú está abierto en móvil
            if (sidebar.classList.contains('active')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = 'auto';
            }
        }


        // --- RESETEAR ESTADOS AL REDIMENSIONAR PANTALLA ---
        window.addEventListener('resize', () => {
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.querySelector('.overlay');

            if (window.innerWidth > 992) {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        });
    </script>

</body>

</html>
