<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grand Line Admin</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Pirata+One&family=Bangers&family=Poppins:wght@400;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        :root {
            --azul-rey: #0047AB;
            --rojo-luffy: #D91B1B;
            --dorado-roger: #FFD700;
            --fondo-pargamino: #FDF5E6;
            --madera-oscura: #2C1B10;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #ffffff;
            color: #1a1a1a;
            font-family: 'Poppins', sans-serif;
            display: flex;
            min-height: 100vh;
        }

        /* --- SIDEBAR ESTILO NAVÍO --- */
        .sidebar {
            position: fixed;
            width: 280px;
            height: 100vh;
            background: linear-gradient(135deg, var(--azul-rey) 0%, #002355 100%);
            border-right: 5px solid var(--dorado-roger);
            padding: 25px 15px;
            display: flex;
            flex-direction: column;
            z-index: 1100;
            transition: transform 0.3s ease;
        }

        .logo {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 2px dashed rgba(255, 255, 255, 0.3);
            padding-bottom: 20px;
        }

        .logo h2 {
            font-family: 'Pirata One', cursive;
            color: white;
            font-size: 35px;
            letter-spacing: 2px;
            text-shadow: 2px 2px var(--rojo-luffy);
        }

        .menu-title {
            font-family: 'Bangers', cursive;
            color: var(--dorado-roger);
            letter-spacing: 1.5px;
            margin: 20px 0 10px 10px;
            font-size: 18px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px 15px;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            margin-bottom: 8px;
            transition: all 0.3s;
            font-weight: 500;
        }

        .menu a:hover,
        .menu a.active {
            background: var(--rojo-luffy);
            box-shadow: 4px 4px 0px var(--dorado-roger);
            transform: translateX(5px);
        }

        .logout-btn {
            margin-top: auto;
            background: transparent;
            border: 2px solid white;
            color: white;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            font-family: 'Bangers', cursive;
            font-size: 16px;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: white;
            color: var(--rojo-luffy);
        }

        /* --- CONTENIDO PRINCIPAL --- */
        .main {
            flex: 1;
            margin-left: 280px;
            padding: 40px;
            background-image: radial-gradient(#ccc 1px, transparent 1px);
            background-size: 20px 20px;
            /* Estilo sutil de mapa */
        }

        .hamburger {
            display: none;
            position: fixed;
            top: 15px;
            left: 15px;
            background: var(--azul-rey);
            color: white;
            padding: 10px;
            border-radius: 5px;
            z-index: 1200;
            cursor: pointer;
        }

        @media (max-width: 900px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main {
                margin-left: 0;
                padding: 80px 20px 20px;
            }

            .hamburger {
                display: block;
            }
        }
    </style>
</head>

<body data-page="{{ $page ?? 'dashboard' }}">

    <div class="hamburger" onclick="toggleSidebar()">
        <i class="fas fa-ship"></i>
    </div>

    <div class="sidebar" id="sidebar">
        <div class="logo">
            <h2>GRAND LINE</h2>
            <p style="color: white; font-size: 10px; font-family: 'Bangers';">SISTEMA DE COMANDO</p>
        </div>

        <nav class="menu">
            <div class="menu-title">NAVEGACIÓN</div>
            <a href="/admin" class="{{ request()->is('admin') ? 'active' : '' }}">
                <i class="fas fa-compass"></i> Dashboard
            </a>
            <a href="/admin/users" class="{{ request()->is('admin/users') ? 'active' : '' }}">
                <i class="fas fa-skull-crossbones"></i> Tripulación
            </a>
        </nav>

        <form id="logout-form" action="/logout" method="POST" style="display:none;">@csrf</form>
        <button class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-anchor"></i> ABANDONAR BARCO
        </button>
    </div>

    <div class="main">
        @yield('content')
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('show');
        }
    </script>
</body>

</html>
