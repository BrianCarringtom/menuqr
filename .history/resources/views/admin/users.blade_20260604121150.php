@extends('admin.layout', ['page' => 'users'])

@section('content')
    <style>
        /* 🌟 TIPOGRAFÍA Y CONFIGURACIÓN GLOBAL 2026 */
        .users-container {
            width: 100%;
            overflow-x: hidden;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            color: #f3f4f6;
            padding: 10px;
            box-sizing: border-box;
        }

        /* TÍTULOS CON GRADIENTE Y REFINADOS */
        .page-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 6px;
            letter-spacing: -0.03em;
            background: linear-gradient(135deg, #ffffff 30%, #a5b4fc 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .section-title {
            margin: 40px 0 20px;
            font-size: 1.4rem;
            font-weight: 600;
            letter-spacing: -0.02em;
            color: #9ca3af;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .section-title::before {
            content: '';
            width: 4px;
            height: 18px;
            background: #3b82f6;
            border-radius: 4px;
            display: inline-block;
        }

        /* NOTIFICACIONES MODERNAS */
        .success-message {
            background: rgba(16, 185, 129, 0.06);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: #34d399;
            padding: 14px 20px;
            border-radius: 12px;
            margin-bottom: 28px;
            font-size: 0.95rem;
            backdrop-filter: blur(8px);
            animation: fadeIn 0.3s ease-out;
        }

        /* ⚡ FORMULARIO ESTILO TARJETA PREMIUM */
        .create-user-form {
            width: 100%;
            max-width: 540px;
            margin-bottom: 40px;
            display: flex;
            flex-direction: column;
            gap: 18px;
            background: rgba(17, 24, 39, 0.7);
            backdrop-filter: blur(12px);
            padding: 30px;
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        /* INPUTS Y SELECTS FUTURISTAS */
        .create-user-form input,
        .create-user-form select,
        .modal-content input,
        .modal-content select {
            width: 100%;
            font-size: 16px;
            padding: 12px 16px;
            background: rgba(31, 41, 55, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #ffffff;
            border-radius: 10px;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            box-sizing: border-box;
        }

        .create-user-form input::placeholder {
            color: #6b7280;
        }

        .create-user-form input:focus,
        .create-user-form select:focus,
        .modal-content input:focus,
        .modal-content select:focus {
            outline: none;
            border-color: #60a5fa;
            background: #1f2937;
            box-shadow: 0 0 0 4px rgba(96, 165, 251, 0.15);
            transform: translateY(-1px);
        }

        /* BOTÓN DEL FORMULARIO PRINCIPAL */
        .create-user-form button {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: #ffffff;
            padding: 14px;
            font-size: 0.95rem;
            font-weight: 600;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
            margin-top: 6px;
        }

        .create-user-form button:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
            filter: brightness(1.1);
        }

        /* 📊 CONTENEDOR DE TABLA ULTRA-CONFIABLE */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            overflow-y: hidden;
            border-radius: 16px;
            -webkit-overflow-scrolling: touch;
            margin-top: 20px;
            background: rgba(31, 41, 55, 0.4);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .table-wrapper::-webkit-scrollbar {
            height: 8px;
        }

        .table-wrapper::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 20px;
        }

        .custom-table {
            width: 100%;
            min-width: 850px;
            border-collapse: collapse;
            text-align: left;
        }

        /* ESTILOS DE FILAS Y CELDAS */
        .custom-table th {
            background: rgba(17, 24, 39, 0.6);
            color: #9ca3af;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            padding: 16px 24px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .custom-table td {
            padding: 18px 24px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
            color: #e5e7eb;
            font-size: 0.95rem;
            white-space: nowrap;
            vertical-align: middle;
        }

        .custom-table tbody tr {
            transition: background-color 0.15s ease;
        }

        .custom-table tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.02);
        }

        /* SLUGS CON ESTILO DE ENLACE MODERNO */
        .link-slug {
            color: #60a5fa;
            text-decoration: none;
            font-weight: 500;
            padding: 4px 8px;
            background: rgba(96, 165, 251, 0.1);
            border-radius: 6px;
            transition: all 0.2s;
        }

        .link-slug:hover {
            background: rgba(96, 165, 251, 0.2);
            color: #93c5fd;
        }

        /* BOTONES DE ACCIÓN (ESTILO DASHBOARD 2026) */
        .actions {
            display: flex;
            gap: 8px;
            flex-wrap: nowrap;
            align-items: center;
        }

        .btn {
            white-space: nowrap;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 14px;
            font-size: 0.85rem;
            font-weight: 600;
            border-radius: 8px;
            border: 1px solid transparent;
            cursor: pointer;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        /* CÓDIGO DE COLORES PRESERVADO PERO REDISEÑADO */
        .btn-edit {
            background: rgba(255, 255, 255, 0.05);
            color: #e5e7eb;
            border-color: rgba(255, 255, 255, 0.1);
        }

        .btn-edit:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.2);
        }

        .btn-delete {
            background: rgba(239, 68, 68, 0.1);
            color: #f87171;
            border-color: rgba(239, 68, 68, 0.2);
        }

        .btn-delete:hover {
            background: #ef4444;
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        .btn-warning {
            background: rgba(245, 158, 11, 0.1);
            color: #fbbf24;
            border-color: rgba(245, 158, 11, 0.2);
        }

        .btn-warning:hover {
            background: #f59e0b;
            color: #111827;
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
        }

        .btn-success {
            background: rgba(16, 185, 129, 0.1);
            color: #34d399;
            border-color: rgba(16, 185, 129, 0.2);
        }

        .btn-success:hover {
            background: #10b981;
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        /* 🔳 MODAL ULTRA ELEVADO */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(3, 7, 18, 0.6);
            backdrop-filter: blur(8px);
            align-items: center;
            justify-content: center;
            z-index: 9999;
            animation: fadeIn 0.2s ease-out;
        }

        .modal-content {
            width: 95%;
            max-width: 440px;
            background: #111827;
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 32px;
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            box-sizing: border-box;
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
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.98);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* RESPONSIVE ADAPTATION */
        @media screen and (max-width: 768px) {
            .page-title {
                font-size: 2rem;
            }

            .section-title {
                font-size: 1.25rem;
            }

            .custom-table th,
            .custom-table td {
                padding: 14px 16px;
                font-size: 14px;
            }

            .btn {
                font-size: 0.8rem;
                padding: 7px 12px;
            }

            .actions {
                gap: 6px;
            }
        }

        @media screen and (max-width: 480px) {
            .page-title {
                font-size: 1.75rem;
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

                            <td>
                                {{ $user->id }}
                            </td>

                            <td style="font-weight: 500;">
                                {{ $user->name }}
                            </td>

                            <td style="color: #9ca3af;">
                                {{ $user->email }}
                            </td>

                            <td class="text-capitalize">
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

    <div id="editModal" class="modal">

        <div class="modal-content">

            <h3 style="margin-bottom:24px; font-size: 1.4rem; font-weight: 700; letter-spacing: -0.02em;">
                Editar Usuario
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

                    <button type="submit" class="btn btn-success"
                        style="background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); color: white; border: none;">
                        Actualizar
                    </button>

                    <button type="button" class="btn btn-edit" onclick="closeModal()">
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
