@extends('admin.layout', ['page' => 'users'])

@section('content')

    <style>
        /* 🔥 CONTENEDOR RESPONSIVE */
        .users-container {
            width: 100%;
            overflow-x: hidden;
        }

        /* 🔥 FORMULARIO */
        .create-user-form {
            width: 100%;
            max-width: 500px;
            margin-bottom: 40px;
        }

        .create-user-form input {
            width: 100%;
        }

        /* 🔥 TABLA RESPONSIVE */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            overflow-y: hidden;
            border-radius: 16px;
            -webkit-overflow-scrolling: touch;
            margin-top: 20px;
            background: #1f2937;
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
        }

        /* 🔥 CELDAS */
        .custom-table th,
        .custom-table td {
            white-space: nowrap;
        }

        /* 🔥 TITULOS */
        .page-title {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .section-title {
            margin: 25px 0 15px;
            font-size: 1.4rem;
        }

        /* 🔥 BOTONES */
        .actions {
            display: flex;
            gap: 8px;
            flex-wrap: nowrap;
        }

        .btn {
            white-space: nowrap;
        }

        /* 🔥 MODAL */
        .modal-content {
            width: 95%;
            max-width: 420px;
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
                font-size: 1.7rem;
            }

            .section-title {
                font-size: 1.2rem;
            }

            .custom-table th,
            .custom-table td {
                padding: 14px 16px;
                font-size: 14px;
            }

            .btn {
                font-size: 13px;
                padding: 8px 12px;
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
                font-size: 1.1rem;
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
                padding: 7px 10px;
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

        <form method="POST"
            action="/admin/create-user"
            class="create-user-form">

            @csrf

            <input name="name"
                placeholder="Nombre"
                required>

            <input name="email"
                placeholder="Email"
                required>

            <input type="password"
                name="password"
                placeholder="Password"
                required>

            <button>
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
                                <a href="/{{ $user->slug }}"
                                    target="_blank"
                                    class="link-slug">

                                    {{ $user->slug }}

                                </a>
                            </td>

                            <td>

                                <div class="actions">

                                    <!-- EDITAR -->
                                    <button
                                        onclick="openEditModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', '{{ $user->role }}')"
                                        class="btn btn-edit">

                                        Editar

                                    </button>

                                    <!-- ELIMINAR -->
                                    <form action="{{ route('users.destroy', $user->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('¿Eliminar usuario?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="btn btn-delete">

                                            Eliminar

                                        </button>

                                    </form>

                                    <!-- BLOQUEAR -->
                                    <form action="{{ route('users.toggle', $user->id) }}"
                                        method="POST">

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
    <div id="editModal"
        class="modal">

        <div class="modal-content">

            <h3 style="margin-bottom:20px;">
                Editar Usuario
            </h3>

            <form id="editForm"
                method="POST">

                @csrf
                @method('PUT')

                <input type="text"
                    name="name"
                    id="editName"
                    placeholder="Nombre"
                    required>

                <input type="email"
                    name="email"
                    id="editEmail"
                    placeholder="Email"
                    required>

                <select name="role"
                    id="editRole">

                    <option value="admin">
                        Admin
                    </option>

                    <option value="business">
                        Business
                    </option>

                </select>

                <div style="margin-top:20px;">

                    <button type="submit"
                        class="btn btn-edit">

                        Actualizar

                    </button>

                    <button type="button"
                        class="btn btn-delete"
                        onclick="closeModal()">

                        Cancelar

                    </button>

                </div>

            </form>

        </div>

    </div>

    <!-- 🔥 SCRIPT -->
    <script>

        function openEditModal(id, name, email, role) {

            document.getElementById('editModal').style.display = 'flex';

            document.getElementById('editName').value = name;
            document.getElementById('editEmail').value = email;
            document.getElementById('editRole').value = role;

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