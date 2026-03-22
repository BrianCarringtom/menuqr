<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BusinessProductController extends Controller
{
    // Mostrar productos y categorías del negocio
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder.');
        }

        // Obtener productos del usuario con la relación category
        $products = $user->products()->with('category')->get();

        // Obtener categorías creadas por este negocio
        $categories = $user->categories()->get();

        return view('business.producto', compact('products', 'categories'));
    }

    // Guardar un producto
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|exists:categories,id', // category_id
            'description' => 'required|string',
            'image' => 'required|image|max:2048',
        ]);

        // Guardar la imagen en storage/public/products
        $path = $request->file('image')->store('products', 'public');

        // Crear producto asociado al negocio
        Product::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category, // referencia a Category
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $path,
        ]);

        return back()->with('success', 'Producto creado correctamente.');
    }

    // Guardar categoría
    public function storeCategory(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255'
        ]);

        // Crear categoría asociada al negocio
        Category::create([
            'user_id' => Auth::id(),
            'name' => $request->category,
        ]);

        return back()->with('success', 'Categoría creada correctamente.');
    }
}
