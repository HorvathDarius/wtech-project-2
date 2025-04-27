<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'order_status',
        'total_price',
        'address',
        'country',
        'region',
        'city',
        'zip_code',
        'shipping_method'

    ];

    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
