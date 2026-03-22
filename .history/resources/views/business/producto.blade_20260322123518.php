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

            @if (session('success'))
                <div id="toast"
                    style="
        position: fixed;
        top: 20px;
        right: 20px;
        background: #16a34a;
        color: white;
        padding: 15px 20px;
        border-radius: 10px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 500;
        z-index: 999;
        animation: slideIn 0.5s ease;
    ">
                    <i class="fas fa-check-circle" style="font-size: 20px;"></i>
                    {{ session('success') }}
                </div>
            @endif

            <div class="cards-row"
                style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; align-items: stretch;">

                <!-- AGREGAR CATEGORÍA -->
                <div class="card"
                    style="display: flex; flex-direction: column; justify-content: center; height: 100%;">
                    <h3 style="display: flex; align-items: center; gap: 10px;">
                        <i class="fas fa-folder-plus" style="color:#c9a227;"></i> Agregar Categoría
                    </h3>
                    <p style="color: #555; margin-bottom: 15px;">Crea nuevas categorías para tus productos y organiza tu
                        negocio.</p>
                    <form method="POST" action="/business/category"
                        style="display: flex; flex-direction: column; gap: 15px;">

                        @csrf

                        <input type="text" name="category" placeholder="Nombre de la categoría"
                            style="padding: 12px; border-radius: 8px; border: 1px solid #ddd; font-size: 16px;"
                            required>

                        <button type="submit"
                            style="padding: 12px; border-radius: 8px; border: none; background: #c9a227; color: white; font-weight: 600; cursor: pointer; transition: 0.25s;">
                            Crear Categoría
                        </button>

                    </form>
                </div>

                <!-- AGREGAR PRODUCTO -->
                <div class="card">
                    <h3 style="display: flex; align-items: center; gap: 10px;">
                        <i class="fas fa-box-open" style="color:#c9a227;"></i> Agregar Producto
                    </h3>
                    <p style="color: #555; margin-bottom: 15px;">Agrega nuevos productos con todos los detalles para
                        mostrarlos en tu tienda.</p>
                    <form method="POST" action="/business/product"
                        style="display: flex; flex-direction: column; gap: 15px;">

                        @csrf

                        <input type="text" name="name" placeholder="Nombre del producto" required
                            style="padding: 12px; border-radius: 8px; border: 1px solid #ddd; font-size: 16px;">

                        <input type="number" name="price" placeholder="Precio" step="0.01" required
                            style="padding: 12px; border-radius: 8px; border: 1px solid #ddd; font-size: 16px;">

                        <select name="category" required
                            style="padding: 12px; border-radius: 8px; border: 1px solid #ddd; font-size: 16px;">

                            <option value="" disabled selected>Seleccionar categoría</option>

                            @foreach (auth()->user()->categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach

                        </select>

                        <textarea name="description" placeholder="Descripción del producto" rows="4" required
                            style="padding: 12px; border-radius: 8px; border: 1px solid #ddd; font-size: 16px;"></textarea>

                        <button type="submit"
                            style="padding: 12px; border-radius: 8px; border: none; background: #c9a227; color: white; font-weight: 600; cursor: pointer; transition: 0.25s;">
                            Agregar Producto
                        </button>

                    </form>
                </div>

            </div>

        </div>

    </div>

</body>

</html>
