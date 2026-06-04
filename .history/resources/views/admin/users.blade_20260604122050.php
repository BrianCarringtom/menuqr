@extends('admin.layout', ['page' => 'users'])

@section('content')
    <link
        href="https://fonts.googleapis.com/css2?family=Bangers&family=Architects+Daughter&family=Poppins:wght@400;600&display=swap"
        rel="stylesheet">

    <style>
        /* 🏴‍☠️ VARIABLES DE ESTILO ONE PIECE */
        :root {
            --op-bg-dark: #120c06;
            /* Fondo profundo */
            --op-wood: #2c1d11;
            /* Madera de barco */
            --op-gold: #fbd46d;
            /* Sombrero de paja / Oro */
            --op-gold-hover: #e0b84c;
            --op-sea: #1f4068;
            /* Azul Mar */
            --op-sea-light: #3282b8;
            --op-marine: #e43f5a;
            /* Rojo Marina / Peligro */
            --op-marine-hover: #b92b45;
            --op-parchment: #f4eae1;
            /* Papel de Recompensa (Wanted) */
            --op-text-light: #fbe3b5;
        }

        /* 🏴‍☠️ CONTENEDOR RESPONSIVE */
        .users-container {
            width: 100%;
            overflow-x: hidden;
            font-family: 'Poppins', sans-serif;
            background-color: var(--op-bg-dark);
            color: var(--op-text-light);
            padding: 20px;
            border-radius: 12px;
            box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.8);
        }

        /* 🏴‍☠️ TITULOS */
        .page-title {
            font-family: 'Bangers', cursive;
            font-size: 3rem;
            letter-spacing: 2px;
            color: var(--op-gold);
            text-shadow: 3px 3px 0px #000;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .section-title {
            font-family: 'Architects Daughter', cursive;
            margin: 30px 0 15px;
            font-size: 1.8rem;
            color: var(--op-gold);
            border-bottom: 2px dashed var(--op-gold);
            padding-bottom: 5px;
            display: inline-block;
        }

        /* 🏴‍☠️ ALERTA DE ÉXITO */
        .success-message {
            background: #2e7d32;
            color: #fff;
            padding: 12px;
            border-radius: 8px;
            border: 2px solid #4caf50;
            margin-bottom: 20px;
            font-weight: bold;
        }

        /* 🏴‍☠️ FORMULARIO */
        .create-user-form {
            width: 100%;
            max-width: 550px;
            background: var(--op-wood);
            padding: 25px;
            border-radius: 12px;
            border: 3px solid var(--op-gold);
            box-shadow: 5px 5px 0px #000;
            margin-bottom: 40px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .create-user-form input,
        .create-user-form select,
        .modal-content input,
        .modal-content select {
            width: 100%;
            font-size: 16px;
            padding: 12px;
            background: var(--op-parchment);
            color: #333;
            border: 2px solid #000;
            border-radius: 6px;
            font-weight: 600;
            box-sizing: border-box;
            transition: all 0.2s ease;
        }

        .create-user-form input:focus,
        .create-user-form select:focus,
        .modal-content input:focus,
        .modal-content select:focus {
            outline: none;
            border-color: var(--op-gold);
            box-shadow: 0 0 8px var(--op-gold);
        }

        /* 🏴‍☠️ BOTÓN PRINCIPAL (ESTILO LUFFY/GOLD) */
        .btn-submit {
            font-family: 'Bangers', cursive;
            font-size: 1.5rem;
            background: var(--op-gold);
            color: #000;
            border: 2px solid #000;
            padding: 10px;
            border-radius: 6px;
            cursor: pointer;
            box-shadow: 3px 3px 0px #000;
            transition: transform 0.1s, box-shadow 0.1s;
            letter-spacing: 1px;
        }

        .btn-submit:hover {
            background: var(--op-gold-hover);
        }

        .btn-submit:active {
            transform: translate(2px, 2px);
            box-shadow: 1px 1px 0px #000;
        }

        /* 🏴‍☠️ TABLA RESPONSIVE estilo "WANTED" */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            overflow-y: hidden;
            border-radius: 12px;
            border: 3px solid var(--op-gold);
            box-shadow: 5px 5px 0px #000;
            -webkit-overflow-scrolling: touch;
            margin-top: 20px;
            background: var(--op-wood);
        }

        .table-wrapper::-webkit-scrollbar {
            height: 10px;
        }

        .table-wrapper::-webkit-scrollbar-thumb {
            background: var(--op-gold);
            border-radius: 20px;
            border: 2px solid var(--op-wood);
        }

        .custom-table {
            width: 100%;
            min-width: 850px;
            border-collapse: collapse;
            text-align: left;
        }

        .custom-table th {
            background-color: #1a110a;
            color: var(--op-gold);
            font-family: 'Bangers', cursive;
            font-size: 1.3rem;
            letter-spacing: 1px;
            padding: 15px;
            border-bottom: 3px solid var(--op-gold);
        }

        .custom-table td {
            padding: 15px;
            border-bottom: 1px solid rgba(251, 212, 109, 0.2);
            color: var(--op-text-light);
            white-space: nowrap;
        }

        .custom-table tbody tr:hover {
            background-color: rgba(251, 212, 109, 0.05);
        }

        /* Enlace del Slug */
        .link-slug {
            color: var(--op-sea-light);
            text-decoration: none;
            font-weight: bold;
        }

        .link-slug:hover {
            text-decoration: underline;
        }

        /* 🏴‍☠️ BOTONES DE ACCIÓN */
        .actions {
            display: flex;
            gap: 8px;
            flex-wrap: nowrap;
        }

        .btn {
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
            font-size: 13px;
            padding: 8px 14px;
            border: 2px solid #000;
            border-radius: 6px;
            cursor: pointer;
            white-space: nowrap;
            box-shadow: 2px 2px 0px #000;
            transition: all 0.1s ease;
        }

        .btn:active {
            transform: translate(1px, 1px);
            box-shadow: 1px 1px 0px #000;
        }

        .btn-edit {
            background-color: var(--op-sea);
            color: #fff;
        }

        .btn-edit:hover {
            background-color: var(--op-sea-light);
        }

        .btn-delete {
            background-color: var(--op-marine);
            color: #fff;
        }

        .btn-delete:hover {
            background-color: var(--op-marine-hover);
        }

        .btn-warning {
            background-color: #ff9800;
            color: #000;
        }

        .btn-success {
            background-color: #4caf50;
            color: #fff;
        }

        /* 🏴‍☠️ MODAL ESTILO MAPA ANTIGUO */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.75);
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: var(--op-wood);
            border: 4px solid var(--op-gold);
            border-radius: 12px;
            padding: 30px;
            width: 95%;
            max-width: 450px;
            box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.7);
            color: var(--op-text-light);
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .modal-content h3 {
            font-family: 'Bangers', cursive;
            font-size: 2.2rem;
            color: var(--op-gold);
            text-shadow: 2px 2px 0px #000;
            margin: 0 0 10px 0;
            text-align: center;
        }

        .modal-content form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .modal-actions {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .modal-actions button {
            flex: 1;
        }

        /* 🏴‍☠️ RESPONSIVE MEDIA QUERIES */
        @media screen and (max-width: 768px) {
            .page-title {
                font-size: 2.3rem;
            }

            .section-title {
                font-size: 1.4rem;
            }

            .custom-table th,
            .custom-table td {
                padding: 12px;
                font-size: 14px;
            }

            .btn {
                font-size: 12px;
                padding: 6px 10px;
            }
        }

        @media screen and (max-width: 480px) {
            .page-title {
                font-size: 1.8rem;
            }

            .section-title {
                font-size: 1.2rem;
            }

            .custom-table {
                min-width: 900px;
            }
        }
    </style>

    <div class="users-container">

        <h1 class="page-title">
            🏴‍☠️ Panel de Control Nakama
        </h1>

        @if (session('success'))
            <p class="success-message">
                {{ session('success') }}
            </p>
        @endif

        <div>
            <h3 class="section-title">Reclutar Nuevo Business (Socio)</h3>
        </div>

        <form method="POST" action="/admin/create-user" class="create-user-form">
            @csrf

            <input name="name" placeholder="Nombre del pirata" required>

            <input name="email" placeholder="Correo electrónico (Den Den Mushi)" required>

            <input type="password" name="password" placeholder="Contraseña segura" required>

            <select name="plan" required>
                <option value="basico">Básico (30 productos)</option>
                <option value="emprendedor">Emprendedor (80 productos)</option>
                <option value="premium">Premium (Ilimitado - Rey de los Piratas)</option>
            </select>

            <select name="theme" required>
                <option value="show">Diseño East Blue (1)</option>
                <option value="show2">Diseño Grand Line (2)</option>
            </select>

            <button type="submit" class="btn-submit">
                Añadir a la Tripulación
            </button>
        </form>

        <div>
            <h3 class="section-title">Lista de Recompensas (Usuarios)</h3>
        </div>

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
                        <th>Ruta (Slug)</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td style="font-weight: 600; color: var(--op-gold);">{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-capitalize">{{ $user->role }}</td>
                            <td>
                                @if ($user->plan == 'basico')
                                    Básico
                                @elseif($user->plan == 'emprendedor')
                                    Emprendedor
                                @else
                                    Premium 👑
                                @endif
                            </td>
                            <td>{{ $user->theme }}</td>
                            <td>
                                <a href="/{{ $user->slug }}" target="_blank" class="link-slug">
                                    /{{ $user->slug }}
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
                                        onsubmit="return confirm('¿Seguro que deseas eliminar a este tripulante?')">
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
                                            {{ $user->is_active ? 'Arrestar' : 'Liberar' }}
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
            <h3>Editar Nakama</h3>

            <form id="editForm" method="POST">
                @csrf
                @method('PUT')

                <input type="text" name="name" id="editName" placeholder="Nombre" required>
                <input type="email" name="email" id="editEmail" placeholder="Email" required>

                <select name="role" id="editRole">
                    <option value="admin">Admin (Capitán)</option>
                    <option value="business">Business (Tripulación)</option>
                </select>

                <select name="plan" id="editPlan">
                    <option value="basico">Básico</option>
                    <option value="emprendedor">Emprendedor</option>
                    <option value="premium">Premium</option>
                </select>

                <select name="theme" id="editTheme">
                    <option value="show">Diseño East Blue (1)</option>
                    <option value="show2">Diseño Grand Line (2)</option>
                </select>

                <div class="modal-actions">
                    <button type="submit" class="btn-submit" style="font-size: 1.2rem;">Guardar Cambios</button>
                    <button type="button" class="btn btn-delete" onclick="closeModal()">Cerrar</button>
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
