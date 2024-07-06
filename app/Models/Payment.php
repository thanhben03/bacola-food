<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        "amount",
        "bank_code",
        "content",
        "id",
        "order_code",
        "order_id",
        "result",
        "vnpay_code"
    ];
}
