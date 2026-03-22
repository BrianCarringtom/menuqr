<section class="business-profile">
    <!-- Info del negocio -->
    <div class="profile-info">
        <h1>{{ $user->name }}</h1>
        <span class="role">{{ $user->role }}</span>
        <p class="email">{{ $user->email }}</p>
    </div>

    <!-- Productos / servicios -->
    <h2>Productos / Servicios</h2>
    <div class="products">
        <!-- Producto de ejemplo 1 -->
        <div class="product-card">
            <img src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df" alt="Hamburguesa Deluxe">
            <div class="product-info">
                <h3>Hamburguesa Deluxe</h3>
                <p class="category">Restaurante</p>
                <p class="description">Jugosa hamburguesa con queso cheddar, lechuga fresca y salsa especial.</p>
                <p class="price">$8.99</p>
            </div>
        </div>

        <!-- Producto de ejemplo 2 -->
        <div class="product-card">
            <img src="https://images.unsplash.com/photo-1512690459411-b9245aed614b" alt="Café Latte">
            <div class="product-info">
                <h3>Café Latte</h3>
                <p class="category">Cafetería</p>
                <p class="description">Café espresso con leche vaporizada y espuma cremosa, servido caliente.</p>
                <p class="price">$4.50</p>
            </div>
        </div>

        <!-- Producto de ejemplo 3 -->
        <div class="product-card">
            <img src="https://images.unsplash.com/photo-1585747860715-2ba37e788b70" alt="Corte de Cabello">
            <div class="product-info">
                <h3>Corte de Cabello</h3>
                <p class="category">Barbería</p>
                <p class="description">Estilo moderno con corte preciso y acabado profesional.</p>
                <p class="price">$15.00</p>
            </div>
        </div>
    </div>
</section>

<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background: #f0f2f8;
        margin: 0;
        color: #1a1a1a;
    }

    .business-profile {
        max-width: 1200px;
        margin: 50px auto;
        padding: 0 20px;
    }

    .profile-info {
        text-align: center;
        margin-bottom: 50px;
    }

    .profile-info h1 {
        font-size: 36px;
        color: #0072ff;
        margin-bottom: 10px;
    }

    .profile-info .role {
        display: inline-block;
        background: linear-gradient(90deg, #00c6ff, #0072ff);
        color: white;
        padding: 8px 20px;
        border-radius: 50px;
        font-weight: bold;
        font-size: 16px;
        margin-bottom: 10px;
    }

    .profile-info .email {
        font-size: 16px;
        color: #555;
    }

    h2 {
        text-align: left;
        margin-bottom: 20px;
        color: #0072ff;
    }

    .products {
        display: flex;
        flex-wrap: wrap;
        gap: 25px;
        justify-content: center;
    }

    .product-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        width: 280px;
        transition: transform 0.3s, box-shadow 0.3s;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
    }

    .product-card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
    }

    .product-info {
        padding: 15px 20px;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .product-info h3 {
        font-size: 20px;
        margin: 0;
        color: #0072ff;
    }

    .product-info .category {
        font-size: 14px;
        font-weight: bold;
        color: #00c6ff;
    }

    .product-info .description {
        font-size: 14px;
        color: #555;
    }

    .product-info .price {
        font-size: 18px;
        font-weight: bold;
        color: #1a1a1a;
        margin-top: 5px;
    }

    /* Responsive */
    @media (max-width: 900px) {
        .products {
            justify-content: center;
        }
    }

    @media (max-width: 600px) {
        .product-card {
            width: 100%;
        }
    }
</style>
