<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Business Dashboard</title>

    <!-- Fuente -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #f9fafb;
            color: #1f2937;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 240px;
            background: white;
            border-right: 1px solid #eee;
            padding: 25px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar h2 {
            text-align: center;
            color: #c9a227;
            font-weight: 600;
            letter-spacing: 2px;
        }

        .menu {
            margin-top: 40px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            margin-bottom: 10px;
            border-radius: 8px;
            text-decoration: none;
            color: #555;
            transition: 0.25s;
        }

        .menu a:hover {
            background: #fef9e7;
            color: #c9a227;
        }

        .logout-btn {
            background: #c9a227;
            border: none;
            padding: 12px;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: #a8831f;
        }

        /* MAIN */
        .main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        /* WELCOME */
        .welcome-box {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            max-width: 700px;
            width: 100%;
            border: 1px solid #eee;
            text-align: center;
        }

        .welcome-box img {
            width: 100%;
            height: 260px;
            object-fit: cover;
        }

        .welcome-content {
            padding: 30px;
        }

        .welcome-content h1 {
            margin: 0;
            font-size: 28px;
            color: #1f2937;
        }

        .welcome-content h2 {
            margin: 10px 0;
            color: #c9a227;
            font-weight: 500;
        }

        .welcome-content p {
            color: #6b7280;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- SIDEBAR -->
        <div class="sidebar">
            <div>
                <h2>BUSINESS</h2>

                <div class="menu">
                    <a href="/business"><i class="fas fa-chart-line"></i> Dashboard</a>
                    <a href="/business/profile"><i class="fas fa-user"></i> Perfil</a>
                    <a href="#"><i class="fas fa-file-alt"></i> Reportes</a>
                </div>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <button class="logout-btn"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Cerrar sesión
            </button>
        </div>

        <!-- MAIN -->
        <div class="main">

    <div class="welcome-box" style="max-width: 720px; width: 100%; border-radius: 20px; overflow: hidden; background: white; box-shadow: 0 10px 25px rgba(0,0,0,0.1); border: 1px solid #eee; display: flex; flex-direction: column; align-items: center; padding-bottom: 30px;">

        <!-- Imagen del negocio -->
        <div style="width: 100%; height: 280px; overflow: hidden;">
            <img src="/images/negocio-ejemplo.jpg" alt="Imagen del Negocio" style="width: 100%; height: 100%; object-fit: cover;">
        </div>

        <!-- Contenido de la tarjeta -->
        <div class="welcome-content" style="text-align: center; margin-top: 20px;">
            <h1 style="margin: 0; font-size: 30px; color: #1f2937;">Panadería La Delicia</h1>
            <h2 style="margin: 8px 0; color: #c9a227; font-weight: 500;">Propietario: Juan Pérez</h2>
            <p style="color: #6b7280; font-style: italic; margin: 5px 0 20px;">"El sabor que te hace sonreír"</p>

            <div style="display: flex; flex-direction: column; gap: 12px; align-items: flex-start; width: 80%; margin: 0 auto;">
                <p style="margin:0; display: flex; align-items: center; gap: 8px;"><i class="fas fa-map-marker-alt" style="color:#c9a227;"></i> Calle Falsa 123, Ciudad de México</p>
                <p style="margin:0; display: flex; align-items: center; gap: 8px;"><i class="fas fa-phone" style="color:#c9a227;"></i> +52 55 1234 5678</p>
                <p style="margin:0; display: flex; align-items: center; gap: 8px;"><i class="fas fa-globe" style="color:#c9a227;"></i> 
                    <a href="https://goo.gl/maps/xyz123" target="_blank" style="color:#1f2937; text-decoration: underline;">Ver en Google Maps</a>
                </p>
                <p style="margin:0; display: flex; align-items: center; gap: 8px;"><i class="fas fa-id-card" style="color:#c9a227;"></i> CURP/ID: ABCD010203HDFXYZ09</p>
            </div>
        </div>

    </div>

</div>

    </div>

</body>

</html>
