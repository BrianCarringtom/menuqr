<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Business Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
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

        /* OVERLAY */
        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
            display: none;
            z-index: 998;
        }

        .overlay.active {
            display: block;
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
            transition: 0.3s;
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
            padding: 40px;
            overflow-y: auto;
        }

        /* TOPBAR */
        .topbar {
            display: none;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .menu-btn {
            font-size: 26px;
            cursor: pointer;
            background: none;
            border: none;
        }

        .close-btn {
            display: none;
            font-size: 22px;
            cursor: pointer;
            background: none;
            border: none;
            align-self: flex-end;
            margin-bottom: 10px;
        }

        /* PORTADA */
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

        /* GRID */
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

        /* RESPONSIVE */
        @media (max-width: 900px) {

            .container {
                flex-direction: column;
            }

            .topbar {
                display: flex;
            }

            .sidebar {
                position: fixed;
                left: -260px;
                top: 0;
                height: 100%;
                z-index: 999;
                padding-top: 20px;
            }

            .sidebar.active {
                left: 0;
            }

            .close-btn {
                display: block;
                margin-bottom: 15px;
            }

            .sidebar h2 {
                margin-top: 0;
                margin-bottom: 20px;
                font-size: 22px;
            }

            .menu {
                margin-top: 20px;
            }

            .grid {
                grid-template-columns: 1fr;
                margin-top: 40px;
            }

            .main {
                padding: 20px;
            }

            .profile-img {
                left: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="overlay" id="overlay" onclick="toggleMenu()"></div>

    <div class="container">

        <!-- SIDEBAR -->
        <div class="sidebar" id="sidebar">

            <button class="close-btn" onclick="toggleMenu()">
                <i class="fas fa-xmark"></i>
            </button>

            <div>
                <h2>BUSINESS</h2>

                <div class="menu">
                    <a href="/business"><i class="fas fa-chart-line"></i> Dashboard</a>
                    <a href="/business/profile"><i class="fas fa-user"></i> Perfil</a>
                    <a href="/business/producto"><i class="fas fa-file-alt"></i> Producto-Categoria</a>
                    <a href="/business/gestion"><i class="fas fa-boxes"></i> Gestión de Producto</a>
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

        <!-- MAIN -->
        <div class="main">

            <div class="topbar">
                <button class="menu-btn" onclick="toggleMenu()">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <!-- PORTADA -->
            <div class="cover">

                <div class="cover-img">
                    <img
                        src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}">
                </div>

                <div class="cover-overlay"></div>

                <div class="profile-img">
                    <img
                        src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : 'https://via.placeholder.com/150' }}">
                </div>

                <label for="uploadImage" class="edit-cover">
                    <i class="fas fa-camera"></i> Cambiar portada
                </label>

            </div>

            <div class="grid">

                <div class="card">
                    <h2>{{ Auth::user()->name }}</h2>
                    <p>Perfil activo • Negocio digital 🚀</p>

                    <div style="margin-top:20px;">
                        <a href="/{{ Auth::user()->slug }}" target="_blank" class="btn">
                            Ver mi página
                        </a>
                    </div>
                </div>

                <div class="card">
                    <h3>Actualizar imagen</h3>

                    <form action="/business/profile/image" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input id="uploadImage" type="file" name="image" required class="input">

                        <button type="submit" class="btn" style="margin-top:20px; width:100%;">
                            Guardar cambios
                        </button>
                    </form>
                </div>

            </div>

        </div>

    </div>

    <script>
        function toggleMenu() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('overlay').classList.toggle('active');
        }
    </script>

</body>

</html>
