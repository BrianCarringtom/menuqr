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
        const coverUrl =
            "{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : '' }}";

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
                    const qrSize = 620;

                    canvas.width = 1200;
                    canvas.height = 1600;

                    const cover = new Image();
                    cover.crossOrigin = "anonymous";

                    cover.onload = function() {
                        // ==========================================
                        // 1. FONDO CON OVERLAY ULTRA OSCURO PREMIUM
                        // ==========================================
                        ctx.drawImage(cover, 0, 0, canvas.width, canvas.height);

                        // Degradado oscuro para fundir el fondo de forma sofisticada
                        let bgGradient = ctx.createLinearGradient(0, 0, 0, canvas.height);
                        bgGradient.addColorStop(0, "rgba(18, 18, 20, 0.85)");
                        bgGradient.addColorStop(1, "rgba(13, 13, 15, 0.96)");
                        ctx.fillStyle = bgGradient;
                        ctx.fillRect(0, 0, canvas.width, canvas.height);

                        // ==========================================
                        // 2. TARJETA PRINCIPAL (ESTILO CRISTAL / GLASS)
                        // ==========================================
                        ctx.save();
                        ctx.shadowColor = "rgba(0, 0, 0, 0.6)";
                        ctx.shadowBlur = 60;
                        ctx.shadowOffsetY = 25;

                        // Fondo ligeramente roto para dar contraste premium
                        ctx.fillStyle = "rgba(255, 255, 255, 0.98)";
                        roundRect(ctx, 80, 100, 1040, 1400, 48);
                        ctx.restore();

                        // ==========================================
                        // 3. NOMBRE DEL NEGOCIO (ESTILO IDENTIDAD)
                        // ==========================================
                        ctx.fillStyle = "#ff9f1c"; // Color de acento naranja/oro del menú
                        ctx.textAlign = "center";
                        ctx.font = "italic bold 64px Poppins, Arial"; // Combinación itálica estilizada
                        ctx.fillText("{{ $user->name }}", canvas.width / 2, 215);

                        // ==========================================
                        // 4. SUBTÍTULO DE LA MARCA
                        // ==========================================
                        ctx.fillStyle = "#4B5563";
                        ctx.font = "600 26px Poppins, Arial";
                        ctx.letterSpacing = "4px"; // Espaciado premium entre letras (soporte moderno)
                        ctx.fillText("MENÚ DIGITAL EXCLUSIVO", canvas.width / 2, 275);
                        ctx.letterSpacing = "0px"; // Resetear

                        // Línea dorada/naranja horizontal de la identidad
                        ctx.fillStyle = "#ff9f1c";
                        roundRect(ctx, 510, 310, 180, 6, 3);

                        // ==========================================
                        // 5. CONTENEDOR FLOTANTE PARA EL CÓDIGO QR
                        // ==========================================
                        ctx.save();
                        ctx.shadowColor =
                        "rgba(255, 159, 28, 0.15)"; // Sutil brillo del color del negocio
                        ctx.shadowBlur = 40;
                        ctx.shadowOffsetY = 10;
                        ctx.fillStyle = "#FFFFFF";

                        roundRect(ctx, 210, 370, 780, 780, 40);
                        ctx.restore();

                        // Marco lineal interior de diseño minimalista
                        ctx.strokeStyle = "rgba(255, 159, 28, 0.2)";
                        ctx.lineWidth = 4;
                        ctx.strokeRect(235, 395, 730, 730);

                        // Renderizado del Código QR
                        ctx.drawImage(img, 290, 450, qrSize, qrSize);

                        // ==========================================
                        // 6. MENSAJE DE LLAMADO A LA ACCIÓN (CTA)
                        // ==========================================
                        ctx.fillStyle = "#111827";
                        ctx.font = "bold 46px Poppins, Arial";
                        ctx.fillText("Escanea el código QR", canvas.width / 2, 1225);

                        ctx.fillStyle = "#6B7280";
                        ctx.font = "500 28px Poppins, Arial";
                        ctx.fillText("Descubre nuestra variedad desde tu smartphone", canvas.width / 2,
                            1280);

                        // ==========================================
                        // 7. CONTENEDOR DE LA URL
                        // ==========================================
                        ctx.fillStyle = "#F3F4F6";
                        roundRect(ctx, 200, 1325, 800, 65, 18);

                        ctx.fillStyle = "#374151";
                        ctx.font = "600 26px Poppins, Arial";
                        ctx.fillText("{{ url('/' . $user->slug) }}", canvas.width / 2, 1367);

                        // ==========================================
                        // 8. BOTÓN INFERIOR DE IMPACTO PREMIUM
                        // ==========================================
                        ctx.save();
                        let btnGradient = ctx.createLinearGradient(330, 0, 870, 0);
                        btnGradient.addColorStop(0, "#ff9f1c");
                        btnGradient.addColorStop(1, "#ffb703");

                        ctx.fillStyle = btnGradient;
                        ctx.shadowColor = "rgba(255, 159, 28, 0.3)";
                        ctx.shadowBlur = 30;
                        ctx.shadowOffsetY = 8;

                        roundRect(ctx, 330, 1425, 540, 90, 25);
                        ctx.restore();

                        // Texto del Botón
                        ctx.fillStyle = "#000000"; // Texto oscuro sobre fondo oro para alta legibilidad
                        ctx.font = "bold 32px Poppins, Arial";
                        ctx.fillText("SABOREA LA EXPERIENCIA", canvas.width / 2, 1481);

                        // ==========================================
                        // 9. DISPARADOR DE DESCARGA AUTOMÁTICA
                        // ==========================================
                        URL.revokeObjectURL(url);
                        const pngUrl = canvas.toDataURL('image/png');
                        const downloadLink = document.createElement('a');

                        downloadLink.href = pngUrl;
                        downloadLink.download = "qr-{{ $user->slug }}.png";

                        document.body.appendChild(downloadLink);
                        downloadLink.click();
                        document.body.removeChild(downloadLink);
                    };

                    cover.src = coverUrl;

                    // Función auxiliar reutilizable para dibujar rectángulos con bordes curvos perfectos
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
                };

                img.src = url;

            } catch (error) {
                console.error(error);
                alert('Error al descargar el QR.');
            }
        });
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
