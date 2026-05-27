<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'image'
    ];

    // 🔥 RELACIÓN
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // 🔥 RELACIÓN USER
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
