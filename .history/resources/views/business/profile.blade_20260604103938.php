<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Dashboard • Next-Gen</title>

    <!-- Fuente Inter con pesos premium -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

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
            background: #0b0f19;
            /* Fondo oscuro espacial profundo */
            color: #f1f5f9;
            /* Texto claro */
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* ================= SIDEBAR PREMIUM ================= */
        .sidebar {
            width: 270px;
            background: #0f172a;
            border-right: 1px solid rgba(255, 255, 255, 0.05);
            padding: 35px 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
        }

        .sidebar h2 {
            font-size: 16px;
            font-weight: 800;
            color: #ffffff;
            letter-spacing: 2px;
            padding-left: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar h2::before {
            content: '';
            display: block;
            width: 6px;
            height: 18px;
            background: linear-gradient(180deg, #6366f1, #a855f7);
            /* Gradiente neón sutil */
            border-radius: 10px;
        }

        .menu {
            margin-top: 40px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px 16px;
            margin-bottom: 8px;
            border-radius: 10px;
            text-decoration: none;
            color: #94a3b8;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .menu a:hover {
            background: rgba(255, 255, 255, 0.03);
            color: #ffffff;
        }

        /* Enlace activo ultra-moderno */
        .menu a.active {
            background: rgba(99, 102, 241, 0.1);
            color: #818cf8;
            border: 1px solid rgba(99, 102, 241, 0.2);
            font-weight: 600;
        }

        .logout-btn {
            width: 100%;
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.08);
            padding: 12px;
            border-radius: 10px;
            color: #94a3b8;
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
            background: rgba(239, 68, 68, 0.1);
            border-color: rgba(239, 68, 68, 0.3);
            color: #f87171;
        }

        /* ================= MAIN ================= */
        .main {
            flex: 1;
            padding: 40px;
            overflow-y: auto;
            position: relative;
        }

        /* ================= PORTADA CYBER ================= */
        .cover {
            position: relative;
            margin-bottom: 35px;
        }

        .cover-img {
            width: 100%;
            height: 300px;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
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
            height: 300px;
            border-radius: 20px;
            background: linear-gradient(to top, #0b0f19 5%, rgba(11, 15, 25, 0.2) 100%);
        }

        .profile-img {
            position: absolute;
            bottom: -45px;
            left: 40px;
            z-index: 10;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .profile-img img {
            width: 115px;
            height: 115px;
            border-radius: 20px;
            /* Bordes redondeados estilizados en vez de un círculo */
            border: 4px solid #131b2e;
            object-fit: cover;
            background: #131b2e;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
        }

        .profile-img a {
            font-size: 13px;
            color: #94a3b8;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .profile-img a:hover {
            color: #818cf8;
        }

        .edit-cover {
            position: absolute;
            bottom: 25px;
            right: 25px;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 10px 18px;
            border-radius: 12px;
            cursor: pointer;
            color: #ffffff;
            font-size: 13px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.2s;
        }

        .edit-cover:hover {
            background: rgba(15, 23, 42, 0.8);
            border-color: rgba(99, 102, 241, 0.4);
            transform: translateY(-1px);
        }

        /* ================= GRID DE TARJETAS ================= */
        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            margin-top: 80px;
        }

        /* ================= CARD MODERNAS ================= */
        .card {
            background: #131b2e;
            /* Color oscuro secundario para contraste */
            border-radius: 18px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            padding: 30px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
        }

        .card h2 {
            font-size: 26px;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 6px;
            letter-spacing: -0.5px;
        }

        .card h3 {
            margin-bottom: 22px;
            color: #ffffff;
            font-size: 16px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .card p {
            color: #94a3b8;
            font-size: 14px;
            line-height: 1.6;
        }

        /* ================= FORM LABELS ================= */
        label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 600;
            color: #94a3b8;
            letter-spacing: 0.5px;
        }

        /* ================= BOTONES PREMIUM ================= */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: #6366f1;
            /* Indigo Neon */
            color: #ffffff;
            padding: 12px 22px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 14px rgba(99, 102, 241, 0.3);
        }

        .btn:hover {
            background: #4f46e5;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.4);
        }

        /* ================= INPUTS NEÓN ================= */
        .input {
            width: 100%;
            padding: 12px 16px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            background: #0f172a;
            outline: none;
            font-family: inherit;
            font-size: 14px;
            color: #ffffff;
            transition: all 0.2s ease;
        }

        .input:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.25);
            background: #11192e;
        }

        .input::placeholder {
            color: #475569;
        }

        input[type="file"].input {
            padding: 10px;
            font-size: 13px;
            color: #94a3b8;
            cursor: pointer;
        }

        /* ================= MENÚS MÓVILES ================= */
        .menu-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            width: 46px;
            height: 46px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            background: #131b2e;
            color: #ffffff;
            font-size: 18px;
            cursor: pointer;
            z-index: 1100;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .close-menu {
            display: none;
            position: absolute;
            top: 25px;
            right: 25px;
            background: none;
            border: none;
            font-size: 22px;
            cursor: pointer;
            color: #94a3b8;
        }

        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(11, 15, 25, 0.6);
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
                background: #0f172a;
                box-shadow: 25px 0 50px rgba(0, 0, 0, 0.6);
            }

            .sidebar.active {
                left: 0;
            }

            .close-menu {
                display: block;
            }

            .main {
                padding: 90px 20px 30px;
            }

            .grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
        }

        @media (max-width: 600px) {

            .cover-img,
            .cover-overlay {
                height: 220px;
            }

            .profile-img {
                left: 20px;
                bottom: -40px;
            }

            .profile-img img {
                width: 95px;
                height: 95px;
                border-radius: 16px;
            }

            .grid {
                margin-top: 65px;
            }

            .card {
                padding: 24px;
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
            <button class="close-menu" onclick="toggleMenu()">
                <i class="fas fa-times"></i>
            </button>

            <div>
                <h2>CORE HUB</h2>
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

            <!-- LOGOUT -->
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
                        <a href="#" id="downloadQr"><i class="fas fa-download"></i> Obtener QR Premium</a>
                    @else
                        <img src="https://via.placeholder.com/150" alt="QR no disponible">
                    @endif
                </div>

                <label for="uploadImage" class="edit-cover">
                    <i class="fas fa-camera"></i>
                    Cambiar portada
                </label>
            </div>

            <!-- CONTENIDO GRID -->
            <div class="grid">

                <!-- TARJETA PERFIL -->
                <div class="card">
                    <h2>{{ Auth::user()->name }}</h2>
                    <p style="color: #64748b; margin-bottom: 24px;">Workspace Verificado • Live 🟢</p>
                    <a href="/{{ Auth::user()->slug }}" target="_blank" class="btn">
                        Ver sitio web externo
                        <i class="fas fa-external-link-alt" style="font-size: 11px;"></i>
                    </a>
                </div>

                <!-- TARJETA ACTUALIZAR IMAGEN -->
                <div class="card">
                    <h3><i class="fas fa-image" style="color:#6366f1;"></i> Actualizar Banner</h3>
                    <form action="/business/profile/image" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div style="margin-bottom: 20px;">
                            <input id="uploadImage" type="file" name="image" required class="input">
                        </div>
                        <button type="submit" class="btn" style="width:100%;">Guardar recursos</button>
                    </form>
                </div>

                <!-- TARJETA FORMULARIO NEGOCIO -->
                <div class="card" style="grid-column: 1 / -1;">
                    <h3><i class="fas fa-sliders-h" style="color:#6366f1;"></i> Configuración Global del Negocio</h3>
                    <form action="/business/info" method="POST">
                        @csrf

                        <div style="margin-bottom:20px;">
                            <label>Enlace de Canal WhatsApp</label>
                            <input type="text" name="whatsapp" class="input" placeholder="Ej: 5219610000000"
                                value="{{ Auth::user()->whatsapp }}">
                        </div>

                        <div style="margin-bottom:20px;">
                            <label>Iframe o URL de Google Maps</label>
                            <input type="text" name="map_url" class="input"
                                placeholder="https://google.com/maps/embed..." value="{{ Auth::user()->map_url }}">
                        </div>

                        <div style="margin-bottom:24px;">
                            <label>Cronograma / Horarios Operativos</label>
                            <textarea name="schedule" class="input" rows="4" placeholder="Lunes a Domingo de 8:00 AM a 10:00 PM"
                                style="resize:none;">{{ Auth::user()->schedule }}</textarea>
                        </div>

                        <button type="submit" class="btn">
                            <i class="fas fa-check-circle"></i> Sincronizar Cambios
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- SCRIPT PRINCIPAL INTACTO -->
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
            gradient.addColorStop(0, '#0b0f19');
            gradient.addColorStop(1, '#020617');
            ctx.fillStyle = gradient;
            ctx.fillRect(0, 0, canvas.width, canvas.height);
        }

        // Modificado sutilmente para dibujar bordes perfectos en canvas
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
