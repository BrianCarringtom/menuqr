@extends('admin.layout', ['page' => 'users'])

@section('content')
    <style>
        /* ==========================================
               SISTEMA DE DISEÑO AVANZADO - FUTURISTA 2026
               ========================================== */
        :root {
            --bg-glass: rgba(31, 41, 55, 0.45);
            --bg-glass-hover: rgba(255, 255, 255, 0.03);
            --border-glow: rgba(0, 242, 254, 0.25);
            --border-subtle: rgba(255, 255, 255, 0.07);
            --neon-blue: #00f2fe;
            --neon-glow: 0 0 15px rgba(0, 242, 254, 0.35);

            --radius-input: 30px;
            /* Bordes extra redondeados estilo cápsula como la imagen */
            --radius-card: 20px;
            --transition-cyber: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        /* 📦 CONTENEDOR PRINCIPAL */
        .users-container {
            width: 100%;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
            gap: 32px;
            padding: 24px;
            box-sizing: border-box;
            background-color: #0b111e;
            /* Fondo ultra oscuro profundo para resaltar el neón */
            color: #e2e8f0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        /* 🏷️ TITULOS */
        .page-title {
            font-size: 2.5rem;
            font-weight: 800;
            letter-spacing: -0.03em;
            margin: 0;
            background: linear-gradient(135deg, #ffffff 30%, #a5b4fc 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-title {
            font-size: 1.6rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            margin: 0 0 16px 0;
            background: linear-gradient(90deg, var(--neon-blue), #4facfe);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* 💬 NOTIFICACIONES */
        .success-message {
            padding: 14px 20px;
            border-radius: var(--radius-input);
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: #34d399;
            margin: 0;
            font-size: 0.95rem;
            box-shadow: 0 0 15px rgba(16, 185, 129, 0.1);
        }

        /* 📝 CREAR USUARIO (LAYOUT INLINE DE ALTA GAMA) */
        .create-user-form {
            width: 100%;
            background: var(--bg-glass);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 30px;
            border-radius: var(--radius-card);
            border: 1px solid var(--border-subtle);
            box-sizing: border-box;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);

            /* Grid dinámico que se pone en una sola línea en pantallas grandes */
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            align-items: center;
        }

        /* 📥 CAMPOS DE TEXTO Y DESPLEGABLES (ESTILO CÁPSULA) */
        .create-user-form input,
        .create-user-form select,
        .modal-content input,
        .modal-content select {
            width: 100%;
            font-size: 15px;
            padding: 14px 22px;
            border-radius: var(--radius-input);
            border: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(15, 23, 42, 0.6);
            color: #f8fafc;
            transition: var(--transition-cyber);
            outline: none;
            box-sizing: border-box;
        }

        .create-user-form input:focus,
        .create-user-form select:focus,
        .modal-content input:focus,
        .modal-content select:focus {
            border-color: var(--neon-blue);
            box-shadow: var(--neon-glow);
            background: rgba(15, 23, 42, 0.8);
        }

        /* Fuerza que el botón ocupe toda la última columna de forma estilizada */
        .create-user-form button {
            grid-column: span 1;
            width: 100%;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            background: linear-gradient(90deg, #00f2fe 0%, #4facfe 100%);
            color: #050b14;
            border: none;
            border-radius: var(--radius-input);
            padding: 15px 24px;
            cursor: pointer;
            transition: var(--transition-cyber);
            box-shadow: var(--neon-glow);
        }

        .create-user-form button:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 25px rgba(0, 242, 254, 0.6);
        }

        /* 📊 TABLA DE CONTENEDORES INDEPENDIENTES (Glassmorphism Effect) */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            padding-bottom: 8px;
        }

        /* Barra de scroll Cyberpunk minimalista */
        .table-wrapper::-webkit-scrollbar {
            height: 6px;
        }

        .table-wrapper::-webkit-scrollbar-thumb {
            background: rgba(0, 242, 254, 0.3);
            border-radius: 10px;
        }

        .custom-table {
            width: 100%;
            min-width: 1000px;
            /* Un poco más espacioso para el look pro */
            border-collapse: separate;
            border-spacing: 0 12px;
            /* Esto crea la separación flotante de cada fila */
            text-align: left;
        }

        .custom-table th {
            padding: 12px 24px;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #94a3b8;
            font-weight: 700;
        }

        /* Cada fila se comporta como una tarjeta flotante individual */
        .custom-table tbody tr {
            background: var(--bg-glass);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: var(--transition-cyber);
        }

        .custom-table tbody tr:hover {
            transform: scale(1.005) translateY(-2px);
            background: rgba(255, 255, 255, 0.04);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3), 0 0 15px rgba(0, 242, 254, 0.05);
        }

        /* Redondeado de esquinas exclusivo para las filas flotantes */
        .custom-table td:first-child {
            border-top-left-radius: var(--radius-card);
            border-bottom-left-radius: var(--radius-card);
            border-left: 2px solid var(--border-glow);
            /* Línea de acento neón a la izquierda */
        }

        .custom-table td:last-child {
            border-top-right-radius: var(--radius-card);
            border-bottom-right-radius: var(--radius-card);
        }

        .custom-table td {
            padding: 18px 24px;
            font-size: 0.95rem;
            white-space: nowrap;
            vertical-align: middle;
            border-top: 1px solid var(--border-subtle);
            border-bottom: 1px solid var(--border-subtle);
        }

        /* 🔗 ENLACES (SLUG CON LOOK DE APP INTERACTIVA) */
        .link-slug {
            text-decoration: none;
            color: var(--neon-blue);
            font-weight: 500;
            transition: var(--transition-cyber);
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .link-slug:hover {
            text-shadow: var(--neon-glow);
            opacity: 0.9;
        }

        /* ⚡ ACCIONES Y BOTONES DE TABLA (Diseño Minimalista Inteligente) */
        .actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .actions form {
            margin: 0;
            display: inline-flex;
        }

        .btn {
            font-size: 13px;
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            cursor: pointer;
            transition: var(--transition-cyber);
            background: rgba(15, 23, 42, 0.4);
            color: #f8fafc;
        }

        .btn:hover {
            background: #ffffff;
            color: #0f172a;
            border-color: #ffffff;
            box-shadow: 0 4px 12px rgba(255, 255, 255, 0.2);
        }

        /* Variaciones de botones integradas con transparencias modernas */
        .btn-edit:hover {
            background: var(--neon-blue);
            border-color: var(--neon-blue);
            color: #000;
            box-shadow: var(--neon-glow);
        }

        .btn-delete:hover {
            background: #ef4444;
            border-color: #ef4444;
            color: #fff;
            box-shadow: 0 0 15px rgba(239, 68, 68, 0.4);
        }

        .btn-warning:hover {
            background: #f59e0b;
            border-color: #f59e0b;
            color: #000;
            box-shadow: 0 0 15px rgba(245, 158, 11, 0.4);
        }

        .btn-success:hover {
            background: #10b981;
            border-color: #10b981;
            color: #fff;
            box-shadow: 0 0 15px rgba(16, 185, 129, 0.4);
        }

        /* 🎯 MODAL BLUR DE NUEVA GENERACIÓN */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(5, 11, 20, 0.8);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            padding: 20px;
            box-sizing: border-box;
        }

        .modal-content {
            width: 100%;
            max-width: 460px;
            background: rgba(22, 30, 49, 0.9);
            padding: 36px;
            border-radius: var(--radius-card);
            border: 1px solid var(--border-glow);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5), var(--neon-glow);
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .modal-content form {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .modal-content form .modal-actions {
            display: flex;
            gap: 12px;
            margin-top: 8px;
        }

        .modal-content form .modal-actions button {
            flex: 1;
        }

        /* 📱 DISEÑO ADAPTATIVO INTEGRAL */
        @media screen and (max-width: 1024px) {
            .create-user-form {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media screen and (max-width: 640px) {
            .create-user-form {
                grid-template-columns: 1fr;
                padding: 20px;
            }

            .page-title {
                font-size: 2rem;
            }

            .custom-table td {
                padding: 14px 16px;
                font-size: 14px;
            }
        }
    </style>

    <div class="users-container">

        <h1 class="page-title">
            Panel Administrador
        </h1>

        @if (session('success'))
            <p class="success-message">
                {{ session('success') }}
            </p>
        @endif

        <div>
            <h3 class="section-title">Crear usuario business</h3>

            <form method="POST" action="/admin/create-user" class="create-user-form">
                @csrf

                <input name="name" placeholder="Nombre" required>

                <input name="email" placeholder="Email" required>

                <input type="password" name="password" placeholder="Password" required>

                <select name="plan" required>
                    <option value="basico">Básico (30 productos)</option>
                    <option value="emprendedor">Emprendedor (80 productos)</option>
                    <option value="premium">Premium (Ilimitado)</option>
                </select>

                <select name="theme" required>
                    <option value="show">Diseño 1</option>
                    <option value="show2">Diseño 2</option>
                </select>

                <button type="submit">
                    Crear Usuario
                </button>
            </form>
        </div>

        <div>
            <h3 class="section-title">Lista de Usuarios</h3>

            <div class="table-wrapper">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Plan</th>
                            <th>Diseño</th>
                            <th>Slug</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td style="font-family: monospace; font-weight: 700; color: var(--neon-blue);">
                                    #{{ $user->id }}
                                </td>

                                <td style="font-weight: 600;">
                                    {{ $user->name }}
                                </td>

                                <td style="color: #94a3b8;">
                                    {{ $user->email }}
                                </td>

                                <td class="text-capitalize">
                                    <span
                                        style="background: rgba(255,255,255,0.06); padding: 4px 10px; border-radius: 12px; font-size: 13px;">
                                        {{ $user->role }}
                                    </span>
                                </td>

                                <td>
                                    @if ($user->plan == 'basico')
                                        Básico
                                    @elseif($user->plan == 'emprendedor')
                                        Emprendedor
                                    @else
                                        Premium
                                    @endif
                                </td>

                                <td>
                                    {{ $user->theme }}
                                </td>

                                <td>
                                    <a href="/{{ $user->slug }}" target="_blank" class="link-slug">
                                        {{ $user->slug }} ↗
                                    </a>
                                </td>

                                <td>
                                    <div class="actions">
                                        <button
                                            onclick="openEditModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', '{{ $user->role }}', '{{ $user->plan }}', '{{ $user->theme }}')"
                                            class="btn btn-edit">
                                            Editar
                                        </button>

                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            onsubmit="return confirm('¿Eliminar usuario?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-delete">
                                                Eliminar
                                            </button>
                                        </form>

                                        <form action="{{ route('users.toggle', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                class="btn {{ $user->is_active ? 'btn-warning' : 'btn-success' }}">
                                                {{ $user->is_active ? 'Bloquear' : 'Desbloquear' }}
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div id="editModal" class="modal">
        <div class="modal-content">
            <h3 style="margin: 0; font-size: 1.5rem; font-weight: 700; color: var(--neon-blue);">
                Editar Usuario
            </h3>

            <form id="editForm" method="POST">
                @csrf
                @method('PUT')

                <input type="text" name="name" id="editName" placeholder="Nombre" required>

                <input type="email" name="email" id="editEmail" placeholder="Email" required>

                <select name="role" id="editRole">
                    <option value="admin">Admin</option>
                    <option value="business">Business</option>
                </select>

                <select name="plan" id="editPlan">
                    <option value="basico">Básico</option>
                    <option value="emprendedor">Emprendedor</option>
                    <option value="premium">Premium</option>
                </select>

                <select name="theme" id="editTheme">
                    <option value="show">Diseño 1</option>
                    <option value="show2">Diseño 2</option>
                </select>

                <div class="modal-actions">
                    <button type="submit" class="btn btn-edit" style="padding: 12px; border-radius: var(--radius-input);">
                        Actualizar
                    </button>
                    <button type="button" class="btn btn-delete" onclick="closeModal()"
                        style="padding: 12px; border-radius: var(--radius-input);">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(id, name, email, role, plan, theme) {
            document.getElementById('editModal').style.display = 'flex';
            document.getElementById('editName').value = name;
            document.getElementById('editEmail').value = email;
            document.getElementById('editRole').value = role;
            document.getElementById('editPlan').value = plan;
            document.getElementById('editTheme').value = theme;
            document.getElementById('editForm').action = `/admin/users/${id}`;
        }

        function closeModal() {
            document.getElementById('editModal').style.display = 'none';
        }

        window.onclick = function(e) {
            let modal = document.getElementById('editModal');
            if (e.target === modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script>
        document.querySelectorAll("form").forEach(form => {
            form.addEventListener("submit", () => {
                localStorage.setItem("scrollY", window.scrollY);
            });
        });

        window.addEventListener("load", () => {
            const scrollY = localStorage.getItem("scrollY");
            if (scrollY !== null) {
                window.scrollTo(0, parseInt(scrollY));
                localStorage.removeItem("scrollY");
            }
        });
    </script>
@endsection
