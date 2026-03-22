<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel de Negocios</title>

    <style>
        body {
            font-family: Arial;
            margin: 0;
            background: #f5f5f5;
        }

        .header {
            background: #222;
            color: white;
            padding: 20px;
        }

        .nav ul {
            display: flex;
            list-style: none;
            background: #444;
            padding: 10px;
            margin: 0;
        }

        .nav li {
            margin-right: 20px;
        }

        .nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            padding: 20px;
        }

        .business-profile {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 15px;
        }

        .card {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card h4 {
            margin: 0 0 10px 0;
        }

        .price {
            font-weight: bold;
            color: green;
        }
    </style>
</head>

<body>

    <!-- 🔝 HEADER (TU CÓDIGO) -->
    <header class="header">
        <h1>{{ $user->name }}</h1>
        <p>Email: {{ $user->email }}</p>
        <p>Rol: {{ $user->role }}</p>
    </header>

    <!-- 🧭 NAV -->
    <nav class="nav">
        <ul>
            <li><a href="#">Restaurantes</a></li>
            <li><a href="#">Cafeterías</a></li>
            <li><a href="#">Barberías</a></li>
        </ul>
    </nav>

    <div class="container">

        <!-- 🏢 PERFIL DEL NEGOCIO -->
        <section class="business-profile">
            <h2>{{ $business->name }}</h2>
            <p>{{ $business->description }}</p>
            <p><strong>Ubicación:</strong> {{ $business->location }}</p>
        </section>

        <!-- 🔄 CONTENIDO DINÁMICO -->
        @if ($business->type == 'restaurant')

            <!-- 🍽️ MENÚ -->
            <section>
                <h3>Menú</h3>
                <div class="grid">
                    @foreach ($items as $item)
                        <div class="card">
                            <h4>{{ $item->name }}</h4>
                            <p>{{ $item->description }}</p>
                            <span class="price">${{ $item->price }}</span>
                        </div>
                    @endforeach
                </div>
            </section>
        @elseif($business->type == 'cafe')
            <!-- ☕ PRODUCTOS -->
            <section>
                <h3>Productos</h3>
                <div class="grid">
                    @foreach ($products as $product)
                        <div class="card">
                            <h4>{{ $product->name }}</h4>
                            <p>{{ $product->description }}</p>
                            <span class="price">${{ $product->price }}</span>
                        </div>
                    @endforeach
                </div>
            </section>
        @elseif($business->type == 'barber')
            <!-- 💈 SERVICIOS -->
            <section>
                <h3>Servicios</h3>
                <div class="grid">
                    @foreach ($services as $service)
                        <div class="card">
                            <h4>{{ $service->name }}</h4>
                            <p>{{ $service->description }}</p>
                            <span class="price">${{ $service->price }}</span>
                        </div>
                    @endforeach
                </div>
            </section>

        @endif

    </div>

</body>

</html>
