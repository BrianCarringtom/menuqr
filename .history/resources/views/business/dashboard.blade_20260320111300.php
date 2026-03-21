<!DOCTYPE html>
<html>

<head>
    <title>Business Dashboard</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-p6e1CkU4W6IqI4wV6yF8/tPje2T+1P7Dq0o+0zZkpL0R+Jx0zS2S1e4t1JpHqk2iKQ9J9c9o1PfPcrXgJ3lXow=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #f3f4f6;
            color: #111827;
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px;
            background: #1e40af; /* azul corporativo */
            color: white;
        }

        .sidebar h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 30px;
            letter-spacing: 1px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 15px;
            border-radius: 6px;
            text-decoration: none;
            color: white;
            font-weight: 500;
            transition: background 0.2s ease;
        }

        .menu a:hover {
            background: #3b5fd1; /* hover discreto */
        }

        .logout-btn {
            background: #ef4444;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
            transition: background 0.2s ease;
        }

        .logout-btn:hover {
            background: #dc2626;
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
        }

        h1 {
            margin-top: 0;
            color: #1e40af;
        }

        .menu i {
            font-size: 16px;
        }
    </style>
</head>

<body>

    <div style="display:flex; min-height:100vh">

        <!-- Sidebar -->
        <div class="sidebar">
            <div class="menu">
                <h2>BUSINESS</h2>
                <a href="/business"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                <a href="/business/profile"><i class="fas fa-user"></i> Perfil</a>
                <a href="/business/reports"><i class="fas fa-chart-line"></i> Reportes</a>
            </div>

            <!-- Botón Cerrar Sesión -->
            <form id="logout-form" action="/logout" method="POST" style="display:none;">
                @csrf
            </form>
            <button class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
            </button>
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