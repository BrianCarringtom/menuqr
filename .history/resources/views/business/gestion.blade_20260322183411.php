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
            background: #f4f6f9;
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
            font-weight: 700;
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
            border-radius: 10px;
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
            border-radius: 10px;
            color: white;
            font-weight: 600;
        }

        .logout-btn:hover {
            background: #a8831f;
        }

        /* MAIN */
        .main {
            flex: 1;
            padding: 22px;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        /* HEADER */
        .header {
            background: white;
            padding: 6px 12px;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* GRID */
        .grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 18px;
        }

        /* CARD */
        .card {
            background: white;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        /* HEADER CARD */
        .card-header {
            padding: 14px;
            font-weight: 600;
            border-bottom: 1px solid #eee;
            background: #fafafa;
        }

        /* 🔥 SCROLL FIJO (CLAVE) */
        .card-body {
            height: 400px;
            /* 👈 aquí se controla (8 filas aprox) */
            overflow-y: auto;
        }

        /* TABLA */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px 14px;
            font-size: 14px;
            text-align: left;
        }

        th {
            background: #f9fafb;
            position: sticky;
            top: 0;
            z-index: 2;
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

        /* EMPTY */
        .empty {
            padding: 40px;
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
                    <a href="/business"><i class="fas fa-chart-line"></i> Dashboard</a>
                    <a href="/business/profile"><i class="fas fa-user"></i> Perfil</a>
                    <a href="/business/producto"><i class="fas fa-file-alt"></i> Producto-Categoria</a>
                    <a href="/business/gestion"><i class="fas fa-boxes"></i> Gestion de Producto</a>
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

            <div class="header">
                <div>
                    <h1>Productos</h1>
                    <p>Gestión de catálogo</p>
                </div>

                <div>
                    <i class="fas fa-box"></i> Catálogo
                </div>
            </div>

            <div class="grid">

                <!-- CATEGORÍAS -->
                <div class="card">

                    <div class="card-header">
                        Categorías
                    </div>

                    <div class="card-body">

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
                                                <a class="btn btn-edit">Editar</a>
                                                <button class="btn btn-delete">Eliminar</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="empty">No hay categorías</div>
                        @endif

                    </div>
                </div>

                <!-- PRODUCTOS -->
                <div class="card">
                    <div class="card-header">Productos</div>

                    <div class="card-body">

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
                                @forelse (auth()->user()->products as $product)
                                    <tr>
                                        <td>#{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>${{ $product->price }}</td>
                                        <td>{{ $product->category->name ?? 'Sin categoría' }}</td>
                                        <td>
                                            <button class="btn btn-edit">Editar</button>
                                            <button class="btn btn-delete">Eliminar</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" style="text-align:center; padding: 20px; color:#888;">
                                            No hay productos
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>

                    </div>
                </div>

            </div>

        </div>

    </div>

</body>

</html>
