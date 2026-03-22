<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'slug', // si usas slug
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // 🔹 RELACIONES
    public function products()
    {
        return $this->hasMany(\App\Models\Product::class, 'user_id');
    }

    public function categories()
    {
        return $this->hasMany(\App\Models\Category::class, 'user_id');
    }
}