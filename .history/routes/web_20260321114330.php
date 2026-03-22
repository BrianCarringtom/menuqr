<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\BusinessProductController;

// Página pública
Route::get('/', function () {
    return view('welcome');
});

// 🔥 AUTENTICACIÓN
require __DIR__ . '/auth.php';

// 🔥 REDIRECCIÓN INTELIGENTE POST-LOGIN
Route::get('/dashboard', function () {
    if (!Auth::check()) {
        return redirect('/login');
    }
    if (Auth::user()->role === 'admin') {
        return redirect('/admin');
    }
    return redirect('/business');
})->middleware('auth')->name('dashboard'); // ⚡ IMPORTANTE: agrega el nombre "dashboard"

// ================================
// PANEL ADMIN
// ================================

// Dashboard admin
Route::get('/admin', function () {
    if (Auth::user()->role !== 'admin') abort(403);
    return view('admin.dashboard');
})->middleware('auth')->name('admin.dashboard');

// Usuarios
Route::get('/admin/users', function () {
    if (Auth::user()->role !== 'admin') abort(403);
    $users = User::all();
    return view('admin.users', compact('users'));
})->middleware('auth');

// Crear usuario business
Route::post('/admin/create-user', function (Request $request) {
    if (Auth::user()->role !== 'admin') abort(403);

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8',
    ]);

    $slug = Str::slug($request->name);
    $count = User::where('slug', 'like', $slug . '%')->count();
    if ($count) $slug .= '-' . ($count + 1);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'business',
        'slug' => $slug,
    ]);

    return back()->with('success', 'Usuario creado');
})->middleware('auth');

// ================================
// PANEL BUSINESS
// ================================
Route::middleware(['auth'])->group(function () {
    Route::get('/business', function () {
        if (Auth::user()->role !== 'business') abort(403);
        return view('business.dashboard');
    })->name('business.dashboard');

    Route::get('/business/profile', function () {
        if (Auth::user()->role !== 'business') abort(403);
        return view('business.profile');
    })->name('business.profile');

    // Productos y categorías
    Route::get('/business/producto', [BusinessProductController::class, 'index'])->name('business.producto');
    Route::post('/business/producto', [BusinessProductController::class, 'store']);
    Route::post('/business/category', [BusinessProductController::class, 'storeCategory']);
});

// ================================
// RUTAS PÚBLICAS POR SLUG (ej: /joel)
// ================================
Route::get('/{slug}', function ($slug) {
    if (in_array($slug, ['admin', 'business', 'login', 'logout', 'dashboard'])) abort(404);

    $business = User::where('slug', $slug)
        ->where('role', 'business')
        ->firstOrFail();

    return view('business.public', compact('business'));
})->name('business.public'); // ⚡ opcional, le da nombre a la ruta