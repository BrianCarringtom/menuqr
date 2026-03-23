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

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
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
        <div class="main"
            style="
    background: #f4f6f9;
    padding: 25px 30px;
    display: flex;
    flex-direction: column;
    gap: 20px;
    height: 100vh;
    overflow: hidden;
">

            <!-- HEADER -->
            <div
                style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        background:white;
        padding:18px 22px;
        border-radius:14px;
        border:1px solid #e5e7eb;
    ">
                <div>
                    <h1 style="margin:0; font-size:22px; font-weight:600; color:#111827;">
                        Panel de Control
                    </h1>
                    <p style="margin-top:3px; color:#6b7280; font-size:13px;">
                        Gestión de tu negocio
                    </p>
                </div>

                <div
                    style="
            font-size:13px;
            color:#374151;
            background:#f9fafb;
            padding:8px 12px;
            border-radius:8px;
            border:1px solid #e5e7eb;
        ">
                    <i class="fas fa-store" style="color:#c9a227;"></i> Mi negocio
                </div>
            </div>

            <!-- TOAST -->
            @if (session('success'))
                <div id="toast"
                    style="
            background:#16a34a;
            color:white;
            padding:10px 14px;
            border-radius:8px;
            font-size:13px;
            display:flex;
            align-items:center;
            gap:8px;
            max-width:320px;
        ">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            <!-- GRID -->
            <div
                style="
        display:grid;
        grid-template-columns: 1fr 1fr;
        gap:20px;
        flex:1;
    ">

                <!-- CATEGORÍA -->
                <div
                    style="
            background:white;
            border-radius:14px;
            padding:20px;
            border:1px solid #e5e7eb;
            display:flex;
            flex-direction:column;
            justify-content:space-between;
        ">

                    <div>
                        <div
                            style="
                    display:flex;
                    justify-content:space-between;
                    align-items:center;
                    margin-bottom:15px;
                ">
                            <h3 style="margin:0; font-size:16px; color:#111827;">
                                Categorías
                            </h3>

                            <div
                                style="
                        width:34px;
                        height:34px;
                        background:#f9fafb;
                        border-radius:8px;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        border:1px solid #eee;
                    ">
                                <i class="fas fa-folder" style="color:#c9a227; font-size:14px;"></i>
                            </div>
                        </div>

                        <p style="color:#6b7280; font-size:13px; margin-bottom:15px;">
                            Organiza tu catálogo
                        </p>

                        <form method="POST" action="/business/category"
                            style="display:flex; flex-direction:column; gap:10px;">
                            @csrf

                            <input type="text" name="category" placeholder="Nombre de la categoría"
                                style="
                            padding:10px;
                            border-radius:8px;
                            border:1px solid #d1d5db;
                            font-size:13px;
                            background:#fafafa;
                        "
                                required>

                            <button type="submit"
                                style="
                        padding:10px;
                        border-radius:8px;
                        border:none;
                        background:#c9a227;
                        color:white;
                        font-weight:600;
                        font-size:13px;
                    ">
                                Crear
                            </button>

                        </form>
                    </div>

                </div>

                <!-- PRODUCTO -->
                <div
                    style="
            background:white;
            border-radius:14px;
            padding:20px;
            border:1px solid #e5e7eb;
            display:flex;
            flex-direction:column;
            justify-content:space-between;
        ">

                    <div>
                        <div
                            style="
                    display:flex;
                    justify-content:space-between;
                    align-items:center;
                    margin-bottom:15px;
                ">
                            <h3 style="margin:0; font-size:16px; color:#111827;">
                                Productos
                            </h3>

                            <div
                                style="
                        width:34px;
                        height:34px;
                        background:#f9fafb;
                        border-radius:8px;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        border:1px solid #eee;
                    ">
                                <i class="fas fa-box" style="color:#c9a227; font-size:14px;"></i>
                            </div>
                        </div>

                        <p style="color:#6b7280; font-size:13px; margin-bottom:15px;">
                            Añade productos
                        </p>

                        <form method="POST" action="/business/product"
                            style="display:flex; flex-direction:column; gap:10px;">
                            @csrf

                            <input type="text" name="name" placeholder="Nombre" required
                                style="padding:10px; border-radius:8px; border:1px solid #d1d5db; background:#fafafa; font-size:13px;">

                            <input type="number" name="price" placeholder="Precio" step="0.01" required
                                style="padding:10px; border-radius:8px; border:1px solid #d1d5db; background:#fafafa; font-size:13px;">

                            <select name="category" required
                                style="padding:10px; border-radius:8px; border:1px solid #d1d5db; background:#fafafa; font-size:13px;">
                                <option value="" disabled selected>Categoría</option>
                                @foreach (auth()->user()->categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>

                            <textarea name="description" rows="2" placeholder="Descripción" required
                                style="padding:10px; border-radius:8px; border:1px solid #d1d5db; background:#fafafa; font-size:13px;"></textarea>

                            <button type="submit"
                                style="
                        padding:10px;
                        border-radius:8px;
                        border:none;
                        background:#c9a227;
                        color:white;
                        font-weight:600;
                        font-size:13px;
                    ">
                                Agregar
                            </button>

                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>
        setTimeout(() => {
            const toast = document.getElementById('toast');
            if (toast) {
                toast.style.transition = "0.5s";
                toast.style.opacity = "0";
                toast.style.transform = "translateX(50px)";
                setTimeout(() => toast.remove(), 500);
            }
        }, 3000);
    </script>

</body>

</html>
