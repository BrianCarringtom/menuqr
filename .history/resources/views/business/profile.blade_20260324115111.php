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
            padding: 40px;
            display: flex;
            flex-direction: column;
            gap: 30px;
            overflow-y: auto;
        }

        /* TARJETAS */
        .card {
            background: white;
            border-radius: 20px;
            border: 1px solid #eee;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
            padding: 25px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }

        .card img {
            width: 100%;
            border-radius: 15px;
            margin-bottom: 20px;
            object-fit: cover;
            max-height: 350px;
        }

        .card h2 {
            margin: 0 0 10px;
            color: #1f2937;
        }

        .card h3 {
            margin: 0 0 10px;
            color: #c9a227;
        }

        .card p {
            margin: 5px 0;
            color: #555;
        }

        .card a {
            color: #c9a227;
            text-decoration: none;
        }

        .card a:hover {
            text-decoration: underline;
        }

        /* Contenedores internos para secciones */
        .cards-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .cards-row .card {
            flex: 1 1 300px;
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
                    <a href="/business/producto"><i class="fas fa-file-alt"></i> Producto-Categoria</a>
                    <a href="/business/gestion"><i class="fas fa-boxes"></i> Gestión de Producto</a>
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

            <!-- 🔥 PORTADA TIPO FACEBOOK -->
            <div style="position:relative;">

                <!-- Imagen portada -->
                <div
                    style="
            width:100%;
            height:320px;
            border-radius:20px;
            overflow:hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        ">
                    <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}"
                        style="width:100%; height:100%; object-fit:cover;">
                </div>

                <!-- Overlay degradado -->
                <div
                    style="
            position:absolute;
            top:0;
            left:0;
            width:100%;
            height:320px;
            border-radius:20px;
            background: linear-gradient(to top, rgba(0,0,0,0.6), transparent);
        ">
                </div>

                <!-- FOTO PERFIL -->
                <div style="
            position:absolute;
            bottom:-50px;
            left:40px;
        ">
                    <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : 'https://via.placeholder.com/150' }}"
                        style="
                    width:110px;
                    height:110px;
                    border-radius:50%;
                    border:5px solid white;
                    object-fit:cover;
                    box-shadow: 0 10px 25px rgba(0,0,0,0.25);
                ">
                </div>

            </div>

            <!-- 🔥 INFO PRINCIPAL -->
            <div class="card" style="margin-top:70px; padding-left:170px;">

                <h2 style="margin:0;">
                    {{ Auth::user()->name }}
                </h2>

                <p style="color:#777; margin-top:5px;">
                    Negocio digital • Perfil activo 🚀
                </p>

                <div style="margin-top:15px;">
                    <a href="/{{ Auth::user()->slug }}" target="_blank"
                        style="
                    background:#c9a227;
                    color:black;
                    padding:10px 18px;
                    border-radius:10px;
                    text-decoration:none;
                    font-weight:600;
                ">
                        Ver mi página pública
                    </a>
                </div>

            </div>

            <!-- 🔥 SUBIR IMAGEN -->
            <div class="card">
                <h3>Cambiar portada</h3>

                <form action="/business/profile/image" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="file" name="image" required
                        style="
                    width:100%;
                    padding:12px;
                    border-radius:10px;
                    border:1px solid #ddd;
                ">

                    <button type="submit"
                        style="
                    margin-top:15px;
                    background:#c9a227;
                    border:none;
                    padding:12px 20px;
                    border-radius:10px;
                    font-weight:600;
                    cursor:pointer;
                ">
                        Actualizar imagen
                    </button>
                </form>
            </div>

            <!-- 🔥 CARDS EXTRA -->
            <div class="cards-row">

                <div class="card">
                    <h3>Tu perfil</h3>
                    <p>Personaliza tu negocio para atraer más clientes.</p>
                </div>

                <div class="card">
                    <h3>Recomendación</h3>
                    <p>Usa imágenes en alta calidad para mejor impacto visual.</p>
                </div>

            </div>

        </div>

    </div>

</body>

</html>
