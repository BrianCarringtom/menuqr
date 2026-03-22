@extends('layouts.app')

@section('content')
    <h1>{{ $business->name }}</h1>

    <h2>Productos</h2>
    <div style="display: flex; flex-wrap: wrap; gap: 20px;">
        @foreach ($business->products as $product)
            <div style="border:1px solid #eee; padding: 15px; border-radius:10px; width:250px;">
                <img src="{{ asset('storage/' . $product->image) }}" style="width:100%; height:150px; object-fit:cover;">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>
                <strong>${{ $product->price }}</strong>
            </div>
        @endforeach
    </div>
@endsection
