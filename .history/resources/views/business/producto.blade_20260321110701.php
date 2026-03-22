@extends('admin.layout')

@section('content')
    <div class="cards-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">

        <!-- AGREGAR CATEGORÍA -->
        <div class="card">
            <h3><i class="fas fa-folder-plus" style="color:#c9a227;"></i> Agregar Categoría</h3>

            @if (session('success'))
                <p style="color:green;">{{ session('success') }}</p>
            @endif

            <form method="POST" action="{{ url('/business/category') }}"
                style="display:flex; flex-direction:column; gap:15px;">
                @csrf
                <input type="text" name="category" placeholder="Nombre de la categoría" required>
                <button type="submit" style="background:#c9a227;color:white;">Crear Categoría</button>
            </form>
        </div>

        <!-- AGREGAR PRODUCTO -->
        <div class="card">
            <h3><i class="fas fa-box-open" style="color:#c9a227;"></i> Agregar Producto</h3>

            <form method="POST" action="{{ url('/business/producto') }}" enctype="multipart/form-data"
                style="display: flex; flex-direction: column; gap: 15px;">
                @csrf
                <input type="text" name="name" placeholder="Nombre del producto" required>
                <input type="number" name="price" placeholder="Precio" step="0.01" required>

                <select name="category" required>
                    <option value="" disabled selected>Seleccionar categoría</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>

                <textarea name="description" placeholder="Descripción del producto" required></textarea>
                <input type="file" name="image" accept="image/*" required>
                <button type="submit" style="background:#c9a227;color:white;">Agregar Producto</button>
            </form>
        </div>

    </div>
@endsection
