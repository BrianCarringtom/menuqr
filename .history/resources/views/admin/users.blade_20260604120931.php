@extends('admin.layout', ['page' => 'users'])

@section('content')
    <style>
        /* 🔥 MEJORAS GLOBALES DE DISEÑO (Sin alterar funcionalidad) */
        .users-container {
            width: 100%;
            overflow-x: hidden;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            color: #f3f4f6;
        }

        /* TITULOS ELEVADOS */
        .page-title {
            font-size: 2.25rem;
            font-weight: 700;
            margin-bottom: 8px;
            letter-spacing: -0.025em;
        }

        .section-title {
            margin: 35px 0 20px;
            font-size: 1.5rem;
            font-weight: 600;
            letter-spacing: -0.02em;
            color: #e5e7eb;
        }

        /* MENSAJE DE ÉXITO */
        .success-message {
            background-color: rgba(16, 185, 129, 0.15);
            border: 1px solid #10b981;
            color: #34d399;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 24px;
            font-size: 0.95rem;
        }

        /* FORMULARIO ESTILIZADO */
        .create-user-form {
            width: 100%;
            max-width: 500px;
            margin-bottom: 40px;
            display: flex;
            flex-direction: column;
            gap: 16px;
            background: #111827;
            padding: 24px;
            border-radius: 12px;
            border: 1px solid #374151;
        }

        /* ENTRADAS DE TEXTO Y SELECTS */
        .create-user-form input,
        .create-user-form select,
        .modal-content input,
        .modal-content select {
            width: 100%;
            font-size: 16px;
            /* Evita zoom automático en móviles */
            padding: 10px 14px;
            background-color: #1f2937;
            border: 1px solid #4b5563;
            color: #ffffff;
            border-radius: 8px;
            transition: all 0.2s ease;
            box-sizing: border-box;
        }

        .create-user-form input:focus,
        .create-user-form select:focus,
        .modal-content input:focus,
        .modal-content select:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
        }

        /* BOTÓN PRINCIPAL DEL FORMULARIO */
        .create-user-form button {
            background-color: #3b82f6;
            color: #ffffff;
            padding: 12px;
            font-size: 0.95rem;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.2s;
            margin-top: 8px;
        }

        .create-user-form button:hover {
            background-color: #2563eb;
        }

        /* TABLA RESPONSIVE PROFESIONAL */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            overflow-y: hidden;
            border-radius: 12px;
            -webkit-overflow-scrolling: touch;
            margin-top: 20px;
            background: #1f2937;
            border: 1px solid #374151;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .table-wrapper::-webkit-scrollbar {
            height: 8px;
        }

        .table-wrapper::-webkit-scrollbar-thumb {
            background: #4b5563;
            border-radius: 20px;
        }

        .custom-table {
            width: 100%;
            min-width: 850px;
            border-collapse: collapse;
            text-align: left;
        }

        /* DISEÑO DE CELDAS */
        .custom-table th {
            background-color: #111827;
            color: #9ca3af;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 14px 20px;
            border-bottom: 1px solid #374151;
        }

        .custom-table td {
            padding: 16px 20px;
            border-bottom: 1px solid #374151;
            color: #e5e7eb;
            font-size: 0.95rem;
            white-space: nowrap;
            vertical-align: middle;
        }

        .custom-table tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.02);
        }

        /* ENLACE SLUG */
        .link-slug {
            color: #60a5fa;
            text-decoration: none;
            font-weight: 500;
        }

        .link-slug:hover {
            text-decoration: underline;
        }

        /* ACCIONES Y BOTONES DE LA TABLA */
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
            border-radius: 6px;
            border: none;
            cursor: pointer;
            transition: all 0.15s ease;
        }

        /* REGLAS DE COLOR EXISTENTES (Optimizadas visualmente) */
        .btn-edit {
            background-color: #374151;
            color: #f3f4f6;
            border: 1px solid #4b5563;
        }

        .btn-edit:hover {
            background-color: #4b5563;
        }

        .btn-delete {
            background-color: rgba(239, 68, 68, 0.15);
            color: #f87171;
            border: 1px solid rgba(239, 68, 68, 0.4);
        }

        .btn-delete:hover {
            background-color: #ef4444;
            color: #ffffff;
        }

        .btn-warning {
            background-color: rgba(245, 158, 11, 0.15);
            color: #fbbf24;
            border: 1px solid rgba(245, 158, 11, 0.4);
        }

        .btn-warning:hover {
            background-color: #f59e0b;
            color: #111827;
        }

        .btn-success {
            background-color: rgba(16, 185, 129, 0.15);
            color: #34d399;
            border: 1px solid rgba(16, 185, 129, 0.4);
        }

        .btn-success:hover {
            background-color: #10b981;
            color: #ffffff;
        }

        /* MODAL AVANZADO */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(4px);
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .modal-content {
            width: 95%;
            max-width: 440px;
            background-color: #111827;
            border: 1px solid #374151;
            padding: 28px;
            border-radius: 14px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3), 0 10px 10px -5px rgba(0, 0, 0, 0.2);
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

        /* RESPONSIVE MEDIAS */
        @media screen and (max-width: 768px) {
            .page-title {
                font-size: 1.75rem;
            }

            .section-title {
                font-size: 1.25rem;
                margin: 25px 0 15px;
            }

            .custom-table th,
            .custom-table td {
                padding: 12px 14px;
                font-size: 14px;
            }

            .btn {
                font-size: 0.8rem;
                padding: 6px 10px;
            }

            .actions {
                gap: 6px;
            }
        }

        @media screen and (max-width: 480px) {
            .page-title {
                font-size: 1.5rem;
            }

            .section-title {
                font-size: 1.15rem;
            }

            .custom-table {
                min-width: 900px;
            }

            .custom-table th,
            .custom-table td {
                font-size: 13px;
            }

            .btn {
                font-size: 12px;
                padding: 6px 8px;
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

                            <td>
                                {{ $user->name }}
                            </td>

                            <td>
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

            <h3 style="margin-bottom:20px; font-size: 1.35rem; font-weight: 600;">
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

                <div style="margin-top:20px;">

                    <button type="submit" class="btn btn-edit"
                        style="background-color: #3b82f6; border-color: #2563eb; color: #fff;">
                        Actualizar
                    </button>

                    <button type="button" class="btn btn-delete" onclick="closeModal()">
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
