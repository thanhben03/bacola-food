<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeekendDiscount extends Model
{
    use HasFactory;
    protected $fillable = [
        "created_at",
        "id",
        "rate_sale",
        "slug",
        "status",
        "sub_title",
        "title",
        "updated_at"
    ];
}
