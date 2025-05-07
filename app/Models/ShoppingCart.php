<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $fillable = [
        'user_id',
    ];

    public function products()
    {
        return $this->hasMany(ShoppingCartProduct::class);
    }
}
