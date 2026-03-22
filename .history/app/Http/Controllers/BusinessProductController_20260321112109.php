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
        // Obtén el usuario autenticado
        $user = Auth::user();

        // Si no hay usuario logueado, redirige o devuelve vacío
        if (!$user) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder.');
        }

        // Carga productos del usuario con su categoría relacionada
        $products = $user->products()->with('category')->get();

        // Carga categorías del usuario
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

        $path = $request->file('image')->store('products', 'public');

        Product::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category, // CORRECTO: category_id
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $path,
        ]);

        return back()->with('success', 'Producto creado');
    }

    // Guardar categoría
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
