<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Dashboard | CyberSaaS</title>

    <!-- Fuente Inter Studio -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swap"
        rel="stylesheet">

    <!-- Iconos de Vanguardia -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #0b0f19;
            background-image:
                radial-gradient(at 0% 0%, rgba(29, 78, 216, 0.15) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(6, 182, 212, 0.1) 0px, transparent 50%);
            color: #f1f5f9;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            min-height: 100vh;
        }

        .container {
            display: flex;
            padding: 24px;
            gap: 24px;
            min-height: 100vh;
        }

        /* ================= SIDEBAR FLOTANTE (ISLA TIPO MAC) ================= */

        .sidebar {
            width: 280px;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            padding: 32px 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border-radius: 24px;
            position: sticky;
            top: 24px;
            height: calc(100vh - 48px);
            z-index: 1000;
            box-shadow: 0 40px 64px -12px rgba(0, 0, 0, 0.5);
        }

        .brand-container {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 0 8px;
        }

        .brand-logo {
            width: 38px;
            height: 38px;
            background: linear-gradient(135deg, #2563eb, #06b6d4);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 16px;
            box-shadow: 0 0 20px rgba(37, 99, 235, 0.4);
        }

        .brand-logo i {
            animation: pulse 2s infinite;
        }

        .sidebar h2 {
            color: #fff;
            font-weight: 900;
            font-size: 20px;
            letter-spacing: -0.5px;
            background: linear-gradient(180deg, #fff 0%, #cbd5e1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .menu {
            margin-top: 40px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 16px;
            margin-bottom: 8px;
            border-radius: 14px;
            text-decoration: none;
            color: #94a3b8;
            font-size: 15px;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            border: 1px solid transparent;
        }

        .menu a:hover,
        .menu a.active {
            background: rgba(255, 255, 255, 0.03);
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: inset 0 1px 1px rgba(255, 255, 255, 0.1);
        }

        .menu a.active {
            background: linear-gradient(90deg, rgba(37, 99, 235, 0.15) 0%, transparent 100%);
            border-left: 3px solid #2563eb;
            color: #3b82f6;
        }

        .menu a i {
            font-size: 18px;
        }

        .logout-btn {
            width: 100%;
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            padding: 14px;
            border-radius: 14px;
            color: #f87171;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.25s ease;
        }

        .logout-btn:hover {
            background: #ef4444;
            color: white;
            box-shadow: 0 10px 20px rgba(239, 68, 68, 0.2);
        }

        /* ================= MAIN CONTENT SPACE ================= */

        .main {
            flex: 1;
            padding: 12px;
            max-width: 1300px;
            margin: 0 auto;
            width: 100%;
        }

        /* ================= PORTADA ESTILO CINEMATOGRÁFICO ================= */

        .cover {
            position: relative;
            margin-bottom: 60px;
        }

        .cover-img {
            width: 100%;
            height: 340px;
            border-radius: 28px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .cover-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.85);
        }

        .cover-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(0deg, #0b0f19 0%, rgba(11, 15, 25, 0.4) 50%, transparent 100%);
        }

        .profile-area {
            position: absolute;
            bottom: -35px;
            left: 45px;
            z-index: 10;
        }

        .profile-img {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .profile-img img {
            width: 135px;
            height: 135px;
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            object-fit: cover;
            background: #1e293b;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
            transform: rotate(-2deg);
            transition: transform 0.3s ease;
        }

        .profile-img img:hover {
            transform: rotate(0deg) scale(1.05);
        }

        .profile-img a {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 16px;
            font-size: 13px;
            color: #3b82f6;
            text-decoration: none;
            font-weight: 700;
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.2);
            padding: 8px 18px;
            border-radius: 20px;
            backdrop-filter: blur(10px);
            transition: all 0.2s ease;
        }

        .profile-img a:hover {
            background: #3b82f6;
            color: white;
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.4);
        }

        .edit-cover {
            position: absolute;
            top: 24px;
            right: 24px;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 12px 20px;
            border-radius: 14px;
            cursor: pointer;
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s ease;
        }

        .edit-cover:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        /* ================= COMPUTED NESTED GRID ================= */

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 32px;
            margin-top: 70px;
        }

        .full-width {
            grid-column: span 2;
        }

        /* ================= TARJETAS NEO-GLOW ================= */

        .card {
            background: rgba(15, 23, 42, 0.4);
            border-radius: 28px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            padding: 40px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        .card::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 28px;
            padding: 1px;
            background: linear-gradient(to bottom bottom, rgba(255, 255, 255, 0.1), transparent);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            pointer-events: none;
        }

        .card h2 {
            font-size: 36px;
            font-weight: 900;
            letter-spacing: -1.5px;
            margin-bottom: 8px;
            background: linear-gradient(120deg, #fff, #94a3b8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .card h3 {
            margin-bottom: 28px;
            color: #fff;
            font-size: 20px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .card h3 i {
            background: linear-gradient(135deg, #2563eb, #06b6d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(16, 185, 129, 0.1);
            color: #34d399;
            border: 1px solid rgba(16, 185, 129, 0.2);
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 20px;
        }

        .card p {
            color: #94a3b8;
            line-height: 1.7;
            font-size: 15px;
        }

        /* ================= INPUTS NESTED INTERACTIVOS ================= */

        .form-group {
            margin-bottom: 24px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-size: 14px;
            font-weight: 600;
            color: #94a3b8;
        }

        .input {
            width: 100%;
            padding: 16px 20px;
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(15, 23, 42, 0.6);
            outline: none;
            font-size: 15px;
            color: #fff;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .input:focus {
            border-color: #3b82f6;
            background: rgba(15, 23, 42, 0.8);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15), inset 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        /* ================= BOTONES HI-TECH ================= */

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            color: white;
            padding: 16px 32px;
            border-radius: 16px;
            text-decoration: none;
            font-weight: 700;
            font-size: 15px;
            border: none;
            cursor: pointer;
            box-shadow: 0 8px 24px rgba(37, 99, 235, 0.3), inset 0 1px 0 rgba(255, 255, 255, 0.2);
            transition: all 0.25s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(37, 99, 235, 0.45);
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.05);
            color: #e2e8f0;
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: none;
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* ================= ANIMACIONES ================= */

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.08);
                opacity: 0.9;
            }
        }

        /* ================= MENÚ HAMBURGUESA INTEGRADO ================= */

        .menu-toggle {
            display: none;
            position: fixed;
            top: 24px;
            left: 24px;
            width: 54px;
            height: 54px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(10px);
            color: white;
            font-size: 20px;
            cursor: pointer;
            z-index: 1100;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .close-menu {
            display: none;
            position: absolute;
            top: 24px;
            right: 24px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            width: 40px;
            height: 40px;
            border-radius: 12px;
            font-size: 16px;
            cursor: pointer;
            color: white;
        }

        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(2, 6, 17, 0.7);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* ================= MEDIA QUERIES (TABLETS / PC MEDIANAS) ================= */

        @media (max-width: 1200px) {
            .grid {
                grid-template-columns: 1fr;
            }

            .full-width {
                grid-column: span 1;
            }
        }

        @media (max-width: 992px) {
            .container {
                padding: 16px;
            }

            .menu-toggle {
                display: flex;
            }

            .sidebar {
                position: fixed;
                top: 16px;
                left: -320px;
                height: calc(100vh - 32px);
                width: 290px;
                background: #0f172a;
                transition: left 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            }

            .sidebar.active {
                left: 16px;
            }

            .close-menu {
                display: block;
            }

            .main {
                padding: 90px 8px 24px;
            }
        }

        /* ================= MEDIA QUERIES (MÓVIL) ================= */

        @media (max-width: 600px) {
            .cover-img {
                height: 220px;
                border-radius: 20px;
            }

            .profile-area {
                left: 50%;
                transform: translateX(-50%);
                bottom: -95px;
            }

            .profile-img {
                align-items: center;
            }

            .profile-img img {
                width: 120px;
                height: 120px;
                border-radius: 22px;
                transform: none;
            }

            .profile-img img:hover {
                transform: scale(1.05);
            }

            .edit-cover {
                top: 16px;
                right: 16px;
                padding: 10px 14px;
                font-size: 12px;
            }

            .grid {
                margin-top: 120px;
                gap: 24px;
            }

            .card {
                padding: 28px 20px;
                border-radius: 24px;
            }

            .card h2 {
                font-size: 28px;
                text-align: center;
            }

            .badge-status {
                display: flex;
                width: fit-content;
                margin: 0 auto 20px auto;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- OVERLAY -->
    <div class="overlay" onclick="toggleMenu()"></div>

    <div class="container">

        <!-- SIDEBAR FLOTANTE -->
        <div class="sidebar">
            <button class="close-menu" onclick="toggleMenu()">
                <i class="fas fa-times"></i>
            </button>

            <div>
                <div class="brand-container">
                    <div class="brand-logo"><i class="fas fa-atom"></i></div>
                    <h2>CyberSaaS</h2>
                </div>

                <div class="menu">
                    <a href="/business" class="active">
                        <i class="fas fa-cube"></i> Panel General
                    </a>
                    <a href="/business/profile">
                        <i class="fas fa-sliders"></i> Configuración
                    </a>
                    <a href="/business/producto">
                        <i class="fas fa-folder"></i> Categorías
                    </a>
                    <a href="/business/gestion">
                        <i class="fas fa-layer-group"></i> Inventario
                    </a>
                </div>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>

            <button class="logout-btn"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-power-off"></i> Desconectarse
            </button>
        </div>

        <!-- MAIN INTERFACE -->
        <div class="main">
            <!-- HAMBURGUESA -->
            <button class="menu-toggle" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </button>

            <!-- PORTADA ULTRA-WIDE -->
            <div class="cover">
                <div class="cover-img">
                    <img
                        src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}">
                    <div class="cover-overlay"></div>
                </div>

                <div class="profile-area">
                    <div class="profile-img">
                        @if (Auth::user()->qr_path)
                            <img src="{{ asset('storage/' . Auth::user()->qr_path) }}"
                                alt="QR de {{ Auth::user()->slug }}">
                            <a href="#" id="downloadQr">
                                <i class="fas fa-qrcode"></i> Exportar QR Code
                            </a>
                        @else
                            <img src="https://via.placeholder.com/150" alt="QR no disponible">
                        @endif
                    </div>
                </div>

                <label for="uploadImage" class="edit-cover">
                    <i class="fas fa-feather"></i> Cambiar Arte de Portada
                </label>
            </div>

            <!-- GRID PRINCIPAL -->
            <div class="grid">

                <!-- ACCOUNT OVERVIEW -->
                <div class="card">
                    <span class="badge-status">Sistema Online</span>
                    <h2>{{ Auth::user()->name }}</h2>
                    <p style="margin: 16px 0 32px 0;">Administra la pasarela, la geolocalización de tus sucursales y la
                        sincronización global en la nube de tu catálogo interactivo.</p>

                    <a href="/{{ Auth::user()->slug }}" target="_blank" class="btn">
                        <i class="fas fa-arrow-up-right-from-square"></i> Lanzar Sitio Público
                    </a>
                </div>

                <!-- MEDIA MANAGEMENT -->
                <div class="card">
                    <h3><i class="fas fa-images"></i> Identidad Visual</h3>
                    <p style="margin-bottom: 24px; font-size: 14px;">Elige una cabecera cinemática de alta calidad para
                        impresionar a tus clientes de entrada.</p>

                    <form action="/business/profile/image" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input id="uploadImage" type="file" name="image" required class="input"
                            style="padding: 12px;">

                        <button type="submit" class="btn btn-secondary" style="margin-top:24px; width:100%;">
                            Sincronizar Archivo
                        </button>
                    </form>
                </div>

                <!-- CORE DATA FORM -->
                <div class="card full-width">
                    <h3><i class="fas fa-sliders"></i> Núcleo de Información del Negocio</h3>

                    <form action="/business/info" method="POST">
                        @csrf

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
                            <div class="form-group">
                                <label>Enlace WhatsApp Directo</label>
                                <input type="text" name="whatsapp" class="input" placeholder="Ej. 5219610000000"
                                    value="{{ Auth::user()->whatsapp }}">
                            </div>

                            <div class="form-group">
                                <label>Google Maps Iframe Link</label>
                                <input type="text" name="map_url" class="input"
                                    placeholder="https://www.google.com/maps/embed?pb=..."
                                    value="{{ Auth::user()->map_url }}">
                            </div>
                        </div>

                        <div class="form-group" style="margin-top: 8px;">
                            <label>Calendario y Horario Operativo</label>
                            <textarea name="schedule" class="input" rows="4" placeholder="Ej. Lunes a Viernes // 09:00 - 22:00"
                                style="resize:none;">{{ Auth::user()->schedule }}</textarea>
                        </div>

                        <div style="text-align: right; margin-top: 8px;">
                            <button type="submit" class="btn">
                                <i class="fas fa-shield-check"></i> Desplegar Datos Actualizados
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- SCRIPT DE RENDERIZADO DEL QR CON LA IDENTIDAD CYBERSAAS -->
    <script>
        const coverUrl = "{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : '' }}";

        document.getElementById('downloadQr').addEventListener('click', async function(e) {
            e.preventDefault();
            const svgUrl = "{{ asset('storage/' . Auth::user()->qr_path) }}";

            try {
                const response = await fetch(svgUrl);
                const svgText = await response.text();

                const canvas = document.createElement('canvas');
                const ctx = canvas.getContext('2d');

                const img = new Image();
                const svgBlob = new Blob([svgText], {
                    type: 'image/svg+xml;charset=utf-8'
                });
                const url = URL.createObjectURL(svgBlob);

                img.onload = function() {
                    canvas.width = 1200;
                    canvas.height = 1600;
                    const systemFont = "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif";

                    const drawCanvasContent = () => {
                        // Tarjeta de cristalización profunda
                        ctx.save();
                        ctx.shadowColor = "rgba(0, 0, 0, 0.6)";
                        ctx.shadowBlur = 80;
                        ctx.shadowOffsetY = 30;
                        ctx.fillStyle = "rgba(11, 15, 25, 0.9)";
                        roundRect(ctx, 100, 100, 1000, 1400, 40);
                        ctx.restore();

                        // Doble marco tecnológico neón
                        ctx.strokeStyle = "rgba(37, 99, 235, 0.3)";
                        ctx.lineWidth = 2;
                        ctx.stroke();

                        // Título con Gradiente Cibernético
                        ctx.textAlign = "center";
                        const titleX = canvas.width / 2;
                        const titleY = 270;

                        const gradientNeon = ctx.createLinearGradient(0, titleY - 50, 0, titleY + 20);
                        gradientNeon.addColorStop(0, '#ffffff');
                        gradientNeon.addColorStop(1, '#3b82f6');

                        ctx.save();
                        ctx.shadowColor = "rgba(37, 99, 235, 0.5)";
                        ctx.shadowBlur = 25;
                        ctx.font = `bold 84px ${systemFont}`;
                        ctx.fillStyle = gradientNeon;
                        ctx.fillText("{{ Auth::user()->name }}", titleX, titleY);
                        ctx.restore();

                        // Subtítulo
                        ctx.fillStyle = "#94a3b8";
                        ctx.font = `700 24px ${systemFont}`;
                        ctx.letterSpacing = "10px";
                        ctx.fillText("CÓDIGO DE ACCESO DIGITAL", titleX, titleY + 70);

                        // Contenedor QR Blanco Impecable para la Cámara
                        const qrBoxX = 260;
                        const qrBoxY = 500;
                        const qrBoxSize = 680;

                        ctx.save();
                        ctx.shadowColor = "rgba(0, 0, 0, 0.7)";
                        ctx.shadowBlur = 60;
                        ctx.fillStyle = "#ffffff";
                        roundRect(ctx, qrBoxX, qrBoxY, qrBoxSize, qrBoxSize, 36);
                        ctx.restore();

                        // QR inyectado
                        ctx.drawImage(img, qrBoxX + 60, qrBoxY + 60, qrBoxSize - 120, qrBoxSize - 120);

                        // Píldora URL de diseño refinado
                        ctx.fillStyle = "rgba(255, 255, 255, 0.04)";
                        roundRect(ctx, 220, 1270, 760, 70, 20);
                        ctx.strokeStyle = "rgba(255,255,255,0.08)";
                        ctx.stroke();

                        ctx.fillStyle = "#3b82f6";
                        ctx.font = `600 24px ${systemFont}`;
                        ctx.fillText("{{ url('/' . Auth::user()->slug) }}", titleX, 1313);

                        // Botón de acción con estilo Cyber
                        const btnGrad = ctx.createLinearGradient(0, 1390, 0, 1480);
                        btnGrad.addColorStop(0, '#3b82f6');
                        btnGrad.addColorStop(1, '#1d4ed8');

                        ctx.save();
                        ctx.shadowColor = "rgba(37, 99, 235, 0.4)";
                        ctx.shadowBlur = 30;
                        ctx.fillStyle = btnGrad;
                        roundRect(ctx, 300, 1390, 600, 90, 24);
                        ctx.restore();

                        ctx.fillStyle = "#ffffff";
                        ctx.font = `bold 26px ${systemFont}`;
                        ctx.letterSpacing = "4px";
                        ctx.fillText("ESCANEAR PARA EXPLORAR", titleX, 1445);

                        // Trigger de descarga automática
                        URL.revokeObjectURL(url);
                        const pngUrl = canvas.toDataURL('image/png');
                        const downloadLink = document.createElement('a');
                        downloadLink.href = pngUrl;
                        downloadLink.download = "qr-cybersaas-{{ Auth::user()->slug }}.png";
                        document.body.appendChild(downloadLink);
                        downloadLink.click();
                        document.body.removeChild(downloadLink);
                    };

                    if (coverUrl) {
                        const cover = new Image();
                        cover.crossOrigin = "anonymous";
                        cover.onload = function() {
                            ctx.drawImage(cover, 0, 0, canvas.width, canvas.height);
                            ctx.fillStyle = "rgba(11, 15, 25, 0.82)";
                            ctx.fillRect(0, 0, canvas.width, canvas.height);
                            drawCanvasContent();
                        };
                        cover.onerror = function() {
                            drawDefaultBackground(ctx, canvas);
                            drawCanvasContent();
                        };
                        cover.src = coverUrl;
                    } else {
                        drawDefaultBackground(ctx, canvas);
                        drawCanvasContent();
                    }
                };
                img.src = url;
            } catch (error) {
                console.error(error);
                alert('Fallo en el protocolo de renderizado del QR.');
            }
        });

        function drawDefaultBackground(ctx, canvas) {
            const gradient = ctx.createLinearGradient(0, 0, canvas.width, canvas.height);
            gradient.addColorStop(0, '#0b0f19');
            gradient.addColorStop(1, '#020617');
            ctx.fillStyle = gradient;
            ctx.fillRect(0, 0, canvas.width, canvas.height);
        }

        function roundRect(ctx, x, y, width, height, radius) {
            ctx.beginPath();
            ctx.moveTo(x + radius, y);
            ctx.lineTo(x + width - radius, y);
            ctx.quadraticCurveTo(x + width, y, x + width, y + radius);
            ctx.lineTo(x + width, y + height - radius);
            ctx.quadraticCurveTo(x + width, y + height, x + width - radius, y + height);
            ctx.lineTo(x + radius, y + height);
            ctx.quadraticCurveTo(x, y + height, x, y + height - radius);
            ctx.lineTo(x, y + radius);
            ctx.quadraticCurveTo(x, y, x + radius, y);
            ctx.closePath();
            ctx.fill();
        }

        // CONTROL DE INTERFAZ COLAPSABLE
        function toggleMenu() {
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.querySelector('.overlay');
            const menuBtn = document.querySelector('.menu-toggle');

            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');

            if (sidebar.classList.contains('active')) {
                menuBtn.style.display = 'none';
                document.body.style.overflow = 'hidden';
            } else {
                menuBtn.style.display = 'flex';
                document.body.style.overflow = 'auto';
            }
        }

        window.addEventListener('resize', () => {
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.querySelector('.overlay');
            const menuBtn = document.querySelector('.menu-toggle');

            if (window.innerWidth > 992) {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
                menuBtn.style.display = 'none';
                document.body.style.overflow = 'auto';
            } else {
                if (!sidebar.classList.contains('active')) {
                    menuBtn.style.display = 'flex';
                }
            }
        });
    </script>
</body>

</html>
