<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counpon extends Model
{
    use HasFactory;
    protected $fillable = [
        'code','rate','remain','status','start_day','end_day'
    ];


}
