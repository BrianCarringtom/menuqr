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
            height: 100vh;
            overflow: hidden;
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
        }

        .header p {
            margin: 0;
            color: #6b7280;
        }

        .header-box {
            background: #f9fafb;
            padding: 8px 14px;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
        }

        /* CONTENEDOR FLEX TABLAS */
        .tables {
            display: flex;
            gap: 18px;
            flex: 1;
        }

        /* CATEGORÍAS (más pequeña) */
        .categories {
            flex: 1;
            display: flex;
            flex-direction: column;
            background: white;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            overflow: hidden;
        }

        /* PRODUCTOS (más grande) */
        .products {
            flex: 2;
            display: flex;
            flex-direction: column;
            background: white;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            overflow: hidden;
        }

        .table-header {
            padding: 16px;
            border-bottom: 1px solid #eee;
            font-weight: 600;
        }

        /* SCROLL INTERNO */
        .table-wrapper {
            flex: 1;
            overflow-y: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px 14px;
            text-align: left;
            font-size: 14px;
        }

        th {
            background: #f9fafb;
            position: sticky;
            top: 0;
        }

        tr {
            border-bottom: 1px solid #eee;
        }

        tr:hover {
            background: #fafafa;
        }

        .btn {
            padding: 7px 10px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            text-decoration: none;
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
            padding: 30px;
            color: #9ca3af;
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
                    <a href="/business/gestion"><i class="fas fa-boxes"></i> Gestión</a>
                </div>
            </div>

            <button class="logout-btn">Cerrar sesión</button>
        </div>

        <!-- MAIN -->
        <div class="main">

            <div class="header">
                <div>
                    <h1>Productos</h1>
                    <p>Gestiona tu catálogo</p>
                </div>

                <div class="header-box">
                    <i class="fas fa-box"></i> Catálogo
                </div>
            </div>

            <!-- TABLAS -->
            <div class="tables">

                <!-- CATEGORÍAS -->
                <div class="categories">

                    <div class="table-header">Categorías</div>

                    <div class="table-wrapper">
                        @if (count(auth()->user()->categories) > 0)
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (auth()->user()->categories as $category)
                                        <tr>
                                            <td>#{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="empty">Sin categorías</div>
                        @endif
                    </div>

                </div>

                <!-- PRODUCTOS (GRANDE) -->
                <div class="products">

                    <div class="table-header">Productos</div>

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
                                                <a class="btn btn-edit">Editar</a>
                                                <form method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-delete">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="empty">Sin productos</div>
                        @endif
                    </div>

                </div>

            </div>

        </div>
    </div>

</body>

</html>
