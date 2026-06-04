<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Dashboard | NextGen</title>

    <!-- Fuente Inter Premium -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Iconos Modernos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: radial-gradient(circle at 0% 0%, #fdfbf7 0%, #f4f7f6 100%);
            color: #0f172a;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* ================= SIDEBAR PREMIUM ================= */

        .sidebar {
            width: 280px;
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-right: 1px solid rgba(0, 0, 0, 0.05);
            padding: 40px 24px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: sticky;
            top: 0;
            height: 100vh;
            z-index: 1000;
        }

        .brand-container {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-left: 10px;
        }

        .brand-logo {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #1d4ed8, #06b6d4);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
            box-shadow: 0 4px 12px rgba(29, 78, 216, 0.3);
        }

        .sidebar h2 {
            color: #0f172a;
            font-weight: 800;
            font-size: 20px;
            letter-spacing: -0.5px;
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
            border-radius: 12px;
            text-decoration: none;
            color: #64748b;
            font-size: 15px;
            font-weight: 600;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .menu a:hover,
        .menu a.active {
            background: linear-gradient(90deg, rgba(29, 78, 216, 0.06) 0%, rgba(6, 182, 212, 0.02) 100%);
            color: #1d4ed8;
        }

        .menu a i {
            font-size: 18px;
            transition: transform 0.25s ease;
        }

        .menu a:hover i {
            transform: scale(1.1);
            color: #2563eb;
        }

        .logout-btn {
            width: 100%;
            background: #0f172a;
            border: none;
            padding: 14px;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.15);
            transition: all 0.2s ease;
        }

        .logout-btn:hover {
            background: #1e293b;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(15, 23, 42, 0.25);
        }

        /* ================= MAIN CONTENT ================= */

        .main {
            flex: 1;
            padding: 40px 60px;
            max-width: 1400px;
            margin: 0 auto;
            width: 100%;
        }

        /* ================= HEADER PORTADA MODERNIZADA ================= */

        .cover {
            position: relative;
            margin-bottom: 40px;
        }

        .cover-img {
            width: 100%;
            height: 320px;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.04);
            position: relative;
        }

        .cover-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .cover-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 40%, rgba(15, 23, 42, 0.85) 100%);
        }

        .profile-area {
            position: absolute;
            bottom: -30px;
            left: 40px;
            display: flex;
            align-items: flex-end;
            gap: 24px;
            z-index: 10;
        }

        .profile-img {
            position: relative;
        }

        .profile-img img {
            width: 140px;
            height: 140px;
            border-radius: 24px;
            border: 6px solid #fff;
            object-fit: cover;
            background: white;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }

        .profile-img a {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 12px;
            font-size: 13px;
            color: #1d4ed8;
            text-decoration: none;
            font-weight: 700;
            background: rgba(29, 78, 216, 0.08);
            padding: 6px 14px;
            border-radius: 20px;
            transition: all 0.2s ease;
        }

        .profile-img a:hover {
            background: #1d4ed8;
            color: white;
            transform: translateY(-1px);
        }

        .edit-cover {
            position: absolute;
            top: 24px;
            right: 24px;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            padding: 10px 18px;
            border-radius: 12px;
            cursor: pointer;
            color: #0f172a;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: all 0.2s ease;
        }

        .edit-cover:hover {
            background: #fff;
            transform: scale(1.03);
        }

        /* ================= ASYMMETRIC GRID SYSTEM ================= */

        .grid {
            display: grid;
            grid-template-columns: 7fr 5fr;
            gap: 32px;
            margin-top: 60px;
            align-items: start;
        }

        /* ================= CARDS & SECTIONS ================= */

        .card {
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid rgba(0, 0, 0, 0.03);
            padding: 35px;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.02);
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: transparent;
            transition: background 0.3s ease;
        }

        .card:hover::before {
            background: linear-gradient(90deg, #1d4ed8, #06b6d4);
        }

        .card h2 {
            font-size: 32px;
            font-weight: 800;
            letter-spacing: -1px;
            margin-bottom: 8px;
        }

        .card h3 {
            margin-bottom: 24px;
            color: #0f172a;
            font-size: 18px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card h3 i {
            color: #1d4ed8;
        }

        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #f0fdf4;
            color: #16a34a;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .badge-status::before {
            content: '';
            width: 8px;
            height: 8px;
            background: #16a34a;
            border-radius: 50%;
        }

        .card p {
            color: #64748b;
            line-height: 1.6;
            font-size: 15px;
        }

        /* ================= CONTROLES E INPUTS FUTURISTAS ================= */

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #334155;
        }

        .input {
            width: 100%;
            padding: 14px 18px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            background: #f8fafc;
            outline: none;
            font-size: 15px;
            font-family: inherit;
            color: #0f172a;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .input:focus {
            border-color: #1d4ed8;
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(29, 78, 216, 0.08);
        }

        /* ================= BOTONES DINÁMICOS ================= */

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
            color: white;
            padding: 14px 28px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            border: none;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(29, 78, 216, 0.15);
            transition: all 0.25s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(29, 78, 216, 0.25);
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        }

        .btn-secondary {
            background: #f1f5f9;
            color: #334155;
            box-shadow: none;
        }

        .btn-secondary:hover {
            background: #e2e8f0;
            color: #0f172a;
            box-shadow: none;
            transform: none;
        }

        /* ================= RESPONSIVO & MOBILE TOGGLE ================= */

        .menu-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            width: 48px;
            height: 48px;
            border: none;
            border-radius: 12px;
            background: #fff;
            color: #0f172a;
            font-size: 18px;
            cursor: pointer;
            z-index: 1100;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.02);
        }

        .close-menu {
            display: none;
            position: absolute;
            top: 24px;
            right: 24px;
            background: #f1f5f9;
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            color: #334155;
        }

        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.3);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* ================= MEDIA QUERIES (TABLETS) ================= */

        @media (max-width: 1150px) {
            .grid {
                grid-template-columns: 1fr;
            }

            .main {
                padding: 40px;
            }
        }

        @media (max-width: 992px) {
            .menu-toggle {
                display: flex;
            }

            .sidebar {
                position: fixed;
                top: 0;
                left: -300px;
                width: 280px;
                height: 100%;
                box-shadow: 20px 0 60px rgba(0, 0, 0, 0.1);
                background: #fff;
                transition: left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .sidebar.active {
                left: 0;
            }

            .close-menu {
                display: block;
            }

            .main {
                padding: 100px 24px 40px;
            }
        }

        /* ================= MEDIA QUERIES (MÓVIL) ================= */

        @media (max-width: 600px) {
            .main {
                padding: 90px 16px 30px;
            }

            .cover-img {
                height: 200px;
                border-radius: 16px;
            }

            .profile-area {
                left: 50%;
                transform: translateX(-50%);
                bottom: -80px;
                flex-direction: column;
                align-items: center;
                gap: 10px;
                width: 100%;
            }

            .profile-img img {
                width: 110px;
                height: 110px;
                border-radius: 20px;
            }

            .edit-cover {
                top: 14px;
                right: 14px;
                padding: 8px 12px;
                font-size: 12px;
            }

            .grid {
                margin-top: 110px;
                gap: 20px;
            }

            .card {
                padding: 24px;
                border-radius: 20px;
            }

            .card h2 {
                font-size: 26px;
                text-align: center;
            }

            .badge-status {
                margin: 0 auto 15px auto;
            }

            .card-info-header {
                text-align: center;
                display: flex;
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- OVERLAY DIFUMINADO -->
    <div class="overlay" onclick="toggleMenu()"></div>

    <div class="container">

        <!-- SIDEBAR -->
        <div class="sidebar">
            <button class="close-menu" onclick="toggleMenu()">
                <i class="fas fa-times"></i>
            </button>

            <div>
                <div class="brand-container">
                    <div class="brand-logo"><i class="fas fa-bolt"></i></div>
                    <h2>Dashboard</h2>
                </div>

                <div class="menu">
                    <a href="/business" class="active">
                        <i class="fas fa-chart-pie"></i> Panel Principal
                    </a>
                    <a href="/business/profile">
                        <i class="fas fa-wallet"></i> Perfil Corporativo
                    </a>
                    <a href="/business/producto">
                        <i class="fas fa-tags"></i> Categorías
                    </a>
                    <a href="/business/gestion">
                        <i class="fas fa-folder-open"></i> Gestión Productos
                    </a>
                </div>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>

            <button class="logout-btn"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Cerrar sesión
            </button>
        </div>

        <!-- MAIN INTERFACE -->
        <div class="main">
            <!-- HAMBURGUESA -->
            <button class="menu-toggle" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </button>

            <!-- PORTADA HEADER -->
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
                                <i class="fas fa-arrow-down-to-line"></i> Descargar QR PNG
                            </a>
                        @else
                            <img src="https://via.placeholder.com/150" alt="QR no disponible">
                        @endif
                    </div>
                </div>

                <label for="uploadImage" class="edit-cover">
                    <i class="fas fa-camera"></i> Cambiar portada
                </label>
            </div>

            <!-- GRID PRINCIPAL ASIMÉTRICO -->
            <div class="grid">

                <!-- COLUMNA IZQUIERDA: CONTROL DE INFORMACIÓN -->
                <div style="display: flex; flex-direction: column; gap: 32px;">

                    <!-- INFO DE LA CUENTA -->
                    <div class="card">
                        <div class="card-info-header">
                            <span class="badge-status">Perfil Activo</span>
                            <h2>{{ Auth::user()->name }}</h2>
                        </div>
                        <p style="margin: 15px 0 25px 0;">Gestiona los accesos, la ubicación en tiempo real y los
                            parámetros públicos de tu menú interactivo.</p>

                        <a href="/{{ Auth::user()->slug }}" target="_blank" class="btn">
                            <i class="fas fa-external-link-alt"></i> Ver mi página pública
                        </a>
                    </div>

                    <!-- FORMULARIO DE NEGOCIO -->
                    <div class="card">
                        <h3><i class="fas fa-store"></i> Información del Negocio</h3>

                        <form action="/business/info" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>WhatsApp Comercial</label>
                                <input type="text" name="whatsapp" class="input" placeholder="Ej. 5219610000000"
                                    value="{{ Auth::user()->whatsapp }}">
                            </div>

                            <div class="form-group">
                                <label>Google Maps Embed URL</label>
                                <input type="text" name="map_url" class="input"
                                    placeholder="https://www.google.com/maps/embed?pb=..."
                                    value="{{ Auth::user()->map_url }}">
                            </div>

                            <div class="form-group">
                                <label>Horario de Atención</label>
                                <textarea name="schedule" class="input" rows="4" placeholder="Lunes a Domingo de 8:00 AM a 10:00 PM"
                                    style="resize:none;">{{ Auth::user()->schedule }}</textarea>
                            </div>

                            <button type="submit" class="btn" style="width: 100%;">
                                <i class="fas fa-cloud-upload-alt"></i> Guardar Cambios Comerciales
                            </button>
                        </form>
                    </div>
                </div>

                <!-- COLUMNA DERECHA: MEDIA & ASIGNACIÓN -->
                <div style="display: flex; flex-direction: column; gap: 32px;">
                    <div class="card">
                        <h3><i class="fas fa-image"></i> Actualizar Imagen de Portada</h3>
                        <p style="margin-bottom: 20px; font-size: 14px;">Sube archivos PNG o JPG de alta resolución para
                            la cabecera de tu menú comercial.</p>

                        <form action="/business/profile/image" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input id="uploadImage" type="file" name="image" required class="input"
                                style="padding: 10px;">

                            <button type="submit" class="btn btn-secondary" style="margin-top:20px; width:100%;">
                                Subir Archivo
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- SCRIPT QR PREMIUM CON LA NUEVA PALETA AZUL REY/CYAN -->
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
                        // Fondo de cristalización moderno
                        ctx.save();
                        ctx.shadowColor = "rgba(0, 0, 0, 0.4)";
                        ctx.shadowBlur = 60;
                        ctx.shadowOffsetY = 20;
                        ctx.fillStyle = "rgba(15, 23, 42, 0.8)";
                        roundRect(ctx, 100, 100, 1000, 1400, 36);
                        ctx.restore();

                        // Borde neón sutil azul/cyan
                        ctx.strokeStyle = "rgba(6, 182, 212, 0.4)";
                        ctx.lineWidth = 3;
                        ctx.stroke();

                        // Título Gradiente Neón
                        ctx.textAlign = "center";
                        const titleX = canvas.width / 2;
                        const titleY = 260;

                        const gradientNeon = ctx.createLinearGradient(0, titleY - 50, 0, titleY + 20);
                        gradientNeon.addColorStop(0, '#ffffff');
                        gradientNeon.addColorStop(0.5, '#3b82f6');
                        gradientNeon.addColorStop(1, '#06b6d4');

                        ctx.save();
                        ctx.shadowColor = "rgba(6, 182, 212, 0.6)";
                        ctx.shadowBlur = 20;
                        ctx.font = `bold 80px ${systemFont}`;
                        ctx.fillStyle = gradientNeon;
                        ctx.fillText("{{ Auth::user()->name }}", titleX, titleY);
                        ctx.restore();

                        // Subtítulo
                        ctx.fillStyle = "rgba(255, 255, 255, 0.7)";
                        ctx.font = `600 26px ${systemFont}`;
                        ctx.letterSpacing = "8px";
                        ctx.fillText("ESCANEALOS Y SORPRÉNDETE", titleX, titleY + 70);

                        // Contenedor QR Inteligente
                        const qrBoxX = 260;
                        const qrBoxY = 490;
                        const qrBoxSize = 680;

                        ctx.save();
                        ctx.shadowColor = "rgba(0, 0, 0, 0.5)";
                        ctx.shadowBlur = 50;
                        ctx.fillStyle =
                        "#ffffff"; // Fondo blanco puro para facilitar la lectura del sensor óptico
                        roundRect(ctx, qrBoxX, qrBoxY, qrBoxSize, qrBoxSize, 32);
                        ctx.restore();

                        // Inyección del código QR
                        ctx.drawImage(img, qrBoxX + 60, qrBoxY + 60, qrBoxSize - 120, qrBoxSize - 120);

                        // Píldora inferior informativa
                        ctx.fillStyle = "rgba(255, 255, 255, 0.1)";
                        roundRect(ctx, 250, 1260, 700, 70, 35);

                        ctx.fillStyle = "#06b6d4";
                        ctx.font = `600 24px ${systemFont}`;
                        ctx.fillText("{{ url('/' . Auth::user()->slug) }}", titleX, 1303);

                        // Botón de llamado a la acción moderno
                        const btnGrad = ctx.createLinearGradient(0, 1380, 0, 1470);
                        btnGrad.addColorStop(0, '#2563eb');
                        btnGrad.addColorStop(1, '#1d4ed8');

                        ctx.save();
                        ctx.shadowColor = "rgba(29, 78, 216, 0.4)";
                        ctx.shadowBlur = 25;
                        ctx.fillStyle = btnGrad;
                        roundRect(ctx, 320, 1380, 560, 90, 24);
                        ctx.restore();

                        ctx.fillStyle = "#ffffff";
                        ctx.font = `bold 28px ${systemFont}`;
                        ctx.letterSpacing = "3px";
                        ctx.fillText("CONECTA CON NOSOTROS", titleX, 1435);

                        // Descarga directa automágica
                        URL.revokeObjectURL(url);
                        const pngUrl = canvas.toDataURL('image/png');
                        const downloadLink = document.createElement('a');
                        downloadLink.href = pngUrl;
                        downloadLink.download = "qr-nextgen-{{ Auth::user()->slug }}.png";
                        document.body.appendChild(downloadLink);
                        downloadLink.click();
                        document.body.removeChild(downloadLink);
                    };

                    if (coverUrl) {
                        const cover = new Image();
                        cover.crossOrigin = "anonymous";
                        cover.onload = function() {
                            ctx.drawImage(cover, 0, 0, canvas.width, canvas.height);
                            ctx.fillStyle =
                            "rgba(15, 23, 42, 0.75)"; // Desenfoque oscuro de fondo cinematográfico
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
                alert('No se pudo generar el empaquetado del QR.');
            }
        });

        function drawDefaultBackground(ctx, canvas) {
            const gradient = ctx.createLinearGradient(0, 0, canvas.width, canvas.height);
            gradient.addColorStop(0, '#0f172a');
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

        // CONTROL CONTROLADOR INTERFAZ FLUIDA (SIDEBAR POP-UP)
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
