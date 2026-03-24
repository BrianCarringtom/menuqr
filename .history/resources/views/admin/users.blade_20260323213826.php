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
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-capitalize">{{ $user->role }}</td>

                    <td>
                        <a href="/{{ $user->slug }}" target="_blank" class="link-slug">
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

                                <button type="submit" class="btn {{ $user->is_active ? 'btn-warning' : 'btn-success' }}">

                                    {{ $user->is_active ? 'Bloquear' : 'Desbloquear' }}

                                </button>
                            </form>

                        </div>
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

    <script>
        // Guardar posición antes de enviar cualquier form
        document.querySelectorAll("form").forEach(form => {
            form.addEventListener("submit", () => {
                localStorage.setItem("scrollY", window.scrollY);
            });
        });

        // Restaurar posición al cargar
        window.addEventListener("load", () => {
            const scrollY = localStorage.getItem("scrollY");
            if (scrollY !== null) {
                window.scrollTo(0, parseInt(scrollY));
                localStorage.removeItem("scrollY");
            }
        });
    </script>
@endsection
