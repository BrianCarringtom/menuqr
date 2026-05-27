<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Dashboard</title>

    <!-- Fuentes e iconos -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        /* ================= RESET ================= */

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f4f6f9;
            color: #1f2937;
            overflow-x: hidden;
        }

        /* ================= LAYOUT ================= */

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 260px;
            background: white;
            border-right: 1px solid #ececec;
            padding: 28px 22px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: 0.35s ease;
            z-index: 1000;
        }

        .sidebar h2 {
            text-align: center;
            color: #c9a227;
            font-weight: 700;
            letter-spacing: 3px;
            font-size: 24px;
        }

        .menu {
            margin-top: 45px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 15px 16px;
            margin-bottom: 12px;
            border-radius: 14px;
            text-decoration: none;
            color: #4b5563;
            font-size: 15px;
            font-weight: 500;
            transition: 0.25s ease;
        }

        .menu a:hover {
            background: #fff7df;
            color: #c9a227;
            transform: translateX(3px);
        }

        .logout-btn {
            width: 100%;
            background: #c9a227;
            border: none;
            padding: 15px;
            border-radius: 14px;
            color: white;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .logout-btn:hover {
            background: #aa861d;
        }

        /* ================= MAIN ================= */

        .main {
            flex: 1;
            padding: 28px;
            display: flex;
            flex-direction: column;
            gap: 22px;
            min-height: 100vh;
        }

        /* ================= HEADER ================= */

        .header {
            background: white;
            padding: 20px 24px;
            border-radius: 22px;
            border: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.04);
        }

        .header h1 {
            font-size: 32px;
            font-weight: 700;
            color: #111827;
        }

        .header p {
            margin-top: 5px;
            color: #6b7280;
            font-size: 15px;
        }

        .header div:last-child {
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            padding: 12px 18px;
            border-radius: 14px;
            font-size: 15px;
            color: #374151;
            white-space: nowrap;
        }

        /* ================= GRID ================= */

        .grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 22px;
        }

        /* ================= CARD ================= */

        .card {
            background: white;
            border-radius: 22px;
            border: 1px solid #e5e7eb;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.04);
        }

        .card-header {
            padding: 18px 22px;
            font-weight: 700;
            font-size: 18px;
            border-bottom: 1px solid #eee;
            background: #fafafa;
        }

        .card-body {
            overflow: auto;
            max-height: 520px;
        }

        /* ================= TABLAS ================= */

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }

        th,
        td {
            padding: 15px;
            font-size: 14px;
            text-align: left;
            vertical-align: middle;
        }

        th {
            background: #f9fafb;
            position: sticky;
            top: 0;
            z-index: 2;
            font-weight: 600;
            color: #374151;
        }

        tr {
            border-bottom: 1px solid #eee;
        }

        tr:hover {
            background: #fafafa;
        }

        /* ================= BOTONES ================= */

        .btn {
            padding: 9px 13px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: 0.25s ease;
        }

        .btn-edit {
            background: #facc15;
            color: #111827;
        }

        .btn-edit:hover {
            background: #eab308;
        }

        .btn-delete {
            background: #ef4444;
            color: white;
        }

        .btn-delete:hover {
            background: #dc2626;
        }

        /* ================= EMPTY ================= */

        .empty {
            padding: 50px 20px;
            text-align: center;
            color: #9ca3af;
            font-size: 15px;
        }

        /* ================= HAMBURGUESA ================= */

        .menu-toggle {
            display: none;
            position: fixed;
            top: 18px;
            left: 18px;
            width: 52px;
            height: 52px;
            border: none;
            border-radius: 14px;
            background: #c9a227;
            color: white;
            font-size: 20px;
            cursor: pointer;
            z-index: 1100;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.18);
        }

        /* ================= CERRAR ================= */

        .close-menu {
            display: none;
            position: absolute;
            top: 18px;
            right: 18px;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #444;
        }

        /* ================= OVERLAY ================= */

        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
            backdrop-filter: blur(2px);
            opacity: 0;
            visibility: hidden;
            transition: 0.3s ease;
            z-index: 999;
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* ================= MODAL ================= */

        #editModal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
            backdrop-filter: blur(4px);
            justify-content: center;
            align-items: center;
            z-index: 2000;
            padding: 20px;
        }

        .modal-box {
            background: white;
            width: 100%;
            max-width: 460px;
            border-radius: 24px;
            padding: 28px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
            animation: modalIn 0.25s ease;
        }

        @keyframes modalIn {
            from {
                opacity: 0;
                transform: scale(0.92);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .modal-box h3 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #111827;
        }

        .modal-group {
            margin-bottom: 16px;
        }

        .modal-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
        }

        .modal-group input,
        .modal-group textarea,
        .modal-group select {
            width: 100%;
            padding: 14px;
            border-radius: 14px;
            border: 1px solid #d1d5db;
            background: #fafafa;
            outline: none;
            transition: 0.25s ease;
            font-size: 14px;
        }

        .modal-group input:focus,
        .modal-group textarea:focus,
        .modal-group select:focus {
            border-color: #c9a227;
            box-shadow: 0 0 0 4px rgba(201, 162, 39, 0.12);
        }

        .modal-actions {
            margin-top: 24px;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .btn-cancel {
            background: #f3f4f6;
            border: none;
            padding: 12px 18px;
            border-radius: 12px;
            cursor: pointer;
            font-weight: 600;
        }

        .btn-save {
            background: #c9a227;
            color: white;
            border: none;
            padding: 12px 18px;
            border-radius: 12px;
            cursor: pointer;
            font-weight: 600;
        }

        .btn-save:hover {
            background: #aa861d;
        }

        /* ================= TABLET ================= */

        @media (max-width: 992px) {

            .menu-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .sidebar {
                position: fixed;
                top: 0;
                left: -280px;
                width: 260px;
                height: 100%;
                box-shadow: 10px 0 40px rgba(0, 0, 0, 0.12);
            }

            .sidebar.active {
                left: 0;
            }

            .close-menu {
                display: block;
            }

            .main {
                padding: 90px 18px 24px;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .header div:last-child {
                width: 100%;
                text-align: center;
            }
        }

        /* ================= MÓVIL ================= */

        @media (max-width: 600px) {

            .main {
                padding: 85px 12px 20px;
                gap: 18px;
            }

            .header {
                padding: 20px 16px;
                border-radius: 20px;
            }

            .header h1 {
                font-size: 26px;
            }

            .header p {
                font-size: 14px;
            }

            .card {
                border-radius: 20px;
            }

            .card-header {
                font-size: 17px;
                padding: 16px 18px;
            }

            .card-body {
                max-height: unset;
            }

            table {
                min-width: 650px;
            }

            th,
            td {
                padding: 13px;
                font-size: 13px;
            }

            .btn {
                font-size: 11px;
                padding: 8px 12px;
            }

            .menu a {
                font-size: 14px;
                padding: 14px;
            }

            .logout-btn {
                font-size: 14px;
                padding: 14px;
            }

            .modal-box {
                padding: 22px;
                border-radius: 20px;
            }

            .modal-box h3 {
                font-size: 22px;
            }

            .modal-actions {
                flex-direction: column;
            }

            .btn-cancel,
            .btn-save {
                width: 100%;
            }

            .menu-toggle {
                width: 48px;
                height: 48px;
                font-size: 18px;
            }
        }
    </style>
</head>

<body>

    <!-- OVERLAY -->
    <div class="overlay" onclick="toggleMenu()"></div>

    <div class="container">

        <!-- SIDEBAR -->
        <aside class="sidebar">

            <button class="close-menu" onclick="toggleMenu()">
                <i class="fas fa-times"></i>
            </button>

            <div>

                <h2>BUSINESS</h2>

                <nav class="menu">

                    <a href="/business">
                        <i class="fas fa-chart-line"></i>
                        Dashboard
                    </a>

                    <a href="/business/profile">
                        <i class="fas fa-user"></i>
                        Perfil
                    </a>

                    <a href="/business/producto">
                        <i class="fas fa-file-alt"></i>
                        Producto-Categoria
                    </a>

                    <a href="/business/gestion">
                        <i class="fas fa-boxes"></i>
                        Gestion de Producto
                    </a>

                </nav>

            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>

            <button class="logout-btn"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                <i class="fas fa-sign-out-alt"></i>
                Cerrar sesión

            </button>

        </aside>

        <!-- MAIN -->
        <main class="main">

            <!-- BOTÓN -->
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
                    <i class="fas fa-box" style="color:#c9a227;"></i>
                    Catálogo
                </div>

            </div>

            <!-- GRID -->
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

                                            <td style="display:flex; gap:8px; align-items:center;">

                                                <button class="btn btn-edit"
                                                    onclick="openCategoryModal({{ $category->id }}, '{{ $category->name }}')">

                                                    Editar

                                                </button>

                                                <form action="{{ route('categories.destroy', $category->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('¿Eliminar categoría?')">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="btn btn-delete">
                                                        Eliminar
                                                    </button>

                                                </form>

                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        @else

                            <div class="empty">
                                No hay categorías
                            </div>

                        @endif

                    </div>

                </div>

                <!-- PRODUCTOS -->
                <div class="card">

                    <div class="card-header">
                        Productos
                    </div>

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

                                            <td>
                                                {{ $product->category->name ?? 'Sin categoría' }}
                                            </td>

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
                                                    method="POST"
                                                    onsubmit="return confirm('¿Eliminar producto?')">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="btn btn-delete">
                                                        Eliminar
                                                    </button>

                                                </form>

                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        @else

                            <div class="empty">
                                No hay productos
                            </div>

                        @endif

                    </div>

                </div>

            </div>

        </main>

    </div>

    <!-- MODAL -->
    <div id="editModal">

        <div class="modal-box">

            <h3 id="modalTitle">
                Editar
            </h3>

            <form id="editForm" method="POST">

                @csrf
                @method('PUT')

                <input type="hidden" id="editId">

                <div class="modal-group">

                    <label>
                        Nombre
                    </label>

                    <input type="text" name="name" id="editName">

                </div>

                <div id="priceField" class="modal-group" style="display:none;">

                    <label>
                        Precio
                    </label>

                    <input type="number" name="price" id="editPrice">

                </div>

                <div id="descField" class="modal-group" style="display:none;">

                    <label>
                        Descripción
                    </label>

                    <textarea name="description" id="editDescription"></textarea>

                </div>

                <div id="categoryField" class="modal-group" style="display:none;">

                    <label>
                        Categoría
                    </label>

                    <select name="category" id="editCategory">

                        @foreach (auth()->user()->categories as $cat)

                            <option value="{{ $cat->id }}">
                                {{ $cat->name }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="modal-actions">

                    <button type="button" class="btn-cancel" onclick="closeModal()">
                        Cancelar
                    </button>

                    <button type="submit" class="btn-save">
                        Guardar
                    </button>

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

        // CERRAR MODAL AL DAR CLICK AFUERA
        window.addEventListener('click', function(e) {

            const modal = document.getElementById('editModal');

            if (e.target === modal) {
                closeModal();
            }
        });
    </script>

    <script>
        function toggleMenu() {

            const sidebar = document.querySelector('.sidebar');
            const overlay = document.querySelector('.overlay');
            const menuBtn = document.querySelector('.menu-toggle');

            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');

            if (sidebar.classList.contains('active')) {

                menuBtn.style.display = 'none';
                document.body.style.overflow = 'hidden';

            } else {

                menuBtn.style.display = 'flex';
                document.body.style.overflow = 'auto';
            }
        }

        // RESETEAR MENÚ
        window.addEventListener('resize', () => {

            const sidebar = document.querySelector('.sidebar');
            const overlay = document.querySelector('.overlay');
            const menuBtn = document.querySelector('.menu-toggle');

            if (window.innerWidth > 992) {

                sidebar.classList.remove('active');
                overlay.classList.remove('active');
                menuBtn.style.display = 'none';
                document.body.style.overflow = 'auto';

            } else {

                menuBtn.style.display = 'flex';
            }
        });
    </script>

</body>

</html>