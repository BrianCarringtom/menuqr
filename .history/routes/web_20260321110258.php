<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8',
    ]);

    // Crear slug único
    $slug = Str::slug($request->name);
    $count = User::where('slug', 'like', $slug . '%')->count();
    if ($count) {
        $slug .= '-' . ($count + 1);
    }

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'business',
        'slug' => $slug,
    ]);

    return back()->with('success', 'Usuario creado');
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

Route::middleware(['auth'])->group(function () {
    Route::get('/business/producto', [BusinessProductController::class, 'index'])->name('business.producto');
    Route::post('/business/producto', [BusinessProductController::class, 'store']);
});

Route::get('/{slug}', function ($slug) {

    if (in_array($slug, ['admin', 'business', 'login', 'logout', 'dashboard'])) {
        abort(404);
    }

    $business = User::where('slug', $slug)
        ->where('role', 'business')
        ->firstOrFail();

    return view('business.public', compact('business'));
});


// 🔥 IMPORTANTE
require __DIR__ . '/auth.php';
