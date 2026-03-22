<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

Route::get('/business/producto', function () {

    if (Auth::user()->role !== 'business') {
        abort(403);
    }

    return view('business.producto');
})->middleware('auth');

// GUARDAR CATEGORIA
Route::post('/business/category', function (Request $request) {
    Category::create([
        'name' => $request->category,
        'user_id' => auth()->id()
    ]);

    return back();
})->middleware('auth');

// GUARDAR PRODUCTO
Route::post('/business/product', function (Request $request) {
    Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
        'category_id' => $request->category,
        'user_id' => auth()->id()
    ]);

    return back();
})->middleware('auth');

// 🔥 PERFIL PÚBLICO POR SLUG (SIEMPRE AL FINAL)
Route::get('/{slug}', function ($slug) {
    $user = User::where('slug', $slug)->firstOrFail();
    return view('business.show', compact('user'));
})->where('slug', '^(?!admin|business|login|register|dashboard|api|logout).*$');

// 🔥 IMPORTANTE
require __DIR__ . '/auth.php';
