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

        /* Contenedor principal */
        .container {
            display: flex;
            min-height: 100vh;
        }

        /* ================= Sidebar ================= */
        .sidebar {
            width: 240px;
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
            flex: 1;
            padding: 30px;
            overflow-x: auto;
        }

        h1,
        h3 {
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
            padding: 10px 20px;
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

        /* Mensaje de éxito */
        .success-message {
            color: lightgreen;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- Sidebar -->
        <div class="sidebar">
            <div class="menu">
                <h2>ADMIN</h2>
                <a href="/admin"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                <a href="/admin/users"><i class="fas fa-users"></i> Usuarios</a>
                <!-- Agrega más enlaces aquí -->
            </div>

            <!-- Botón de Cerrar Sesión -->
            <form id="logout-form" action="/logout" method="POST" style="display:none;">
                @csrf
            </form>
            <button class="logout-btn"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

    </div>

</body>

</html>
