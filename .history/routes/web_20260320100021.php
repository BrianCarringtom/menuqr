<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;

// Página pública
Route::get('/', function () {
    return view('welcome');
});

// PANEL ADMIN
Route::get('/admin', function () {

    if (!auth()->check()) return redirect('/login');

    if (auth()->user()->role !== 'admin') {
        abort(403);
    }

    return view('admin.dashboard');
});

// CREAR USUARIOS (solo admin)
Route::post('/admin/create-user', function (Request $request) {

    if (auth()->user()->role !== 'admin') {
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

    if (!auth()->check()) return redirect('/login');

    if (auth()->user()->role !== 'business') {
        abort(403);
    }

    return view('business.dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
