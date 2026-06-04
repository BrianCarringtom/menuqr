@extends('admin.layout', ['page' => 'users'])

@section('content')
    <style>
        /* 🔥 CABECERAS ESTILO ONE PIECE */
        .page-title {
            font-family: 'Pirata One', cursive;
            font-size: 3.5rem;
            color: var(--rojo-luffy);
            text-transform: uppercase;
            border-bottom: 4px solid var(--azul-rey);
            display: inline-block;
            margin-bottom: 30px;
        }

        .section-title {
            font-family: 'Bangers', cursive;
            color: var(--azul-rey);
            font-size: 1.8rem;
            margin: 30px 0 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* 🔥 FORMULARIO MEJORADO */
        .create-user-form {
            background: var(--fondo-pargamino);
            padding: 25px;
            border: 2px solid #d2b48c;
            border-radius: 10px;
            box-shadow: 8px 8px 0px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .create-user-form input,
        .create-user-form select {
            padding: 12px;
            border: 2px solid var(--azul-rey);
            border-radius: 5px;
            font-size: 16px;
            background: white;
        }

        .create-user-form button {
            grid-column: span 2;
            background: var(--rojo-luffy);
            color: white;
            font-family: 'Bangers', cursive;
            font-size: 20px;
            padding: 15px;
            border: none;
            cursor: pointer;
            transition: 0.3s;
            border-bottom: 4px solid #800000;
        }

        .create-user-form button:hover {
            transform: translateY(-3px);
            background: #ff0000;
        }

        /* 🔥 TABLA ESTILO "WANTED LIST" */
        .table-wrapper {
            background: white;
            border: 3px solid var(--madera-oscura);
            border-radius: 15px;
            overflow-x: auto;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }

        .custom-table thead {
            background: var(--azul-rey);
            color: white;
            font-family: 'Bangers', cursive;
            letter-spacing: 1px;
        }

        .custom-table th {
            padding: 18px;
            text-align: left;
            font-size: 16px;
        }

        .custom-table td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            font-weight: 500;
        }

        .custom-table tbody tr:hover {
            background: #f0f7ff;
        }

        /* 🔥 BADGES DE PLAN */
        .badge-plan {
            padding: 5px 12px;
            border-radius: 20px;
            font-family: 'Bangers', cursive;
            font-size: 12px;
            text-transform: uppercase;
        }

        .plan-basico {
            background: #e2e2e2;
            color: #666;
        }

        .plan-emprendedor {
            background: var(--azul-rey);
            color: white;
        }

        .plan-premium {
            background: var(--dorado-roger);
            color: #000;
            border: 1px solid black;
        }

        /* 🔥 BOTONES DE ACCIÓN */
        .btn {
            font-family: 'Bangers', cursive;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border: none;
            cursor: pointer;
        }

        .btn-edit {
            background: var(--azul-rey);
            color: white;
        }

        .btn-delete {
            background: var(--rojo-luffy);
            color: white;
        }

        .btn-toggle {
            background: #2ecc71;
            color: white;
        }

        /* 🔥 MODAL */
        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
            justify-content: center;
            align-items: center;
            z-index: 2000;
        }

        .modal-content {
            background: var(--fondo-pargamino);
            padding: 40px;
            border-radius: 15px;
            width: 100%;
            max-width: 500px;
            border: 5px solid var(--dorado-roger);
        }

        @media (max-width: 600px) {
            .create-user-form {
                grid-template-columns: 1fr;
            }

            .create-user-form button {
                grid-column: span 1;
            }
        }
    </style>

    <div class="users-container">
        <h1 class="page-title">Tripulación del Sistema</h1>

        @if (session('success'))
            <div
                style="background: #d4edda; color: #155724; padding: 15px; border-radius: 10px; margin-bottom: 20px; font-weight: bold;">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <div class="section-title">
            <i class="fas fa-plus-circle"></i> RECLUTAR NUEVO TRIPULANTE
        </div>

        <form method="POST" action="/admin/create-user" class="create-user-form">
            @csrf
            <input name="name" placeholder="Nombre del Pirata" required>
            <input name="email" type="email" placeholder="Correo Electrónico" required>
            <input type="password" name="password" placeholder="Clave Secreta" required>

            <select name="plan" required>
                <option value="basico">Grumete (Básico)</option>
                <option value="emprendedor">Pirata (Emprendedor)</option>
                <option value="premium">Rey Pirata (Premium)</option>
            </select>

            <select name="theme" required>
                <option value="show">Mapa 1 (Diseño 1)</option>
                <option value="show2">Mapa 2 (Diseño 2)</option>
            </select>

            <button type="submit"><i class="fas fa-skull"></i> REGISTRAR EN LA BITÁCORA</button>
        </form>

        <div class="section-title">
            <i class="fas fa-list"></i> LISTA DE RECOMPENSAS (USUARIOS)
        </div>

        <div class="table-wrapper">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Plan</th>
                        <th>Diseño</th>
                        <th>Ruta (Slug)</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>#{{ $user->id }}</td>
                            <td style="color: var(--azul-rey); font-weight: bold;">{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge-plan plan-{{ $user->plan }}">
                                    {{ $user->plan }}
                                </span>
                            </td>
                            <td><i class="fas fa-paint-brush"></i> {{ $user->theme }}</td>
                            <td>
                                <a href="/{{ $user->slug }}" target="_blank" class="link-slug">
                                    /{{ $user->slug }} <i class="fas fa-external-link-alt" style="font-size: 10px;"></i>
                                </a>
                            </td>
                            <td>
                                <div class="actions" style="display: flex; gap: 5px;">
                                    <button class="btn btn-edit"
                                        onclick="openEditModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', '{{ $user->role }}', '{{ $user->plan }}', '{{ $user->theme }}')">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                        onsubmit="return confirm('¿Enviar a Impel Down (Eliminar)?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-delete"><i class="fas fa-trash"></i></button>
                                    </form>

                                    <form action="{{ route('users.toggle', $user->id) }}" method="POST">
                                        @csrf @method('PUT')
                                        <button type="submit"
                                            class="btn {{ $user->is_active ? 'btn-toggle' : 'btn-warning' }}">
                                            <i class="fas {{ $user->is_active ? 'fa-unlock' : 'fa-lock' }}"></i>
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
            <h2 style="font-family: 'Bangers'; color: var(--azul-rey); margin-bottom: 20px;">MODIFICAR TRIPULANTE</h2>
            <form id="editForm" method="POST" style="display: flex; flex-direction: column; gap: 12px;">
                @csrf @method('PUT')
                <input type="text" name="name" id="editName" placeholder="Nombre" required
                    style="padding: 10px; border: 2px solid var(--azul-rey);">
                <input type="email" name="email" id="editEmail" placeholder="Email" required
                    style="padding: 10px; border: 2px solid var(--azul-rey);">

                <select name="role" id="editRole" style="padding: 10px;">
                    <option value="admin">Almirante (Admin)</option>
                    <option value="business">Capitán (Business)</option>
                </select>

                <select name="plan" id="editPlan" style="padding: 10px;">
                    <option value="basico">Grumete</option>
                    <option value="emprendedor">Pirata</option>
                    <option value="premium">Rey Pirata</option>
                </select>

                <select name="theme" id="editTheme" style="padding: 10px;">
                    <option value="show">Diseño 1</option>
                    <option value="show2">Diseño 2</option>
                </select>

                <div style="display: flex; gap: 10px; margin-top: 15px;">
                    <button type="submit" class="btn btn-edit" style="flex: 1; padding: 15px;">ACTUALIZAR</button>
                    <button type="button" class="btn btn-delete" onclick="closeModal()"
                        style="flex: 1; padding: 15px;">CANCELAR</button>
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
            if (e.target.className === 'modal') closeModal();
        }
    </script>
@endsection
