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
            font-family: 'Inter', sans-serif;
            background: #f0f4f8;
            color: #111827;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px;
            background: linear-gradient(180deg, #4f46e5, #1e3a8a);
            color: white;
            border-radius: 0 20px 20px 0;
            box-shadow: 2px 0 15px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .sidebar h2 {
            text-align: center;
            font-size: 30px;
            margin-bottom: 40px;
            letter-spacing: 1px;
            color: #ffffff;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 20px;
            border-radius: 12px;
            text-decoration: none;
            color: white;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .menu a:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateX(5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .logout-btn {
            background: #ef4444;
            color: white;
            padding: 14px 20px;
            border: none;
            border-radius: 12px;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .logout-btn:hover {
            background: #dc2626;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        /* Main content */
        .main {
            flex: 1;
            padding: 40px;
        }

        .welcome-box {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .welcome-box:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }

        h1 {
            margin-top: 0;
            color: #1e3a8a;
        }

        .menu i {
            font-size: 18px;
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
                <a href="/business/settings"><i class="fas fa-cog"></i> Configuración</a>
            </div>

            <!-- Botón Cerrar Sesión -->
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
