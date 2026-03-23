@extends('admin.layout', ['page' => 'users'])

@section('content')
    <h1>Panel Administrador</h1>

    @if (session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <h3>Crear usuario business</h3>
    <form method="POST" action="/admin/create-user">
        @csrf
        <input name="name" placeholder="Nombre" required><br>
        <input name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button>Crear Usuario</button>
    </form>

    <h3>Lista de Usuarios</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Slug</th> <!-- 👈 NUEVO -->
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="/{{ $user->slug }}" target="_blank" class="link-slug">
                            {{ $user->slug }}
                        </a>
                    </td> <!-- 👈 NUEVO -->
                    <td style="display:flex; gap:8px; align-items:center;">

                        <!-- EDITAR -->
                        <button class="btn btn-edit"
                            onclick="openEditModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', '{{ $user->role }}')">
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

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- MODAL EDITAR -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <h3>Editar Usuario</h3>

            <form id="editForm" method="POST">
                @csrf
                @method('PUT')

                <input type="text" name="name" id="editName" placeholder="Nombre" required><br><br>
                <input type="email" name="email" id="editEmail" placeholder="Email" required><br><br>

                <select name="role" id="editRole">
                    <option value="admin">Admin</option>
                    <option value="business">Business</option>
                </select><br><br>

                <div style="display:flex; gap:10px;">
                    <button type="submit" class="btn btn-edit">Actualizar</button>
                    <button type="button" class="btn btn-delete" onclick="closeModal()">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(id, name, email, role) {
            document.getElementById('editModal').style.display = 'flex';

            document.getElementById('editName').value = name;
            document.getElementById('editEmail').value = email;
            document.getElementById('editRole').value = role;

            // Cambiar acción del form dinámicamente
            document.getElementById('editForm').action = `/admin/users/${id}`;
        }

        function closeModal() {
            document.getElementById('editModal').style.display = 'none';
        }

        // cerrar al hacer click fuera
        window.onclick = function(e) {
            let modal = document.getElementById('editModal');
            if (e.target === modal) {
                modal.style.display = "none";
            }
        }
    </script>
@endsection
