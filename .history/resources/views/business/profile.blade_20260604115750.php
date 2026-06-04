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
            color: #1b4f72;
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
            background: #eaf2f8;
            color: #1b4f72;
            transform: translateX(3px);
        }

        .logout-btn {
            width: 100%;
            background: #1b4f72;
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
            background: #153d58;
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
            color: #1b4f72;
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
            color: #1b4f72;
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
            background: #1b4f72;
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
            background: #153d58;
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
            border-color: #1b4f72;
            box-shadow: 0 0 0 4px rgba(27, 79, 114, 0.12);
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
            background: #1b4f72;
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
                    canvas.width = 1200;
                    canvas.height = 1600;
                    const systemFont = "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif";

                    const drawCanvasContent = () => {
                        // ==========================================
                        // 1. EFECTO CRISTAL (Glassmorphism de fondo)
                        // ==========================================
                        ctx.save();
                        // Sombra exterior muy suave para separar la tarjeta del fondo real
                        ctx.shadowColor = "rgba(0, 0, 0, 0.4)";
                        ctx.shadowBlur = 60;
                        ctx.shadowOffsetY = 20;

                        // Capa translúcida que deja ver el fondo de manera elegante
                        ctx.fillStyle = "rgba(10, 15, 20, 0.45)";
                        roundRect(ctx, 100, 100, 1000, 1400, 30);
                        ctx.restore();

                        // Borde fino azul/brillante del cristal
                        ctx.strokeStyle = "rgba(41, 128, 185, 0.25)";
                        ctx.lineWidth = 3;
                        ctx.stroke();

                        // ==========================================
                        // 2. TÍTULO EN AZUL METÁLICO (Gradiente y Relieve)
                        // ==========================================
                        ctx.textAlign = "center";
                        const titleX = canvas.width / 2;
                        const titleY = 250;

                        // Gradiente de azul de 4 pasos (simula reflejo metálico profesional)
                        const blueGlow = ctx.createLinearGradient(0, titleY - 60, 0, titleY + 20);
                        blueGlow.addColorStop(0, '#EBF5FB'); // Brillo máximo
                        blueGlow.addColorStop(0.3, '#2980B9'); // Azul base claro
                        blueGlow.addColorStop(0.6, '#1B4F72'); // Azul rey base
                        blueGlow.addColorStop(1, '#5DADE2'); // Reflejo inferior

                        // Sombra del título para separarlo del fondo
                        ctx.save();
                        ctx.shadowColor = "rgba(0, 0, 0, 0.8)";
                        ctx.shadowBlur = 15;
                        ctx.shadowOffsetY = 8;

                        ctx.font = `bold 76px ${systemFont}`;
                        ctx.fillStyle = blueGlow;
                        ctx.fillText("{{ Auth::user()->name }}", titleX, titleY);
                        ctx.restore();

                        // Subtítulo estilizado
                        ctx.fillStyle = "rgba(255, 255, 255, 0.75)";
                        ctx.font = `600 30px ${systemFont}`;
                        ctx.letterSpacing = "6px";
                        ctx.fillText("MENÚ DIGITAL", titleX, titleY + 75);

                        // Adorno lineal azul bajo el subtítulo
                        ctx.fillStyle = "#2980B9";
                        roundRect(ctx, titleX - 100, titleY + 110, 200, 3, 2);

                        // ==========================================
                        // 3. MARCO DE QR DE LUJO Y CÓDIGO QR
                        // ==========================================
                        const qrBoxX = 260;
                        const qrBoxY = 500;
                        const qrBoxSize = 680;

                        // Sombra masiva para el contenedor del QR (Le da volumen 3D)
                        ctx.save();
                        ctx.shadowColor = "rgba(0, 0, 0, 0.65)";
                        ctx.shadowBlur = 40;
                        ctx.shadowOffsetY = 15;

                        // Marco exterior azul grueso
                        ctx.fillStyle = "#153D58";
                        roundRect(ctx, qrBoxX, qrBoxY, qrBoxSize, qrBoxSize, 24);

                        // Interior del marco (Contraste blanco puro para que el QR sea 100% escaneable)
                        ctx.fillStyle = "#FFFFFF";
                        roundRect(ctx, qrBoxX + 15, qrBoxY + 15, qrBoxSize - 30, qrBoxSize - 30, 16);
                        ctx.restore();

                        // Esquinas interiores azules (Estilo filigrana geométrica del render)
                        ctx.fillStyle = "#2980B9";
                        const pad = 35;
                        // Superior Izquierda
                        ctx.fillRect(qrBoxX + pad, qrBoxY + pad, 40, 6);
                        ctx.fillRect(qrBoxX + pad, qrBoxY + pad, 6, 40);
                        // Superior Derecha
                        ctx.fillRect(qrBoxX + qrBoxSize - pad - 40, qrBoxY + pad, 40, 6);
                        ctx.fillRect(qrBoxX + qrBoxSize - pad - 6, qrBoxY + pad, 6, 40);
                        // Inferior Izquierda
                        ctx.fillRect(qrBoxX + pad, qrBoxY + qrBoxSize - pad - 6, 40, 6);
                        ctx.fillRect(qrBoxX + pad, qrBoxY + qrBoxSize - pad - 40, 6, 40);
                        // Inferior Derecha
                        ctx.fillRect(qrBoxX + qrBoxSize - pad - 40, qrBoxY + qrBoxSize - pad - 6, 40,
                            6);
                        ctx.fillRect(qrBoxX + qrBoxSize - pad - 6, qrBoxY + qrBoxSize - pad - 40, 6,
                            40);

                        // Dibujar el QR centrado a la perfección
                        ctx.drawImage(img, qrBoxX + 65, qrBoxY + 65, qrBoxSize - 130, qrBoxSize - 130);

                        // ==========================================
                        // 4. CTA Y ELEMENTOS INFERIORES
                        // ==========================================
                        ctx.save();
                        ctx.shadowColor = "rgba(0, 0, 0, 0.5)";
                        ctx.shadowBlur = 10;
                        ctx.shadowOffsetY = 4;

                        ctx.fillStyle = "#EBF5FB";
                        ctx.font = `bold 42px ${systemFont}`;
                        ctx.fillText("Escanea el código QR", titleX, 1260);
                        ctx.restore();

                        // Píldora de la URL estilizada
                        ctx.fillStyle = "rgba(0, 0, 0, 0.4)";
                        roundRect(ctx, 250, 1310, 700, 60, 30);
                        ctx.strokeStyle = "rgba(41, 128, 185, 0.3)";
                        ctx.stroke();

                        ctx.fillStyle = "#5DADE2";
                        ctx.font = `500 24px ${systemFont}`;
                        ctx.fillText("{{ url('/' . Auth::user()->slug) }}", titleX, 1348);

                        // Botón inferior "ESCANEA Y VISÍTANOS" con relieve metálico
                        ctx.save();
                        ctx.shadowColor = "rgba(0,0,0,0.4)";
                        ctx.shadowBlur = 20;
                        ctx.shadowOffsetY = 8;

                        const btnGrad = ctx.createLinearGradient(0, 1410, 0, 1490);
                        btnGrad.addColorStop(0, '#153D58');
                        btnGrad.addColorStop(0.5, '#2980B9');
                        btnGrad.addColorStop(1, '#0F2A3F');

                        ctx.fillStyle = btnGrad;
                        roundRect(ctx, 350, 1410, 500, 80, 40);
                        ctx.restore();

                        // Texto del botón
                        ctx.fillStyle = "#FFFFFF";
                        ctx.font = `bold 30px ${systemFont}`;
                        ctx.letterSpacing = "2px";
                        ctx.fillText("ESCANEA Y VISÍTANOS", titleX, 1460);

                        // ==========================================
                        // 5. EJECUTAR DESCARGA
                        // ==========================================
                        URL.revokeObjectURL(url);
                        const pngUrl = canvas.toDataURL('image/png');
                        const downloadLink = document.createElement('a');

                        downloadLink.href = pngUrl;
                        downloadLink.download = "qr-premium-{{ Auth::user()->slug }}.png";

                        document.body.appendChild(downloadLink);
                        downloadLink.click();
                        document.body.removeChild(downloadLink);
                    };

                    // Loader y render del fondo
                    if (coverUrl) {
                        const cover = new Image();
                        cover.crossOrigin = "anonymous";
                        cover.onload = function() {
                            // Dibujar la imagen de fondo completa
                            ctx.drawImage(cover, 0, 0, canvas.width, canvas.height);

                            // Capa oscura ambiental fría para unificar el fondo con los azules
                            ctx.fillStyle = "rgba(5, 12, 18, 0.55)";
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

        // Fondo alternativo lujoso por si no hay imagen de fondo activa
        function drawDefaultBackground(ctx, canvas) {
            const gradient = ctx.createLinearGradient(0, 0, canvas.width, canvas.height);
            gradient.addColorStop(0, '#080D11');
            gradient.addColorStop(0.5, '#101A23');
            gradient.addColorStop(1, '#060A0D');
            ctx.fillStyle = gradient;
            ctx.fillRect(0, 0, canvas.width, canvas.height);
        }

        // Función modificada para soportar fill y stroke sin perder el path
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
