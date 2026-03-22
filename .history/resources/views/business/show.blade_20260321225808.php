<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Diseño Negocios</title>

<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: #f0f2f5;
    }

    /* HEADER */
    .header {
        background: linear-gradient(135deg, #1e1e2f, #3a3a5a);
        color: white;
        padding: 20px;
    }

    /* NAV */
    .nav {
        background: #ffffff;
        padding: 10px 20px;
        display: flex;
        gap: 20px;
        border-bottom: 1px solid #ddd;
    }

    .nav a {
        text-decoration: none;
        color: #333;
        font-weight: bold;
    }

    /* CONTAINER */
    .container {
        padding: 20px;
    }

    /* PERFIL */
    .profile {
        background: white;
        padding: 20px;
        border-radius: 12px;
        margin-bottom: 20px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }

    /* GRID */
    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 15px;
    }

    /* CARD */
    .card {
        background: white;
        padding: 15px;
        border-radius: 12px;
        box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        transition: 0.2s;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card h4 {
        margin: 0 0 10px;
    }

    .price {
        color: green;
        font-weight: bold;
    }

    /* TITULOS */
    h3 {
        margin-bottom: 10px;
    }

</style>
</head>

<body>

<!-- 🔝 HEADER (tu contenido arriba) -->
<div class="header">
    <h1>Nombre del Usuario</h1>
    <p>Email: usuario@email.com</p>
    <p>Rol: Admin</p>
</div>

<!-- 🧭 NAV -->
<div class="nav">
    <a href="#">🍽️ Restaurante</a>
    <a href="#">☕ Cafetería</a>
    <a href="#">💈 Barbería</a>
</div>

<!-- 📦 CONTENIDO -->
<div class="container">

    <!-- PERFIL -->
    <div class="profile">
        <h2>Nombre del Negocio</h2>
        <p>Descripción del negocio aquí...</p>
        <p><strong>Ubicación:</strong> Tuxtla Gutiérrez</p>
    </div>

    <!-- 🍽️ RESTAURANTE -->
    <h3>Menú</h3>
    <div class="grid">
        <div class="card">
            <h4>Pizza</h4>
            <p>Pizza de pepperoni</p>
            <span class="price">$120</span>
        </div>

        <div class="card">
            <h4>Hamburguesa</h4>
            <p>Carne + queso</p>
            <span class="price">$90</span>
        </div>
    </div>

    <!-- ☕ CAFETERÍA -->
    <h3>Productos</h3>
    <div class="grid">
        <div class="card">
            <h4>Café Latte</h4>
            <p>Café con leche</p>
            <span class="price">$45</span>
        </div>
    </div>

    <!-- 💈 BARBERÍA -->
    <h3>Servicios</h3>
    <div class="grid">
        <div class="card">
            <h4>Corte de cabello</h4>
            <p>Estilo moderno</p>
            <span class="price">$80</span>
        </div>
    </div>

</div>

</body>
</html>