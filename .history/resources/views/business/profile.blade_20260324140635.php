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

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 240px;
            background: white;
            border-right: 1px solid #eee;
            padding: 25px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.35s ease;
        }

        .sidebar h2 {
            text-align: center;
            color: #c9a227;
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
            transition: 0.2s;
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

        /* ===== MAIN ===== */
        .main {
            flex: 1;
            padding: 40px;
            overflow-y: auto;
        }

        /* ===== COVER ===== */
        .cover {
            position: relative;
        }

        .cover-img {
            width: 100%;
            height: 340px;
            border-radius: 25px;
            overflow: hidden;
        }

        .cover-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .cover-overlay {
            position: absolute;
            top: 0;
            left: 0;
            height: 340px;
            width: 100%;
            border-radius: 25px;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
        }

        .profile-img {
            position: absolute;
            bottom: -60px;
            left: 50px;
        }

        .profile-img img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 6px solid white;
            object-fit: cover;
        }

        .edit-cover {
            position: absolute;
            bottom: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            padding: 10px 15px;
            border-radius: 12px;
            cursor: pointer;
            color: white;
            font-size: 14px;
        }

        .edit-cover:hover {
            background: rgba(255, 255, 255, 0.35);
        }

        /* ===== GRID ===== */
        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-top: 80px;
        }

        .card {
            background: white;
            border-radius: 20px;
            border: 1px solid #eee;
            padding: 35px;
        }

        .card h2 {
            margin: 0;
            font-size: 28px;
        }

        .card h3 {
            margin-bottom: 20px;
            color: #c9a227;
        }

        .card p {
            color: #666;
        }

        .btn {
            display: inline-block;
            background: #c9a227;
            color: white;
            padding: 12px 20px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background: #a8831f;
        }

        .input {
            width: 100%;
            padding: 14px;
            border-radius: 12px;
            border: 1px solid #ddd;
        }

        /* =========================
           🔥 HAMBURGUESA PRO
        ========================= */

        .menu-btn {
            position: fixed;
            top: 18px;
            left: 18px;
            width: 45px;
            height: 45px;
            background: white;
            border-radius: 12px;
            display: none;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            cursor: pointer;
            z-index: 2000;
            transition: 0.3s;
        }

        .menu-btn i {
            font-size: 18px;
            color: #1f2937;
        }

        .menu-btn:hover {
            transform: scale(1.05);
        }

        /* ===== CLOSE BUTTON ===== */
        .close-btn {
            display: none;
            position: absolute;
            top: 15px;
            right: 15px;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: #f3f4f6;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: 0.3s;
        }

        .close-btn:hover {
            background: #e5e7eb;
        }

        /* ===== MOBILE ===== */
        @media (max-width: 992px) {

            .container {
                flex-direction: column;
            }

            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                height: 100%;
                transform: translateX(-100%);
                z-index: 1500;
                box-shadow: 10px 0 30px rgba(0, 0, 0, 0.1);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .menu-btn {
                display: flex;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            .main {
                padding: 20px;
            }

            .close-btn {
                display: flex;
            }
        }
    </style>
</head>

<body>

    <!-- 🔥 BOTÓN HAMBURGUESA PRO -->
    <div class="menu-btn" onclick="openMenu()">
        <i class="fas fa-bars"></i>
    </div>

    <div class="container">

        <!-- SIDEBAR -->
        <div class="sidebar" id="sidebar">

            <!-- X CLOSE -->
            <div class="close-btn" onclick="closeMenu()">
                <i class="fas fa-times"></i>
            </div>

            <div>
                <h2>BUSINESS</h2>

                <div class="menu">
                    <a href="/business"><i class="fas fa-chart-line"></i> Dashboard</a>
                    <a href="/business/profile"><i class="fas fa-user"></i> Perfil</a>
                    <a href="/business/producto"><i class="fas fa-file-alt"></i> Producto-Categoria</a>
                    <a href="/business/gestion"><i class="fas fa-boxes"></i> Gestión</a>
                </div>
            </div>

            <button class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Cerrar sesión
            </button>
        </div>

        <!-- MAIN -->
        <div class="main">

            <div class="cover">

                <div class="cover-img">
                    <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836">
                </div>

                <div class="cover-overlay"></div>

                <div class="profile-img">
                    <img src="https://via.placeholder.com/150">
                </div>

            </div>

            <div class="grid">

                <div class="card">
                    <h2>Mi Negocio</h2>
                    <p>Perfil activo • Negocio digital 🚀</p>
                    <a class="btn" href="#">Ver mi página</a>
                </div>

                <div class="card">
                    <h3>Actualizar imagen</h3>
                    <input class="input" type="file">
                    <button class="btn" style="width:100%; margin-top:15px;">Guardar</button>
                </div>

            </div>

        </div>

    </div>

    <script>
        function openMenu() {
            document.getElementById("sidebar").classList.add("active");
        }

        function closeMenu() {
            document.getElementById("sidebar").classList.remove("active");
        }
    </script>

</body>

</html>
