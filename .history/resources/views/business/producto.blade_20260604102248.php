<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f4f7fe;
            /* Fondo claro premium */
            color: #1e293b;
            overflow-x: hidden;
        }

        .container {
            display: flex;
            min-height: 100vh;
            background-image:
                radial-gradient(circle at 80% 10%, rgba(37, 99, 235, 0.04) 0%, transparent 40%),
                radial-gradient(circle at 20% 80%, rgba(29, 78, 216, 0.03) 0%, transparent 50%);
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 280px;
            background: #ffffff;
            border-right: 1px solid #e2e8f0;
            padding: 35px 24px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            z-index: 1000;
            box-shadow: 4px 0 24px rgba(0, 0, 0, 0.01);
        }

        .sidebar h2 {
            text-align: center;
            background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
            letter-spacing: 2px;
            font-size: 24px;
        }

        .menu {
            margin-top: 45px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 16px;
            margin-bottom: 10px;
            border-radius: 16px;
            text-decoration: none;
            color: #64748b;
            font-size: 15px;
            font-weight: 600;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .menu a i {
            width: 20px;
            text-align: center;
            font-size: 18px;
            color: #94a3b8;
            transition: all 0.25s;
        }

        .menu a:hover {
            background: rgba(37, 99, 235, 0.08);
            color: #1d4ed8;
            transform: translateX(4px);
        }

        .menu a:hover i {
            color: #1d4ed8;
            transform: scale(1.1);
        }

        .logout-btn {
            width: 100%;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            border: none;
            padding: 15px;
            border-radius: 16px;
            color: white;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 10px 20px rgba(15, 23, 42, 0.12);
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(15, 23, 42, 0.2);
            filter: brightness(1.2);
        }

        /* ================= MAIN CONTENT ================= */

        .main {
            flex: 1;
            padding: 40px;
            overflow-y: auto;
            position: relative;
        }

        /* ================= PORTADA (Estilo Azul Zafiro) ================= */

        .cover {
            position: relative;
            margin-bottom: 35px;
        }

        .cover-img {
            width: 100%;
            height: 340px;
            border-radius: 32px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.04);
            background: #0f172a;
        }

        .cover-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            opacity: 0.85;
        }

        .cover-overlay {
            position: absolute;
            inset: 0;
            border-radius: 32px;
            background: linear-gradient(to top,
                    rgba(15, 23, 42, 0.95) 0%,
                    rgba(30, 58, 138, 0.4) 50%,
                    rgba(37, 99, 235, 0.1) 100%);
        }

        /* Contenedor del QR sobre la portada */
        .profile-img {
            position: absolute;
            bottom: -50px;
            left: 50px;
            z-index: 10;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
        }

        .profile-img img {
            width: 135px;
            height: 135px;
            border-radius: 24px;
            border: 6px solid #ffffff;
            object-fit: cover;
            background: white;
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.15);
        }

        .profile-img a {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            background: #ffffff;
            border-radius: 20px;
            font-size: 13px;
            color: #1e3a8a;
            text-decoration: none;
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.25s ease;
        }

        .profile-img a:hover {
            background: #2563eb;
            color: #ffffff;
            transform: translateY(-2px);
        }

        .edit-cover {
            position: absolute;
            bottom: 25px;
            right: 25px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 12px 20px;
            border-radius: 16px;
            cursor: pointer;
            color: white;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .edit-cover:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.03);
        }

        /* ================= GRID DE CONTENIDO ================= */

        .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
            margin-top: 85px;
        }

        /* El panel de información del negocio ocupará ambas columnas para mejor orden visual */
        .grid .card:nth-child(3) {
            grid-column: span 2;
        }

        /* ================= TARJETAS (CARDS) ================= */

        .card {
            background: #ffffff;
            border-radius: 28px;
            border: 1px solid #e2e8f0;
            padding: 35px;
            box-shadow: 0 12px 36px rgba(0, 0, 0, 0.02);
            position: relative;
        }

        .card h2 {
            font-size: 32px;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.5px;
            margin-bottom: 8px;
        }

        .card h3 {
            margin-bottom: 25px;
            color: #1e3a8a;
            font-size: 22px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card p {
            color: #64748b;
            font-size: 15px;
            line-height: 1.7;
        }

        /* ================= BOTONES GENERALES ================= */

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
            color: white;
            padding: 14px 28px;
            border-radius: 16px;
            text-decoration: none;
            font-weight: 700;
            font-size: 15px;
            border: none;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.15);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(37, 99, 235, 0.25);
            filter: brightness(1.1);
        }

        /* ================= INPUTS Y FORMULARIOS ================= */

        .input {
            width: 100%;
            padding: 15px 18px;
            border-radius: 16px;
            border: 1px solid #cbd5e1;
            background: #f8fafc;
            outline: none;
            font-size: 15px;
            font-family: inherit;
            color: #1e293b;
            transition: all 0.25s ease;
        }

        .input:focus {
            background: #ffffff;
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }

        label.form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #475569;
            font-size: 14px;
        }

        input[type="file"] {
            background: #ffffff;
            cursor: pointer;
        }

        /* ================= RESPONSIVE DESIGN ================= */

        .menu-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            width: 50px;
            height: 50px;
            border: none;
            border-radius: 16px;
            background: #ffffff;
            color: #2563eb;
            font-size: 20px;
            cursor: pointer;
            z-index: 1100;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        }

        .close-menu {
            display: none;
            position: absolute;
            top: 24px;
            right: 24px;
            background: #f1f5f9;
            border: none;
            width: 38px;
            height: 38px;
            border-radius: 12px;
            font-size: 18px;
            color: #64748b;
            cursor: pointer;
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

        @media (max-width: 992px) {
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
                box-shadow: 20px 0 50px rgba(15, 23, 42, 0.08);
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

            .grid .card:nth-child(3) {
                grid-column: span 1;
            }
        }

        @media (max-width: 600px) {
            .main {
                padding: 90px 16px 20px;
            }

            .cover-img,
            .cover-overlay {
                height: 240px;
                border-radius: 24px;
            }

            .profile-img {
                left: 50%;
                transform: translateX(-50%);
                bottom: -60px;
            }

            .profile-img img {
                width: 110px;
                height: 110px;
            }

            .edit-cover {
                right: 15px;
                top: 15px;
                bottom: auto;
                padding: 8px 14px;
                font-size: 12px;
                border-radius: 12px;
            }

            .grid {
                margin-top: 80px;
                gap: 20px;
            }

            .card {
                padding: 24px;
                border-radius: 24px;
            }

            .card h2 {
                font-size: 26px;
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

            <div class="cover">
                <div class="cover-img">
                    <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}"
                        alt="Portada">
                </div>

                <div class="cover-overlay"></div>

                <div class="profile-img">
                    @if (Auth::user()->qr_path)
                        <img src="{{ asset('storage/' . Auth::user()->qr_path) }}" alt="QR de {{ Auth::user()->slug }}">
                        <a href="#" id="downloadQr">
                            <i class="fas fa-download"></i> Descargar QR
                        </a>
                    @else
                        <img src="https://via.placeholder.com/150" alt="QR no disponible">
                    @endif
                </div>

                <label for="uploadImage" class="edit-cover" onclick="window.location.href='/business/profile'">
                    <i class="fas fa-cog"></i>
                    Configurar Perfil
                </label>
            </div>

            <div class="grid">

                <div class="card">
                    <h2>¡Hola, {{ Auth::user()->name }}!</h2>
                    <p style="margin-bottom: 25px; font-weight: 500; color: #3b82f6;">
                        Panel de Administración • {{ Auth::user()->slug }} 🚀
                    </p>
                    <p>Desde aquí puedes gestionar tus productos, cambiar categorías y actualizar la información que ven
                        tus clientes en tiempo real.</p>
                </div>

                <div class="card" style="display: flex; flex-direction: column; justify-content: space-between;">
                    <h3><i class="fas fa-laptop" style="color: #3b82f6;"></i> Tu sitio público</h3>
                    <p style="margin-bottom: 20px;">Tu catálogo digital está activo y listo para recibir pedidos
                        directamente a tu WhatsApp.</p>
                    <div>
                        <a href="/{{ Auth::user()->slug }}" target="_blank" class="btn" style="width: 100%;">
                            <i class="fas fa-external-link-alt"></i> Ver mi catálogo digital
                        </a>
                    </div>
                </div>

                <div class="card">
                    <h3><i class="fas fa-th-large" style="color: #3b82f6;"></i> Acciones Rápidas de Gestión</h3>
                    <p style="margin-bottom: 25px;">Selecciona una opción para empezar a organizar tu negocio:</p>

                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px;">

                        <a href="/business/producto" class="btn"
                            style="background: #f8fafc; color: #1e293b; border: 1px solid #cbd5e1; box-shadow: none;">
                            <i class="fas fa-tags" style="color: #2563eb;"></i> Crear Categorías
                        </a>

                        <a href="/business/gestion" class="btn"
                            style="background: #f8fafc; color: #1e293b; border: 1px solid #cbd5e1; box-shadow: none;">
                            <i class="fas fa-plus-circle" style="color: #2563eb;"></i> Subir Productos
                        </a>

                        <a href="/business/profile" class="btn"
                            style="background: #f8fafc; color: #1e293b; border: 1px solid #cbd5e1; box-shadow: none;">
                            <i class="fas fa-store" style="color: #2563eb;"></i> Info de Contacto
                        </a>

                    </div>
                </div>

            </div>

        </div>

    </div>

    <script>
        const coverUrl = "{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : '' }}";

        if (document.getElementById('downloadQr')) {
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
                        const systemFont =
                            "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif";

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
                            roundRect(ctx, qrBoxX + 15, qrBoxY + 15, qrBoxSize - 30, qrBoxSize - 30,
                            16);
                            ctx.restore();

                            ctx.fillStyle = "#D4AF37";
                            const pad = 35;
                            ctx.fillRect(qrBoxX + pad, qrBoxY + pad, 40, 6);
                            ctx.fillRect(qrBoxX + pad, qrBoxY + pad, 6, 40);
                            ctx.fillRect(qrBoxX + qrBoxSize - pad - 40, qrBoxY + pad, 40, 6);
                            ctx.fillRect(qrBoxX + qrBoxSize - pad - 6, qrBoxY + pad, 6, 40);
                            ctx.fillRect(qrBoxX + pad, qrBoxY + qrBoxSize - pad - 6, 40, 6);
                            ctx.fillRect(qrBoxX + pad, qrBoxY + qrBoxSize - pad - 40, 6, 40);
                            ctx.fillRect(qrBoxX + qrBoxSize - pad - 40, qrBoxY + qrBoxSize - pad - 6,
                                40, 6);
                            ctx.fillRect(qrBoxX + qrBoxSize - pad - 6, qrBoxY + qrBoxSize - pad - 40, 6,
                                40);

                            ctx.drawImage(img, qrBoxX + 65, qrBoxY + 65, qrBoxSize - 130, qrBoxSize -
                                130);

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
        }

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
                if (!sidebar.classList.contains('active')) {
                    menuBtn.style.display = 'flex';
                }
            }
        });
    </script>

</body>

</html>
