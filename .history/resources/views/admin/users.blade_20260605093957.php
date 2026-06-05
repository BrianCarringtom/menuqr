@extends('admin.layout', ['page' => 'users'])

@section('content')
    <style>
        /* Importación sutil de fuente moderna */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

        /* 🔥 CONTENEDOR RESPONSIVE Y CONFIGURACIÓN GLOBAL */
        .users-container {
            width: 100%;
            overflow-x: hidden;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            letter-spacing: -0.01em;
        }

        /* 🔥 TITULOS */
        .page-title {
            font-size: 2.25rem;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .section-title {
            margin: 35px 0 18px;
            font-size: 1.25rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            opacity: 0.9;
        }

        /* 🔥 MENSAJE DE ÉXITO */
        .success-message {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.95rem;
            font-weight: 500;
            background-color: rgba(16, 185, 129, 0.15);
            color: #10b981;
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        /* 🔥 FORMULARIO */
        .create-user-form {
            width: 100%;
            max-width: 500px;
            margin-bottom: 40px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        /* Inputs y Selects unificados */
        .create-user-form input,
        .create-user-form select,
        .modal-content input,
        .modal-content select {
            width: 100%;
            font-size: 16px;
            /* Evita zoom en móviles */
            padding: 12px 16px;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            background-color: rgba(255, 255, 255, 0.05);
            color: inherit;
            box-sizing: border-box;
            transition: all 0.2s ease;
        }

        .create-user-form input:focus,
        .create-user-form select:focus,
        .modal-content input:focus,
        .modal-content select:focus {
            outline: none;
            border-color: rgba(255, 255, 255, 0.4);
            background-color: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.05);
        }

        /* Formulario Botón Principal */
        .create-user-form button {
            padding: 12px 20px;
            font-size: 0.95rem;
            font-weight: 600;
            border-radius: 10px;
            border: none;
            background-color: #ffffff;
            color: #111827;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-top: 6px;
        }

        .create-user-form button:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        .create-user-form button:active {
            transform: translateY(0);
        }

        /* 🔥 TABLA RESPONSIVE */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            overflow-y: hidden;
            border-radius: 14px;
            -webkit-overflow-scrolling: touch;
            margin-top: 20px;
            background: #1f2937;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .table-wrapper::-webkit-scrollbar {
            height: 8px;
        }

        .table-wrapper::-webkit-scrollbar-thumb {
            background: #475569;
            border-radius: 20px;
        }

        .custom-table {
            width: 100%;
            min-width: 850px;
            border-collapse: collapse;
            text-align: left;
        }

        /* 🔥 CELDAS */
        .custom-table th {
            padding: 16px 20px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            background-color: rgba(0, 0, 0, 0.2);
            opacity: 0.8;
            white-space: nowrap;
        }

        .custom-table td {
            padding: 16px 20px;
            font-size: 0.95rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
            white-space: nowrap;
            vertical-align: middle;
        }

        .custom-table tbody tr:last-child td {
            border-bottom: none;
        }

        .custom-table tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.02);
        }

        /* IDs estables */
        .custom-table td:first-child {
            font-family: monospace;
            font-size: 0.9rem;
            opacity: 0.6;
        }

        /* Enlaces slug */
        .link-slug {
            color: #3b82f6;
            text-decoration: none;
            font-weight: 500;
            transition: opacity 0.2s;
        }

        .link-slug:hover {
            text-decoration: underline;
            opacity: 0.8;
        }

        /* 🔥 BOTONES Y ACCIONES */
        .actions {
            display: flex;
            gap: 6px;
            flex-wrap: nowrap;
            align-items: center;
        }

        .btn {
            white-space: nowrap;
            padding: 8px 14px;
            font-size: 0.85rem;
            font-weight: 600;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn:hover {
            filter: brightness(1.15);
            transform: translateY(-1px);
        }

        .btn:active {
            transform: translateY(0);
        }

        /* Mapeo estilizado según clases originales */
        .btn-edit {
            background-color: #3b82f6;
            color: #ffffff;
        }

        .btn-delete {
            background-color: #ef4444;
            color: #ffffff;
        }

        .btn-warning {
            background-color: #f59e0b;
            color: #ffffff;
        }

        .btn-success {
            background-color: #10b981;
            color: #ffffff;
        }

        /* 🔥 MODAL */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .modal-content {
            width: 95%;
            max-width: 420px;
            background-color: #1f2937;
            padding: 28px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-sizing: border-box;
        }

        .modal-content h3 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-top: 0;
        }

        .modal-content form {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .modal-content form div {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .modal-content form div button {
            flex: 1;
            min-width: 120px;
        }

        /* 🔥 RESPONSIVE */
        @media screen and (max-width: 768px) {
            .page-title {
                font-size: 1.8rem;
            }

            .section-title {
                font-size: 1.1rem;
                margin: 25px 0 12px;
            }

            .custom-table th,
            .custom-table td {
                padding: 12px 14px;
                font-size: 14px;
            }

            .btn {
                font-size: 13px;
                padding: 7px 12px;
            }
        }

        @media screen and (max-width: 480px) {
            .page-title {
                font-size: 1.5rem;
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
                padding: 6px 10px;
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

    <div id="editModal" class="modal">

        <div class="modal-content">

            <h3 style="margin-bottom:20px;">
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

                    <button type="submit" class="btn btn-edit">
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
