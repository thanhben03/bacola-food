<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast\Object_;

class Cart extends Model
{
    use HasFactory;


    public function cart_items()
    {
        return $this->hasMany(CartItem::class,'cart_id','id');
    }


    
}
