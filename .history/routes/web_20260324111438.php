<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;

// Página pública
Route::get('/', function () {
    return view('welcome');
});

// 🔥 REDIRECCIÓN INTELIGENTE (CLAVE)
Route::get('/dashboard', function () {

    if (!Auth::check()) {
        return redirect('/login');
    }

    if (Auth::user()->role === 'admin') {
        return redirect('/admin');
    }

    return redirect('/business');
})->middleware('auth');


// PANEL ADMIN
// Dashboard
Route::get('/admin', function () {

    if (Auth::user()->role !== 'admin') {
        abort(403);
    }

    return view('admin.dashboard');
})->middleware('auth');


// Usuarios
Route::get('/admin/users', function () {

    if (Auth::user()->role !== 'admin') {
        abort(403);
    }

    $users = User::all();

    return view('admin.users', compact('users'));
})->middleware('auth');

// CREAR USUARIOS (solo admin)
Route::post('/admin/create-user', function (Request $request) {

    if (Auth::user()->role !== 'admin') {
        abort(403);
    }

    // Generar slug único
    $slugBase = Str::slug($request->name); // Convierte "Fonda Maricela" → "fonda-maricela"
    $slug = $slugBase;
    $counter = 1;

    while (User::where('slug', $slug)->exists()) {
        $slug = $slugBase . '-' . $counter++;
    }

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'business',
        'slug' => $slug, // <-- importante
    ]);

    return back()->with('success', 'Usuario creado con slug: ' . $slug);
})->middleware('auth');

// EDITAR (mostrar datos)
Route::get('/admin/users/{id}/edit', function ($id) {
    if (Auth::user()->role !== 'admin') {
        abort(403);
    }

    $user = User::findOrFail($id);
    return view('admin.edit-user', compact('user'));
})->middleware('auth')->name('users.edit');


// ACTUALIZAR
Route::put('/admin/users/{id}', function (Request $request, $id) {
    if (Auth::user()->role !== 'admin') {
        abort(403);
    }

    $user = User::findOrFail($id);

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
    ]);

    return redirect('/admin/users')->with('success', 'Usuario actualizado correctamente');
})->middleware('auth')->name('users.update');


// ELIMINAR
Route::delete('/admin/users/{id}', function ($id) {
    if (Auth::user()->role !== 'admin') {
        abort(403);
    }

    $user = User::findOrFail($id);
    $user->delete();

    return back()->with('success', 'Usuario eliminado correctamente');
})->middleware('auth')->name('users.destroy');

Route::put('/admin/users/{id}/toggle', function ($id) {

    $user = User::findOrFail($id);

    // 🔥 lo invierte solo (true → false, false → true)
    $user->is_active = !$user->is_active;
    $user->save();

    return back();
})->name('users.toggle')->middleware('auth');


// PANEL BUSINESS
Route::get('/business', function () {

    if (Auth::user()->role !== 'business') {
        abort(403);
    }

    return view('business.dashboard');
})->middleware('auth');

Route::get('/business/profile', function () {

    if (Auth::user()->role !== 'business') {
        abort(403);
    }

    return view('business.profile');
})->middleware('auth');

Route::post('/business/profile/image', function (Request $request) {

    if (!Auth::check()) {
        return redirect('/login');
    }

    if (!$request->hasFile('image')) {
        return back()->with('error', 'No se seleccionó imagen');
    }

    $request->validate([
        'image' => 'image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $user = Auth::user();

    // guardar imagen
    $path = $request->file('image')->store('business', 'public');

    // guardar en BD (SIN errores)
    DB::table('users')
        ->where('id', $user->id)
        ->update(['image' => $path]);

    return back()->with('success', 'Imagen subida 🔥');
})->middleware('auth');

Route::get('/business/producto', function () {

    if (Auth::user()->role !== 'business') {
        abort(403);
    }

    return view('business.producto');
})->middleware('auth');

Route::get('/business/gestion', function () {

    if (Auth::user()->role !== 'business') {
        abort(403);
    }

    return view('business.gestion'); // o cambia también la vista si quieres
})->middleware('auth');

// GUARDAR CATEGORIA
Route::post('/business/category', function (Request $request) {

    if (!Auth::check()) {
        abort(403);
    }

    $request->validate([
        'category' => 'required|string|max:255'
    ]);

    Category::create([
        'name' => $request->category,
        'user_id' => Auth::id() // 🔥 FIX AQUÍ
    ]);

    return back()->with('success', 'Categoría creada');
})->middleware('auth');

Route::delete('/business/category/{id}', function ($id) {

    $category = Category::where('id', $id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

    $category->delete();

    return back()->with('success', 'Categoría eliminada');
})->middleware('auth')->name('categories.destroy');

Route::get('/business/category/edit/{id}', function ($id) {

    $category = Category::where('id', $id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

    return view('edit-category', compact('category'));
})->middleware('auth')->name('categories.edit');

Route::put('/business/category/{id}', function (Request $request, $id) {

    $request->validate([
        'name' => 'required|string|max:255'
    ]);

    $category = Category::where('id', $id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

    $category->update([
        'name' => $request->name
    ]);

    return redirect('/business/gestion')->with('success', 'Categoría actualizada');
})->middleware('auth')->name('categories.update');

// GUARDAR PRODUCTO
Route::post('/business/product', function (Request $request) {

    if (!Auth::check()) {
        abort(403);
    }

    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'required|string',
        'category' => 'required|exists:categories,id'
    ]);

    Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
        'category_id' => $request->category,
        'user_id' => Auth::id() // 🔥 FIX AQUÍ
    ]);

    return back()->with('success', 'Producto agregado');
})->middleware('auth');

Route::delete('/business/product/{id}', function ($id) {

    $product = Product::where('id', $id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

    $product->delete();

    return back()->with('success', 'Producto eliminado');
})->middleware('auth')->name('products.destroy');

Route::get('/business/product/edit/{id}', function ($id) {

    $product = Product::where('id', $id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

    $categories = Category::where('user_id', Auth::id())->get();

    return view('edit-product', compact('product', 'categories'));
})->middleware('auth')->name('products.edit');

Route::put('/business/product/{id}', function (Request $request, $id) {

    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'description' => 'required',
        'category' => 'required|exists:categories,id'
    ]);

    $product = Product::where('id', $id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

    $product->update([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
        'category_id' => $request->category
    ]);

    return redirect('/business/gestion')->with('success', 'Producto actualizado');
})->middleware('auth')->name('products.update');

// 🔥 PERFIL PÚBLICO POR SLUG (SIEMPRE AL FINAL)
Route::get('/{slug}', function ($slug) {

    $user = User::where('slug', $slug)
        ->with('categories.products')
        ->firstOrFail();

    // 🚫 BLOQUEAR ACCESO AL SLUG
    if (!$user->is_active) {
        abort(403, 'Este perfil está bloqueado');
    }

    return view('business.show', compact('user'));
})->where('slug', '^(?!admin|business|login|register|dashboard|api|logout).*$');

// 🔥 IMPORTANTE
require __DIR__ . '/auth.php';
