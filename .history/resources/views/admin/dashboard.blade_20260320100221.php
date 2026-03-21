<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
</head>

<body style="margin:0;font-family:sans-serif">

    <div style="display:flex;min-height:100vh">

        <!-- Sidebar -->
        <div style="width:220px;background:#1f2937;color:white;padding:20px">
            <h2 style="color:#ef4444">ADMIN</h2>

            <a href="/admin" style="color:white;display:block;margin:10px 0">Dashboard</a>
        </div>

        <!-- Contenido -->
        <div style="flex:1;padding:30px;background:#111827;color:white">

            <h1>Panel Administrador</h1>

            @if (session('success'))
                <p style="color:lightgreen">{{ session('success') }}</p>
            @endif

            <h3>Crear usuario business</h3>

            <form method="POST" action="/admin/create-user">
                @csrf

                <input name="name" placeholder="Nombre" required><br><br>
                <input name="email" placeholder="Email" required><br><br>
                <input type="password" name="password" placeholder="Password" required><br><br>

                <button>Crear</button>
            </form>

        </div>

    </div>

</body>

</html>
