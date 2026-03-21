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
                <a href="#"><i class="fas fa-chart-line"></i> Dashboard</a>
                <a href="#"><i class="fas fa-user"></i> Perfil</a>
                <a href="#"><i class="fas fa-file-alt"></i> Reportes</a>
            </div>
        </div>

        <button class="logout-btn">
            <i class="fas fa-sign-out-alt"></i> Cerrar sesión
        </button>
    </div>

    <!-- MAIN -->
    <div class="main">

        <div class="welcome-box">
            <img src="https://images.unsplash.com/photo-1556740749-887f6717d7e4" alt="Negocio">

            <div class="welcome-content">
                <h1>Bienvenido a tu panel</h1>
                <h2>{{ auth()->user()->name }}</h2>
                <p>Gestiona tu negocio de forma profesional, clara y organizada.</p>
            </div>
        </div>

    </div>

</div>

</body>
</html>