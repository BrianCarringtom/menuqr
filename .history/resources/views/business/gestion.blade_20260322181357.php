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
            height: 100vh;
            overflow: hidden;
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

        /* ZONA TABLAS */
        .tables {
            display: flex;
            gap: 18px;
            flex: 1;
        }

        /* =========================
           CATEGORÍAS (SCROLL HORIZONTAL)
        ========================== */
        .categories {
            flex: 1;
            background: white;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .categories-header {
            padding: 14px;
            border-bottom: 1px solid #eee;
            font-weight: 600;
        }

        /* 🔥 SCROLL HORIZONTAL */
        .categories-wrapper {
            flex: 1;
            overflow-x: auto;
            overflow-y: hidden;
        }

        .categories-wrapper table {
            min-width: 500px;
            width: 100%;
            border-collapse: collapse;
        }

        /* =========================
           PRODUCTOS (SCROLL VERTICAL)
        ========================== */
        .products {
            flex: 2;
            background: white;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .products-header {
            padding: 14px;
            border-bottom: 1px solid #eee;
            font-weight: 600;
        }

        /* 🔥 SCROLL VERTICAL */
        .products-wrapper {
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
            font-size: 14px;
            text-align: left;
            white-space: nowrap;
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

        /* BOTONES */
        .btn {
            padding: 7px 10px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
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
            padding: 30px;
            text-align: center;
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
                    <a href="#"><i class="fas fa-chart-line"></i> Dashboard</a>
                    <a href="#"><i class="fas fa-user"></i> Perfil</a>
                    <a href="#"><i class="fas fa-file-alt"></i> Producto</a>
                    <a href="#"><i class="fas fa-boxes"></i> Gestión</a>
                </div>
            </div>

            <button class="logout-btn">Cerrar sesión</button>
        </div>

        <!-- MAIN -->
        <div class="main">

            <div class="header">
                <div>
                    <h1>Productos</h1>
                    <p>Gestión de catálogo</p>
                </div>

                <div class="header-box">
                    <i class="fas fa-box"></i> Catálogo
                </div>
            </div>

            <div class="tables">

                <!-- CATEGORÍAS (HORIZONTAL SCROLL) -->
                <div class="categories">

                    <div class="categories-header">Categorías</div>

                    <div class="categories-wrapper">

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
                                            <a class="btn btn-edit">Editar</a>
                                            <button class="btn btn-delete">Eliminar</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

                <!-- PRODUCTOS (VERTICAL SCROLL) -->
                <div class="products">

                    <div class="products-header">Productos</div>

                    <div class="products-wrapper">

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
                                            <button class="btn btn-delete">Eliminar</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>

    </div>

</body>

</html>
