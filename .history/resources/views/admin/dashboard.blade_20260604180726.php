@extends('admin.layout', ['page' => 'dashboard'])

@section('content')
    <style>
        /* 🔥 CONTENEDOR PRINCIPAL */
        .dashboard-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px 10px;
            animation: fadeInUp 0.6s ease;
        }

        /* 🔥 ENCABEZADO DE BIENVENIDA */
        .welcome-hero {
            background: linear-gradient(135deg, #ffffff, #f1f5f9);
            border-left: 5px solid #ef4444;
            /* Detalle en rojo profesional */
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
            margin-bottom: 35px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .hero-text h1 {
            font-size: clamp(1.8rem, 4vw, 2.5rem);
            color: #0f172a;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .hero-text p {
            color: #64748b;
            font-size: 16px;
        }

        /* 🔥 CONTENEDOR DE LA IMAGEN CENTRAL */
        .image-wrapper {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
        }

        .dashboard-image {
            width: 100%;
            max-width: 750px;
            height: auto;
            max-height: 380px;
            border-radius: 20px;
            object-fit: cover;
            box-shadow: 0 15px 35px rgba(15, 23, 42, 0.08);
            border: 1px solid #e2e8f0;
            transition: transform 0.3s ease;
        }

        .dashboard-image:hover {
            transform: translateY(-5px);
        }

        /* 🔥 SECCIÓN DE TARJETAS (ESTADÍSTICAS RÁPIDAS) */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 24px;
        }

        .stat-card {
            background: #ffffff;
            padding: 24px;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            gap: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(239, 68, 68, 0.08);
            border-color: rgba(239, 68, 68, 0.2);
        }

        .stat-icon {
            width: 55px;
            height: 55px;
            border-radius: 12px;
            background: rgba(239, 68, 68, 0.1);
            /* Fondo rojo suave */
            color: #ef4444;
            /* Ícono rojo */
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .stat-info h3 {
            font-size: 14px;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }

        .stat-info p {
            font-size: 24px;
            font-weight: 700;
            color: #0f172a;
        }

        /* 🔥 ANIMACIÓN */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* 🔥 RESPONSIVE (TABLET Y CELULAR) */
        @media screen and (max-width: 768px) {
            .dashboard-container {
                padding-top: 20px;
            }

            .welcome-hero {
                flex-direction: column;
                text-align: center;
                border-left: none;
                border-bottom: 5px solid #ef4444;
                padding: 24px 16px;
            }

            .dashboard-image {
                max-height: 250px;
                border-radius: 14px;
            }

            .stats-grid {
                gap: 16px;
            }
        }
    </style>

    <div class="dashboard-container">

        <div class="welcome-hero">
            <div class="hero-text">
                <h1>Bienvenido de nuevo, Admin 👋</h1>
                <p>Aquí tienes un vistazo rápido de lo que está sucediendo hoy en tu plataforma.</p>
            </div>
        </div>

        <div class="image-wrapper">
            <img src="/images/bienvenida.jpg" class="dashboard-image" alt="Dashboard Welcome">
        </div>

        <div class="stats-grid">

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-info">
                    <h3>Usuarios Totales</h3>
                    <p>{{ is_array($users) || is_object($users) ? count($users) : 0 }}</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <div class="stat-info">
                    <h3>Estado Sistema</h3>
                    <p style="color: #10b981; font-size: 16px; margin-top: 5px;">
                        <i class="fas fa-check-circle"></i> Óptimo
                    </p>
                </div>
            </div>

        </div>

    </div>
@endsection
