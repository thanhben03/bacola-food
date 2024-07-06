<?php

namespace App\Models;

use App\Helper\TraitResponseMessage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BillingAddress extends Model
{
    use HasFactory;
    use TraitResponseMessage;
    protected $fillable = [
        "user_id",
        "first_name",
        "last_name",
        "company",
        "country_code",
        "street_address",
        "town_city",
        "zip_code",
        "phone",
        "email"
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getStringShipAddressAttribute()
    {
        return $this->user->string_ship_address;
    }

    public function getStringDefaultAddressAttribute()
    {
        return $this->user->string_default_address;
    }

    public function changeAddressIncart($payload)
    {
        try {
            $new_billing = $this::updateOrCreate([
                'user_id' => 12
            ], $payload);
            $newAddress = $new_billing->user->string_ship_address;
            return $this->responseSuccess('Thay đổi địa chỉ thành công !', $newAddress);
        } 
        catch (\Throwable $th) {
            return $this->responseError($th->getMessage());
        }
    }

    
}
