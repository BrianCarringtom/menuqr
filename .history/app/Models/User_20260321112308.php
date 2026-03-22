<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $categories
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'slug',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // 🔹 RELACIONES
    public function products(): HasMany
    {
        return $this->hasMany(\App\Models\Product::class, 'user_id');
    }

    public function categories(): HasMany
    {
        return $this->hasMany(\App\Models\Category::class, 'user_id');
    }
}
