<section class="menu-digital">
    <div class="menu-header">
        <h1>{{ $user->name }}</h1>
        <span class="role">{{ $user->role }}</span>
        <p class="email">{{ $user->email }}</p>
    </div>

    <!-- Categoría: Bebidas -->
    <h2>Bebidas</h2>
    <div class="menu-category">
        <div class="menu-card">
            <img src="https://images.unsplash.com/photo-1511920170033-f8396924c348?auto=format&fit=crop&w=400&h=250&q=80"
                alt="Café Latte">
            <div class="overlay">
                <h3>Café Latte</h3>
                <p class="description">Espresso con leche cremosa y espuma suave.</p>
                <p class="price">$4.50</p>
            </div>
        </div>

        <div class="menu-card">
            <img src="https://images.unsplash.com/photo-1582719478187-e67fdddc8b77?auto=format&fit=crop&w=400&h=250&q=80"
                alt="Smoothie">
            <div class="overlay">
                <h3>Smoothie Tropical</h3>
                <p class="description">Frutas frescas mezcladas con hielo y miel natural.</p>
                <p class="price">$5.00</p>
            </div>
        </div>
    </div>

    <!-- Categoría: Comidas -->
    <h2>Comidas</h2>
    <div class="menu-category">
        <div class="menu-card">
            <img src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df?auto=format&fit=crop&w=400&h=250&q=80"
                alt="Hamburguesa Deluxe">
            <div class="overlay">
                <h3>Hamburguesa Deluxe</h3>
                <p class="description">Queso cheddar, lechuga y salsa especial.</p>
                <p class="price">$8.99</p>
            </div>
        </div>

        <div class="menu-card">
            <img src="https://images.unsplash.com/photo-1601924582975-d2f36fce4a9f?auto=format&fit=crop&w=400&h=250&q=80"
                alt="Pizza Margarita">
            <div class="overlay">
                <h3>Pizza Margarita</h3>
                <p class="description">Mozzarella fresca, tomate y albahaca.</p>
                <p class="price">$12.50</p>
            </div>
        </div>
    </div>

    <!-- Categoría: Postres -->
    <h2>Postres</h2>
    <div class="menu-category">
        <div class="menu-card">
            <img src="https://images.unsplash.com/photo-1599785209795-33b74f5a42e1?auto=format&fit=crop&w=400&h=250&q=80"
                alt="Tarta de Chocolate">
            <div class="overlay">
                <h3>Tarta de Chocolate</h3>
                <p class="description">Chocolate oscuro con ganache suave.</p>
                <p class="price">$6.50</p>
            </div>
        </div>

        <div class="menu-card">
            <img src="https://images.unsplash.com/photo-1612392061781-26405d5e021b?auto=format&fit=crop&w=400&h=250&q=80"
                alt="Helado">
            <div class="overlay">
                <h3>Helado Artesanal</h3>
                <p class="description">Varios sabores, cremoso y fresco.</p>
                <p class="price">$3.50</p>
            </div>
        </div>
    </div>

    <!-- Botón WhatsApp flotante -->
    <a href="https://wa.me/1234567890" target="_blank" class="whatsapp-btn">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
    </a>
</section>

<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background: url('https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?auto=format&fit=crop&w=1600&q=80') no-repeat center center fixed;
        background-size: cover;
        margin: 0;
        color: #fff;
    }

    .menu-digital {
        max-width: 1200px;
        margin: 50px auto;
        padding: 0 20px;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
    }

    .menu-header {
        text-align: center;
        margin-bottom: 50px;
        background: rgba(0, 0, 0, 0.5);
        padding: 25px;
        border-radius: 20px;
    }

    .menu-header h1 {
        font-size: 36px;
        margin: 0 0 10px 0;
        color: #ffd700;
    }

    .menu-header .role {
        display: inline-block;
        background: #ff4500;
        padding: 6px 20px;
        border-radius: 50px;
        font-weight: bold;
        margin-bottom: 5px;
        color: white;
    }

    .menu-header .email {
        font-size: 14px;
        color: #ddd;
    }

    h2 {
        margin-top: 40px;
        margin-bottom: 20px;
        font-size: 28px;
        color: #00ffff;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    }

    .menu-category {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .menu-card {
        position: relative;
        width: 240px;
        height: 200px;
        border-radius: 20px;
        overflow: hidden;
        cursor: pointer;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .menu-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s;
    }

    .menu-card:hover img {
        transform: scale(1.1);
    }

    .overlay {
        position: absolute;
        bottom: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0));
        width: 100%;
        padding: 10px 15px;
        color: #fff;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }

    .overlay h3 {
        margin: 0 0 5px 0;
        font-size: 18px;
        color: #ffd700;
    }

    .overlay .description {
        font-size: 13px;
        color: #fff;
        margin-bottom: 5px;
    }

    .overlay .price {
        font-size: 16px;
        font-weight: bold;
        color: #00ff7f;
    }

    /* Botón WhatsApp flotante */
    .whatsapp-btn {
        position: fixed;
        bottom: 25px;
        right: 25px;
        width: 60px;
        height: 60px;
        background: #25d366;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s, box-shadow 0.3s;
        z-index: 100;
    }

    .whatsapp-btn:hover {
        transform: scale(1.1);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
    }

    .whatsapp-btn img {
        width: 35px;
        height: 35px;
    }

    /* Responsive */
    @media (max-width: 900px) {
        .menu-category {
            justify-content: center;
        }
    }

    @media (max-width: 600px) {
        .menu-card {
            width: 100%;
            height: 180px;
        }
    }
</style>
