<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Dashboard - Perfil</title>

    <!-- Fuente Inter para un look ultra minimalista -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        :root {
            --bg-main: #0b0f19;
            /* Fondo oscuro profundo */
            --royal-blue: #1e40af;
            /* Azul Rey Base */
            --royal-electric: #3b82f6;
            /* Azul Eléctrico para destaques */
            --royal-glow: rgba(30, 64, 175, 0.15);
            --glass-bg: rgba(255, 255, 255, 0.03);
            /* Fondo de cristal ultra sutil */
            --glass-border: rgba(255, 255, 255, 0.08);
            /* Borde de cristal */
            --text-main: #f3f4f6;
            --text-muted: #9ca3af;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-main);
            color: var(--text-main);
            overflow-x: hidden;
            /* Luces de fondo ambientales minimalistas */
            background-image:
                radial-gradient(circle at 0% 0%, rgba(30, 64, 175, 0.15) 0%, transparent 35%),
                radial-gradient(circle at 100% 100%, rgba(59, 130, 246, 0.1) 0%, transparent 40%);
            background-attachment: fixed;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* ================= SIDEBAR (Glass Premium) ================= */

        .sidebar {
            width: 280px;
            background: rgba(11, 15, 25, 0.6);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-right: 1px solid var(--glass-border);
            padding: 35px 24px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            z-index: 1000;
        }

        .sidebar h2 {
            text-align: left;
            padding-left: 10px;
            color: var(--text-main);
            letter-spacing: 4px;
            font-weight: 700;
            font-size: 20px;
            position: relative;
            display: flex;
            align-items: center;
        }

        .sidebar h2::before {
            content: '';
            display: inline-block;
            width: 8px;
            height: 8px;
            background: var(--royal-electric);
            border-radius: 50%;
            margin-right: 10px;
            box-shadow: 0 0 12px var(--royal-electric);
        }

        .menu {
            margin-top: 50px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 16px;
            margin-bottom: 8px;
            border-radius: 12px;
            text-decoration: none;
            color: var(--text-muted);
            font-size: 14px;
            font-weight: 500;
            transition: 0.3s ease;
            border: 1px solid transparent;
        }

        .menu a:hover,
        .menu a.active {
            background: rgba(30, 64, 175, 0.1);
            color: #ffffff;
            border-color: rgba(59, 130, 246, 0.2);
            transform: translateX(4px);
        }

        .menu a i {
            font-size: 16px;
            transition: 0.3s;
        }

        .menu a:hover i {
            color: var(--royal-electric);
        }

        .logout-btn {
            width: 100%;
            background: transparent;
            border: 1px solid rgba(239, 68, 68, 0.2);
            padding: 14px;
            border-radius: 12px;
            color: #ef4444;
            weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.08);
            border-color: #ef4444;
        }

        /* ================= MAIN CONTENT ================= */

        .main {
            flex: 1;
            padding: 50px;
            overflow-y: auto;
            position: relative;
        }

        /* ================= PORTADA MODERNA ================= */

        .cover {
            position: relative;
            margin-bottom: 40px;
        }

        .cover-img {
            width: 100%;
            height: 320px;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            border: 1px solid var(--glass-border);
        }

        .cover-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            filter: brightness(0.85);
        }

        .cover-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 24px;
            background: linear-gradient(to top, var(--bg-main) 0%, rgba(11, 15, 25, 0.2) 60%, transparent 100%);
        }

        .profile-img {
            position: absolute;
            bottom: -40px;
            left: 50px;
            z-index: 10;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .profile-img img {
            width: 120px;
            height: 120px;
            border-radius: 24px;
            /* Cuadrado suavizado ultra moderno */
            border: 4px solid var(--bg-main);
            object-fit: cover;
            background: var(--bg-main);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5), 0 0 0 1px var(--glass-border);
        }

        .profile-img a {
            display: inline-block;
            margin-top: 12px;
            font-size: 13px;
            color: var(--royal-electric);
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
            letter-spacing: 0.5px;
        }

        .profile-img a:hover {
            color: #ffffff;
            text-shadow: 0 0 10px var(--royal-electric);
        }

        .edit-cover {
            position: absolute;
            bottom: 25px;
            right: 25px;
            background: rgba(11, 15, 25, 0.6);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            padding: 12px 20px;
            border-radius: 12px;
            cursor: pointer;
            color: #ffffff;
            font-size: 13px;
            font-weight: 500;
            transition: 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .edit-cover:hover {
            background: var(--royal-blue);
            border-color: var(--royal-electric);
        }

        /* ================= GRID LAYOUT ================= */

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-top: 80px;
        }

        /* ================= CARDS EFECTO VIDRIO ================= */

        .card {
            background: var(--glass-bg);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-radius: 24px;
            border: 1px solid var(--glass-border);
            padding: 40px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
        }

        /* Sutil destello interno de vidrio */
        .card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.03) 0%, transparent 100%);
            pointer-events: none;
        }

        .card h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .card h3 {
            margin-bottom: 25px;
            color: #ffffff;
            font-size: 18px;
            font-weight: 600;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card h3::before {
            content: '';
            width: 4px;
            height: 16px;
            background: var(--royal-electric);
            border-radius: 2px;
        }

        .card p {
            color: var(--text-muted);
            line-height: 1.7;
            font-size: 14px;
        }

        /* ================= BOTONES PREMIUM ================= */

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: var(--royal-blue);
            background: linear-gradient(135deg, var(--royal-blue) 0%, #1d4ed8 100%);
            color: white;
            padding: 14px 24px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            border: none;
            cursor: pointer;
            transition: 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            box-shadow: 0 8px 24px rgba(30, 64, 175, 0.3);
        }

        .btn:hover {
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
            box-shadow: 0 12px 30px rgba(59, 130, 246, 0.4);
            transform: translateY(-2px);
        }

        /* ================= INPUT MODERNO ================= */

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 10px;
            font-size: 13px;
            font-weight: 500;
            color: var(--text-muted);
            letter-spacing: 0.5px;
        }

        .input {
            width: 100%;
            padding: 15px 18px;
            border-radius: 12px;
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid var(--glass-border);
            outline: none;
            font-size: 14px;
            color: #ffffff;
            font-family: inherit;
            transition: 0.3s;
        }

        .input::placeholder {
            color: rgba(255, 255, 255, 0.2);
        }

        .input:focus {
            border-color: var(--royal-electric);
            background: rgba(0, 0, 0, 0.3);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
        }

        /* Input file estilizado */
        input[type="file"].input {
            padding: 12px;
            cursor: pointer;
        }

        /* ================= RESPONSIVE Y MENÚS ================= */

        .menu-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            width: 50px;
            height: 50px;
            border: 1px solid var(--glass-border);
            border-radius: 12px;
            background: rgba(11, 15, 25, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            color: white;
            font-size: 18px;
            cursor: pointer;
            z-index: 1100;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        .close-menu {
            display: none;
            position: absolute;
            top: 25px;
            right: 25px;
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: var(--text-muted);
        }

        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(5, 7, 12, 0.6);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            opacity: 0;
            visibility: hidden;
            transition: 0.3s;
            z-index: 999;
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* ================= TABLET MEDIA QUERY ================= */

        @media (max-width: 1024px) {
            .menu-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .sidebar {
                position: fixed;
                top: 0;
                left: -300px;
                width: 280px;
                height: 100%;
                background: #0b0f19;
                box-shadow: 20px 0 50px rgba(0, 0, 0, 0.5);
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

            .grid {
                grid-template-columns: 1fr;
                gap: 25px;
                margin-top: 60px;
            }
        }

        /* ================= MÓVIL MEDIA QUERY ================= */

        @media (max-width: 600px) {
            .main {
                padding: 90px 16px 30px;
            }

            .cover-img {
                height: 220px;
                border-radius: 16px;
            }

            .profile-img {
                left: 50%;
                transform: translateX(-50%);
                bottom: -50px;
            }

            .profile-img img {
                width: 100px;
                height: 100px;
                border-radius: 20px;
            }

            .edit-cover {
                right: 15px;
                bottom: 15px;
                padding: 8px 14px;
                font-size: 11px;
            }

            .grid {
                margin-top: 70px;
            }

            .card {
                padding: 25px 20px;
                border-radius: 20px;
            }

            .card h2 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

    <!-- OVERLAY -->
    <div class="overlay" onclick="toggleMenu()"></div>

    <div class="container">

        <!-- SIDEBAR -->
        <div class="sidebar">

            <!-- BOTÓN CERRAR -->
            <button class="close-menu" onclick="toggleMenu()">
                <i class="fas fa-times"></i>
            </button>

            <div>
                <h2>BUSINESS</h2>

                <div class="menu">
                    <a href="/business">
                        <i class="fas fa-chart-line"></i>
                        Dashboard
                    </a>

                    <a href="/business/profile" class="active">
                        <i class="fas fa-user"></i>
                        Perfil
                    </a>

                    <a href="/business/producto">
                        <i class="fas fa-file-alt"></i>
                        Producto-Categoria
                    </a>

                    <a href="/business/gestion">
                        <i class="fas fa-boxes"></i>
                        Gestión de Producto
                    </a>
                </div>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>

            <button class="logout-btn"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                Cerrar sesión
            </button>

        </div>

        <!-- MAIN CONTENT -->
        <div class="main">

            <!-- BOTÓN HAMBURGUESA -->
            <button class="menu-toggle" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </button>

            <!-- PORTADA -->
            <div class="cover">
                <div class="cover-img">
                    <img
                        src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}">
                </div>
                <div class="cover-overlay"></div>

                <div class="profile-img">
                    @if (Auth::user()->qr_path)
                        <img src="{{ asset('storage/' . Auth::user()->qr_path) }}" alt="QR de {{ Auth::user()->slug }}">
                        <a href="#" id="downloadQr"><i class="fas fa-download"></i> Descargar QR</a>
                    @else
                        <img src="https://via.placeholder.com/150" alt="QR no disponible">
                    @endif
                </div>

                <label for="uploadImage" class="edit-cover">
                    <i class="fas fa-camera"></i>
                    Cambiar portada
                </label>
            </div>

            <!-- CONTENIDO LAYOUT -->
            <div class="grid">

                <!-- INFO DE PERFIL -->
                <div class="card">
                    <h2>{{ Auth::user()->name }}</h2>
                    <p style="margin-bottom: 25px;">Perfil activo • Negocio digital 🚀</p>

                    <div>
                        <a href="/{{ Auth::user()->slug }}" target="_blank" class="btn">
                            Ver mi página <i class="fas fa-external-link-alt"></i>
                        </a>
                    </div>
                </div>

                <!-- FORMULARIO IMAGEN -->
                <div class="card">
                    <h3>Actualizar imagen</h3>

                    <form action="/business/profile/image" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">
                            <input id="uploadImage" type="file" name="image" required class="input">
                        </div>

                        <button type="submit" class="btn" style="width:100%;">
                            Guardar cambios
                        </button>
                    </form>
                </div>

                <!-- INFO NEGOCIO -->
                <div class="card" style="grid-column: 1 / -1;">
                    <h3>Información del negocio</h3>

                    <form action="/business/info" method="POST">
                        @csrf

                        <div class="grid"
                            style="margin-top:0; gap:20px; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));">
                            <!-- WHATSAPP -->
                            <div class="input-group">
                                <label>WhatsApp</label>
                                <input type="text" name="whatsapp" class="input" placeholder="5219610000000"
                                    value="{{ Auth::user()->whatsapp }}">
                            </div>

                            <!-- MAPA -->
                            <div class="input-group">
                                <label>URL Google Maps Embed</label>
                                <input type="text" name="map_url" class="input"
                                    placeholder="https://www.google.com/maps/embed?pb=..."
                                    value="{{ Auth::user()->map_url }}">
                            </div>
                        </div>

                        <!-- HORARIO -->
                        <div class="input-group" style="margin-top: 10px;">
                            <label>Horario</label>
                            <textarea name="schedule" class="input" rows="4" placeholder="Lunes a Domingo de 8:00 AM a 10:00 PM"
                                style="resize:none;">{{ Auth::user()->schedule }}</textarea>
                        </div>

                        <button type="submit" class="btn" style="width:100%; margin-top: 10px;">
                            <i class="fas fa-save"></i> Guardar información
                        </button>
                    </form>
                </div>

            </div>

        </div>

    </div>

    <!-- SCRIPT CANVAS: REDISEÑADO A "ROYAL GLASS MINIMALIST" -->
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
                    const systemFont = "'Inter', -apple-system, BlinkMacSystemFont, sans-serif";

                    const drawCanvasContent = () => {
                        // ==========================================
                        // 1. EFECTO CRISTAL ROYAL (Glassmorphism sobre fondo oscuro)
                        // ==========================================
                        ctx.save();
                        // Sombra ambiental suave
                        ctx.shadowColor = "rgba(0, 0, 0, 0.6)";
                        ctx.shadowBlur = 50;
                        ctx.shadowOffsetY = 25;

                        // Caja contenedora translúcida oscurecida (Vidrio ahumado de lujo)
                        ctx.fillStyle = "rgba(11, 15, 25, 0.65)";
                        roundRect(ctx, 100, 100, 1000, 1400, 40);
                        ctx.restore();

                        // Borde de cristal Azul Eléctrico fino e hipermoderno
                        ctx.strokeStyle = "rgba(59, 130, 246, 0.25)";
                        ctx.lineWidth = 3;
                        ctx.stroke();

                        // ==========================================
                        // 2. TIPOGRAFÍA MINIMALISTA BLANCA Y LUZ AZUL REY
                        // ==========================================
                        ctx.textAlign = "center";
                        const titleX = canvas.width / 2;
                        const titleY = 260;

                        // Nombre de marca con brillo sutil blanco/azul
                        ctx.save();
                        ctx.shadowColor = "rgba(59, 130, 246, 0.4)";
                        ctx.shadowBlur = 20;
                        ctx.font = `bold 72px ${systemFont}`;
                        ctx.fillStyle = "#FFFFFF";
                        ctx.fillText("{{ Auth::user()->name }}", titleX, titleY);
                        ctx.restore();

                        // Subtítulo Minimalista en Azul Eléctrico
                        ctx.fillStyle = "#3b82f6";
                        ctx.font = `600 24px ${systemFont}`;
                        ctx.letterSpacing = "8px";
                        ctx.fillText("MENÚ DIGITAL", titleX, titleY + 70);

                        // Divisor lineal minimalista
                        ctx.fillStyle = "rgba(255, 255, 255, 0.1)";
                        roundRect(ctx, titleX - 150, titleY + 110, 300, 2, 1);

                        // ==========================================
                        // 3. ENCUADRE DE QR MODERNO Y SEGURO
                        // ==========================================
                        const qrBoxX = 260;
                        const qrBoxY = 500;
                        const qrBoxSize = 680;

                        ctx.save();
                        ctx.shadowColor = "rgba(0, 0, 0, 0.5)";
                        ctx.shadowBlur = 35;
                        ctx.shadowOffsetY = 20;

                        // Contenedor blanco puro flotante (Esencial para legibilidad de escaneo)
                        ctx.fillStyle = "#FFFFFF";
                        roundRect(ctx, qrBoxX, qrBoxY, qrBoxSize, qrBoxSize, 32);
                        ctx.restore();

                        // Guías minimalistas en las esquinas del QR (Estilo escáner futurista)
                        ctx.strokeStyle = "#1e40af";
                        ctx.lineWidth = 6;
                        ctx.lineCap = "round";
                        const offset = 45;
                        const len = 40;

                        // Arriba Izq
                        ctx.beginPath();
                        ctx.moveTo(qrBoxX + offset, qrBoxY + offset + len);
                        ctx.lineTo(qrBoxX + offset, qrBoxY + offset);
                        ctx.lineTo(qrBoxX + offset + len, qrBoxY + offset);
                        ctx.stroke();
                        // Arriba Der
                        ctx.beginPath();
                        ctx.moveTo(qrBoxX + qrBoxSize - offset - len, qrBoxY + offset);
                        ctx.lineTo(qrBoxX + qrBoxSize - offset, qrBoxY + offset);
                        ctx.lineTo(qrBoxX + qrBoxSize - offset, qrBoxY + offset + len);
                        ctx.stroke();
                        // Abajo Izq
                        ctx.beginPath();
                        ctx.moveTo(qrBoxX + offset, qrBoxY + qrBoxSize - offset - len);
                        ctx.lineTo(qrBoxX + offset, qrBoxY + qrBoxSize - offset);
                        ctx.lineTo(qrBoxX + offset + len, qrBoxY + qrBoxSize - offset);
                        ctx.stroke();
                        // Abajo Der
                        ctx.beginPath();
                        ctx.moveTo(qrBoxX + qrBoxSize - offset - len, qrBoxY + qrBoxSize - offset);
                        ctx.lineTo(qrBoxX + qrBoxSize - offset, qrBoxY + qrBoxSize - offset);
                        ctx.lineTo(qrBoxX + qrBoxSize - offset, qrBoxY + qrBoxSize - offset - len);
                        ctx.stroke();

                        // Pintar el código QR perfectamente centrado
                        ctx.drawImage(img, qrBoxX + 75, qrBoxY + 75, qrBoxSize - 150, qrBoxSize - 150);

                        // ==========================================
                        // 4. TEXTOS DE LLAMADO A LA ACCIÓN (CTA)
                        // ==========================================
                        ctx.fillStyle = "#FFFFFF";
                        ctx.font = `600 36px ${systemFont}`;
                        ctx.letterSpacing = "1px";
                        ctx.fillText("Escanea para abrir la app", titleX, 1260);

                        // Píldora contenedora de URL minimalista
                        ctx.fillStyle = "rgba(0, 0, 0, 0.3)";
                        roundRect(ctx, 250, 1310, 700, 60, 16);
                        ctx.strokeStyle = "rgba(255, 255, 255, 0.08)";
                        ctx.stroke();

                        ctx.fillStyle = "#9ca3af";
                        ctx.font = `500 22px ${systemFont}`;
                        ctx.letterSpacing = "0px";
                        ctx.fillText("{{ url('/' . Auth::user()->slug) }}", titleX, 1346);

                        // Botón de footer Royal Blue sólido
                        ctx.save();
                        ctx.shadowColor = "rgba(30, 64, 175, 0.4)";
                        ctx.shadowBlur = 25;
                        ctx.shadowOffsetY = 10;

                        const btnGrad = ctx.createLinearGradient(0, 1410, 0, 1490);
                        btnGrad.addColorStop(0, '#2563eb');
                        btnGrad.addColorStop(1, '#1e40af');

                        ctx.fillStyle = btnGrad;
                        roundRect(ctx, 320, 1410, 560, 80, 20);
                        ctx.restore();

                        // Texto del botón
                        ctx.fillStyle = "#FFFFFF";
                        ctx.font = `bold 26px ${systemFont}`;
                        ctx.letterSpacing = "3px";
                        ctx.fillText("ESCANEA Y VISÍTANOS", titleX, 1458);

                        // ==========================================
                        // 5. TERMINAR Y CONFIGURAR DESCARGA
                        // ==========================================
                        URL.revokeObjectURL(url);
                        const pngUrl = canvas.toDataURL('image/png');
                        const downloadLink = document.createElement('a');

                        downloadLink.href = pngUrl;
                        downloadLink.download = "qr-royal-glass-{{ Auth::user()->slug }}.png";

                        document.body.appendChild(downloadLink);
                        downloadLink.click();
                        document.body.removeChild(downloadLink);
                    };

                    // Cargador del fondo degradado moderno de la tarjeta
                    if (coverUrl) {
                        const cover = new Image();
                        cover.crossOrigin = "anonymous";
                        cover.onload = function() {
                            ctx.drawImage(cover, 0, 0, canvas.width, canvas.height);
                            // Filtro de capa oscura Royal Blue ambiental
                            ctx.fillStyle = "rgba(11, 15, 25, 0.85)";
                            ctx.fillRect(0, 0, canvas.width, canvas.height);

                            // Añadir un destello radial extra al fondo del canvas
                            const radialGlow = ctx.createRadialGradient(canvas.width / 2, canvas
                                .height / 2, 10, canvas.width / 2, canvas.height / 2, 800);
                            radialGlow.addColorStop(0, 'rgba(30, 64, 175, 0.25)');
                            radialGlow.addColorStop(1, 'transparent');
                            ctx.fillStyle = radialGlow;
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
                alert('Error al generar la descarga premium.');
            }
        });

        // Fondo por defecto Premium de baja iluminación
        function drawDefaultBackground(ctx, canvas) {
            const gradient = ctx.createLinearGradient(0, 0, canvas.width, canvas.height);
            gradient.addColorStop(0, '#0b0f19');
            gradient.addColorStop(0.5, '#111827');
            gradient.addColorStop(1, '#070a10');
            ctx.fillStyle = gradient;
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            const radialGlow = ctx.createRadialGradient(canvas.width / 2, canvas.height / 3, 50, canvas.width / 2, canvas
                .height / 3, 600);
            radialGlow.addColorStop(0, 'rgba(30, 64, 175, 0.3)');
            radialGlow.addColorStop(1, 'transparent');
            ctx.fillStyle = radialGlow;
            ctx.fillRect(0, 0, canvas.width, canvas.height);
        }

        // Utilidad nativa de rectángulos curvos
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
    </script>

    <!-- SCRIPT RESPONSIVE TOGGLE MENU -->
    <script>
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

            if (window.innerWidth > 1024) {
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
