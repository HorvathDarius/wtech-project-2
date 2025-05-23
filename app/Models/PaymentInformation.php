<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "name_on_card",
        "card_number",
    ];
}
