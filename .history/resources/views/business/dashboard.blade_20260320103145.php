<!DOCTYPE html>
<html>

<head>
    <title>Business Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: sans-serif;
            background: #f3f4f6;
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            background: #3b82f6;
            color: white;
            padding: 20px;
            min-height: 100vh;
        }

        .sidebar h2 {
            color: #ffffff;
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
        }

        .welcome-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-top: 0;
            color: #1e40af;
        }

        .logout-btn {
            margin-top: 20px;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background: #ef4444;
            color: white;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: #dc2626;
        }
    </style>
</head>

<body>

    <div style="display:flex;min-height:100vh">

        <!-- Sidebar -->
        <div class="sidebar">
            <h2>BUSINESS</h2>
            <a href="/business">Dashboard</a>
            <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar
                Sesión</a>

            <form id="logout-form" action="/logout" method="POST" style="display:none;">
                @csrf
            </form>
        </div>

        <!-- Main Content -->
        <div class="main">
            <h1>Panel Business</h1>

            <div class="welcome-box">
                <p>Bienvenido {{ auth()->user()->name }}</p>
                <p>Este es tu panel de negocio, aquí podrás ver tus datos y administrar tu información.</p>
            </div>
        </div>

    </div>

</body>

</html>
