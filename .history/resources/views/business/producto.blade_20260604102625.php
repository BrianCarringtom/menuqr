<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business - Gestión de Productos</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f4f7fe;
            color: #1e293b;
            overflow-x: hidden;
        }

        .container {
            display: flex;
            min-height: 100vh;
            background-image:
                radial-gradient(circle at 80% 10%, rgba(37, 99, 235, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 20% 80%, rgba(29, 78, 216, 0.03) 0%, transparent 50%);
        }

        /* ================= SIDEBAR ================= */
        .sidebar {
            width: 280px;
            background: #ffffff;
            border-right: 1px solid #e2e8f0;
            padding: 35px 24px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            z-index: 1000;
            box-shadow: 4px 0 24px rgba(0, 0, 0, 0.02);
        }

        .sidebar h2 {
            text-align: center;
            background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
            letter-spacing: 2px;
            font-size: 24px;
        }

        .menu {
            margin-top: 45px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 16px;
            margin-bottom: 10px;
            border-radius: 16px;
            text-decoration: none;
            color: #64748b;
            font-size: 15px;
            font-weight: 600;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .menu a i {
            width: 20px;
            text-align: center;
            font-size: 18px;
            color: #94a3b8;
            transition: all 0.25s;
        }

        .menu a:hover,
        .menu a.active {
            background: rgba(37, 99, 235, 0.08);
            color: #1d4ed8;
            transform: translateX(4px);
        }

        .menu a:hover i,
        .menu a.active i {
            color: #1d4ed8;
            transform: scale(1.1);
        }

        .logout-btn {
            width: 100%;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            border: none;
            padding: 15px;
            border-radius: 16px;
            color: white;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 10px 20px rgba(15, 23, 42, 0.15);
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(15, 23, 42, 0.25);
            filter: brightness(1.2);
        }

        /* ================= MAIN CONTENT AREA ================= */
        .main {
            flex: 1;
            padding: 40px;
            position: relative;
            max-width: calc(100% - 280px);
        }

        /* ================= NUEVA SECCIÓN: ENCABEZADO DE PÁGINA ================= */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
            gap: 20px;
        }

        .page-header .title-area h1 {
            font-size: 28px;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.5px;
        }

        .page-header .title-area p {
            color: #64748b;
            font-size: 14px;
            margin-top: 4px;
            font-weight: 500;
        }

        /* Botón de Acción Estilo Zafiro Primario */
        .btn-primary {
            background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 100%);
            color: white;
            padding: 12px 24px;
            border-radius: 14px;
            text-decoration: none;
            font-weight: 700;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.15);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(37, 99, 235, 0.25);
            filter: brightness(1.1);
        }

        /* ================= NUEVA SECCIÓN: TARJETAS DE CONTENIDO (Módulos) ================= */
        .content-card {
            background: #ffffff;
            border-radius: 28px;
            padding: 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.02), 0 4px 12px rgba(37, 99, 235, 0.01);
            border: 1px solid rgba(226, 232, 240, 0.8);
            margin-bottom: 30px;
        }

        /* Estilo premium para tablas dentro de los módulos */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 15px;
        }

        .custom-table th {
            padding: 16px;
            color: #64748b;
            font-weight: 700;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid #f1f5f9;
        }

        .custom-table td {
            padding: 18px 16px;
            color: #334155;
            border-bottom: 1px solid #f1f5f9;
            font-weight: 500;
        }

        .custom-table tr:last-child td {
            border-bottom: none;
        }

        .custom-table tr:hover td {
            background: #f8fafc;
        }

        /* Badges / Etiquetas estilizadas */
        .badge {
            padding: 6px 12px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 700;
            display: inline-block;
        }

        .badge-success {
            background: rgba(16, 185, 129, 0.1);
            color: #10b981;
        }

        /* Botones de acción rápidos de la tabla */
        .action-btn {
            background: #f1f5f9;
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 10px;
            color: #64748b;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
            margin-right: 5px;
            text-decoration: none;
        }

        .action-btn:hover {
            background: rgba(37, 99, 235, 0.1);
            color: #1d4ed8;
            transform: scale(1.05);
        }

        .action-btn.btn-delete:hover {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
        }

        /* ================= MENUS MÓVILES ================= */
        .menu-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            width: 50px;
            height: 50px;
            border: none;
            border-radius: 16px;
            background: #ffffff;
            color: #2563eb;
            font-size: 20px;
            cursor: pointer;
            z-index: 1100;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        }

        .close-menu {
            display: none;
            position: absolute;
            top: 24px;
            right: 24px;
            background: #f1f5f9;
            border: none;
            width: 38px;
            height: 38px;
            border-radius: 12px;
            font-size: 18px;
            color: #64748b;
            cursor: pointer;
            transition: background 0.2s;
        }

        .close-menu:hover {
            background: #e2e8f0;
            color: #0f172a;
        }

        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.3);
            backdrop-filter: blur(4px);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* ================= RESPONSIVE TABLET ================= */
        @media (max-width: 992px) {
            .menu-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .sidebar {
                position: fixed;
                top: 0;
                left: -300px;
                width: 280px;
                height: 100%;
                box-shadow: 20px 0 50px rgba(15, 23, 42, 0.08);
            }

            .sidebar.active {
                left: 0;
            }

            .close-menu {
                display: block;
            }

            .main {
                width: 100%;
                max-width: 100%;
                padding: 100px 24px 40px;
            }
        }

        /* ================= RESPONSIVE MÓVIL ================= */
        @media (max-width: 600px) {
            .main {
                padding: 90px 16px 20px;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .btn-primary {
                width: 100%;
                justify-content: center;
            }

            .content-card {
                padding: 20px 15px;
                border-radius: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="overlay" onclick="toggleMenu()"></div>

    <div class="container">

        <div class="sidebar">
            <button class="close-menu" onclick="toggleMenu()">
                <i class="fas fa-times"></i>
            </button>

            <div>
                <h2>BUSINESS</h2>
                <div class="menu">
                    <a href="/business">
                        <i class="fas fa-chart-line"></i> Dashboard
                    </a>
                    <a href="/business/profile">
                        <i class="fas fa-user"></i> Perfil
                    </a>
                    <a href="/business/producto">
                        <i class="fas fa-file-alt"></i> Producto-Categoria
                    </a>
                    <a href="/business/gestion" class="active">
                        <i class="fas fa-boxes"></i> Gestion de Producto
                    </a>
                </div>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>

            <button class="logout-btn"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Cerrar sesión
            </button>
        </div>

        <div class="main">

            <button class="menu-toggle" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </button>

            <div class="page-header">
                <div class="title-area">
                    <h1>Gestión de Productos</h1>
                    <p>Visualiza, edita y añade nuevos productos a tu catálogo digital</p>
                </div>
                <button class="btn-primary">
                    <i class="fas fa-plus"></i> Nuevo Producto
                </button>
            </div>

            <div class="content-card">
                <div class="table-responsive">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Categoría</th>
                                <th>Precio</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <strong>Netflix Premium (1 Mes)</strong>
                                </td>
                                <td>Cuentas Streaming</td>
                                <td>$150.00 MXN</td>
                                <td><span class="badge badge-success">Activo</span></td>
                                <td>
                                    <a href="#" class="action-btn" title="Editar"><i class="fas fa-pen"></i></a>
                                    <button class="action-btn btn-delete" title="Eliminar"><i
                                            class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Disney+ Regular</strong>
                                </td>
                                <td>Cuentas Streaming</td>
                                <td>$130.00 MXN</td>
                                <td><span class="badge badge-success">Activo</span></td>
                                <td>
                                    <a href="#" class="action-btn" title="Editar"><i class="fas fa-pen"></i></a>
                                    <button class="action-btn btn-delete" title="Eliminar"><i
                                            class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <script>
        function toggleMenu() {
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.querySelector('.overlay');
            const menuBtn = document.querySelector('.menu-toggle');

            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');

            if (sidebar.classList.contains('active')) {
                menuBtn.style.display = 'none';
                document.body.style.overflow = 'hidden';
            } else {
                menuBtn.style.display = 'flex';
                document.body.style.overflow = 'auto';
            }
        }

        window.addEventListener('resize', () => {
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.querySelector('.overlay');
            const menuBtn = document.querySelector('.menu-toggle');

            if (window.innerWidth > 992) {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
                menuBtn.style.display = 'none';
                document.body.style.overflow = 'auto';
            } else {
                if (!sidebar.classList.contains('active')) {
                    menuBtn.style.display = 'flex';
                }
            }
        });
    </script>
</body>

</html>
