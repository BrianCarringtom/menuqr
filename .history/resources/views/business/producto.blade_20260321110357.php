@extends('admin.layout') {{-- O usa tu layout principal --}}

@section('content')
<div class="cards-row"
     style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; align-items: stretch;">

    <!-- AGREGAR PRODUCTO -->
    <div class="card">
        <h3><i class="fas fa-box-open" style="color:#c9a227;"></i> Agregar Producto</h3>

        @if(session('success'))
            <p style="color:green;">{{ session('success') }}</p>
        @endif

        <form method="POST" action="{{ url('/business/producto') }}" enctype="multipart/form-data"
              style="display: flex; flex-direction: column; gap: 15px;">
            @csrf
            <input type="text" name="name" placeholder="Nombre del producto" required>
            <input type="number" name="price" placeholder="Precio" step="0.01" required>
            <select name="category" required>
                <option value="" disabled selected>Seleccionar categoría</option>
                <option value="panaderia">Panadería</option>
                <option value="bebidas">Bebidas</option>
                <option value="postres">Postres</option>
            </select>
            <textarea name="description" placeholder="Descripción del producto" required></textarea>
            <input type="file" name="image" accept="image/*" required>
            <button type="submit" style="background:#c9a227;color:white;">Agregar Producto</button>
        </form>
    </div>

    <!-- LISTA DE PRODUCTOS -->
    <div class="card">
        <h3><i class="fas fa-boxes" style="color:#c9a227;"></i> Productos existentes</h3>
        <div>
            @foreach($products as $product)
                <div style="border:1px solid #eee; padding:10px; margin-bottom:10px;">
                    <img src="{{ asset('storage/'.$product->image) }}" style="width:100%; height:100px; object-fit:cover;">
                    <h4>{{ $product->name }}</h4>
                    <p>{{ $product->description }}</p>
                    <strong>${{ $product->price }}</strong>
                    <p>Categoria: {{ $product->category }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection