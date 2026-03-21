<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Segoe UI', sans-serif;
            background: #111827;
            color: white;
        }

        a {
            text-decoration: none;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 240px;
            height: 100vh;
            background: #1f2937;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar h2 {
            color: #ef4444;
            font-size: 28px;
            margin-bottom: 30px;
            text-align: center;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 15px;
            border-radius: 8px;
            color: white;
            background: #374151;
        }

        .menu a:hover {
            background: #4b5563;
        }

        .active {
            background: #2563eb !important;
        }

        .logout-btn {
            background: #ef4444;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .main {
            margin-left: 340px;
            padding: 30px;
            min-height: 100vh;
        }

        input {
            padding: 12px;
            width: 280px;
            margin-bottom: 15px;
            border-radius: 6px;
        }

        button {
            padding: 12px 22px;
            background: #3b82f6;
            color: white;
            border: none;
            border-radius: 6px;
        }

        table {
            width: 100%;
            margin-top: 30px;
            background: #1f2937;
        }

        table th,
        table td {
            padding: 14px;
            border: 1px solid #374151;
        }

        .success-message {
            color: lightgreen;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <div class="menu">
            <h2>ADMIN</h2>
            <a href="/admin" class="{{ request()->is('admin') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="/admin/users" class="{{ request()->is('admin/users') ? 'active' : '' }}">
                <i class="fas fa-users"></i> Usuarios
            </a>
        </div>

        <form id="logout-form" action="/logout" method="POST" style="display:none;">
            @csrf
        </form>

        <button class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Cerrar Sesión
        </button>
    </div>

    <div class="main">
        @yield('content')
    </div>

</body>

</html>
