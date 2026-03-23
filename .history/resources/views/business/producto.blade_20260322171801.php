<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Business Dashboard</title>

    <!-- Fuente -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #f5f7fb;
            color: #111827;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            background: #ffffff;
            border-right: 1px solid #e5e7eb;
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar h2 {
            text-align: center;
            font-weight: 600;
            letter-spacing: 3px;
            color: #c9a227;
        }

        .menu {
            margin-top: 40px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            margin-bottom: 10px;
            border-radius: 10px;
            text-decoration: none;
            color: #4b5563;
            font-weight: 500;
            transition: 0.2s;
        }

        .menu a:hover {
            background: #f9fafb;
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
            background: #b8911f;
        }

        /* MAIN */
        .main {
            flex: 1;
            padding: 28px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* HEADER */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            margin: 0;
            font-size: 26px;
            font-weight: 600;
        }

        .header p {
            margin: 4px 0 0;
            color: #6b7280;
        }

        .header-box {
            background: white;
            border: 1px solid #e5e7eb;
            padding: 8px 14px;
            border-radius: 12px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* GRID */
        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            flex: 1;
        }

        /* CARDS */
        .box {
            background: white;
            border-radius: 18px;
            padding: 24px;
            border: 1px solid #eef0f3;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
        }

        .box-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .box-header h3 {
            margin: 0;
            font-size: 20px;
        }

        .icon-box {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: #f9fafb;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* TEXT */
        .box p {
            color: #6b7280;
            margin-bottom: 16px;
        }

        /* FORM */
        form {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        input,
        select,
        textarea {
            padding: 14px;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            background: #f9fafb;
            font-size: 14px;
            transition: 0.2s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #c9a227;
            background: white;
        }

        /* BUTTON */
        .btn-gold {
            background: #c9a227;
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            padding: 14px;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-gold:hover {
            background: #b8911f;
            transform: translateY(-1px);
        }

        /* TOAST */
        #toast-overlay {
            position: fixed;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.1);
        }

        #toast {
            background: white;
            padding: 18px 28px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            border-left: 5px solid #16a34a;
            animation: fadeIn 0.3s ease;
        }

        #toast i {
            color: #16a34a;
            font-size: 20px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
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
                    <a href="/business/producto"><i class="fas fa-box"></i> Productos</a>
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
                    <h1>Panel de Control</h1>
                    <p>Gestiona tu negocio de forma profesional</p>
                </div>

                <div class="header-box">
                    <i class="fas fa-store" style="color:#c9a227;"></i>
                    Mi negocio
                </div>
            </div>

            <!-- TOAST -->
            @if (session('success'))
                <div id="toast-overlay">
                    <div id="toast">
                        <i class="fas fa-check-circle"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <!-- GRID -->
            <div class="grid">

                <!-- CATEGORÍA -->
                <div class="box">
                    <div class="box-header">
                        <h3>Categorías</h3>
                        <div class="icon-box">
                            <i class="fas fa-folder" style="color:#c9a227;"></i>
                        </div>
                    </div>

                    <p>Organiza tu catálogo fácilmente</p>

                    <form method="POST" action="/business/category">
                        @csrf

                        <input type="text" name="category" placeholder="Nombre de la categoría" required>

                        <button class="btn-gold" style="margin-top:10px;">
                            Crear Categoría
                        </button>
                    </form>
                </div>

                <!-- PRODUCTO -->
                <div class="box">
                    <div class="box-header">
                        <h3>Productos</h3>
                        <div class="icon-box">
                            <i class="fas fa-box" style="color:#c9a227;"></i>
                        </div>
                    </div>

                    <p>Agrega nuevos productos</p>

                    <form method="POST" action="/business/product">
                        @csrf

                        <input type="text" name="name" placeholder="Nombre del producto" required>
                        <input type="number" name="price" placeholder="Precio" step="0.01" required>

                        <select name="category" required>
                            <option disabled selected>Seleccionar categoría</option>
                            @foreach (auth()->user()->categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>

                        <textarea name="description" rows="2" placeholder="Descripción" required></textarea>

                        <button class="btn-gold" style="margin-top:10px;">
                            Agregar Producto
                        </button>
                    </form>
                </div>

            </div>

        </div>

    </div>

    <script>
        setTimeout(() => {
            const toast = document.getElementById('toast-overlay');
            if (toast) toast.remove();
        }, 1200);
    </script>

</body>

</html>
