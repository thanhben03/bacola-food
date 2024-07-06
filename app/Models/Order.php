<?php

namespace App\Models;

use App\Helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "shipping_cost",
        "payment_method",
        "status",
        "order_notes",
        "billing_address_id",
        "counpon_id",
        "total_price"
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items');
    }

    public function item()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }
}
