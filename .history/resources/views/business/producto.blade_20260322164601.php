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

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
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
        <!-- MAIN -->
        <div class="main"
            style="
    background: linear-gradient(135deg, #f8fafc, #eef2f7);
    border-radius: 30px 0 0 30px;
">

            <!-- HEADER -->
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <div>
                    <h1 style="margin:0; font-size:28px; font-weight:600;">
                        Panel de Control
                    </h1>
                    <p style="margin:5px 0 0; color:#6b7280;">
                        Administra tu negocio de forma profesional
                    </p>
                </div>

                <div
                    style="
            background:white;
            padding:10px 15px;
            border-radius:12px;
            box-shadow:0 5px 15px rgba(0,0,0,0.05);
            font-size:14px;
            color:#555;
        ">
                    <i class="fas fa-store" style="color:#c9a227;"></i> Mi negocio
                </div>
            </div>

            <!-- TOAST -->
            @if (session('success'))
                <div id="toast"
                    style="
            position: fixed;
            top: 20px;
            right: 20px;
            background: #16a34a;
            color: white;
            padding: 15px 20px;
            border-radius: 12px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
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

            <!-- GRID -->
            <div
                style="
        display:grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 25px;
        margin-top:20px;
    ">

                <!-- CATEGORÍA -->
                <div class="card"
                    style="
            position:relative;
            overflow:hidden;
            border:none;
        ">

                    <!-- DECORACIÓN -->
                    <div
                        style="
                position:absolute;
                top:0;
                right:0;
                width:100px;
                height:100px;
                background:rgba(201,162,39,0.1);
                border-radius:50%;
                transform:translate(30px,-30px);
            ">
                    </div>

                    <h3 style="display:flex; align-items:center; gap:10px;">
                        <i class="fas fa-folder-plus" style="color:#c9a227;"></i>
                        Agregar Categoría
                    </h3>

                    <p style="color:#6b7280; margin-bottom:15px;">
                        Organiza tus productos creando categorías estratégicas.
                    </p>

                    <form method="POST" action="/business/category"
                        style="display:flex; flex-direction:column; gap:15px;">
                        @csrf

                        <input type="text" name="category" placeholder="Nombre de la categoría"
                            style="
                        padding:13px;
                        border-radius:10px;
                        border:1px solid #e5e7eb;
                        outline:none;
                        transition:0.3s;
                    "
                            onfocus="this.style.borderColor='#c9a227'" required>

                        <button type="submit"
                            style="
                    padding:13px;
                    border-radius:10px;
                    border:none;
                    background:linear-gradient(135deg,#c9a227,#e6c65c);
                    color:white;
                    font-weight:600;
                    cursor:pointer;
                    transition:0.3s;
                "
                            onmouseover="this.style.transform='scale(1.03)'"
                            onmouseout="this.style.transform='scale(1)'">
                            Crear Categoría
                        </button>

                    </form>
                </div>

                <!-- PRODUCTO -->
                <div class="card"
                    style="
            position:relative;
            overflow:hidden;
            border:none;
        ">

                    <!-- DECORACIÓN -->
                    <div
                        style="
                position:absolute;
                bottom:0;
                left:0;
                width:120px;
                height:120px;
                background:rgba(201,162,39,0.08);
                border-radius:50%;
                transform:translate(-40px,40px);
            ">
                    </div>

                    <h3 style="display:flex; align-items:center; gap:10px;">
                        <i class="fas fa-box-open" style="color:#c9a227;"></i>
                        Agregar Producto
                    </h3>

                    <p style="color:#6b7280; margin-bottom:15px;">
                        Añade productos atractivos para aumentar tus ventas.
                    </p>

                    <form method="POST" action="/business/product"
                        style="display:flex; flex-direction:column; gap:15px;">
                        @csrf

                        <input type="text" name="name" placeholder="Nombre del producto" required
                            style="padding:13px; border-radius:10px; border:1px solid #e5e7eb;">

                        <input type="number" name="price" placeholder="Precio" step="0.01" required
                            style="padding:13px; border-radius:10px; border:1px solid #e5e7eb;">

                        <select name="category" required
                            style="padding:13px; border-radius:10px; border:1px solid #e5e7eb;">
                            <option value="" disabled selected>Seleccionar categoría</option>
                            @foreach (auth()->user()->categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>

                        <textarea name="description" placeholder="Descripción del producto" rows="4" required
                            style="padding:13px; border-radius:10px; border:1px solid #e5e7eb;"></textarea>

                        <button type="submit"
                            style="
                    padding:13px;
                    border-radius:10px;
                    border:none;
                    background:linear-gradient(135deg,#c9a227,#e6c65c);
                    color:white;
                    font-weight:600;
                    cursor:pointer;
                    transition:0.3s;
                "
                            onmouseover="this.style.transform='scale(1.03)'"
                            onmouseout="this.style.transform='scale(1)'">
                            Agregar Producto
                        </button>

                    </form>
                </div>

            </div>

        </div>

    </div>

    <script>
        setTimeout(() => {
            const toast = document.getElementById('toast');
            if (toast) {
                toast.style.transition = "0.5s";
                toast.style.opacity = "0";
                toast.style.transform = "translateX(50px)";
                setTimeout(() => toast.remove(), 500);
            }
        }, 3000);
    </script>

</body>

</html>
