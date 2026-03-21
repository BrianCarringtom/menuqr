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
            top: 0;
            left: 0;
            width: 240px;
            height: 100vh;
            background: #1f2937;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
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
            transition: all 0.2s ease-in-out;
        }

        .logout-btn:hover {
            background: #dc2626;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* ================= Main Content ================= */
        .main {
            margin-left: 340px; /* Más espacio a la derecha */
            padding: 30px;
            min-height: 100vh;
            overflow-x: auto;
            overflow-y: auto;
            white-space: nowrap;

            background: #1e293b;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        h1 {
            font-size: 2em;
            font-weight: 700;
            margin-top: 0;
        }

        h3 {
            font-size: 1.4em;
            font-weight: 600;
            margin-top: 25px;
            margin-bottom: 15px;
        }

        input {
            padding: 12px;
            width: 100%;
            max-width: 300px;
            margin-bottom: 12px;
            border-radius: 6px;
            border: 1px solid #374151;
            background: #111827;
            color: white;
            transition: border 0.2s ease-in-out, background 0.2s ease-in-out;
        }

        input:focus {
            outline: none;
            border-color: #3b82f6;
            background: #1f2937;
        }

        button {
            padding: 12px 22px;
            border: none;
            border-radius: 6px;
            background: #3b82f6;
            color: white;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.2s ease-in-out;
            margin-bottom: 25px;
        }

        button:hover {
            background: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        table {
            width: max-content;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 20px;
            background: #111827;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        table th,
        table td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid #374151;
        }

        table th {
            background: #1f2937;
            font-weight: 600;
        }

        .success-message {
            color: #22c55e;
            font-weight: 600;
            margin-bottom: 15px;
        }

        /* Scroll suave */
        .main {
            scroll-behavior: smooth;
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
                    <th>Extra1</th>
                    <th>Extra2</th>
                    <th>Extra3</th>
                    <th>Extra4</th>
                </tr>
            </thead>
            <tbody>
                @foreach (App\Models\User::all() as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>Dato</td>
                        <td>Dato</td>
                        <td>Dato</td>
                        <td>Dato</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>