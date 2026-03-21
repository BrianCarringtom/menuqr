<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-p6e1CkU4W6IqI4wV6yF8/tPje2T+1P7Dq0o+0zZkpL0R+Jx0zS2S1e4t1JpHqk2iKQ9J9c9o1PfPcrXgJ3lXow=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* Reset y estilos base */
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

        /* ================= Sidebar ================= */
        .sidebar {
            position: fixed;
            /* Fija la sidebar */
            top: 0;
            left: 0;
            width: 240px;
            height: 100vh;
            /* Ocupa toda la altura */
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
            letter-spacing: 1px;
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
            font-weight: 500;
            color: white;
            background: #374151;
            transition: all 0.2s ease-in-out;
        }

        .menu a:hover {
            background: #4b5563;
        }

        .logout-btn {
            background: #ef4444;
            color: white;
            font-weight: bold;
            margin-top: auto;
            padding: 12px 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: background 0.2s ease-in-out;
        }

        .logout-btn:hover {
            background: #dc2626;
        }

        /* ================= Main Content ================= */
        .main {
            margin-left: 340px;
            /* Espacio para la sidebar */
            padding: 30px;
            min-height: 100vh;
            overflow-x: auto;
            /* Scroll horizontal si hace falta */
            overflow-y: auto;
            /* Scroll vertical si hace falta */
            white-space: nowrap;
            font-family: Arial, sans-serif;
            /* Fuente más legible */
            background-color: #111827;
            /* Fondo general */
            color: #f9fafb;
            /* Texto claro */
        }

        h1,
        h3 {
            margin-top: 0;
        }

        input {
            padding: 12px;
            width: 280px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #374151;
            background-color: #1f2937;
            color: #f9fafb;
        }

        button {
            padding: 12px 22px;
            border: none;
            border-radius: 6px;
            background: #3b82f6;
            color: white;
            cursor: pointer;
            transition: background 0.2s ease-in-out;
            margin-bottom: 25px;
            font-size: 16px;
        }

        button:hover {
            background: #2563eb;
        }

        table {
            width: 100%;
            max-width: 100%;
            border-collapse: separate;
            /* Más espacio entre celdas */
            border-spacing: 0;
            margin-top: 30px;
            background: #1f2937;
            font-size: 16px;
        }

        table th,
        table td {
            padding: 14px 20px;
            /* Más espaciamiento */
            border: 1px solid #374151;
            text-align: left;
        }

        table th {
            background: #111827;
            font-weight: 600;
            font-size: 17px;
        }

        table tr:nth-child(even) {
            background: #1e293b;
            /* Alternar color de filas para mejor lectura */
        }

        table tr:hover {
            background: #374151;
            /* Resalta la fila al pasar el mouse */
        }

        /* Mensaje de éxito */
        .success-message {
            color: lightgreen;
            margin-bottom: 15px;
            font-weight: 500;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="menu">
            <h2>ADMIN</h2>
            <a href="/admin"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="/admin/users"><i class="fas fa-users"></i> Usuarios</a>
        </div>

        <!-- Botón de Cerrar Sesión -->
        <form id="logout-form" action="/logout" method="POST" style="display:none;">
            @csrf
        </form>
        <button class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
        </button>
    </div>

    <!-- Main Content -->
    <div class="main">
        <h1>Panel Administrador</h1>

        @if (session('success'))
            <p class="success-message">{{ session('success') }}</p>
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

</body>

</html>
