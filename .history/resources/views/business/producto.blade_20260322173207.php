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
            height: 100vh;
            overflow-y: auto;
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
            margin: 0;
            color: #6b7280;
        }

        .header-box {
            background: #f9fafb;
            padding: 8px 14px;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
        }

        /* GRID */
        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .box {
            background: white;
            border-radius: 14px;
            padding: 20px;
            border: 1px solid #e5e7eb;
        }

        .box-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .icon-box {
            width: 36px;
            height: 36px;
            background: #f9fafb;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 10px;
        }

        input,
        select,
        textarea {
            padding: 13px;
            border-radius: 10px;
            border: 1px solid #d1d5db;
        }

        .btn-gold {
            background: #c9a227;
            color: white;
            border: none;
            padding: 13px;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
        }

        /* TABLAS */
        .table-box {
            background: white;
            border-radius: 14px;
            padding: 20px;
            border: 1px solid #e5e7eb;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }

        th {
            background: #f9fafb;
            color: #6b7280;
        }

        tr:hover {
            background: #fef9e7;
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

            <button class="logout-btn">Cerrar sesión</button>
        </div>

        <!-- MAIN -->
        <div class="main">

            <!-- HEADER -->
            <div class="header">
                <div>
                    <h1>Panel de Control</h1>
                    <p>Gestión profesional de tu negocio</p>
                </div>

                <div class="header-box">
                    <i class="fas fa-store" style="color:#c9a227;"></i> Mi negocio
                </div>
            </div>

            <!-- GRID -->
            <div class="grid">

                <!-- CATEGORÍA -->
                <div class="box">
                    <h3>Categorías</h3>

                    <form method="POST" action="/business/category">
                        @csrf
                        <input type="text" name="category" placeholder="Nombre categoría">
                        <button class="btn-gold">Crear Categoría</button>
                    </form>
                </div>

                <!-- PRODUCTO -->
                <div class="box">
                    <h3>Productos</h3>

                    <form method="POST" action="/business/product">
                        @csrf
                        <input type="text" name="name" placeholder="Producto">
                        <input type="number" name="price" placeholder="Precio">

                        <select name="category">
                            @foreach (auth()->user()->categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>

                        <textarea name="description" placeholder="Descripción"></textarea>

                        <button class="btn-gold">Agregar Producto</button>
                    </form>
                </div>

            </div>

            <!-- TABLA CATEGORÍAS -->
            <div class="table-box">
                <h3>Categorías</h3>

                <table>
                    <tbody id="tabla-categorias">
                        @foreach (auth()->user()->categories as $i => $cat)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $cat->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <button class="btn-gold" onclick="verMasCategorias()">Ver más categorías</button>
            </div>

            <!-- TABLA PRODUCTOS -->
            <div class="table-box">
                <h3>Productos</h3>

                <table>
                    <tbody id="tabla-productos">
                        @foreach (auth()->user()->products as $i => $prod)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $prod->name }}</td>
                                <td>${{ $prod->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <button class="btn-gold" onclick="verMasProductos()">Ver más productos</button>
            </div>

        </div>
    </div>

    <script>
        let catMostradas = 2;
        let prodMostrados = 10;

        function ocultar() {
            document.querySelectorAll("#tabla-categorias tr").forEach((r, i) => {
                r.style.display = i < catMostradas ? "" : "none";
            });

            document.querySelectorAll("#tabla-productos tr").forEach((r, i) => {
                r.style.display = i < prodMostrados ? "" : "none";
            });
        }

        function verMasCategorias() {
            catMostradas += 2;
            ocultar();
        }

        function verMasProductos() {
            prodMostrados += 10;
            ocultar();
        }

        document.addEventListener("DOMContentLoaded", ocultar);
    </script>

</body>

</html>
