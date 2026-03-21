<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Business Dashboard</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-p6e1CkU4W6IqI4wV6yF8/tPje2T+1P7Dq0o+0zZkpL0R+Jx0zS2S1e4t1JpHqk2iKQ9J9c9o1PfPcrXgJ3lXow=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* Reset y estilos básicos */
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #f3f4f6;
            color: #111827;
        }

        /* Contenedor principal */
        .container {
            display: flex;
            height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px;
            background: #1e40af;
            color: white;
        }

        .sidebar h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 40px;
            letter-spacing: 1px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 18px;
            border-radius: 6px;
            text-decoration: none;
            color: white;
            font-weight: 500;
            transition: background 0.2s ease;
        }

        .menu a:hover {
            background: #3b5fd1;
        }

        .menu i {
            font-size: 16px;
        }

        .logout-btn {
            background: #ef4444;
            color: white;
            padding: 12px 18px;
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
            margin-left: 220px;
            /* mismo ancho del sidebar */
            padding: 50px;
            flex: 1;
            height: 100vh;
            overflow-y: auto;
            /* scroll cuando el contenido sea grande */
        }

        .welcome-box {
            background: white;
            padding: 80px 30px 30px 30px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
            max-width: 700px;
            margin: 0 auto;
            position: relative;
        }

        .welcome-box img {
            width: 220px;
            height: 220px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #1e40af;
            margin-top: -60px;
            background: white;
        }

        h1 {
            margin-top: 0;
            color: #1e40af;
            text-align: center;
            margin-bottom: 40px;
        }

        .welcome-box p {
            font-size: 20px;
            margin: 15px 0;
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- Sidebar fijo -->
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
            <button class="logout-btn"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
            </button>
        </div>

        <!-- Main Content scrollable -->
        <div class="main">
            <h1>Panel Business</h1>

            <div class="welcome-box">
                <img src="https://imgsrv.crunchyroll.com/cdn-cgi/image/fit=cover,format=auto,quality=85,width=1920/keyart/GRMG8ZQZR-backdrop_wide"
                    alt="Bienvenida">
                <p>Bienvenido {{ auth()->user()->name }}</p>
                <p>Este es tu panel de negocio, aquí podrás ver tus datos y administrar tu información.</p>
            </div>

            <!-- Ejemplo de contenido largo para probar scroll -->
            <div style="height: 1000px;"></div>
        </div>

    </div>

</body>

</html>
