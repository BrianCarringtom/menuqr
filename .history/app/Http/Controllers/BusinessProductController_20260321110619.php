<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class BusinessProductController extends Controller
{
    public function index()
    {
        $products = Auth::user()->products()->get();
        $categories = Auth::user()->categories()->get(); // categorías dinámicas
        return view('business.producto', compact('products', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|exists:categories,id', // validar que exista
            'description' => 'required|string',
            'image' => 'required|image|max:2048',
        ]);

        $path = $request->file('image')->store('products', 'public');

        Product::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $path,
        ]);

        return back()->with('success', 'Producto creado');
    }

    // NUEVA FUNCIÓN: crear categoría
    public function storeCategory(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255'
        ]);

        Category::create([
            'user_id' => Auth::id(),
            'name' => $request->category,
        ]);

        return back()->with('success', 'Categoría creada');
    }
}
