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
            background: #0f172a;
            color: white;
        }

        /* Sidebar */
        .sidebar {
            width: 240px;
            background: linear-gradient(180deg, #1f2937, #111827);
            padding: 20px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;

            display: flex;
            flex-direction: column;
            justify-content: space-between;

            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.4);
        }

        .sidebar h2 {
            color: #ef4444;
            font-size: 26px;
            margin-bottom: 25px;
            text-align: center;
        }

        /* Menú */
        .sidebar .menu {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .sidebar a {
            color: #d1d5db;
            background: transparent;
            padding: 12px 15px;
            border-radius: 8px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: 0.2s;
        }

        .sidebar a:hover {
            background: #374151;
            color: white;
        }

        /* Activo (opcional) */
        .sidebar a.active {
            background: #3b82f6;
            color: white;
        }

        /* Logout */
        .logout-btn {
            background: #ef4444;
            border: none;
            padding: 12px;
            border-radius: 8px;
            color: white;
            cursor: pointer;
            font-weight: bold;
            transition: 0.2s;
        }

        .logout-btn:hover {
            background: #dc2626;
        }

        /* Main */
        .main {
            margin-left: 240px;
            padding: 40px;
            min-height: 100vh;
        }

        /* Títulos */
        h1 {
            margin-bottom: 20px;
        }

        /* FORMULARIO PRO 🔥 */
        form {
            background: #1e293b;
            padding: 20px;
            border-radius: 10px;
            width: 320px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        input {
            padding: 10px;
            width: 100%;
            margin-bottom: 10px;
            border-radius: 6px;
            border: 1px solid #374151;
            background: #111827;
            color: white;
        }

        input::placeholder {
            color: #9ca3af;
        }

        /* Botones */
        button {
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            background: #3b82f6;
            color: white;
            cursor: pointer;
            transition: 0.2s;
        }

        button:hover {
            background: #2563eb;
        }

        /* Tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #1e293b;
            border-radius: 10px;
            overflow: hidden;
        }

        table th {
            background: #0f172a;
            color: #9ca3af;
            font-size: 14px;
        }

        table th,
        table td {
            padding: 12px;
            border-bottom: 1px solid #374151;
        }

        table tr:hover {
            background: #334155;
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
