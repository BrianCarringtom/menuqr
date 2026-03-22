<section class="profile-section">
    <div class="profile-card">
        <div class="profile-header">
            <h1>{{ $user->name }}</h1>
            <span class="role-badge">{{ $user->role }}</span>
        </div>
        <p class="email">📧 {{ $user->email }}</p>

        <div class="profile-actions">
            <a href="/edit-profile" class="btn">Editar Perfil</a>
            <a href="/my-services" class="btn secondary">Mis Servicios</a>
        </div>
    </div>
</section>

<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background: #f5f5f7;
        color: #1a1a1a;
        margin: 0;
        padding: 0;
    }

    .profile-section {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 80px 20px;
        background: linear-gradient(135deg, #00c6ff, #0072ff);
        min-height: 100vh;
    }

    .profile-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        padding: 40px 30px;
        max-width: 400px;
        width: 100%;
        text-align: center;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .profile-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
    }

    .profile-header {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
    }

    .profile-header h1 {
        font-size: 28px;
        margin: 0;
        color: #0072ff;
    }

    .role-badge {
        background: #00c6ff;
        color: white;
        padding: 5px 15px;
        border-radius: 50px;
        font-weight: bold;
        font-size: 14px;
    }

    .email {
        font-size: 16px;
        color: #555;
        margin-bottom: 30px;
    }

    .profile-actions {
        display: flex;
        justify-content: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .btn {
        padding: 12px 25px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: bold;
        background: #0072ff;
        color: white;
        transition: background 0.3s;
    }

    .btn:hover {
        background: #005bb5;
    }

    .btn.secondary {
        background: #00c6ff;
        color: #1a1a1a;
    }

    .btn.secondary:hover {
        background: #008ecc;
        color: white;
    }
</style>
