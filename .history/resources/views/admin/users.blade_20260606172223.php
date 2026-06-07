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

        .create-user-form input,
        .create-user-form select,
        .modal-content input,
        .modal-content select {
            width: 100%;
            font-size: 16px;
            /* 👈 Esto evita el zoom automático en móviles */
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
            min-width: 950px;
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

        /* 🔥 CONTADOR INFERIOR */
        .table-footer-counter {
            display: flex;
            justify-content: flex-end;
            margin-top: 15px;
            font-size: 14px;
            color: #e5e7eb;
        }

        .counter-badge {
            background-color: #374151;
            padding: 8px 14px;
            border-radius: 8px;
            border: 1px solid #4b5563;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        /* 🔥 BOTONES */
        .actions {
            display: flex;
            gap: 8px;
            flex-wrap: nowrap;
            align-items: center;
        }

        .btn {
            white-space: nowrap;
        }

        /* Estilos específicos para los botones convertidos en iconos */
        .actions .btn-edit,
        .actions .btn-delete {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            padding: 0;
            border-radius: 8px;
            border: none;
            cursor: pointer;
        }

        .actions .btn-edit i,
        .actions .btn-delete i {
            font-size: 14px;
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

            .actions .btn-edit,
            .actions .btn-delete {
                width: 32px;
                height: 32px;
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
                min-width: 950px;
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
        <h1 class="page-title">Panel Administrador</h1>

        @if (session('success'))
            <p class="success-message">
                {{ session('success') }}
            </p>
        @endif

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
                <option value="show3">Diseño 3</option>
                <option value="show4">Diseño 4</option>
                <option value="show5">Diseño 5</option>
                <option value="show6">Diseño 6</option>
            </select>

            <button type="submit">Crear Usuario</button>
        </form>

        <h3 class="section-title">Lista de Usuarios</h3>

        <div class="table-wrapper">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th style="width: 40px; text-align: center;"></th>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Plan</th>
                        <th>Diseño</th>
                        <th>Slug</th>
                        <th>Creado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Inicializamos el contador de banderas en 0 --}}
                    @php $totalBanderas = 0; @endphp

                    @foreach ($users as $user)
                        @php
                            $fechaCreacion = \Carbon\Carbon::parse($user->created_at)->startOfDay();
                            $fechaHoy = \Carbon\Carbon::now()->startOfDay();
                            $diasPasados = $fechaCreacion->diffInDays($fechaHoy);

                            // Si cumple las condiciones, sumamos 1 al contador
                            $tieneBandera = $user->role !== 'admin' && $diasPasados >= 29;
                            if ($tieneBandera) {
                                $totalBanderas++;
                            }
                        @endphp
                        <tr>
                            <td style="text-align: center;">
                                @if ($tieneBandera)
                                    <i class="fa-solid fa-flag" style="color: #ef4444 !important; display: inline-block;"
                                        title="Vence pronto ({{ $diasPasados }} días transcurridos)"></i>
                                @endif
                            </td>
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
                                {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}
                                <span style="color: #9ca3af; font-size: 12px; margin-left: 5px;">
                                    ({{ $diasPasados }} {{ $diasPasados == 1 ? 'día' : 'días' }})
                                </span>
                            </td>
                            <td>
                                <div class="actions">
                                    <button
                                        onclick="openEditModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', '{{ $user->role }}', '{{ $user->plan }}', '{{ $user->theme }}')"
                                        class="btn btn-edit" title="Editar">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>

                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                        onsubmit="return confirm('¿Eliminar usuario?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete" title="Eliminar">
                                            <i class="fa-solid fa-trash-can"></i>
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

        {{-- Apartado inferior derecho con el conteo exacto --}}
        <div class="table-footer-counter">
            <div class="counter-badge">
                <i class="fa-solid fa-flag" style="color: #ef4444;"></i>
                <span>Usuarios por vencer (29+ días): <strong>{{ $totalBanderas }}</strong></span>
            </div>
        </div>
    </div>

    <div id="editModal" class="modal">
        <div class="modal-content">
            <h3 style="margin-bottom:20px;">Editar Usuario</h3>

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
                    <option value="show3">Diseño 3</option>
                    <option value="show4">Diseño 4</option>
                    <option value="show5">Diseño 5</option>
                    <option value="show6">Diseño 6</option>
                </select>

                <div style="margin-top:20px;">
                    <button type="submit" class="btn btn-edit">Actualizar</button>
                    <button type="button" class="btn btn-delete" onclick="closeModal()">Cancelar</button>
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
