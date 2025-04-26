<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable =
    [
        'id',
        'product_name',
        'product_price',
        'product_category',
        'product_color',
        'quantity',
        'product_description',
        'product_image',
        'created_at',
        'updated_at',

    ];
}
