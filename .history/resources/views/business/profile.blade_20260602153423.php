<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Dashboard</title>

    <!-- Fuente -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f9fafb;
            color: #1f2937;
            overflow-x: hidden;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 260px;
            background: #fff;
            border-right: 1px solid #ececec;
            padding: 28px 22px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: 0.35s ease;
            z-index: 1000;
        }

        .sidebar h2 {
            text-align: center;
            color: #c9a227;
            letter-spacing: 3px;
            font-weight: 700;
            font-size: 24px;
        }

        .menu {
            margin-top: 45px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 15px 16px;
            margin-bottom: 12px;
            border-radius: 14px;
            text-decoration: none;
            color: #4b5563;
            font-size: 15px;
            font-weight: 500;
            transition: 0.25s ease;
        }

        .menu a:hover {
            background: #fff7df;
            color: #c9a227;
            transform: translateX(3px);
        }

        .logout-btn {
            width: 100%;
            background: #c9a227;
            border: none;
            padding: 15px;
            border-radius: 14px;
            color: white;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #a8831f;
        }

        /* ================= MAIN ================= */

        .main {
            flex: 1;
            padding: 40px;
            overflow-y: auto;
            position: relative;
        }

        /* ================= PORTADA ================= */

        .cover {
            position: relative;
        }

        .cover-img {
            width: 100%;
            height: 360px;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.08);
        }

        .cover-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .cover-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 360px;
            border-radius: 28px;
            background: linear-gradient(to top,
                    rgba(0, 0, 0, 0.7),
                    rgba(0, 0, 0, 0.15),
                    transparent);
        }

        .profile-img {
            position: absolute;
            bottom: -65px;
            left: 45px;
            z-index: 10;
        }

        .profile-img img {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            border: 6px solid white;
            object-fit: cover;
            background: white;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .profile-img a {
            display: block;
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
            color: #444;
            text-decoration: none;
            font-weight: 500;
        }

        .profile-img a:hover {
            color: #c9a227;
        }

        .edit-cover {
            position: absolute;
            bottom: 22px;
            right: 22px;
            background: rgba(255, 255, 255, 0.18);
            backdrop-filter: blur(10px);
            padding: 12px 18px;
            border-radius: 14px;
            cursor: pointer;
            color: white;
            font-size: 14px;
            font-weight: 500;
            transition: 0.3s ease;
        }

        .edit-cover:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* ================= GRID ================= */

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 28px;
            margin-top: 95px;
        }

        /* ================= CARD ================= */

        .card {
            background: white;
            border-radius: 24px;
            border: 1px solid #ededed;
            padding: 35px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.04);
        }

        .card h2 {
            font-size: 30px;
            margin-bottom: 12px;
        }

        .card h3 {
            margin-bottom: 22px;
            color: #c9a227;
            font-size: 24px;
        }

        .card p {
            color: #6b7280;
            line-height: 1.7;
        }

        /* ================= BOTONES ================= */

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #c9a227;
            color: white;
            padding: 14px 22px;
            border-radius: 14px;
            text-decoration: none;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .btn:hover {
            background: #aa861d;
        }

        /* ================= INPUT ================= */

        .input {
            width: 100%;
            padding: 15px;
            border-radius: 14px;
            border: 1px solid #ddd;
            outline: none;
            font-size: 15px;
            transition: 0.3s ease;
        }

        .input:focus {
            border-color: #c9a227;
            box-shadow: 0 0 0 4px rgba(201, 162, 39, 0.12);
        }

        /* ================= HAMBURGUESA ================= */

        .menu-toggle {
            display: none;
            position: fixed;
            top: 18px;
            left: 18px;
            width: 52px;
            height: 52px;
            border: none;
            border-radius: 14px;
            background: #c9a227;
            color: white;
            font-size: 20px;
            cursor: pointer;
            z-index: 1100;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.18);
        }

        /* ================= CERRAR ================= */

        .close-menu {
            display: none;
            position: absolute;
            top: 18px;
            right: 18px;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #444;
        }

        /* ================= OVERLAY ================= */

        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
            backdrop-filter: blur(2px);
            opacity: 0;
            visibility: hidden;
            transition: 0.3s ease;
            z-index: 999;
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* ================= TABLET ================= */

        @media (max-width: 992px) {

            .menu-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .sidebar {
                position: fixed;
                top: 0;
                left: -280px;
                width: 260px;
                height: 100%;
                box-shadow: 10px 0 40px rgba(0, 0, 0, 0.12);
            }

            .sidebar.active {
                left: 0;
            }

            .close-menu {
                display: block;
            }

            .main {
                padding: 90px 22px 30px;
            }

            .cover-img,
            .cover-overlay {
                height: 300px;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 28px;
            }

            .profile-img {
                left: 25px;
            }
        }

        /* ================= MÓVIL ================= */

        @media (max-width: 600px) {

            .main {
                padding: 85px 14px 25px;
            }

            .cover-img,
            .cover-overlay {
                height: 230px;
                border-radius: 22px;
            }

            .profile-img {
                left: 40px;
                transform: none;
                bottom: -55px;
                text-align: left;
            }

            .profile-img img {
                width: 110px;
                height: 110px;
            }

            .edit-cover {
                right: 12px;
                bottom: 12px;
                padding: 10px 14px;
                font-size: 13px;
            }

            .grid {
                margin-top: 85px;
                gap: 20px;
            }

            .card {
                padding: 22px;
                border-radius: 20px;
                text-align: center;
            }

            .card h2 {
                font-size: 25px;
            }

            .card h3 {
                font-size: 22px;
            }

            .card p {
                font-size: 14px;
            }

            .btn {
                width: 100%;
                padding: 14px;
            }

            .menu a {
                font-size: 14px;
                padding: 14px;
            }

            .logout-btn {
                font-size: 14px;
                padding: 14px;
            }

            .menu-toggle {
                width: 48px;
                height: 48px;
                font-size: 18px;
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

                    <a href="/business/profile">
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

        <!-- MAIN -->
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

                        <a href="#" id="downloadQr">
                            Descargar QR
                        </a>
                    @else
                        <img src="https://via.placeholder.com/150" alt="QR no disponible">
                    @endif

                </div>

                <label for="uploadImage" class="edit-cover">
                    <i class="fas fa-camera"></i>
                    Cambiar portada
                </label>

            </div>

            <!-- CONTENIDO -->
            <div class="grid">

                <!-- INFO -->
                <div class="card">

                    <h2>{{ Auth::user()->name }}</h2>

                    <p>
                        Perfil activo • Negocio digital 🚀
                    </p>

                    <div style="margin-top:25px;">

                        <a href="/{{ Auth::user()->slug }}" target="_blank" class="btn">
                            Ver mi página
                        </a>

                    </div>

                </div>

                <!-- FORM -->
                <div class="card">

                    <h3>Actualizar imagen</h3>

                    <form action="/business/profile/image" method="POST" enctype="multipart/form-data">

                        @csrf

                        <input id="uploadImage" type="file" name="image" required class="input">

                        <button type="submit" class="btn" style="margin-top:20px; width:100%;">

                            Guardar cambios

                        </button>

                    </form>

                </div>

                <!-- INFO NEGOCIO -->
                <div class="card">

                    <h3>Información del negocio</h3>

                    <form action="/business/info" method="POST">

                        @csrf

                        <!-- WHATSAPP -->
                        <div style="margin-bottom:18px;">

                            <label style="display:block; margin-bottom:8px;">
                                WhatsApp
                            </label>

                            <input type="text" name="whatsapp" class="input" placeholder="5219610000000"
                                value="{{ Auth::user()->whatsapp }}">

                        </div>

                        <!-- MAPA -->
                        <div style="margin-bottom:18px;">

                            <label style="display:block; margin-bottom:8px;">
                                URL Google Maps Embed
                            </label>

                            <input type="text" name="map_url" class="input"
                                placeholder="https://www.google.com/maps/embed?pb=..."
                                value="{{ Auth::user()->map_url }}">

                        </div>

                        <!-- HORARIO -->
                        <div style="margin-bottom:18px;">

                            <label style="display:block; margin-bottom:8px;">
                                Horario
                            </label>

                            <textarea name="schedule" class="input" rows="5" placeholder="Lunes a Domingo de 8:00 AM a 10:00 PM"
                                style="resize:none;">{{ Auth::user()->schedule }}</textarea>

                        </div>

                        <button type="submit" class="btn" style="width:100%;">

                            Guardar información

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

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
                    // Dimensiones del lienzo (Alta resolución para impresión)
                    canvas.width = 1200;
                    canvas.height = 1600;

                    // Configuración de renderizado base
                    const qrSize = 600;
                    const systemFont =
                        "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif";

                    const drawCanvasContent = () => {
                        // ==========================================
                        // 1. TARJETA PRINCIPAL (Contenedor blanco)
                        // ==========================================
                        ctx.save();
                        ctx.shadowColor = "rgba(0, 0, 0, 0.08)";
                        ctx.shadowBlur = 50;
                        ctx.shadowOffsetY = 20;
                        ctx.fillStyle = "#FFFFFF";

                        // Tarjeta centrada con márgenes limpios
                        roundRect(ctx, 80, 80, 1040, 1440, 40);
                        ctx.restore();

                        // ==========================================
                        // 2. ENCABEZADO Y TEXTOS
                        // ==========================================
                        // Nombre del Negocio (Principal)
                        ctx.fillStyle = "#111827"; // Gris casi negro premium
                        ctx.textAlign = "center";
                        ctx.font = `bold 64px ${systemFont}`;
                        ctx.fillText("{{ Auth::user()->name }}", canvas.width / 2, 210);

                        // Subtítulo
                        ctx.fillStyle = "#4B5563"; // Gris medio
                        ctx.font = `600 28px ${systemFont}`;
                        ctx.letterSpacing =
                        "4px"; // Espaciado elegante (soportado en entornos modernos)
                        ctx.fillText("MENÚ DIGITAL", canvas.width / 2, 275);

                        // Línea divisoria minimalista (Accento sutil)
                        ctx.fillStyle = "#E5E7EB";
                        roundRect(ctx, (canvas.width / 2) - 80, 315, 160, 4, 2);

                        // ==========================================
                        // 3. CONTENEDOR DEL QR (Aislado y limpio)
                        // ==========================================
                        ctx.save();
                        ctx.shadowColor = "rgba(0, 0, 0, 0.03)";
                        ctx.shadowBlur = 20;
                        ctx.shadowOffsetY = 8;
                        ctx.fillStyle = "#F9FAFB"; // Fondo ligeramente gris para el marco QR
                        roundRect(ctx, 240, 380, 720, 720, 32);
                        ctx.restore();

                        // Dibujar el Código QR centrado dentro de su contenedor
                        ctx.drawImage(img, 300, 440, qrSize, qrSize);

                        // ==========================================
                        // 4. CALL TO ACTION (Llamado a la acción)
                        // ==========================================
                        ctx.fillStyle = "#1F2937";
                        ctx.font = `bold 46px ${systemFont}`;
                        ctx.fillText("Escanea el código QR", canvas.width / 2, 1180);

                        ctx.fillStyle = "#6B7280";
                        ctx.font = `normal 28px ${systemFont}`;
                        ctx.fillText("Consulta nuestro menú y realiza tu pedido", canvas.width / 2,
                            1235);

                        // ==========================================
                        // 5. ENLACE URL (Píldora minimalista)
                        // ==========================================
                        ctx.fillStyle = "#F3F4F6";
                        roundRect(ctx, 260, 1290, 680, 64, 32);

                        ctx.fillStyle = "#4B5563";
                        ctx.font = `600 24px ${systemFont}`;
                        ctx.fillText("{{ url('/' . Auth::user()->slug) }}", canvas.width / 2, 1331);

                        // ==========================================
                        // 6. PROCESAR DESCARGA
                        // ==========================================
                        URL.revokeObjectURL(url);
                        const pngUrl = canvas.toDataURL('image/png');
                        const downloadLink = document.createElement('a');

                        downloadLink.href = pngUrl;
                        downloadLink.download = "qr-{{ Auth::user()->slug }}.png";

                        document.body.appendChild(downloadLink);
                        downloadLink.click();
                        document.body.removeChild(downloadLink);
                    };

                    // ==========================================
                    // MANEJO DE FONDO (Imagen o Gradiente)
                    // ==========================================
                    if (coverUrl) {
                        const cover = new Image();
                        cover.crossOrigin = "anonymous";
                        cover.onload = function() {
                            // Dibujar imagen de fondo
                            ctx.drawImage(cover, 0, 0, canvas.width, canvas.height);

                            // Capa de desenfoque/oscuridad elegante para que resalte la tarjeta
                            ctx.fillStyle = "rgba(17, 24, 39, 0.65)";
                            ctx.fillRect(0, 0, canvas.width, canvas.height);

                            drawCanvasContent();
                        };
                        cover.onerror = function() {
                            // Fallback si la imagen de fondo falla al cargar
                            drawFallbackBackground(ctx, canvas);
                            drawCanvasContent();
                        };
                        cover.src = coverUrl;
                    } else {
                        // Si no hay imagen configurada, usa el gradiente premium por defecto
                        drawFallbackBackground(ctx, canvas);
                        drawCanvasContent();
                    }
                };

                img.src = url;

            } catch (error) {
                console.error(error);
                alert('Error al generar y descargar el QR.');
            }
        });

        // Función auxiliar para fondos sin imagen (Gradiente Premium Oscuro)
        function drawFallbackBackground(ctx, canvas) {
            const gradient = ctx.createLinearGradient(0, 0, canvas.width, canvas.height);
            gradient.addColorStop(0, '#0F172A'); // Slate 900
            gradient.addColorStop(1, '#1E293B'); // Slate 800
            ctx.fillStyle = gradient;
            ctx.fillRect(0, 0, canvas.width, canvas.height);
        }

        // Función optimizada para rectángulos con esquinas redondeadas
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

        // CERRAR MENÚ AUTOMÁTICAMENTE
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

                menuBtn.style.display = 'flex';
            }
        });
    </script>

</body>

</html>
