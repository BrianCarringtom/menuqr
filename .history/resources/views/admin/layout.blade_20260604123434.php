<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap');

        :root {
            --bg: #f4f7ff;
            --card: rgba(255, 255, 255, .75);
            --border: rgba(255, 255, 255, .65);

            ``` --primary: #7c3aed;
            --secondary: #06b6d4;
            --pink: #ec4899;

            --text: #111827;
            --text-soft: #64748b;

            --shadow:
                0 10px 30px rgba(124, 58, 237, .10),
                0 20px 60px rgba(6, 182, 212, .08);

            --radius: 24px;
            ```
        }

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
            font-family: 'Outfit', sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at top left, #c4b5fd 0%, transparent 30%),
                radial-gradient(circle at top right, #67e8f9 0%, transparent 30%),
                radial-gradient(circle at bottom, #f9a8d4 0%, transparent 25%),
                #f4f7ff;
        }

        body {
            display: flex;
        }

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

        /* FONDO ANIME */
        body::before {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            background:
                linear-gradient(135deg,
                    rgba(255, 255, 255, .25),
                    rgba(255, 255, 255, .05));
            z-index: -1;
        }

        /* BOTON MENU */
        .hamburger {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            width: 54px;
            height: 54px;
            border-radius: 18px;

            ``` background: rgba(255, 255, 255, .75);
            backdrop-filter: blur(20px);

            color: #7c3aed;

            border: 1px solid rgba(255, 255, 255, .6);

            box-shadow: var(--shadow);

            font-size: 20px;
            cursor: pointer;
            z-index: 1200;

            align-items: center;
            justify-content: center;

            transition: .35s;
            ```
        }

        .hamburger:hover {
            transform: translateY(-2px);
        }

        .hamburger.rotate {
            transform: rotate(180deg);
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            top: 18px;
            left: 18px;

            ``` width: 290px;
            max-width: 85%;

            height: calc(100dvh - 36px);

            background: rgba(255, 255, 255, .65);
            backdrop-filter: blur(25px);

            border: 1px solid rgba(255, 255, 255, .7);

            border-radius: 32px;

            padding: 24px;

            display: flex;
            flex-direction: column;
            justify-content: space-between;

            box-shadow: var(--shadow);

            transition: .35s;

            z-index: 1100;
            ```
        }

        .sidebar-top {
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        /* LOGO */
        .logo {
            text-align: center;
            margin-bottom: 35px;
        }

        .logo h2 {
            font-size: 32px;
            font-weight: 800;

            ``` background: linear-gradient(135deg,
                    var(--primary),
                    var(--secondary));

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            ```
        }

        .logo span {
            color: var(--text-soft);
            font-size: 13px;
        }

        /* MENU */
        .menu {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .menu-title {
            color: #94a3b8;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
            margin: 10px 0;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 14px;

            ``` padding: 14px 16px;

            border-radius: 18px;

            color: #334155;

            font-weight: 600;

            transition: .3s;
            ```
        }

        .menu a i {
            width: 22px;
            text-align: center;
        }

        .menu a:hover {
            background: rgba(124, 58, 237, .08);
            color: var(--primary);
            transform: translateX(5px);
        }

        .active {
            background: linear-gradient(135deg,
                    #7c3aed,
                    #06b6d4);

            ``` color: white !important;

            box-shadow:
                0 10px 25px rgba(124, 58, 237, .35);
            ```
        }

        .active::before {
            display: none;
        }

        /* LOGOUT */
        .logout-btn {
            width: 100%;

            ``` border: none;

            padding: 15px;

            border-radius: 18px;

            background: linear-gradient(135deg,
                    #ef4444,
                    #f97316);

            color: white;

            font-weight: 700;

            cursor: pointer;

            transition: .3s;
            ```
        }

        .logout-btn:hover {
            transform: translateY(-2px);
        }

        /* MAIN */
        .main {
            width: 100%;
            min-height: 100vh;

            ``` padding: 40px;

            margin-left: 330px;
            ```
        }

        body[data-page="dashboard"] .main {
            margin-left: 470px;
        }

        body[data-page="users"] .main {
            margin-left: 360px;
        }

        /* INPUTS */
        input,
        select,
        textarea {
            width: 100%;

            ``` padding: 15px 18px;

            border-radius: 18px;

            border: 1px solid rgba(124, 58, 237, .15);

            background: rgba(255, 255, 255, .85);

            color: #111827;

            font-size: 15px;

            transition: .3s;
            ```
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #7c3aed;

            ``` box-shadow:
                0 0 0 4px rgba(124, 58, 237, .12);
            ```
        }

        /* BOTONES */
        button {
            border: none;

            ``` padding: 13px 24px;

            border-radius: 16px;

            font-weight: 700;

            cursor: pointer;

            color: white;

            background: linear-gradient(135deg,
                    #7c3aed,
                    #06b6d4);

            transition: .3s;
            ```
        }

        button:hover {
            transform: translateY(-2px);
        }

        /* TABLAS */
        .table-wrapper {
            overflow-x: auto;

            ``` border-radius: 28px;

            background: rgba(255, 255, 255, .7);

            backdrop-filter: blur(20px);

            border: 1px solid rgba(255, 255, 255, .8);

            box-shadow: var(--shadow);
            ```
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            background: transparent;
        }

        .custom-table thead {
            background: rgba(124, 58, 237, .08);
        }

        .custom-table th {
            padding: 20px;

            ``` color: #64748b;

            font-size: 12px;

            letter-spacing: 1px;

            text-transform: uppercase;
            ```
        }

        .custom-table td {
            padding: 18px;

            ``` border-top: 1px solid rgba(148, 163, 184, .15);

            color: #1e293b;
            ```
        }

        .custom-table tbody tr {
            transition: .25s;
        }

        .custom-table tbody tr:hover {
            background: rgba(124, 58, 237, .05);
        }

        /* ACCIONES */
        .btn {
            border-radius: 14px;
            font-weight: 700;
        }

        .btn-edit {
            background: linear-gradient(135deg, #3b82f6, #06b6d4);
        }

        .btn-delete {
            background: linear-gradient(135deg, #ef4444, #f97316);
        }

        .btn-warning {
            background: linear-gradient(135deg, #f59e0b, #f97316);
        }

        .btn-success {
            background: linear-gradient(135deg, #10b981, #06b6d4);
        }

        .link-slug {
            color: #7c3aed;
            font-weight: 600;
        }

        /* MODAL */
        .modal {
            background: rgba(15, 23, 42, .45);
            backdrop-filter: blur(10px);
        }

        .modal-content {
            background: rgba(255, 255, 255, .88);

            ``` backdrop-filter: blur(25px);

            border-radius: 30px;

            border: 1px solid rgba(255, 255, 255, .8);

            color: #111827;

            box-shadow:
                0 25px 60px rgba(0, 0, 0, .18);
            ```
        }

        .success-message {
            color: #10b981;
            font-weight: 700;
        }

        /* MOBILE */
        @media(max-width:900px) {

            ``` .hamburger {
                display: flex;
            }

            .sidebar {
                left: 0;
                top: 0;
                height: 100dvh;
                border-radius: 0 30px 30px 0;
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main,
            body[data-page="dashboard"] .main,
            body[data-page="users"] .main {
                margin-left: 0 !important;
                padding: 95px 18px 30px;
            }

            ```
        }
    </style>
</head>

<body data-page="{{ $page ?? 'dashboard' }}">

    <!-- 🔥 BOTÓN -->
    <div class="hamburger" id="hamburger-btn" onclick="toggleSidebar()">

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

                <a href="/admin" class="{{ request()->is('admin') ? 'active' : '' }}">

                    <i class="fas fa-chart-line"></i>
                    Dashboard

                </a>

                <a href="/admin/users" class="{{ request()->is('admin/users') ? 'active' : '' }}">

                    <i class="fas fa-users"></i>
                    Usuarios

                </a>

            </div>

        </div>

        <!-- 🔥 LOGOUT -->
        <div>

            <form id="logout-form" action="/logout" method="POST" style="display:none;">

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
