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
    padding: 22px 28px;
    display: flex;
    flex-direction: column;
    gap: 18px;
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
        padding:16px 20px;
        border-radius:14px;
        border:1px solid #e5e7eb;
    ">
                <div>
                    <h1 style="margin:0; font-size:26px; font-weight:600; color:#111827;">
                        Panel de Control
                    </h1>
                    <p style="margin-top:3px; color:#6b7280; font-size:15px;">
                        Gestión profesional de tu negocio
                    </p>
                </div>

                <div
                    style="
            font-size:15px;
            color:#374151;
            background:#f9fafb;
            padding:8px 14px;
            border-radius:10px;
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
            padding:12px 16px;
            border-radius:10px;
            font-size:15px;
            display:flex;
            align-items:center;
            gap:10px;
            max-width:360px;
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
        gap:18px;
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
                    margin-bottom:14px;
                ">
                            <h3 style="margin:0; font-size:20px; color:#111827; font-weight:600;">
                                Categorías
                            </h3>

                            <div
                                style="
                        width:36px;
                        height:36px;
                        background:#f9fafb;
                        border-radius:10px;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        border:1px solid #eee;
                    ">
                                <i class="fas fa-folder" style="color:#c9a227; font-size:16px;"></i>
                            </div>
                        </div>

                        <p style="color:#6b7280; font-size:15px; margin-bottom:14px;">
                            Organiza tu catálogo
                        </p>

                        <form method="POST" action="/business/category"
                            style="display:flex; flex-direction:column; gap:10px;">
                            @csrf

                            <input type="text" name="category" placeholder="Nombre de la categoría"
                                style="
                            padding:13px;
                            border-radius:10px;
                            border:1px solid #d1d5db;
                            font-size:15px;
                            background:#fafafa;
                        "
                                required>

                            <button type="submit"
                                style="
                        padding:13px;
                        border-radius:10px;
                        margin-top:30px;
                        border:none;
                        background:#c9a227;
                        color:white;
                        font-weight:600;
                        font-size:15px;
                    ">
                                Crear Categoría
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
                    margin-bottom:14px;
                ">
                            <h3 style="margin:0; font-size:20px; color:#111827; font-weight:600;">
                                Productos
                            </h3>

                            <div
                                style="
                        width:36px;
                        height:36px;
                        background:#f9fafb;
                        border-radius:10px;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        border:1px solid #eee;
                    ">
                                <i class="fas fa-box" style="color:#c9a227; font-size:16px;"></i>
                            </div>
                        </div>

                        <p style="color:#6b7280; font-size:15px; margin-bottom:14px;">
                            Añade productos
                        </p>

                        <form method="POST" action="/business/product"
                            style="display:flex; flex-direction:column; gap:10px;">
                            @csrf

                            <input type="text" name="name" placeholder="Nombre del producto" required
                                style="padding:13px; border-radius:10px; border:1px solid #d1d5db; background:#fafafa; font-size:15px;">

                            <input type="number" name="price" placeholder="Precio" step="0.01" required
                                style="padding:13px; border-radius:10px; border:1px solid #d1d5db; background:#fafafa; font-size:15px;">

                            <select name="category" required
                                style="padding:13px; border-radius:10px; border:1px solid #d1d5db; background:#fafafa; font-size:15px;">
                                <option value="" disabled selected>Seleccionar categoría</option>
                                @foreach (auth()->user()->categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>

                            <textarea name="description" rows="2" placeholder="Descripción del producto" required
                                style="padding:13px; border-radius:10px; border:1px solid #d1d5db; background:#fafafa; font-size:15px;"></textarea>

                            <button type="submit"
                                style="
                        padding:13px;
                        border-radius:10px;
                        border:none;
                        margin-top:20px;
                        background:#c9a227;
                        color:white;
                        font-weight:600;
                        font-size:15px;
                    ">
                                Agregar Producto
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
