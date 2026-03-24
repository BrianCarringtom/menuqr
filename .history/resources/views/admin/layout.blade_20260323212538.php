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
            background: transparent;
            border: 1px solid #ef4444;
            color: #ef4444;
            padding: 12px;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s;
            margin-bottom: 25px;
        }

        .logout-btn:hover {
            background: #ef4444;
            color: white;
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
            margin-left: 440px;
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
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
            /* transición suave */
        }

        button:hover {
            background: #2563eb;
            /* azul más oscuro al pasar el mouse */
        }

        /* TABLE */

        table {
            width: 100%;
            border-collapse: collapse;
            font-family: 'Inter', sans-serif;
        }

        thead {
            background: #f9fafb;
        }

        th {
            text-align: left;
            padding: 14px;
            font-size: 14px;
            color: #374151;
            font-weight: 600;
            border-bottom: 1px solid #e5e7eb;
        }

        td {
            padding: 14px;
            font-size: 14px;
            color: #4b5563;
            border-bottom: 1px solid #f1f5f9;
        }

        tbody tr:hover {
            background: #f9fafb;
            transition: 0.2s;
        }

        .link-slug {
            color: #3b82f6;
            text-decoration: none;
            font-weight: 500;
        }

        .link-slug:hover {
            text-decoration: underline;
        }

        .actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 7px 12px;
            border-radius: 8px;
            border: none;
            color: white;
            font-size: 13px;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .btn-edit {
            background: #3b82f6;
        }

        .btn-edit:hover {
            background: #2563eb;
        }

        .btn-delete {
            background: #ef4444;
        }

        .btn-delete:hover {
            background: #dc2626;
        }

        .btn-toggle-active {
            background: #f59e0b;
        }

        .btn-toggle-active:hover {
            background: #d97706;
        }

        .btn-toggle-inactive {
            background: #10b981;
        }

        .btn-toggle-inactive:hover {
            background: #059669;
        }

        .success-message {
            color: lightgreen;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            width: 350px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.3s ease;
        }

        .modal-content input,
        .modal-content select {
            width: 100%;
            padding: 8px;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
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
