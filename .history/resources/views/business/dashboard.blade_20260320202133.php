<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Business Dashboard Elegante</title>

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
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #a8831f;
        }

        /* MAIN */
        .main {
            flex: 1;
            padding: 40px;
            overflow-y: auto;
        }

        h1 {
            margin-bottom: 30px;
            font-weight: 600;
        }

        /* CARDS */
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            border: 1px solid #eee;
            transition: 0.25s;
        }

        .card:hover {
            border-color: #c9a227;
        }

        .card i {
            font-size: 22px;
            margin-bottom: 10px;
            color: #c9a227;
        }

        /* WELCOME */
        .welcome-box {
            background: white;
            padding: 40px;
            border-radius: 16px;
            text-align: center;
            border: 1px solid #eee;
        }

        .welcome-box img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 3px solid #c9a227;
            margin-bottom: 20px;
        }

        .welcome-box p {
            color: #6b7280;
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
        <h1>Panel de Negocio</h1>

        <!-- CARDS -->
        <div class="cards">
            <div class="card">
                <i class="fas fa-cash-register"></i>
                <h3>Ingresos</h3>
                <p>$12,500</p>
            </div>

            <div class="card">
                <i class="fas fa-users"></i>
                <h3>Clientes</h3>
                <p>210</p>
            </div>

            <div class="card">
                <i class="fas fa-chart-bar"></i>
                <h3>Ventas</h3>
                <p>+12%</p>
            </div>
        </div>

        <!-- WELCOME -->
        <div class="welcome-box">
            <img src="https://i.pravatar.cc/200" alt="">
            <h2>Bienvenido</h2>
            <p>{{ auth()->user()->name }}</p>
            <p>Gestiona tu negocio de manera profesional y organizada.</p>
        </div>

    </div>

</div>

</body>
</html>