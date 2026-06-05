@extends('admin.layout', ['page' => 'users'])

@section('content')
    <style>
        /* ==========================================
               variables de diseño moderno (2026)
               ========================================== */
        :root {
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --transition-smooth: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* 📦 CONTENEDOR PRINCIPAL */
        .users-container {
            width: 100%;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
            gap: 24px;
            padding: 16px;
            box-sizing: border-box;
        }

        /* 🏷️ TITULOS */
        .page-title {
            font-size: 2.25rem;
            font-weight: 700;
            letter-spacing: -0.025em;
            margin: 0;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            letter-spacing: -0.015em;
            margin: 12px 0 0 0;
        }

        /* 💬 NOTIFICACIONES */
        .success-message {
            padding: 12px 16px;
            border-radius: var(--radius-sm);
            margin: 0;
            font-size: 0.95rem;
        }

        /* 📝 FORMULARIO DE CREACIÓN */
        .create-user-form {
            width: 100%;
            max-width: 500px;
            display: flex;
            flex-direction: column;
            gap: 14px;
            background: rgba(255, 255, 255, 0.02);
            padding: 24px;
            border-radius: var(--radius-md);
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-sizing: border-box;
        }

        /* 📥 INPUTS, SELECTS Y CAMPOS */
        .create-user-form input,
        .create-user-form select,
        .modal-content input,
        .modal-content select {
            width: 100%;
            font-size: 16px;
            /* Evita zoom automático en iOS */
            padding: 12px 16px;
            border-radius: var(--radius-sm);
            border: 1px solid rgba(255, 255, 255, 0.1);
            background-color: rgba(0, 0, 0, 0.15);
            color: inherit;
            transition: var(--transition-smooth);
            outline: none;
            box-sizing: border-box;
        }

        .create-user-form input:focus,
        .create-user-form select:focus,
        .modal-content input:focus,
        .modal-content select:focus {
            border-color: rgba(255, 255, 255, 0.3);
            background-color: rgba(0, 0, 0, 0.25);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.05);
        }

        /* 📊 TABLA RESPONSIVE */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            overflow-y: hidden;
            border-radius: var(--radius-lg);
            border: 1px solid rgba(255, 255, 255, 0.08);
            -webkit-overflow-scrolling: touch;
            background: #1f2937;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        /* Personalización de barra de scroll para la tabla */
        .table-wrapper::-webkit-scrollbar {
            height: 8px;
        }

        .table-wrapper::-webkit-scrollbar-thumb {
            background: #475569;
            border-radius: 20px;
        }

        .custom-table {
            width: 100%;
            min-width: 900px;
            border-collapse: collapse;
            text-align: left;
        }

        /* CELDAS Y FILAS */
        .custom-table th {
            padding: 14px 20px;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 600;
            border-bottom: 2px solid rgba(255, 255, 255, 0.08);
            white-space: nowrap;
        }

        .custom-table td {
            padding: 16px 20px;
            font-size: 0.95rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
            white-space: nowrap;
            vertical-align: middle;
        }

        .custom-table tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.015);
        }

        /* 🔗 ENLACES (SLUG) */
        .link-slug {
            text-decoration: none;
            color: inherit;
            opacity: 0.8;
            transition: var(--transition-smooth);
            font-family: monospace;
        }

        .link-slug:hover {
            opacity: 1;
            text-decoration: underline;
        }

        /* ⚡ ACCIONES Y BOTONES */
        .actions {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: nowrap;
        }

        .actions form {
            margin: 0;
            display: inline-flex;
        }

        .btn {
            font-weight: 500;
            padding: 10px 16px;
            border-radius: var(--radius-sm);
            border: 1px solid transparent;
            cursor: pointer;
            white-space: nowrap;
            transition: var(--transition-smooth);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn:active {
            transform: translateY(0);
        }

        /* 🎯 MODAL */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            padding: 16px;
            box-sizing: border-box;
        }

        .modal-content {
            width: 100%;
            max-width: 440px;
            background: #1f2937;
            padding: 32px;
            border-radius: var(--radius-lg);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3);
            box-sizing: border-box;
        }

        .modal-content form {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .modal-content form .modal-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 12px;
        }

        .modal-content form .modal-actions button {
            flex: 1;
            min-width: 120px;
        }

        /* 📱 RESPONSIVE MEDIA QUERIES */
        @media screen and (max-width: 768px) {
            .page-title {
                font-size: 1.75rem;
            }

            .section-title {
                font-size: 1.15rem;
            }

            .custom-table th {
                padding: 12px 16px;
            }

            .custom-table td {
                padding: 12px 16px;
                font-size: 14px;
            }

            .btn {
                font-size: 13px;
                padding: 8px 14px;
            }
        }

        @media screen and (max-width: 480px) {
            .users-container {
                gap: 20px;
                padding: 12px;
            }

            .page-title {
                font-size: 1.5rem;
            }

            .create-user-form {
                padding: 16px;
            }

            .modal-content {
                padding: 24px;
            }
        }
    </style>

    <div class="users-container">

        <h1 class="page-title">Panel Administrador</h1>

        @if (session('success'))
            <p class="success-message">
                {{ session('success') }}
            </p>
        @endif

        <div>
            <h3 class="section-title">Crear usuario business</h3>
            <form method="POST" action="/admin/create-user" class="create-user-form" style="margin-top: 12px;">
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

                <button class="btn" style="background-color: rgba(255,255,255,0.1); color: inherit; margin-top: 4px;">
                    Crear Usuario
                </button>
            </form>
        </div>

        <div>
            <h3 class="section-title" style="margin-bottom: 12px;">Lista de Usuarios</h3>

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
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="text-capitalize">{{ $user->role }}</td>
                                <td>
                                    @if ($user->plan == 'basico')
                                        Básico
                                    @elseif($user->plan == 'emprendedor')
                                        Emprendedor
                                    @else
                                        Premium
                                    @endif
                                </td>
                                <td>{{ $user->theme }}</td>
                                <td>
                                    <a href="/{{ $user->slug }}" target="_blank" class="link-slug">
                                        {{ $user->slug }}
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
                                            @slot('method')
                                                @method('DELETE')
                                            @endslot
                                            <button type="submit" class="btn btn-delete">
                                                Eliminar
                                            </button>
                                        </form>

                                        <form action="{{ route('users.toggle', $user->id) }}" method="POST">
                                            @csrf
                                            @slot('method')
                                                @method('PUT')
                                            @endslot
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
            <h3 style="margin-top:0; margin-bottom:20px; font-size: 1.35rem; font-weight: 600;">
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
