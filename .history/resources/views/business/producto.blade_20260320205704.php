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

            <!-- AGREGAR CATEGORÍA -->
            <div class="cards-row">
                <div class="card">
                    <h3>Agregar Categoría</h3>
                    <form id="category-form" style="display: flex; flex-direction: column; gap: 15px;">
                        <input type="text" name="category" placeholder="Nombre de la categoría"
                            style="padding: 12px; border-radius: 8px; border: 1px solid #ddd; font-size: 16px;"
                            required>
                        <button type="submit"
                            style="padding: 12px; border-radius: 8px; border: none; background: #c9a227; color: white; font-weight: 600; cursor: pointer; transition: 0.25s;">
                            Crear Categoría
                        </button>
                    </form>
                </div>
            </div>

            <!-- AGREGAR PRODUCTO -->
            <div class="cards-row">
                <div class="card" style="width: 100%;">
                    <h3>Agregar Producto</h3>
                    <form id="product-form" style="display: flex; flex-direction: column; gap: 15px;">
                        <input type="text" name="name" placeholder="Nombre del producto"
                            style="padding: 12px; border-radius: 8px; border: 1px solid #ddd; font-size: 16px;"
                            required>

                        <input type="number" name="price" placeholder="Precio" step="0.01"
                            style="padding: 12px; border-radius: 8px; border: 1px solid #ddd; font-size: 16px;"
                            required>

                        <select name="category"
                            style="padding: 12px; border-radius: 8px; border: 1px solid #ddd; font-size: 16px;"
                            required>
                            <option value="" disabled selected>Seleccionar categoría</option>
                            <option value="panaderia">Panadería</option>
                            <option value="bebidas">Bebidas</option>
                            <option value="postres">Postres</option>
                        </select>

                        <textarea name="description" placeholder="Descripción del producto" rows="4"
                            style="padding: 12px; border-radius: 8px; border: 1px solid #ddd; font-size: 16px;" required></textarea>

                        <input type="file" name="image" accept="image/*"
                            style="padding: 8px; border-radius: 8px; border: 1px solid #ddd;" required>

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
