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
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
