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
            background: #f4f6f9;
            padding: 22px 28px;
            display: flex;
            flex-direction: column;
            gap: 18px;
            overflow: hidden;
        }

        /* HEADER */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            padding: 16px 20px;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
        }

        .header h1 {
            margin: 0;
            font-size: 26px;
            font-weight: 600;
        }

        .header p {
            margin-top: 3px;
            color: #6b7280;
        }

        .header-box {
            font-size: 15px;
            background: #f9fafb;
            padding: 8px 14px;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
        }

        /* TABLE */
        .table-container {
            background: white;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            overflow: hidden;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .table-header {
            padding: 18px 20px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-header h3 {
            margin: 0;
            font-size: 18px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 14px 16px;
            text-align: left;
            font-size: 14px;
        }

        th {
            background: #f9fafb;
            color: #6b7280;
            font-weight: 600;
        }

        tr {
            border-bottom: 1px solid #eee;
        }

        tr:hover {
            background: #fafafa;
        }

        /* BOTONES */
        .btn {
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 13px;
            border: none;
            cursor: pointer;
            font-weight: 600;
        }

        .btn-edit {
            background: #facc15;
            color: #111827;
        }

        .btn-delete {
            background: #ef4444;
            color: white;
        }

        .empty {
            text-align: center;
            padding: 40px;
            color: #9ca3af;
        }

        .table-container {
            background: white;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            overflow: hidden;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* 👇 NUEVO: área scrolleable */
        .table-wrapper {
            flex: 1;
            overflow-y: auto;
        }

        /* sticky header de tabla */
        table thead th {
            position: sticky;
            top: 0;
            background: #f9fafb;
            z-index: 2;
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

            <!-- HEADER -->
            <div class="header">
                <div>
                    <h1>Productos</h1>
                    <p>Gestiona tus productos creados</p>
                </div>

                <div class="header-box">
                    <i class="fas fa-box" style="color:#c9a227;"></i> Catálogo
                </div>
            </div>

            <!-- TABLE -->
            <div class="table-container">

                <div class="table-header">
                    <h3>Lista de productos</h3>
                </div>

                <!-- 👇 NUEVO WRAPPER -->
                <div class="table-wrapper">

                    @if (count(auth()->user()->products) > 0)

                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Categoría</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach (auth()->user()->products as $product)
                                    <tr>
                                        <td>#{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>${{ $product->price }}</td>
                                        <td>{{ $product->category->name ?? 'Sin categoría' }}</td>
                                        <td style="display:flex; gap:8px;">

                                            <a href="/business/product/edit/{{ $product->id }}" class="btn btn-edit">
                                                <i class="fas fa-pen"></i> Editar
                                            </a>

                                            <form method="POST" action="/business/product/delete/{{ $product->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-delete">
                                                    <i class="fas fa-trash"></i> Eliminar
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="empty">
                            <i class="fas fa-box-open" style="font-size:30px;"></i>
                            <p>No tienes productos registrados aún</p>
                        </div>
                    @endif

                </div>
            </div>

            <div class="table-container" style="margin-top:20px;">

                <div class="table-header">
                    <h3>Lista de categorías</h3>
                </div>

                <div class="table-wrapper">

                    @if (count(auth()->user()->categories) > 0)

                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach (auth()->user()->categories as $category)
                                    <tr>
                                        <td>#{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>

                                        <td style="display:flex; gap:8px;">

                                            <!-- EDITAR -->
                                            <a href="/business/category/edit/{{ $category->id }}" class="btn btn-edit">
                                                <i class="fas fa-pen"></i> Editar
                                            </a>

                                            <!-- ELIMINAR -->
                                            <form method="POST"
                                                action="/business/category/delete/{{ $category->id }}">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-delete">
                                                    <i class="fas fa-trash"></i> Eliminar
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="empty">
                            <i class="fas fa-folder-open" style="font-size:30px;"></i>
                            <p>No tienes categorías registradas aún</p>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>

</body>

</html>
