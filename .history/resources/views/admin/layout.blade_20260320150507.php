<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        /* ===== RESET ===== */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Segoe UI', sans-serif;
            background: #0f172a;
            color: white;
        }

        a { text-decoration: none; }

        /* ===== SIDEBAR ===== */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100vh;
            background: linear-gradient(180deg, #1f2937, #020617);
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* botón abajo */
            box-shadow: 4px 0 20px rgba(0,0,0,0.4);
        }

        .sidebar-top {
            /* Contenedor del logo y menú */
        }

        .logo {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo h2 { color: #ef4444; margin: 0; }
        .logo span { font-size: 12px; color: #9ca3af; }

        .menu { display: flex; flex-direction: column; gap: 10px; }
        .menu-title { font-size: 12px; color: #6b7280; margin-top: 15px; }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            border-radius: 10px;
            color: #e5e7eb;
            transition: 0.25s;
        }

        .menu a:hover {
            background: #374151;
            transform: translateX(5px);
        }

        .active {
            background: linear-gradient(90deg, #2563eb, #1d4ed8);
            box-shadow: 0 4px 12px rgba(37,99,235,0.4);
        }

        /* ===== LOGOUT ===== */
        .logout-btn {
            width: 100%;
            background: transparent;
            border: 1px solid #ef4444;
            color: #ef4444;
            padding: 12px;
            border-radius: 10px;
            cursor: pointer;
            margin-bottom: 20px; /* margen desde el fondo */
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #ef4444;
            color: white;
        }

        /* ===== MAIN ===== */
        .main {
            margin-left: 260px;
            padding: 30px;
            min-height: 100vh;
            width: calc(100% - 260px);
            box-sizing: border-box;
            overflow-x: auto;
        }

        /* FORM */
        input {
            padding: 12px;
            width: 280px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: none;
        }

        button {
            padding: 12px 22px;
            background: #3b82f6;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        /* TABLE */
        table {
            width: 100%;
            margin-top: 30px;
            background: #1f2937;
            border-radius: 10px;
            overflow: hidden;
        }

        table th, table td {
            padding: 14px;
            border-bottom: 1px solid #374151;
        }

        table th { background: #020617; }
        table tr:hover { background: #374151; }

        .success-message { color: lightgreen; }
    </style>
</head>

<body>

<div class="sidebar">

    <div class="sidebar-top">
        <!-- LOGO -->
        <div class="logo">
            <h2>ADMIN</h2>
            <span>Panel de control</span>
        </div>

        <!-- MENU -->
        <div class="menu">
            <div class="menu-title">GENERAL</div>

            <a href="/admin" class="{{ request()->is('admin') ? 'active' : '' }}">
                <i class="fas fa-chart-line"></i> Dashboard
            </a>

            <a href="/admin/users" class="{{ request()->is('admin/users') ? 'active' : '' }}">
                <i class="fas fa-users"></i> Usuarios
            </a>
        </div>
    </div>

    <!-- BOTÓN CERRAR SESIÓN ABAJO CON MARGEN -->
    <form id="logout-form" action="/logout" method="POST">
        @csrf
        <button class="logout-btn">
            <i class="fas fa-sign-out-alt"></i> Cerrar sesión
        </button>
    </form>

</div>

<div class="main">
    @yield('content')
</div>

</body>
</html>