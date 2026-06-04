<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f0f2f5;
            /* Color de fondo oficial de Facebook */
            color: #1f2937;
            overflow-x: hidden;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* ================= SIDEBAR ================= */
        .sidebar {
            width: 280px;
            background: #fff;
            border-right: 1px solid #ced0d4;
            padding: 24px 16px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: 0.35s ease;
            z-index: 1000;
        }

        .sidebar h2 {
            text-align: center;
            color: #1520A6;
            letter-spacing: 2px;
            font-weight: 700;
            font-size: 22px;
            padding-bottom: 15px;
            border-bottom: 1px solid #f0f2f5;
        }

        .menu {
            margin-top: 25px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            margin-bottom: 8px;
            border-radius: 8px;
            text-decoration: none;
            color: #050505;
            font-size: 15px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .menu a:hover {
            background: #f2f2f2;
            color: #1520A6;
            transform: none;
        }

        .logout-btn {
            width: 100%;
            background: #e4e6eb;
            border: none;
            padding: 14px;
            border-radius: 8px;
            color: #050505;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: 0.2s;
        }

        .logout-btn:hover {
            background: #d8dadf;
        }

        /* ================= MAIN ================= */
        .main {
            flex: 1;
            padding: 0 0 40px 0;
            /* Estilo Facebook: la portada pega arriba */
            overflow-y: auto;
            position: relative;
        }

        /* ================= ESTRUCTURA TIPO FACEBOOK PROFILE ================= */
        .fb-header-container {
            background: #ffffff;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            margin-bottom: 32px;
            width: 100%;
        }

        .fb-header-content {
            max-width: 1095px;
            margin: 0 auto;
            padding: 0 32px 16px 32px;
            position: relative;
        }

        .cover {
            position: relative;
            width: 100%;
            height: 380px;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
            overflow: hidden;
            background: #f0f2f5;
        }

        .cover-img {
            width: 100%;
            height: 100%;
        }

        .cover-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .cover-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(transparent 70%, rgba(0, 0, 0, 0.4));
        }

        .edit-cover {
            position: absolute;
            bottom: 16px;
            right: 16px;
            background: #ffffff;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            color: #050505;
            font-size: 14px;
            font-weight: 600;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            z-index: 20;
        }

        .edit-cover:hover {
            background: #f2f2f2;
        }

        /* Bloque de info de perfil debajo de la portada */
        .fb-profile-bar {
            display: flex;
            align-items: flex-end;
            margin-top: -30px;
            padding-bottom: 16px;
            border-bottom: 1px solid #ced0d4;
            gap: 24px;
        }

        .profile-img {
            position: relative;
            z-index: 10;
            flex-shrink: 0;
        }

        .profile-img img {
            width: 168px;
            height: 168px;
            border-radius: 50%;
            border: 5px solid white;
            object-fit: cover;
            background: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .profile-img a {
            display: block;
            text-align: center;
            margin-top: 8px;
            font-size: 13px;
            color: #1520A6;
            text-decoration: none;
            font-weight: 600;
        }

        .profile-img a:hover {
            text-decoration: underline;
        }

        .fb-profile-info {
            flex: 1;
            padding-bottom: 16px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            flex-wrap: wrap;
            gap: 16px;
        }

        .fb-profile-text h1 {
            font-size: 32px;
            font-weight: 700;
            color: #050505;
        }

        .fb-profile-text p {
            color: #65676b;
            font-size: 15px;
            font-weight: 500;
            margin-top: 4px;
        }

        /* ================= LAYOUT DE CONTENIDO (Muro / Feed de Facebook) ================= */
        .fb-body-layout {
            max-width: 1095px;
            margin: 0 auto;
            padding: 0 32px;
            display: grid;
            grid-template-columns: 360px 1fr;
            /* Columna fija informativa + Feed de configuración */
            gap: 16px;
        }

        /* ================= CARDS ESTILO FB ================= */
        .card {
            background: white;
            border-radius: 8px;
            border: 1px solid #ced0d4;
            padding: 20px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            margin-bottom: 16px;
        }

        .card h3 {
            margin-bottom: 16px;
            color: #050505;
            font-size: 20px;
            font-weight: 700;
        }

        /* ================= BOTONES FB ================= */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #1520A6;
            color: white;
            padding: 0 16px;
            height: 36px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            border: none;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .btn:hover {
            opacity: 0.9;
        }

        /* ================= INPUTS FB ================= */
        .input {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ced0d4;
            background: #f0f2f5;
            outline: none;
            font-size: 15px;
            transition: 0.2s ease;
        }

        .input:focus {
            background: #ffffff;
            border-color: #1520A6;
            box-shadow: 0 0 0 2px rgba(21, 32, 166, 0.2);
        }

        /* ================= HAMBURGUESA ================= */
        .menu-toggle {
            display: none;
            position: fixed;
            top: 12px;
            left: 12px;
            width: 40px;
            height: 40px;
            border: none;
            border-radius: 50%;
            background: #e4e6eb;
            color: #050505;
            font-size: 18px;
            cursor: pointer;
            z-index: 1100;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        /* ================= CERRAR ================= */
        .close-menu {
            display: none;
            position: absolute;
            top: 16px;
            right: 16px;
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: #65676b;
        }

        /* ================= OVERLAY ================= */
        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(244, 244, 244, 0.8);
            opacity: 0;
            visibility: hidden;
            transition: 0.3s ease;
            z-index: 999;
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* ================= RESPONSIVE TABLET / PC MEDIANO ================= */
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
                width: 280px;
                height: 100%;
                box-shadow: 2px 0 12px rgba(0, 0, 0, 0.1);
            }

            .sidebar.active {
                left: 0;
            }

            .close-menu {
                display: block;
            }

            .fb-header-content {
                padding: 0 16px 16px 16px;
            }

            .fb-body-layout {
                grid-template-columns: 1fr;
                padding: 0 16px;
            }

            .cover {
                height: 280px;
            }

            .fb-profile-bar {
                flex-direction: column;
                align-items: center;
                text-align: center;
                margin-top: -60px;
            }

            .fb-profile-info {
                flex-direction: column;
                align-items: center;
                text-align: center;
                width: 100%;
            }
        }

        /* ================= RESPONSIVE MOVIL ================= */
        @media (max-width: 600px) {
            .cover {
                height: 200px;
                border-radius: 0;
            }

            .profile-img img {
                width: 130px;
                height: 130px;
            }

            .fb-profile-text h1 {
                font-size: 24px;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="overlay" onclick="toggleMenu()"></div>

    <div class="container">

        <div class="sidebar">
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

        <div class="main">

            <button class="menu-toggle" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </button>

            <div class="fb-header-container">
                <div class="fb-header-content">

                    <div class="cover">
                        <div class="cover-img">
                            <img
                                src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}">
                        </div>
                        <div class="cover-overlay"></div>

                        <label for="uploadImage" class="edit-cover">
                            <i class="fas fa-camera"></i>
                            Cambiar portada
                        </label>
                    </div>

                    <div class="fb-profile-bar">
                        <div class="profile-img">
                            @if (Auth::user()->qr_path)
                                <img src="{{ asset('storage/' . Auth::user()->qr_path) }}"
                                    alt="QR de {{ Auth::user()->slug }}">
                                <a href="#" id="downloadQr">Descargar QR</a>
                            @else
                                <img src="https://via.placeholder.com/150" alt="QR no disponible">
                            @endif
                        </div>

                        <div class="fb-profile-info">
                            <div class="fb-profile-text">
                                <h1>{{ Auth::user()->name }}</h1>
                                <p>Perfil activo • Negocio digital 🚀</p>
                            </div>
                            <div>
                                <a href="/{{ Auth::user()->slug }}" target="_blank" class="btn"
                                    style="background-color: #1520A6;">
                                    Ver mi página
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="fb-body-layout">

                <div class="fb-left-column">
                    <div class="card">
                        <h3>Información</h3>

                        <form action="/business/info" method="POST">
                            @csrf

                            <div style="margin-bottom:14px;">
                                <label
                                    style="display:block; margin-bottom:6px; font-size:14px; font-weight:600; color:#65676b;">
                                    WhatsApp
                                </label>
                                <input type="text" name="whatsapp" class="input" placeholder="5219610000000"
                                    value="{{ Auth::user()->whatsapp }}">
                            </div>

                            <div style="margin-bottom:14px;">
                                <label
                                    style="display:block; margin-bottom:6px; font-size:14px; font-weight:600; color:#65676b;">
                                    URL Google Maps Embed
                                </label>
                                <input type="text" name="map_url" class="input"
                                    placeholder="https://www.google.com/maps/embed?pb=..."
                                    value="{{ Auth::user()->map_url }}">
                            </div>

                            <div style="margin-bottom:18px;">
                                <label
                                    style="display:block; margin-bottom:6px; font-size:14px; font-weight:600; color:#65676b;">
                                    Horario
                                </label>
                                <textarea name="schedule" class="input" rows="4" placeholder="Lunes a Domingo de 8:00 AM a 10:00 PM"
                                    style="resize:none;">{{ Auth::user()->schedule }}</textarea>
                            </div>

                            <button type="submit" class="btn"
                                style="width:100%; background: #e4e6eb; color: #050505;">
                                Editar información
                            </button>
                        </form>
                    </div>
                </div>

                <div class="fb-right-column">
                    <div class="card">
                        <h3>Actualizar imagen de portada</h3>
                        <p style="color: #65676b; font-size: 14px; margin-bottom: 15px;">Selecciona un nuevo archivo
                            para refrescar la cabecera superior de tu negocio.</p>

                        <form action="/business/profile/image" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input id="uploadImage" type="file" name="image" required class="input">

                            <button type="submit" class="btn" style="margin-top:16px; width:100%;">
                                Guardar cambios
                            </button>
                        </form>
                    </div>
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
                        ctx.save();
                        ctx.shadowColor = "rgba(0, 0, 0, 0.4)";
                        ctx.shadowBlur = 60;
                        ctx.shadowOffsetY = 20;

                        ctx.fillStyle = "rgba(20, 15, 10, 0.45)";
                        roundRect(ctx, 100, 100, 1000, 1400, 30);
                        ctx.restore();

                        ctx.strokeStyle = "rgba(212, 175, 55, 0.25)";
                        ctx.lineWidth = 3;
                        ctx.stroke();

                        ctx.textAlign = "center";
                        const titleX = canvas.width / 2;
                        const titleY = 250;

                        const goldGlow = ctx.createLinearGradient(0, titleY - 60, 0, titleY + 20);
                        goldGlow.addColorStop(0, '#FFF3D1');
                        goldGlow.addColorStop(0.3, '#D4AF37');
                        goldGlow.addColorStop(0.6, '#AA7C11');
                        goldGlow.addColorStop(1, '#E6CA65');

                        ctx.save();
                        ctx.shadowColor = "rgba(0, 0, 0, 0.8)";
                        ctx.shadowBlur = 15;
                        ctx.shadowOffsetY = 8;

                        ctx.font = `bold 76px ${systemFont}`;
                        ctx.fillStyle = goldGlow;
                        ctx.fillText("{{ Auth::user()->name }}", titleX, titleY);
                        ctx.restore();

                        ctx.fillStyle = "rgba(255, 255, 255, 0.75)";
                        ctx.font = `600 30px ${systemFont}`;
                        ctx.letterSpacing = "6px";
                        ctx.fillText("MENÚ DIGITAL", titleX, titleY + 75);

                        ctx.fillStyle = "#D4AF37";
                        roundRect(ctx, titleX - 100, titleY + 110, 200, 3, 2);

                        const qrBoxX = 260;
                        const qrBoxY = 500;
                        const qrBoxSize = 680;

                        ctx.save();
                        ctx.shadowColor = "rgba(0, 0, 0, 0.65)";
                        ctx.shadowBlur = 40;
                        ctx.shadowOffsetY = 15;

                        ctx.fillStyle = "#AA7C11";
                        roundRect(ctx, qrBoxX, qrBoxY, qrBoxSize, qrBoxSize, 24);

                        ctx.fillStyle = "#FFFFFF";
                        roundRect(ctx, qrBoxX + 15, qrBoxY + 15, qrBoxSize - 30, qrBoxSize - 30, 16);
                        ctx.restore();

                        ctx.fillStyle = "#D4AF37";
                        const pad = 35;
                        ctx.fillRect(qrBoxX + pad, qrBoxY + pad, 40, 6);
                        ctx.fillRect(qrBoxX + pad, qrBoxY + pad, 6, 40);
                        ctx.fillRect(qrBoxX + qrBoxSize - pad - 40, qrBoxY + pad, 40, 6);
                        ctx.fillRect(qrBoxX + qrBoxSize - pad - 6, qrBoxY + pad, 6, 40);
                        ctx.fillRect(qrBoxX + pad, qrBoxY + qrBoxSize - pad - 6, 40, 6);
                        ctx.fillRect(qrBoxX + pad, qrBoxY + qrBoxSize - pad - 40, 6, 40);
                        ctx.fillRect(qrBoxX + qrBoxSize - pad - 40, qrBoxY + qrBoxSize - pad - 6, 40,
                        6);
                        ctx.fillRect(qrBoxX + qrBoxSize - pad - 6, qrBoxY + qrBoxSize - pad - 40, 6,
                        40);

                        ctx.drawImage(img, qrBoxX + 65, qrBoxY + 65, qrBoxSize - 130, qrBoxSize - 130);

                        ctx.save();
                        ctx.shadowColor = "rgba(0, 0, 0, 0.5)";
                        ctx.shadowBlur = 10;
                        ctx.shadowOffsetY = 4;

                        ctx.fillStyle = "#FFF3D1";
                        ctx.font = `bold 42px ${systemFont}`;
                        ctx.fillText("Escanea el código QR", titleX, 1260);
                        ctx.restore();

                        ctx.fillStyle = "rgba(0, 0, 0, 0.4)";
                        roundRect(ctx, 250, 1310, 700, 60, 30);
                        ctx.strokeStyle = "rgba(212, 175, 55, 0.3)";
                        ctx.stroke();

                        ctx.fillStyle = "#E6CA65";
                        ctx.font = `500 24px ${systemFont}`;
                        ctx.fillText("{{ url('/' . Auth::user()->slug) }}", titleX, 1348);

                        ctx.save();
                        ctx.shadowColor = "rgba(0,0,0,0.4)";
                        ctx.shadowBlur = 20;
                        ctx.shadowOffsetY = 8;

                        const btnGrad = ctx.createLinearGradient(0, 1410, 0, 1490);
                        btnGrad.addColorStop(0, '#AA7C11');
                        btnGrad.addColorStop(0.5, '#D4AF37');
                        btnGrad.addColorStop(1, '#8A640F');

                        ctx.fillStyle = btnGrad;
                        roundRect(ctx, 350, 1410, 500, 80, 40);
                        ctx.restore();

                        ctx.fillStyle = "#FFFFFF";
                        ctx.font = `bold 30px ${systemFont}`;
                        ctx.letterSpacing = "2px";
                        ctx.fillText("ESCANEA Y VISÍTANOS", titleX, 1460);

                        URL.revokeObjectURL(url);
                        const pngUrl = canvas.toDataURL('image/png');
                        const downloadLink = document.createElement('a');

                        downloadLink.href = pngUrl;
                        downloadLink.download = "qr-premium-{{ Auth::user()->slug }}.png";

                        document.body.appendChild(downloadLink);
                        downloadLink.click();
                        document.body.removeChild(downloadLink);
                    };

                    if (coverUrl) {
                        const cover = new Image();
                        cover.crossOrigin = "anonymous";
                        cover.onload = function() {
                            ctx.drawImage(cover, 0, 0, canvas.width, canvas.height);
                            ctx.fillStyle = "rgba(18, 12, 5, 0.55)";
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

        function drawDefaultBackground(ctx, canvas) {
            const gradient = ctx.createLinearGradient(0, 0, canvas.width, canvas.height);
            gradient.addColorStop(0, '#110D08');
            gradient.addColorStop(0.5, '#231A10');
            gradient.addColorStop(1, '#0D0A06');
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
