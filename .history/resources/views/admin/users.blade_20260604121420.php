@extends('admin.layout', ['page' => 'users'])

@section('content')
    <style>
        /* ⚽ BLUE LOCK SYSTEM - OVERRIDE GLOBAL (DISEÑO FUTURISTA ANIME) */
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;800;900&family=Plus+Jakarta+Sans:wght@400;500;700&display=swap');

        .users-container {
            width: 100%;
            overflow-x: hidden;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #e2e8f0;
            padding: 15px;
            box-sizing: border-box;
            background: radial-gradient(circle at 80% 20%, rgba(0, 82, 212, 0.15) 0%, transparent 50%), #0b0f19;
            min-height: 100vh;
        }

        /* TÍTULO ESTILO LOGO BLUE LOCK (FRAGMENTADO / TECH) */
        .page-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 2.8rem;
            font-weight: 900;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: -0.01em;
            background: linear-gradient(135deg, #ffffff 40%, #00f2fe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 30px rgba(0, 242, 254, 0.3);
            position: relative;
        }

        .page-title::after {
            content: 'PROJECT SYSTEM';
            display: block;
            font-size: 0.75rem;
            letter-spacing: 0.5em;
            color: #00f2fe;
            margin-top: 5px;
            font-weight: 600;
        }

        /* TÍTULOS DE SECCIÓN ANGULARES */
        .section-title {
            font-family: 'Orbitron', sans-serif;
            margin: 45px 0 20px;
            font-size: 1.25rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #94a3b8;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-title::before {
            content: '';
            width: 12px;
            height: 12px;
            background: #00f2fe;
            border: 2px solid #0052d4;
            transform: rotate(45deg);
            display: inline-block;
            box-shadow: 0 0 10px #00f2fe;
        }

        /* NOTIFICACIONES TIPO ALERTA DE SISTEMA BL */
        .success-message {
            background: rgba(16, 185, 129, 0.05);
            border-left: 4px solid #10b981;
            border-top: 1px solid rgba(16, 185, 129, 0.2);
            border-right: 1px solid rgba(16, 185, 129, 0.2);
            border-bottom: 1px solid rgba(16, 185, 129, 0.2);
            color: #34d399;
            padding: 16px;
            border-radius: 0 8px 8px 0;
            margin-bottom: 30px;
            font-size: 0.95rem;
            font-weight: 500;
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* 🧪 FORMULARIO: CELDA DE SELECCIÓN DE EGOÍSTAS */
        .create-user-form {
            width: 100%;
            max-width: 520px;
            margin-bottom: 40px;
            display: flex;
            flex-direction: column;
            gap: 16px;
            background: linear-gradient(145deg, rgba(15, 23, 42, 0.8) 0%, rgba(30, 41, 59, 0.5) 100%);
            border: 1px solid rgba(0, 242, 254, 0.15);
            padding: 30px;
            border-radius: 16px;
            position: relative;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(12px);
        }

        /* Detalle estético en la esquina del formulario (Holograma) */
        .create-user-form::before {
            content: '';
            position: absolute;
            top: -1px;
            right: 25px;
            width: 40px;
            height: 2px;
            background: #00f2fe;
            box-shadow: 0 0 10px #00f2fe;
        }

        /* CAMPOS DE ENTRADA HOLOGRÁFICOS */
        .create-user-form input,
        .create-user-form select,
        .modal-content input,
        .modal-content select {
            width: 100%;
            font-size: 16px;
            padding: 14px 18px;
            background: rgba(11, 15, 25, 0.8);
            border: 1px solid rgba(148, 163, 184, 0.2);
            color: #ffffff;
            border-radius: 8px;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            box-sizing: border-box;
            letter-spacing: 0.02em;
        }

        .create-user-form input::placeholder {
            color: #475569;
        }

        .create-user-form input:focus,
        .create-user-form select:focus,
        .modal-content input:focus,
        .modal-content select:focus {
            outline: none;
            border-color: #00f2fe;
            background: #0f172a;
            box-shadow: 0 0 15px rgba(0, 242, 254, 0.2);
            transform: translateX(4px);
            /* Pequeña respuesta dinámica de IA */
        }

        /* BOTÓN DE CREACIÓN: MODO DESPERTAR ("EGOIST AWAKENING") */
        .create-user-form button {
            background: linear-gradient(135deg, #0052d4 0%, #4364f7 50%, #00f2fe 100%);
            background-size: 200% auto;
            color: #ffffff;
            font-family: 'Orbitron', sans-serif;
            padding: 16px;
            font-size: 1rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 20px rgba(67, 100, 247, 0.4);
            margin-top: 10px;
        }

        .create-user-form button:hover {
            background-position: right center;
            box-shadow: 0 6px 25px rgba(0, 242, 254, 0.5);
            transform: scale(1.01);
        }

        /* 📊 CONTENEDOR DE LA TABLA (INTERFACE DE MONITOREO DE ESTADÍSTICAS) */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            overflow-y: hidden;
            border-radius: 16px;
            -webkit-overflow-scrolling: touch;
            margin-top: 20px;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4);
        }

        .table-wrapper::-webkit-scrollbar {
            height: 6px;
        }

        .table-wrapper::-webkit-scrollbar-thumb {
            background: rgba(0, 242, 254, 0.3);
            border-radius: 10px;
        }

        .custom-table {
            width: 100%;
            min-width: 850px;
            border-collapse: collapse;
            text-align: left;
        }

        /* ENCABEZADOS CIBERNÉTICOS */
        .custom-table th {
            font-family: 'Orbitron', sans-serif;
            background: rgba(11, 15, 25, 0.9);
            color: #00f2fe;
            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            padding: 18px 24px;
            border-bottom: 2px solid rgba(0, 242, 254, 0.2);
            text-transform: uppercase;
        }

        /* FILAS DE JUGADORES */
        .custom-table td {
            padding: 18px 24px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.03);
            color: #cbd5e1;
            font-size: 0.95rem;
            white-space: nowrap;
            vertical-align: middle;
        }

        .custom-table tbody tr {
            transition: all 0.2s ease;
        }

        .custom-table tbody tr:hover {
            background: rgba(67, 100, 247, 0.06);
            box-shadow: inset 4px 0 0 #00f2fe;
        }

        /* ENLACE SLUG TIPO FIRMA DIGITAL */
        .link-slug {
            color: #00f2fe;
            text-decoration: none;
            font-family: 'Orbitron', sans-serif;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 4px 10px;
            background: rgba(0, 242, 254, 0.08);
            border: 1px solid rgba(0, 242, 254, 0.2);
            border-radius: 4px;
            transition: all 0.2s;
        }

        .link-slug:hover {
            background: #00f2fe;
            color: #0b0f19;
            box-shadow: 0 0 12px rgba(0, 242, 254, 0.4);
        }

        /* BOTONES DE ACCIONES (EGO RATING BUTTONS) */
        .actions {
            display: flex;
            gap: 8px;
            flex-wrap: nowrap;
            align-items: center;
        }

        .btn {
            font-family: 'Orbitron', sans-serif;
            white-space: nowrap;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 16px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.02em;
            border-radius: 4px;
            border: 1px solid transparent;
            cursor: pointer;
            transition: all 0.2s ease;
            clip-path: polygon(6px 0%, 100% 0%, 100% calc(100% - 6px), calc(100% - 6px) 100%, 0% 100%, 0% 6px);
            /* Esquinas cortadas estilo Anime */
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        /* COLORES MEJORADOS AL ESTILO BLUE LOCK */
        .btn-edit {
            background: rgba(255, 255, 255, 0.04);
            color: #f1f5f9;
            border-color: rgba(255, 255, 255, 0.15);
        }

        .btn-edit:hover {
            background: #f1f5f9;
            color: #0b0f19;
        }

        .btn-delete {
            background: rgba(239, 68, 68, 0.1);
            color: #f87171;
            border-color: rgba(239, 68, 68, 0.3);
        }

        .btn-delete:hover {
            background: #ef4444;
            color: #ffffff;
            box-shadow: 0 0 15px rgba(239, 68, 68, 0.4);
        }

        .btn-warning {
            background: rgba(245, 158, 11, 0.1);
            color: #fbbf24;
            border-color: rgba(245, 158, 11, 0.3);
        }

        .btn-warning:hover {
            background: #f59e0b;
            color: #0b0f19;
            box-shadow: 0 0 15px rgba(245, 158, 11, 0.4);
        }

        .btn-success {
            background: rgba(0, 242, 254, 0.1);
            color: #00f2fe;
            border-color: rgba(0, 242, 254, 0.3);
        }

        .btn-success:hover {
            background: #00f2fe;
            color: #0b0f19;
            box-shadow: 0 0 15px rgba(0, 242, 254, 0.5);
        }

        /* 🔳 MODAL DE CONFIGURACIÓN AVANZADA */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(3, 7, 18, 0.85);
            backdrop-filter: blur(12px);
            align-items: center;
            justify-content: center;
            z-index: 9999;
            animation: blBlurIn 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .modal-content {
            width: 95%;
            max-width: 450px;
            background: linear-gradient(145deg, #0f172a 0%, #070a12 100%);
            border: 2px solid #00f2fe;
            padding: 35px;
            border-radius: 16px;
            box-shadow: 0 0 40px rgba(0, 242, 254, 0.2);
            box-sizing: border-box;
            position: relative;
        }

        .modal-content form {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .modal-content form div {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .modal-content form div button {
            flex: 1;
            min-width: 120px;
        }

        /* ANIMACIONES */
        @keyframes blBlurIn {
            from {
                opacity: 0;
                filter: blur(20px);
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                filter: blur(0);
                transform: scale(1);
            }
        }

        /* RESPONSIVE */
        @media screen and (max-width: 768px) {
            .page-title {
                font-size: 2.2rem;
            }

            .custom-table th,
            .custom-table td {
                padding: 14px 16px;
                font-size: 14px;
            }

            .btn {
                font-size: 0.75rem;
                padding: 8px 12px;
            }

            .actions {
                gap: 6px;
            }
        }

        @media screen and (max-width: 480px) {
            .page-title {
                font-size: 1.8rem;
            }

            .custom-table {
                min-width: 900px;
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

        <!-- 🔥 CREAR USUARIO -->
        <h3 class="section-title">
            Crear usuario business
        </h3>

        <form method="POST" action="/admin/create-user" class="create-user-form">

            @csrf

            <input name="name" placeholder="Nombre" required>

            <input name="email" placeholder="Email" required>

            <input type="password" name="password" placeholder="Password" required>

            <select name="plan" required>
                <option value="basico">
                    Básico (30 productos)
                </option>
                <option value="emprendedor">
                    Emprendedor (80 productos)
                </option>
                <option value="premium">
                    Premium (Ilimitado)
                </option>
            </select>

            <select name="theme" required>
                <option value="show">
                    Diseño 1
                </option>
                <option value="show2">
                    Diseño 2
                </option>
            </select>

            <button type="submit">
                Crear Usuario
            </button>

        </form>

        <!-- 🔥 TABLA -->
        <h3 class="section-title">
            Lista de Usuarios
        </h3>

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

                            <td style="font-family: 'Orbitron', sans-serif; color: #00f2fe; font-weight: bold;">
                                #{{ $user->id }}
                            </td>

                            <td style="font-weight: 700; color: #ffffff;">
                                {{ $user->name }}
                            </td>

                            <td style="color: #64748b;">
                                {{ $user->email }}
                            </td>

                            <td class="text-capitalize" style="font-size: 0.85rem; letter-spacing: 0.05em;">
                                {{ $user->role }}
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
                                    {{ $user->slug }}
                                </a>
                            </td>

                            <td>

                                <div class="actions">

                                    <!-- EDITAR -->
                                    <button
                                        onclick="openEditModal(
                                            {{ $user->id }},
                                            '{{ $user->name }}',
                                            '{{ $user->email }}',
                                            '{{ $user->role }}',
                                            '{{ $user->plan }}',
                                            '{{ $user->theme }}'
                                        )"
                                        class="btn btn-edit" type="button">
                                        Editar
                                    </button>

                                    <!-- ELIMINAR -->
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                        onsubmit="return confirm('¿Eliminar usuario?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete">
                                            Eliminar
                                        </button>
                                    </form>

                                    <!-- BLOQUEAR -->
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

    <!-- 🔥 MODAL -->
    <div id="editModal" class="modal">

        <div class="modal-content">

            <h3
                style="margin-bottom:24px; font-family: 'Orbitron', sans-serif; font-size: 1.3rem; font-weight: 800; text-transform: uppercase; color: #00f2fe; letter-spacing: 0.05em;">
                Modificar Registro
            </h3>

            <form id="editForm" method="POST">

                @csrf
                @method('PUT')

                <input type="text" name="name" id="editName" placeholder="Nombre" required>

                <input type="email" name="email" id="editEmail" placeholder="Email" required>

                <select name="role" id="editRole">
                    <option value="admin">
                        Admin
                    </option>
                    <option value="business">
                        Business
                    </option>
                </select>

                <select name="plan" id="editPlan">
                    <option value="basico">
                        Básico
                    </option>
                    <option value="emprendedor">
                        Emprendedor
                    </option>
                    <option value="premium">
                        Premium
                    </option>
                </select>

                <select name="theme" id="editTheme">
                    <option value="show">
                        Diseño 1
                    </option>
                    <option value="show2">
                        Diseño 2
                    </option>
                </select>

                <div style="margin-top:24px;">

                    <button type="submit" class="btn btn-success">
                        Actualizar
                    </button>

                    <button type="button" class="btn btn-edit" onclick="closeModal()">
                        Cancelar
                    </button>

                </div>

            </form>

        </div>

    </div>

    <!-- 🔥 SCRIPT -->
    <script>
        function openEditModal(id, name, email, role, plan, theme) {

            document.getElementById('editModal').style.display = 'flex';

            document.getElementById('editName').value = name;
            document.getElementById('editEmail').value = email;
            document.getElementById('editRole').value = role;
            document.getElementById('editPlan').value = plan;
            document.getElementById('editTheme').value = theme;

            document.getElementById('editForm').action =
                `/admin/users/${id}`;

        }

        function closeModal() {

            document.getElementById('editModal').style.display = 'none';

        }

        // 🔥 CERRAR MODAL
        window.onclick = function(e) {

            let modal =
                document.getElementById('editModal');

            if (e.target === modal) {

                modal.style.display = "none";

            }

        }
    </script>

    <!-- 🔥 GUARDAR SCROLL -->
    <script>
        document.querySelectorAll("form").forEach(form => {

            form.addEventListener("submit", () => {

                localStorage.setItem(
                    "scrollY",
                    window.scrollY
                );

            });

        });

        window.addEventListener("load", () => {

            const scrollY =
                localStorage.getItem("scrollY");

            if (scrollY !== null) {

                window.scrollTo(
                    0,
                    parseInt(scrollY)
                );

                localStorage.removeItem("scrollY");

            }

        });
    </script>
@endsection
