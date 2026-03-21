<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: sans-serif;
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            background: #1f2937;
            color: white;
            padding: 20px;
            min-height: 100vh;
        }

        .sidebar h2 {
            color: #ef4444;
        }

        .sidebar a {
            color: white;
            display: block;
            margin: 10px 0;
            text-decoration: none;
        }

        .sidebar a:hover {
            text-decoration: underline;
        }

        /* Main content */
        .main {
            flex: 1;
            padding: 30px;
            background: #111827;
            color: white;
        }

        h1 {
            margin-top: 0;
        }

        input {
            padding: 8px;
            width: 200px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: none;
        }

        button {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            background: #ef4444;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background: #dc2626;
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

        .logout-btn {
            margin-top: 20px;
            background: #3b82f6;
        }

        .logout-btn:hover {
            background: #2563eb;
        }
    </style>
</head>

<body>

    <div style="display:flex;min-height:100vh">

        <!-- Sidebar -->
        <div class="sidebar">
            <h2>ADMIN</h2>
            <a href="/admin">Dashboard</a>
            <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar
                Sesión</a>

            <form id="logout-form" action="/logout" method="POST" style="display:none;">
                @csrf
            </form>
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
