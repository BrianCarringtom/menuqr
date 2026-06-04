<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard</title>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            min-height: 100%;
            overflow-x: hidden;
            font-family: 'Segoe UI', sans-serif;
            background: #0f172a;
            color: white;
        }

        body {
            display: flex;
        }

        /* 🔥 CUANDO EL MENÚ ABRE */
        body.menu-open {
            overflow: hidden;
            height: 100dvh;
        }

        a {
            text-decoration: none;
        }

        img,
        table,
        iframe,
        canvas {
            max-width: 100%;
        }

        /* 🔥 BOTÓN */
        .hamburger {
            display: none;
            position: fixed;
            top: 16px;
            left: 16px;
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(10px);
            color: white;
            font-size: 20px;
            cursor: pointer;
            z-index: 1200;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.35);
            transition: all 0.35s ease;
        }

        .hamburger:hover {
            transform: scale(1.05);
        }

        .hamburger.rotate {
            transform: rotate(180deg);
        }

        /* 🔥 SIDEBAR */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 280px;
            max-width: 85%;
            height: 100dvh;
            background: linear-gradient(180deg, #1f2937, #020617);
            padding: 22px 18px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 5px 0 30px rgba(0, 0, 0, 0.45);
            transition: transform 0.35s ease;
            z-index: 1100;
            overflow: hidden;
        }

        .sidebar.collapsed {
            transform: translateX(-100%);
        }

        /* 🔥 CONTENEDOR INTERNO */
        .sidebar-top {
            display: flex;
            flex-direction: column;
            flex: 1;
            min-height: 0;
        }

        /* LOGO */
        .logo {
            text-align: center;
            margin-bottom: 26px;
        }

        .logo h2 {
            color: #ef4444;
            font-size: 28px;
            margin-bottom: 6px;
            letter-spacing: 1px;
        }

        .logo span {
            font-size: 13px;
            color: #9ca3af;
        }

        /* 🔥 MENU */
        .menu {
            display: flex;
            flex-direction: column;
            gap: 10px;
            overflow: hidden;
        }

        .menu-title {
            font-size: 11px;
            color: #6b7280;
            margin: 8px 0 4px;
            padding-left: 6px;
            letter-spacing: 1px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px 14px;
            border-radius: 14px;
            color: #e5e7eb;
            transition: all 0.25s ease;
            position: relative;
            font-size: 15px;
            font-weight: 500;
            word-break: break-word;
        }

        .menu a i {
            width: 22px;
            text-align: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .menu a:hover {
            background: #374151;
            transform: translateX(4px);
        }

        /* 🔥 ACTIVO */
        .active {
            background: linear-gradient(90deg, #2563eb, #1d4ed8);
            color: white;
            box-shadow: 0 5px 18px rgba(37, 99, 235, 0.35);
        }

        .active::before {
            content: "";
            position: absolute;
            left: -18px;
            top: 0;
            height: 100%;
            width: 4px;
            background: #60a5fa;
            border-radius: 0 6px 6px 0;
        }

        /* 🔥 LOGOUT */
        .logout-btn {
            width: 100%;
            background: transparent;
            border: 1px solid #ef4444;
            color: #ef4444;
            padding: 13px;
            border-radius: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 18px;
            font-size: 14px;
            font-weight: 500;
        }

        .logout-btn:hover {
            background: #ef4444;
            color: white;
        }

        /* 🔥 MAIN */
        .main {
            width: 100%;
            min-height: 100vh;
            padding: 32px;
            margin-left: 280px;
            transition: all 0.35s ease;
            overflow-x: hidden;
        }

        /* 🔥 PÁGINAS */
        body[data-page="dashboard"] .main {
            margin-left: 430px;
        }

        body[data-page="users"] .main {
            margin-left: 340px;
        }

        /* 🔥 INPUTS */
        input,
        select,
        textarea {
            width: 100%;
            max-width: 100%;
            padding: 14px;
            margin-bottom: 16px;
            border-radius: 10px;
            border: none;
            outline: none;
            background: #f8fafc;
            color: #111827;
            font-size: 15px;
        }

        /* 🔥 BOTONES */
        button {
            padding: 12px 22px;
            background: #3b82f6;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.25s ease;
            font-size: 14px;
            font-weight: 500;
        }

        button:hover {
            background: #2563eb;
        }

        /* 🔥 TABLAS */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            border-radius: 14px;
            margin-top: 24px;
        }

        .custom-table {
            width: 100%;
            min-width: 700px;
            border-collapse: collapse;
            background: #1f2937;
            overflow: hidden;
        }

        .custom-table thead {
            background: #020617;
        }

        .custom-table th {
            padding: 16px;
            font-size: 13px;
            text-transform: uppercase;
            color: #9ca3af;
            letter-spacing: 0.5px;
            text-align: left;
            white-space: nowrap;
        }

        .custom-table td {
            padding: 16px;
            border-top: 1px solid #374151;
            color: #e5e7eb;
            vertical-align: middle;
        }

        .custom-table tbody tr:hover {
            background: #374151;
        }

        /* 🔥 LINKS */
        .link-slug {
            color: #60a5fa;
        }

        .link-slug:hover {
            text-decoration: underline;
        }

        /* 🔥 ACCIONES */
        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .btn {
            border: none;
            padding: 8px 13px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            transition: 0.2s;
            white-space: nowrap;
        }

        .btn-edit {
            background: #3b82f6;
            color: white;
        }

        .btn-delete {
            background: #ef4444;
            color: white;
        }

        .btn-warning {
            background: #f59e0b;
            color: white;
        }

        .btn-success {
            background: #10b981;
            color: white;
        }

        .success-message {
            color: lightgreen;
        }

        /* 🔥 MODAL */
        .modal {
            display: none;
            position: fixed;
            z-index: 1500;
            inset: 0;
            width: 100%;
            height: 100%;
            padding: 20px;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(6px);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            width: 100%;
            max-width: 420px;
            background: #ffffff;
            color: #111827;
            padding: 28px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.35);
            animation: fadeIn 0.3s ease;
        }

        .modal-content input,
        .modal-content select {
            border: 1px solid #d1d5db;
        }

        /* 🔥 ANIMACIÓN */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px) scale(0.95);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* 🔥 TABLET */
        @media screen and (max-width: 1024px) {

            body[data-page="dashboard"] .main,
            body[data-page="users"] .main {
                margin-left: 300px;
            }

            .main {
                padding: 26px;
            }
        }

        /* 🔥 MOBILE */
        @media screen and (max-width: 900px) {

            .hamburger {
                display: flex;
            }

            .sidebar {
                transform: translateX(-100%);
                justify-content: space-between;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main,
            body[data-page="dashboard"] .main,
            body[data-page="users"] .main {
                margin-left: 0 !important;
                width: 100%;
                padding: 90px 18px 25px;
            }

            .logo {
                margin-bottom: 22px;
            }

            .logo h2 {
                font-size: 22px;
            }

            .logo span {
                font-size: 12px;
            }

            .menu {
                gap: 8px;
            }

            .menu a {
                font-size: 14px;
                padding: 11px 13px;
            }

            .logout-btn {
                font-size: 14px;
                padding: 12px;
            }

            .custom-table {
                min-width: 650px;
            }
        }

        /* 🔥 CELULARES PEQUEÑOS */
        @media screen and (max-width: 480px) {

            .main {
                padding: 85px 14px 22px;
            }

            .sidebar {
                width: 260px;
            }

            .menu a {
                font-size: 13px;
                padding: 10px 12px;
            }

            .logout-btn {
                font-size: 13px;
            }

            button {
                width: auto;
                max-width: 100%;
            }

            .modal-content {
                padding: 22px;
                border-radius: 18px;
            }
        }
    </style>
</head>

<body data-page="{{ $page ?? 'dashboard' }}">

    <!-- 🔥 BOTÓN -->
    <div class="hamburger"
        id="hamburger-btn"
        onclick="toggleSidebar()">

        <i class="fas fa-bars"></i>

    </div>

    <!-- 🔥 SIDEBAR -->
    <div class="sidebar">

        <div class="sidebar-top">

            <div class="logo">

                <h2>ADMIN</h2>

                <span>
                    Panel de control
                </span>

            </div>

            <div class="menu">

                <div class="menu-title">
                    GENERAL
                </div>

                <a href="/admin"
                    class="{{ request()->is('admin') ? 'active' : '' }}">

                    <i class="fas fa-chart-line"></i>
                    Dashboard

                </a>

                <a href="/admin/users"
                    class="{{ request()->is('admin/users') ? 'active' : '' }}">

                    <i class="fas fa-users"></i>
                    Usuarios

                </a>

            </div>

        </div>

        <!-- 🔥 LOGOUT -->
        <div>

            <form id="logout-form"
                action="/logout"
                method="POST"
                style="display:none;">

                @csrf

            </form>

            <button class="logout-btn"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                <i class="fas fa-sign-out-alt"></i>
                Cerrar sesión

            </button>

        </div>

    </div>

    <!-- 🔥 MAIN -->
    <div class="main">

        @yield('content')

    </div>

    <!-- 🔥 SCRIPT -->
    <script>

        const sidebar =
            document.querySelector('.sidebar');

        const hamburgerBtn =
            document.getElementById('hamburger-btn');

        const hamburgerIcon =
            hamburgerBtn.querySelector('i');

        function toggleSidebar() {

            sidebar.classList.toggle('show');

            if (sidebar.classList.contains('show')) {

                hamburgerIcon.classList.remove('fa-bars');
                hamburgerIcon.classList.add('fa-times');

                hamburgerBtn.classList.add('rotate');

                // 🔥 BLOQUEA SCROLL BODY
                document.body.classList.add('menu-open');

            } else {

                hamburgerIcon.classList.remove('fa-times');
                hamburgerIcon.classList.add('fa-bars');

                hamburgerBtn.classList.remove('rotate');

                // 🔥 RESTAURA SCROLL
                document.body.classList.remove('menu-open');

            }

        }

        // 🔥 CERRAR AL TOCAR FUERA
        document.addEventListener('click', function(e) {

            if (
                window.innerWidth < 900 &&
                sidebar.classList.contains('show') &&
                !sidebar.contains(e.target) &&
                !hamburgerBtn.contains(e.target)
            ) {

                toggleSidebar();

            }

        });

        // 🔥 RESETEAR
        window.addEventListener('resize', () => {

            if (window.innerWidth > 900) {

                sidebar.classList.remove('show');

                hamburgerIcon.classList.remove('fa-times');
                hamburgerIcon.classList.add('fa-bars');

                hamburgerBtn.classList.remove('rotate');

                document.body.classList.remove('menu-open');

            }

        });

    </script>

</body>

</html>