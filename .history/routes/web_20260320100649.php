<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

// Página pública
Route::get('/', function () {
    return view('welcome');
});

// PANEL ADMIN
Route::get('/admin', function () {

    if (!Auth::check()) return redirect('/login');

    if (Auth::user()->role !== 'admin') {
        abort(403);
    }

    return view('admin.dashboard');
});

// CREAR USUARIOS (solo admin)
Route::post('/admin/create-user', function (Request $request) {

    if (!Auth::check() || Auth::user()->role !== 'admin') {
        abort(403);
    }

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'business'
    ]);

    return back()->with('success', 'Usuario creado');
});

// PANEL BUSINESS
Route::get('/business', function () {

    if (!Auth::check()) return redirect('/login');

    if (Auth::user()->role !== 'business') {
        abort(403);
    }

    return view('business.dashboard');
});

require __DIR__.'/auth.php';
