<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Business Dashboard</title>

    <!-- Fuentes e iconos -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        /* RESET */
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

        /* LAYOUT */
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
            cursor: pointer;
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

        .card-header {
            padding: 14px;
            font-weight: 600;
            border-bottom: 1px solid #eee;
            background: #fafafa;
        }

        .card-body {
            height: 400px;
            overflow-y: auto;
        }

        /* TABLAS */
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

        /* EMPTY STATE */
        .empty {
            padding: 40px;
            text-align: center;
            color: #9ca3af;
        }

        /* HAMBURGUESA */
        .menu-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            background: #c9a227;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-size: 18px;
            z-index: 1001;
            cursor: pointer;
        }

        /* BOTÓN CERRAR */
        .close-menu {
            display: none;
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            font-size: 22px;
            cursor: pointer;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {

            .menu-toggle {
                display: block;
            }

            .sidebar {
                position: fixed;
                top: 0;
                left: -260px;
                height: 100%;
                z-index: 1000;
                transition: 0.3s;
            }

            .sidebar.active {
                left: 0;
            }

            .close-menu {
                display: block;
            }

            .main {
                padding: 25px;
                overflow: auto;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            body {
                overflow: auto;
            }
        }

        /* OCULTAR ☰ CUANDO SE ABRE */
        .sidebar.active~.main .menu-toggle {
            display: none;
        }

        @media (max-width: 900px) {

            .main {
                overflow-y: auto;
                height: auto;
                min-height: 100vh;
                padding: 70px 15px 15px 15px;
            }

        }
    </style>
</head>

<body>

    <div class="container">

        <!-- SIDEBAR -->
        <aside class="sidebar">

            <button class="close-menu" onclick="toggleMenu()">
                <i class="fas fa-times"></i>
            </button>

            <div>
                <h2>BUSINESS</h2>

                <nav class="menu">
                    <a href="/business"><i class="fas fa-chart-line"></i> Dashboard</a>
                    <a href="/business/profile"><i class="fas fa-user"></i> Perfil</a>
                    <a href="/business/producto"><i class="fas fa-file-alt"></i> Producto-Categoria</a>
                    <a href="/business/gestion"><i class="fas fa-boxes"></i> Gestion de Producto</a>
                </nav>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>

            <button class="logout-btn"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Cerrar sesión
            </button>
        </aside>

        <!-- MAIN -->
        <main class="main">

            <button class="menu-toggle" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </button>

            <!-- HEADER -->
            <div class="header">
                <div>
                    <h1>Productos</h1>
                    <p>Gestión de catálogo</p>
                </div>
                <div>
                    <i class="fas fa-box"></i> Catálogo
                </div>
            </div>

            <!-- GRID -->
            <div class="grid">

                <!-- CATEGORÍAS -->
                <div class="card">
                    <div class="card-header">Categorías</div>

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
                                            <td style="display:flex; gap:8px; align-items:center;">

                                                <button class="btn btn-edit"
                                                    onclick="openCategoryModal({{ $category->id }}, '{{ $category->name }}')">
                                                    Editar
                                                </button>

                                                <form action="{{ route('categories.destroy', $category->id) }}"
                                                    method="POST" onsubmit="return confirm('¿Eliminar categoría?')">
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
                            <div class="empty">No hay categorías</div>
                        @endif
                    </div>
                </div>

                <!-- PRODUCTOS -->
                <div class="card">
                    <div class="card-header">Productos</div>

                    <div class="card-body">
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
                                            <td style="display:flex; gap:8px; align-items:center;">

                                                <button class="btn btn-edit"
                                                    onclick="openProductModal(
                                                        {{ $product->id }},
                                                        '{{ $product->name }}',
                                                        {{ $product->price }},
                                                        '{{ $product->description }}',
                                                        {{ $product->category_id ?? 'null' }}
                                                    )">
                                                    Editar
                                                </button>

                                                <form action="{{ route('products.destroy', $product->id) }}"
                                                    method="POST" onsubmit="return confirm('¿Eliminar producto?')">
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
                            <div class="empty">No hay productos</div>
                        @endif
                    </div>
                </div>

            </div>
        </main>
    </div>

    <!-- MODAL -->
    <div id="editModal"
        style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.4); justify-content:center; align-items:center; z-index:999;">

        <div style="background:white; padding:20px; border-radius:12px; width:400px;">
            <h3 id="modalTitle">Editar</h3>

            <form id="editForm" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" id="editId">

                <div style="margin-top:10px;">
                    <label>Nombre</label>
                    <input type="text" name="name" id="editName"
                        style="width:100%; padding:8px; border:1px solid #ccc; border-radius:8px;">
                </div>

                <div id="priceField" style="margin-top:10px; display:none;">
                    <label>Precio</label>
                    <input type="number" name="price" id="editPrice"
                        style="width:100%; padding:8px; border:1px solid #ccc; border-radius:8px;">
                </div>

                <div id="descField" style="margin-top:10px; display:none;">
                    <label>Descripción</label>
                    <textarea name="description" id="editDescription"
                        style="width:100%; padding:8px; border:1px solid #ccc; border-radius:8px;"></textarea>
                </div>

                <div id="categoryField" style="margin-top:10px; display:none;">
                    <label>Categoría</label>
                    <select name="category" id="editCategory"
                        style="width:100%; padding:8px; border:1px solid #ccc; border-radius:8px;">
                        @foreach (auth()->user()->categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div style="margin-top:15px; display:flex; justify-content:flex-end; gap:10px;">
                    <button type="button" onclick="closeModal()">Cancelar</button>
                    <button type="submit" class="btn btn-edit">Guardar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script>
        function openCategoryModal(id, name) {
            document.getElementById('editModal').style.display = 'flex';

            document.getElementById('modalTitle').innerText = 'Editar Categoría';
            document.getElementById('editForm').action = '/business/category/' + id;

            document.getElementById('editName').value = name;

            document.getElementById('priceField').style.display = 'none';
            document.getElementById('descField').style.display = 'none';
            document.getElementById('categoryField').style.display = 'none';
        }

        function openProductModal(id, name, price, description, categoryId) {
            document.getElementById('editModal').style.display = 'flex';

            document.getElementById('modalTitle').innerText = 'Editar Producto';
            document.getElementById('editForm').action = '/business/product/' + id;

            document.getElementById('editName').value = name;
            document.getElementById('editPrice').value = price;
            document.getElementById('editDescription').value = description;
            document.getElementById('editCategory').value = categoryId;

            document.getElementById('priceField').style.display = 'block';
            document.getElementById('descField').style.display = 'block';
            document.getElementById('categoryField').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('editModal').style.display = 'none';
        }
    </script>

    <script>
        function toggleMenu() {
            const sidebar = document.querySelector('.sidebar');
            const btn = document.querySelector('.menu-toggle');

            sidebar.classList.toggle('active');

            if (sidebar.classList.contains('active')) {
                btn.style.display = 'none';
            } else {
                btn.style.display = 'block';
            }
        }
    </script>

</body>

</html>
