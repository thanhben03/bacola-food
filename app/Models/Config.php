<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;
    protected $fillable = [
        "counpon_first_purchase",
        "created_at",
        "df_benefit1",
        "df_benefit2",
        "df_benefit3",
        "get_freeship",
        "id",
        "logo_url",
        "store_notice",
        "updated_at",
        "us_phone"
    ];

    public function counpon()
    {
        return $this->hasOne(Counpon::class,'id','counpon_first_purchase');
    }

}
