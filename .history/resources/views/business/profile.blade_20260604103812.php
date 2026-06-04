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
            background: #f8fafc;
            /* Gris pizarra limpio estilo Tailwind */
            color: #0f172a;
            /* Texto oscuro moderno */
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* ================= SIDEBAR ================= */
        .sidebar {
            width: 270px;
            background: #ffffff;
            border-right: 1px solid #e2e8f0;
            padding: 32px 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
        }

        .sidebar h2 {
            font-size: 18px;
            font-weight: 700;
            color: #0f172a;
            letter-spacing: 1px;
            padding-left: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .sidebar h2::before {
            content: '';
            display: block;
            width: 8px;
            height: 18px;
            background: #2563eb;
            /* Acento Azul Principal */
            border-radius: 4px;
        }

        .menu {
            margin-top: 35px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            margin-bottom: 6px;
            border-radius: 10px;
            text-decoration: none;
            color: #475569;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .menu a:hover {
            background: #f1f5f9;
            color: #0f172a;
        }

        /* Enlace activo (Dashboard por defecto) */
        .menu a.active {
            background: #eff6ff;
            color: #2563eb;
            font-weight: 600;
        }

        .logout-btn {
            width: 100%;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            padding: 12px;
            border-radius: 10px;
            color: #64748b;
            font-weight: 500;
            font-size: 14px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.2s ease;
        }

        .logout-btn:hover {
            background: #fef2f2;
            border-color: #fca5a5;
            color: #dc2626;
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
            margin-bottom: 35px;
        }

        .cover-img {
            width: 100%;
            height: 280px;
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
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
            height: 280px;
            border-radius: 16px;
            background: linear-gradient(to top, rgba(15, 23, 42, 0.6), transparent);
        }

        .profile-img {
            position: absolute;
            bottom: -45px;
            left: 40px;
            z-index: 10;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
        }

        .profile-img img {
            width: 110px;
            height: 110px;
            border-radius: 14px;
            /* Cambiado a esquinas redondeadas modernas en lugar de círculo */
            border: 4px solid #ffffff;
            object-fit: cover;
            background: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .profile-img a {
            font-size: 13px;
            color: #64748b;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        .profile-img a:hover {
            color: #2563eb;
        }

        .edit-cover {
            position: absolute;
            bottom: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(8px);
            padding: 10px 16px;
            border-radius: 10px;
            cursor: pointer;
            color: #0f172a;
            font-size: 13px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: background 0.2s;
        }

        .edit-cover:hover {
            background: rgba(255, 255, 255, 1);
        }

        /* ================= GRID ================= */
        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            margin-top: 75px;
        }

        /* ================= CARD ================= */
        .card {
            background: #ffffff;
            border-radius: 14px;
            border: 1px solid #e2e8f0;
            padding: 30px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02), 0 1px 2px rgba(0, 0, 0, 0.04);
        }

        .card h2 {
            font-size: 24px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 6px;
        }

        .card h3 {
            margin-bottom: 20px;
            color: #0f172a;
            font-size: 16px;
            font-weight: 600;
        }

        .card p {
            color: #475569;
            font-size: 14px;
            line-height: 1.6;
        }

        /* ================= FORM LABELS ================= */
        label {
            display: block;
            margin-bottom: 6px;
            font-size: 13px;
            font-weight: 500;
            color: #334155;
        }

        /* ================= BOTONES ================= */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: #2563eb;
            color: #ffffff;
            padding: 11px 18px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            border: 1px solid transparent;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn:hover {
            background: #1d4ed8;
        }

        .btn-outline {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            color: #0f172a;
        }

        .btn-outline:hover {
            background: #f8fafc;
        }

        /* ================= INPUT ================= */
        .input {
            width: 100%;
            padding: 11px 14px;
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            background: #ffffff;
            outline: none;
            font-family: inherit;
            font-size: 14px;
            color: #0f172a;
            transition: all 0.2s ease;
        }

        .input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }

        .input::placeholder {
            color: #94a3b8;
        }

        /* File input específico estilizado */
        input[type="file"].input {
            padding: 8px;
            font-size: 13px;
            color: #64748b;
        }

        /* ================= CONTROLES MÓVILES ================= */
        .menu-toggle {
            display: none;
            position: fixed;
            top: 16px;
            left: 16px;
            width: 44px;
            height: 44px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            background: #ffffff;
            color: #0f172a;
            font-size: 18px;
            cursor: pointer;
            z-index: 1100;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .close-menu {
            display: none;
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: #64748b;
        }

        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.3);
            backdrop-filter: blur(4px);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* ================= MEDIA RESPONSIVE ================= */
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
                box-shadow: 20px 0 40px rgba(15, 23, 42, 0.08);
            }

            .sidebar.active {
                left: 0;
            }

            .close-menu {
                display: block;
            }

            .main {
                padding: 80px 20px 30px;
            }

            .grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
        }

        @media (max-width: 600px) {

            .cover-img,
            .cover-overlay {
                height: 200px;
            }

            .profile-img {
                left: 24px;
                bottom: -40px;
            }

            .profile-img img {
                width: 90px;
                height: 90px;
            }

            .grid {
                margin-top: 60px;
            }

            .card {
                padding: 20px;
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

            <div class="grid">

                <div class="card">
                    <h2>{{ Auth::user()->name }}</h2>
                    <p style="color: #64748b; margin-bottom: 20px;">Perfil activo • Negocio digital 🚀</p>
                    <a href="/{{ Auth::user()->slug }}" target="_blank" class="btn">
                        Ver mi página
                        <i class="fas fa-external-link-alt" style="font-size: 11px;"></i>
                    </a>
                </div>

                <div class="card">
                    <h3>Actualizar imagen</h3>
                    <form action="/business/profile/image" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div style="margin-bottom: 16px;">
                            <input id="uploadImage" type="file" name="image" required class="input">
                        </div>
                        <button type="submit" class="btn" style="width:100%;">Guardar cambios</button>
                    </form>
                </div>

                <div class="card" style="grid-column: 1 / -1;">
                    <h3>Información del negocio</h3>
                    <form action="/business/info" method="POST">
                        @csrf

                        <div style="margin-bottom:16px;">
                            <label>WhatsApp</label>
                            <input type="text" name="whatsapp" class="input" placeholder="5219610000000"
                                value="{{ Auth::user()->whatsapp }}">
                        </div>

                        <div style="margin-bottom:16px;">
                            <label>URL Google Maps Embed</label>
                            <input type="text" name="map_url" class="input"
                                placeholder="https://google.com/maps/embed..." value="{{ Auth::user()->map_url }}">
                        </div>

                        <div style="margin-bottom:20px;">
                            <label>Horario de Atención</label>
                            <textarea name="schedule" class="input" rows="4" placeholder="Lunes a Domingo de 8:00 AM a 10:00 PM"
                                style="resize:none;">{{ Auth::user()->schedule }}</textarea>
                        </div>

                        <button type="submit" class="btn">
                            <i class="fas fa-save"></i> Guardar información
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
