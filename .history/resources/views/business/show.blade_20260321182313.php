<section class="business-profile">
    <div class="profile-info">
        <h1>{{ $user->name }}</h1>
        <span class="role">{{ $user->role }}</span>
        <p class="email">{{ $user->email }}</p>
    </div>

    <h2>Productos / Servicios</h2>
    <div class="products">
        <!-- Producto de ejemplo 1 -->
        <div class="product-card">
            <img src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df" alt="Producto 1">
            <h3>Hamburguesa Deluxe</h3>
            <p>$8.99</p>
        </div>

        <!-- Producto de ejemplo 2 -->
        <div class="product-card">
            <img src="https://images.unsplash.com/photo-1512690459411-b9245aed614b" alt="Producto 2">
            <h3>Café Latte</h3>
            <p>$4.50</p>
        </div>

        <!-- Producto de ejemplo 3 -->
        <div class="product-card">
            <img src="https://images.unsplash.com/photo-1585747860715-2ba37e788b70" alt="Producto 3">
            <h3>Corte de Cabello</h3>
            <p>$15.00</p>
        </div>
    </div>
</section>

<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background: #f0f2f5;
        margin: 0;
        color: #1a1a1a;
    }

    .business-profile {
        max-width: 1000px;
        margin: 50px auto;
        padding: 0 20px;
    }

    .profile-info {
        text-align: center;
        margin-bottom: 50px;
    }

    .profile-info h1 {
        font-size: 32px;
        margin: 0;
        color: #0072ff;
    }

    .profile-info .role {
        display: inline-block;
        background: #00c6ff;
        color: white;
        padding: 5px 15px;
        border-radius: 50px;
        margin: 10px 0;
        font-weight: bold;
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
        gap: 20px;
        flex-wrap: wrap;
        justify-content: center;
    }

    .product-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        width: 250px;
        text-align: center;
        padding: 15px;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
    }

    .product-card img {
        width: 100%;
        height: 160px;
        object-fit: cover;
        border-radius: 15px;
        margin-bottom: 15px;
    }

    .product-card h3 {
        font-size: 18px;
        margin: 0 0 10px 0;
        color: #0072ff;
    }

    .product-card p {
        font-size: 16px;
        font-weight: bold;
        color: #333;
    }
</style>
