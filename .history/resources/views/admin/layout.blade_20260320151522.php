<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Segoe UI', sans-serif;
            background: #0f172a;
            color: white;
        }

        a {
            text-decoration: none;
        }

        /* SIDEBAR */
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
            justify-content: space-between;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.4);
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo h2 {
            color: #ef4444;
            font-size: 26px;
            margin: 0;
        }

        .logo span {
            font-size: 12px;
            color: #9ca3af;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .menu-title {
            font-size: 12px;
            color: #6b7280;
            margin: 10px 0;
            padding-left: 5px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            border-radius: 10px;
            color: #e5e7eb;
            transition: all 0.25s ease;
            position: relative;
        }

        .menu a i {
            width: 20px;
            text-align: center;
        }

        .menu a:hover {
            background: #374151;
            transform: translateX(5px);
        }

        .active {
            background: linear-gradient(90deg, #2563eb, #1d4ed8);
            color: white;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.4);
        }

        .active::before {
            content: "";
            position: absolute;
            left: -20px;
            top: 0;
            height: 100%;
            width: 4px;
            background: #3b82f6;
            border-radius: 0 5px 5px 0;
        }

        /* LOGOUT */
        .logout-btn {
            width: 100%;
            font-size: 16px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: #ef4444;
            color: white;
            border: none;
            padding: 14px;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s;
            margin-bottom: 25px;
        }

        .logout-btn:hover {
            background: #dc2626;
        }

        /* MAIN con margen dinámico por página */
        .main {
            padding: 30px;
            min-height: 100vh;
            margin-left: 280px;
            /* default */
            transition: margin-left 0.3s ease;
        }

        body[data-page="dashboard"] .main {
            margin-left: 280px;
        }

        body[data-page="users"] .main {
            margin-left: 340px;
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
        }

        /* TABLE */
        table {
            width: 100%;
            margin-top: 30px;
            background: #1f2937;
            border-radius: 10px;
            overflow: hidden;
        }

        table th,
        table td {
            padding: 14px;
            border-bottom: 1px solid #374151;
        }

        table th {
            background: #020617;
        }

        table tr:hover {
            background: #374151;
        }

        .success-message {
            color: lightgreen;
        }
    </style>
</head>

<body data-page="{{ $page ?? 'dashboard' }}">

    <div class="sidebar">

        <div>
            <div class="logo">
                <h2>ADMIN</h2>
                <span>Panel de control</span>
            </div>

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

        <form id="logout-form" action="/logout" method="POST" style="display:none;">
            @csrf
        </form>

        <button class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> Cerrar sesión
        </button>

    </div>

    <div class="main">
        @yield('content')
    </div>

</body>

</html>
