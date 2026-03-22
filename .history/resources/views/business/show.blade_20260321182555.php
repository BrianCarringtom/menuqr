<section class="menu-section">
    <div class="profile-info">
        <h1>{{ $user->name }}</h1>
        <span class="role">{{ $user->role }}</span>
        <p class="email">{{ $user->email }}</p>
    </div>

    <!-- Categoría: Restaurantes -->
    <h2>Restaurantes</h2>
    <div class="menu-category">
        <div class="menu-card">
            <div class="menu-info">
                <h3>Hamburguesa Deluxe</h3>
                <p class="description">Jugosa hamburguesa con queso cheddar y salsa especial.</p>
                <p class="price">$8.99</p>
            </div>
        </div>

        <div class="menu-card">
            <div class="menu-info">
                <h3>Pizza Margarita</h3>
                <p class="description">Deliciosa pizza con mozzarella fresca y albahaca.</p>
                <p class="price">$12.50</p>
            </div>
        </div>
    </div>

    <!-- Categoría: Cafetería -->
    <h2>Cafetería</h2>
    <div class="menu-category">
        <div class="menu-card">
            <div class="menu-info">
                <h3>Café Latte</h3>
                <p class="description">Espresso con leche vaporizada y espuma cremosa.</p>
                <p class="price">$4.50</p>
            </div>
        </div>

        <div class="menu-card">
            <div class="menu-info">
                <h3>Capuchino</h3>
                <p class="description">Espresso con espuma de leche y cacao.</p>
                <p class="price">$4.00</p>
            </div>
        </div>
    </div>

    <!-- Categoría: Barbería -->
    <h2>Barbería</h2>
    <div class="menu-category">
        <div class="menu-card">
            <div class="menu-info">
                <h3>Corte de Cabello</h3>
                <p class="description">Estilo moderno con acabado profesional.</p>
                <p class="price">$15.00</p>
            </div>
        </div>

        <div class="menu-card">
            <div class="menu-info">
                <h3>Afeitado Clásico</h3>
                <p class="description">Afeitado tradicional con toalla caliente.</p>
                <p class="price">$10.00</p>
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
        background: #f7f9fc;
        margin: 0;
        color: #1a1a1a;
    }

    .menu-section {
        max-width: 1000px;
        margin: 50px auto;
        padding: 0 20px;
        position: relative;
    }

    .profile-info {
        text-align: center;
        margin-bottom: 40px;
        background: #ffffffcc;
        padding: 25px;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }

    .profile-info h1 {
        font-size: 32px;
        color: #0072ff;
        margin-bottom: 5px;
    }

    .profile-info .role {
        display: inline-block;
        background: linear-gradient(90deg, #00c6ff, #0072ff);
        color: white;
        padding: 6px 20px;
        border-radius: 50px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .profile-info .email {
        font-size: 14px;
        color: #555;
    }

    h2 {
        color: #0072ff;
        margin-bottom: 15px;
        margin-top: 40px;
        font-size: 24px;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
    }

    .menu-category {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .menu-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.12);
        padding: 20px;
        width: 240px;
        transition: transform 0.3s, box-shadow 0.3s;
        cursor: default;
    }

    .menu-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    }

    .menu-info h3 {
        font-size: 18px;
        color: #0072ff;
        margin: 0 0 5px 0;
    }

    .menu-info .description {
        font-size: 14px;
        color: #555;
        margin-bottom: 8px;
    }

    .menu-info .price {
        font-size: 16px;
        font-weight: bold;
        color: #1a1a1a;
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
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        transition: transform 0.3s, box-shadow 0.3s;
        z-index: 100;
    }

    .whatsapp-btn:hover {
        transform: scale(1.1);
        box-shadow: 0 8px 20px rgba(0,0,0,0.4);
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
        }
    }
</style>