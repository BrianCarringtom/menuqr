<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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
Route::get('/admin', function () {

    if (Auth::user()->role !== 'admin') {
        abort(403);
    }

    return view('admin.dashboard');
})->middleware('auth');


// CREAR USUARIOS (solo admin)
Route::post('/admin/create-user', function (Request $request) {

    if (Auth::user()->role !== 'admin') {
        abort(403);
    }

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'business'
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


// 🔥 IMPORTANTE
require __DIR__ . '/auth.php';
