<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Business Dashboard Pro</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0f172a, #1e293b);
            color: #e5e7eb;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 240px;
            background: rgba(15, 23, 42, 0.9);
            backdrop-filter: blur(10px);
            padding: 25px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border-right: 1px solid rgba(255, 255, 255, 0.05);
        }

        .sidebar h2 {
            text-align: center;
            font-weight: 600;
            letter-spacing: 2px;
            color: #38bdf8;
        }

        .menu {
            margin-top: 40px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px;
            margin-bottom: 10px;
            border-radius: 10px;
            text-decoration: none;
            color: #cbd5f5;
            transition: all 0.25s ease;
        }

        .menu a:hover {
            background: rgba(56, 189, 248, 0.15);
            color: #38bdf8;
            transform: translateX(5px);
        }

        .logout-btn {
            background: linear-gradient(135deg, #ef4444, #dc2626);
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
            box-shadow: 0 0 15px rgba(239, 68, 68, 0.5);
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

        /* TARJETAS */
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 20px;
            backdrop-filter: blur(8px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card i {
            font-size: 24px;
            margin-bottom: 10px;
            color: #38bdf8;
        }

        /* WELCOME */
        .welcome-box {
            background: rgba(255, 255, 255, 0.05);
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .welcome-box img {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            border: 4px solid #38bdf8;
            margin-bottom: 20px;
        }

        .welcome-box p {
            color: #cbd5f5;
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
            <h1>Panel de Control</h1>

            <!-- CARDS -->
            <div class="cards">
                <div class="card">
                    <i class="fas fa-dollar-sign"></i>
                    <h3>Ingresos</h3>
                    <p>$12,450</p>
                </div>

                <div class="card">
                    <i class="fas fa-users"></i>
                    <h3>Clientes</h3>
                    <p>320</p>
                </div>

                <div class="card">
                    <i class="fas fa-chart-bar"></i>
                    <h3>Ventas</h3>
                    <p>+18%</p>
                </div>
            </div>

            <!-- WELCOME -->
            <div class="welcome-box">
                <img src="https://i.pravatar.cc/200" alt="user">
                <h2>Bienvenido</h2>
                <p>{{ auth()->user()->name }}</p>
                <p>Administra tu negocio de forma profesional desde este panel.</p>
            </div>

        </div>

    </div>

</body>

</html>
