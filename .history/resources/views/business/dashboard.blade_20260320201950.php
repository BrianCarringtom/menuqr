<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Business Dashboard Premium</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0f0f0f, #1c1c1c);
            color: #f5f5f5;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            background: #111;
            padding: 25px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border-right: 1px solid rgba(255, 215, 0, 0.1);
        }

        .sidebar h2 {
            text-align: center;
            color: #facc15;
            letter-spacing: 2px;
        }

        .menu {
            margin-top: 40px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px;
            margin-bottom: 12px;
            border-radius: 10px;
            text-decoration: none;
            color: #ccc;
            transition: 0.3s;
        }

        .menu a:hover {
            background: linear-gradient(90deg, #facc15, #f59e0b);
            color: #000;
            transform: translateX(6px);
        }

        .logout-btn {
            background: linear-gradient(135deg, #ef4444, #b91c1c);
            border: none;
            padding: 12px;
            border-radius: 10px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .logout-btn:hover {
            transform: scale(1.05);
        }

        /* MAIN */
        .main {
            flex: 1;
            padding: 40px;
            overflow-y: auto;
        }

        h1 {
            margin-bottom: 30px;
            color: #facc15;
        }

        /* CARDS */
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .card {
            background: #181818;
            border-radius: 15px;
            padding: 20px;
            border: 1px solid rgba(255, 215, 0, 0.1);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-6px);
            border-color: #facc15;
        }

        .card i {
            font-size: 26px;
            margin-bottom: 10px;
            color: #facc15;
        }

        /* WELCOME */
        .welcome-box {
            background: #181818;
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            border: 1px solid rgba(255, 215, 0, 0.1);
        }

        .welcome-box img {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            border: 4px solid #facc15;
            margin-bottom: 20px;
        }

        .welcome-box p {
            color: #aaa;
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
        <h1>Panel de Negocio</h1>

        <!-- CARDS -->
        <div class="cards">
            <div class="card">
                <i class="fas fa-cash-register"></i>
                <h3>Ingresos</h3>
                <p>$18,900</p>
            </div>

            <div class="card">
                <i class="fas fa-users"></i>
                <h3>Clientes</h3>
                <p>540</p>
            </div>

            <div class="card">
                <i class="fas fa-store"></i>
                <h3>Ventas</h3>
                <p>+25%</p>
            </div>
        </div>

        <!-- WELCOME -->
        <div class="welcome-box">
            <img src="https://i.pravatar.cc/200" alt="">
            <h2>Bienvenido</h2>
            <p>{{ auth()->user()->name }}</p>
            <p>Administra tu negocio de forma profesional.</p>
        </div>

    </div>

</div>

</body>
</html>