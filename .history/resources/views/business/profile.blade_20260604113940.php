<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Dashboard</title>

    <link href="https://fonts.googleapis.com/css2family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #ffffff;
            color: #0f172a;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        .container {
            display: flex;
            min-height: 100vh;
            background: #f8fafc;
        }

        /* ================= SIDEBAR MODERNO ================= */

        .sidebar {
            width: 280px;
            background: #ffffff;
            border-right: 1px solid #e2e8f0;
            padding: 32px 24px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
        }

        .sidebar h2 {
            text-align: left;
            padding-left: 12px;
            color: #0052FF;
            letter-spacing: 1.5px;
            font-weight: 800;
            font-size: 22px;
            position: relative;
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
            transition: all 0.25s ease;
        }

        .menu a:hover {
            background: #f0f5ff;
            color: #0052FF;
            transform: translateX(4px);
        }

        /* Simulación de ruta activa actual en Dashboard */
        .menu a.active,
        .menu a:first-child {
            background: #0052FF;
            color: #ffffff;
        }

        .menu a.active:hover,
        .menu a:first-child:hover {
            background: #0045d6;
            color: #ffffff;
            transform: none;
        }

        .logout-btn {
            width: 100%;
            background: #fff0f0;
            border: 1px solid #fecdd3;
            padding: 14px;
            border-radius: 12px;
            color: #e11d48;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.25s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .logout-btn:hover {
            background: #ffe4e6;
            color: #be123c;
            transform: translateY(-1px);
        }

        /* ================= MAIN CONTENT ================= */

        .main {
            flex: 1;
            padding: 48px;
            overflow-y: auto;
            position: relative;
            background: #f8fafc;
        }

        /* ================= PORTADA ESTILO CANVAS 2026 ================= */

        .cover {
            position: relative;
            margin-bottom: 40px;
        }

        .cover-img {
            width: 100%;
            height: 340px;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 40px -15px rgba(0, 82, 255, 0.12);
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
            height: 340px;
            border-radius: 24px;
            background: linear-gradient(to top, rgba(15, 23, 42, 0.8) 0%, rgba(15, 23, 42, 0.2) 60%, transparent 100%);
        }

        .profile-img {
            position: absolute;
            bottom: -50px;
            left: 48px;
            z-index: 10;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .profile-img img {
            width: 140px;
            height: 140px;
            border-radius: 24px;
            /* Formato semi-cuadrado moderno */
            border: 6px solid #ffffff;
            object-fit: cover;
            background: #ffffff;
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.15);
        }

        .profile-img a {
            display: inline-block;
            margin-top: 12px;
            font-size: 13px;
            color: #0052FF;
            text-decoration: none;
            font-weight: 700;
            background: #ffffff;
            padding: 6px 16px;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: all 0.2s ease;
        }

        .profile-img a:hover {
            background: #0052FF;
            color: #ffffff;
            transform: translateY(-2px);
        }

        .edit-cover {
            position: absolute;
            bottom: 24px;
            right: 24px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 12px 20px;
            border-radius: 12px;
            cursor: pointer;
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.25s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .edit-cover:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        /* ================= GRID REORGANIZADO ================= */

        .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 32px;
            margin-top: 80px;
        }

        /* ================= TARJETAS PREMIUM ================= */

        .card {
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid #e2e8f0;
            padding: 40px;
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.02);
            transition: translateY 0.3s ease;
        }

        .card h2 {
            font-size: 28px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .card h3 {
            margin-bottom: 24px;
            color: #0f172a;
            font-size: 20px;
            font-weight: 700;
            position: relative;
        }

        .card p {
            color: #64748b;
            line-height: 1.6;
            font-size: 15px;
        }

        /* ================= BOTONES AZUL REY ================= */

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #0052FF;
            color: #ffffff;
            padding: 14px 28px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            border: none;
            cursor: pointer;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 8px 20px -6px rgba(0, 82, 255, 0.4);
        }

        .btn:hover {
            background: #0045d6;
            transform: translateY(-2px);
            box-shadow: 0 12px 24px -6px rgba(0, 82, 255, 0.5);
        }

        /* ================= INPUTS FORMULARIOS ================= */

        .input {
            width: 100%;
            padding: 14px 16px;
            border-radius: 12px;
            border: 1px solid #cbd5e1;
            background: #f8fafc;
            outline: none;
            font-size: 15px;
            color: #0f172a;
            font-family: inherit;
            transition: all 0.2s ease;
        }

        .input:focus {
            border-color: #0052FF;
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(0, 82, 255, 0.1);
        }

        label {
            font-weight: 600;
            font-size: 14px;
            color: #334155;
        }

        /* ================= RESPONSIVE HAMBURGUESA ================= */

        .menu-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            width: 48px;
            height: 48px;
            border: none;
            border-radius: 12px;
            background: #0052FF;
            color: white;
            font-size: 18px;
            cursor: pointer;
            z-index: 1100;
            box-shadow: 0 8px 20px rgba(0, 82, 255, 0.3);
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
            border-radius: 50%;
            font-size: 16px;
            cursor: pointer;
            color: #64748b;
            transition: all 0.2s ease;
        }

        .close-menu:hover {
            background: #e2e8f0;
            color: #0f172a;
        }

        /* ================= BLUR OVERLAY ================= */

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

        /* ================= MEDIA QUERIES TAB/MOVIL ================= */

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
                box-shadow: 20px 0 50px rgba(15, 23, 42, 0.15);
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
                gap: 24px;
            }
        }

        @media (max-width: 640px) {
            .main {
                padding: 90px 16px 32px;
            }

            .cover-img,
            .cover-overlay {
                height: 240px;
                border-radius: 16px;
            }

            .profile-img {
                left: 50%;
                transform: translateX(-50%);
                bottom: -60px;
            }

            .profile-img img {
                width: 120px;
                height: 120px;
                border-width: 4px;
            }

            .edit-cover {
                right: 16px;
                bottom: 16px;
                padding: 8px 14px;
                font-size: 12px;
            }

            .grid {
                margin-top: 90px;
                gap: 16px;
            }

            .card {
                padding: 24px;
                border-radius: 16px;
            }

            .card h2 {
                font-size: 24px;
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
                    <a href="/business" class="active">
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
                            <i class="fas fa-download" style="margin-right: 5px;"></i> Descargar QR
                        </a>
                    @else
                        <img src="https://via.placeholder.com/150" alt="QR no disponible">
                    @endif
                </div>

                <label for="uploadImage" class="edit-cover">
                    <i class="fas fa-camera" style="margin-right: 6px;"></i> Cambiar portada
                </label>
            </div>

            <div class="grid">

                <div class="card">
                    <h2>{{ Auth::user()->name }}</h2>
                    <p style="margin-bottom: 20px; font-weight: 500; color: #0052FF;">
                        Perfil activo • Negocio digital 🚀
                    </p>
                    <div>
                        <a href="/{{ Auth::user()->slug }}" target="_blank" class="btn">
                            Ver mi página
                        </a>
                    </div>
                </div>

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

                <div class="card" style="grid-column: span 1;">
                    <h3>Información del negocio</h3>
                    <form action="/business/info" method="POST">
                        @csrf

                        <div style="margin-bottom:20px;">
                            <label style="display:block; margin-bottom:8px;">WhatsApp</label>
                            <input type="text" name="whatsapp" class="input" placeholder="5219610000000"
                                value="{{ Auth::user()->whatsapp }}">
                        </div>

                        <div style="margin-bottom:20px;">
                            <label style="display:block; margin-bottom:8px;">URL Google Maps Embed</label>
                            <input type="text" name="map_url" class="input"
                                placeholder="https://www.google.com/maps/embed?pb=..."
                                value="{{ Auth::user()->map_url }}">
                        </div>

                        <div style="margin-bottom:24px;">
                            <label style="display:block; margin-bottom:8px;">Horario</label>
                            <textarea name="schedule" class="input" rows="4" placeholder="Lunes a Domingo de 8:00 AM a 10:00 PM"
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
