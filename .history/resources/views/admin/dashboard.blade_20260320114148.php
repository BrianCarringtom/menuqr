<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #111827;
            color: white;
            overflow: hidden; /* evita doble scroll */
        }

        /* Sidebar */
        .sidebar {
            width: 240px;
            background: #1f2937;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;

            /* 🔥 FIJO */
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
        }

        .sidebar h2 {
            color: #ef4444;
            font-size: 28px;
            margin-bottom: 30px;
            text-align: center;
            letter-spacing: 1px;
        }

        .sidebar .menu {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .sidebar a,
        .sidebar button {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 15px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease-in-out;
            border: none;
            cursor: pointer;
        }

        .sidebar a {
            color: white;
            background: #374151;
        }

        .sidebar a:hover {
            background: #4b5563;
        }

        .sidebar button.logout-btn {
            background: #ef4444;
            color: white;
            font-weight: bold;
            margin-top: auto;
        }

        .sidebar button.logout-btn:hover {
            background: #dc2626;
        }

        /* Main content */
        .main {
            flex: 1;
            padding: 30px;

            /* 🔥 AJUSTE para sidebar fijo */
            margin-left: 240px;
            height: 100vh;
            overflow-y: auto;
        }

        h1 {
            margin-top: 0;
        }

        input {
            padding: 10px;
            width: 250px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: none;
        }

        button {
            padding: 10px 18px;
            border: none;
            border-radius: 5px;
            background: #3b82f6;
            color: white;
            cursor: pointer;
            transition: background 0.2s ease-in-out;
        }

        button:hover {
            background: #2563eb;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #1f2937;
        }

        table th,
        table td {
            padding: 10px;
            border: 1px solid #374151;
            text-align: left;
        }

        table th {
            background: #111827;
        }
    </style>
</head>

<body>

    <div style="display:flex; min-height:100vh">

        <!-- Sidebar -->
        <div class="sidebar">
            <div class="menu">
                <h2>ADMIN</h2>
                <a href="/admin"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                <a href="/admin/users"><i class="fas fa-users"></i> Usuarios</a>
            </div>

            <!-- Logout -->
            <form id="logout-form" action="/logout" method="POST" style="display:none;">
                @csrf
            </form>

            <button class="logout-btn"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
            </button>
        </div>

        <!-- Contenido -->
        <div class="main">
            <h1>Panel Administrador</h1>

            @if (session('success'))
                <p style="color:lightgreen">{{ session('success') }}</p>
            @endif

            <h3>Crear usuario business</h3>

            <form method="POST" action="/admin/create-user">
                @csrf
                <input name="name" placeholder="Nombre" required><br>
                <input name="email" placeholder="Email" required><br>
                <input type="password" name="password" placeholder="Password" required><br><br>
                <button>Crear Usuario</button>
            </form>

            <h3>Lista de Usuarios</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\User::all() as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</body>

</html>