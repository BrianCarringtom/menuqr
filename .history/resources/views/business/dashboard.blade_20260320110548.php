<!DOCTYPE html>
<html>

<head>
    <title>Business Dashboard</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-p6e1CkU4W6IqI4wV6yF8/tPje2T+1P7Dq0o+0zZkpL0R+Jx0zS2S1e4t1JpHqk2iKQ9J9c9o1PfPcrXgJ3lXow=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #e0e7ff;
            color: #111827;
        }

        /* Sidebar */
        .sidebar {
            width: 240px;
            background: #1e3a8a;
            /* azul oscuro moderno */
            color: white;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /* botón logout abajo */
            border-radius: 0 15px 15px 0;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
        }

        .sidebar h2 {
            color: #ffffff;
            font-size: 28px;
            margin-bottom: 30px;
            text-align: center;
            letter-spacing: 1px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 15px;
            margin-bottom: 10px;
            border-radius: 8px;
            text-decoration: none;
            color: white;
            font-weight: 500;
            transition: all 0.2s ease-in-out;
        }

        .menu a:hover {
            background: #3b82f6;
        }

        .logout-btn {
            background: #ef4444;
            color: white;
            padding: 12px 15px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
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
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-top: 0;
            color: #1e3a8a;
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

            <!-- Botón Cerrar Sesión abajo -->
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
            <h1>Panel Business</h1>

            <div class="welcome-box">
                <p>Bienvenido {{ auth()->user()->name }}</p>
                <p>Este es tu panel de negocio, aquí podrás ver tus datos y administrar tu información.</p>
            </div>
        </div>

    </div>

</body>

</html>
