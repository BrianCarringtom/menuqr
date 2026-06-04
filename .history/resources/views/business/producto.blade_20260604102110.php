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
            background: #0b0f19;
            /* Fondo oscuro espacial profundo */
            color: #e2e8f0;
            overflow-x: hidden;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 270px;
            background: #111827;
            /* Gris oscuro hacker */
            border-right: 1px solid rgba(99, 102, 241, 0.15);
            /* Borde sutil neón */
            padding: 28px 22px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
        }

        .sidebar h2 {
            text-align: center;
            color: #00f2fe;
            /* Cyan brillante cyberpunk */
            font-weight: 700;
            letter-spacing: 4px;
            font-size: 24px;
            text-shadow: 0 0 15px rgba(0, 242, 254, 0.4);
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
            color: #94a3b8;
            font-size: 15px;
            font-weight: 500;
            transition: all 0.25s ease;
            border: 1px solid transparent;
        }

        .menu a:hover {
            background: rgba(99, 102, 241, 0.1);
            /* Efecto Glassmorphism */
            color: #a855f7;
            /* Morado eléctrico vibrante */
            border-color: rgba(168, 85, 247, 0.4);
            transform: translateX(5px);
            box-shadow: 0 4px 20px rgba(168, 85, 247, 0.15);
        }

        .logout-btn {
            width: 100%;
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.4);
            padding: 15px;
            border-radius: 14px;
            color: #ef4444;
            document-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .logout-btn:hover {
            background: #ef4444;
            color: white;
            box-shadow: 0 0 20px rgba(239, 68, 68, 0.4);
            transform: translateY(-2px);
        }

        /* ================= MAIN ================= */

        .main {
            flex: 1;
            padding: 28px;
            display: flex;
            flex-direction: column;
            gap: 22px;
            min-height: 100vh;
            background-image: radial-gradient(circle at 80% 20%, rgba(99, 102, 241, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 20% 80%, rgba(168, 85, 247, 0.05) 0%, transparent 50%);
        }

        /* ================= HEADER ================= */

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            background: #111827;
            padding: 24px 28px;
            border-radius: 22px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
        }

        .header h1 {
            margin: 0;
            font-size: 32px;
            font-weight: 700;
            background: linear-gradient(135deg, #fff 0%, #94a3b8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .header p {
            margin-top: 6px;
            color: #64748b;
            font-size: 15px;
        }

        .header-box {
            font-size: 15px;
            color: #e2e8f0;
            background: rgba(201, 162, 39, 0.1);
            padding: 12px 20px;
            border-radius: 14px;
            border: 1px solid rgba(201, 162, 39, 0.3);
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 0 15px rgba(201, 162, 39, 0.1);
            font-weight: 600;
        }

        /* ================= GRID ================= */

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        /* ================= CARDS ================= */

        .box {
            background: #111827;
            border-radius: 22px;
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
            transition: transform 0.3s ease, border-color 0.3s ease;
        }

        .box:hover {
            border-color: rgba(99, 102, 241, 0.3);
            transform: translateY(-2px);
        }

        .box-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .box-header h3 {
            margin: 0;
            font-size: 24px;
            color: #ffffff;
            font-weight: 700;
        }

        .icon-box {
            width: 46px;
            height: 46px;
            background: rgba(0, 242, 254, 0.1);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(0, 242, 254, 0.2);
            box-shadow: 0 0 10px rgba(0, 242, 254, 0.05);
        }

        .box p {
            color: #94a3b8;
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
            padding: 16px;
            border-radius: 14px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 15px;
            background: #1f2937;
            color: #ffffff;
            outline: none;
            transition: all 0.3s ease;
        }

        input::placeholder,
        textarea::placeholder {
            color: #4b5563;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #00f2fe;
            box-shadow: 0 0 0 4px rgba(0, 242, 254, 0.15);
            background: #111827;
        }

        select option {
            background: #111827;
            color: #fff;
        }

        input[type="file"] {
            padding: 12px;
            cursor: pointer;
            background: rgba(255, 255, 255, 0.03);
        }

        /* ================= BOTONES ================= */

        .btn-gold {
            background: linear-gradient(135deg, #00f2fe 0%, #4f46e5 100%);
            /* Degradado Galáctico/Futurista */
            color: white;
            border: none;
            border-radius: 14px;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 16px;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            box-shadow: 0 4px 15px rgba(0, 242, 254, 0.2);
        }

        .btn-gold:hover {
            box-shadow: 0 10px 25px rgba(0, 242, 254, 0.4);
            transform: translateY(-2px);
            filter: brightness(1.1);
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
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
            z-index: 9999;
        }

        #toast {
            background: #111827;
            color: #ffffff;
            padding: 22px 32px;
            border-radius: 20px;
            font-size: 16px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(22, 163, 74, 0.3);
            border-left: 6px solid #16a34a;
            animation: toastIn 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        #toast i {
            color: #16a34a;
            font-size: 26px;
            filter: drop-shadow(0 0 8px rgba(22, 163, 74, 0.4));
        }

        @keyframes toastIn {
            from {
                opacity: 0;
                transform: scale(0.9) translateY(30px);
            }

            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        @keyframes toastOut {
            to {
                opacity: 0;
                transform: scale(0.9) translateY(30px);
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
            background: linear-gradient(135deg, #00f2fe 0%, #4f46e5 100%);
            color: white;
            font-size: 20px;
            cursor: pointer;
            z-index: 1100;
            box-shadow: 0 6px 20px rgba(0, 242, 254, 0.3);
        }

        /* ================= CERRAR ================= */

        .close-menu {
            display: none;
            position: absolute;
            top: 22px;
            right: 22px;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #94a3b8;
        }

        /* ================= OVERLAY ================= */

        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.7);
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
                align-items: center;
                justify-content: center;
            }

            .sidebar {
                position: fixed;
                top: 0;
                left: -290px;
                width: 270px;
                height: 100%;
                box-shadow: 15px 0 40px rgba(0, 0, 0, 0.5);
                background: #0b0f19;
            }

            .sidebar.active {
                left: 0;
            }

            .close-menu {
                display: block;
            }

            .main {
                padding: 95px 20px 24px;
            }

            .grid {
                grid-template-columns: 1fr;
                gap: 20px;
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

        /* ================= MÓVIL ================= */

        @media (max-width: 600px) {
            .main {
                padding: 90px 14px 22px;
                gap: 20px;
            }

            .header {
                padding: 22px 20px;
                border-radius: 20px;
            }

            .header h1 {
                font-size: 26px;
            }

            .box {
                padding: 24px 20px;
                border-radius: 20px;
            }

            .box-header h3 {
                font-size: 21px;
            }

            #toast {
                width: calc(100% - 30px);
                padding: 18px 22px;
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
                    <a href="/business">
                        <i class="fas fa-chart-line" style="color: #00f2fe;"></i>
                        Dashboard
                    </a>

                    <a href="/business/profile">
                        <i class="fas fa-user" style="color: #38bdf8;"></i>
                        Perfil
                    </a>

                    <a href="/business/producto">
                        <i class="fas fa-file-alt" style="color: #a855f7;"></i>
                        Producto-Categoria
                    </a>

                    <a href="/business/gestion">
                        <i class="fas fa-boxes" style="color: #ec4899;"></i>
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
                    <i class="fas fa-crown"
                        style="color:#eab308; filter: drop-shadow(0 0 5px rgba(234,179,8,0.5));"></i>
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
                    <div id="toast"
                        style="border-left:6px solid #ef4444; border-image: none; border-color: rgba(239, 68, 68, 0.3);">
                        <i class="fas fa-triangle-exclamation" style="color:#ef4444;"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            <div class="grid">

                <div class="box">
                    <div class="box-header">
                        <h3>Categorías</h3>
                        <div class="icon-box"
                            style="background: rgba(168, 85, 247, 0.1); border-color: rgba(168, 85, 247, 0.2);">
                            <i class="fas fa-folder" style="color:#a855f7;"></i>
                        </div>
                    </div>

                    <p>Organiza tu catálogo profesionalmente.</p>

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
                        <div class="icon-box"
                            style="background: rgba(236, 72, 153, 0.1); border-color: rgba(236, 72, 153, 0.2);">
                            <i class="fas fa-box" style="color:#ec4899;"></i>
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
