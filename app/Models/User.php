<?php

namespace App\Models;

use App\Helper\TraitResponseMessage;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use TraitResponseMessage;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function ship_address()
    {
        return $this->hasOne(BillingAddress::class, 'id', 'ship_id');
    }

    public function getStringShipAddressAttribute($model = null)
    {
        $model = BillingAddress::where([
            ['user_id', $this->id],
            ['default_address', 0]
        ])->first();
        // dd($model);
        if (!$model) {
            return "Chưa cập nhật thông tin giao hàng !";
        }
        return $this->shipAddressToString($model);
    }

    public function getStringDefaultAddressAttribute()
    {
        $model = BillingAddress::where([
            ['user_id', $this->id],
            ['default_address', 1]
        ])->first();
        // dd($model);
        if (!$model) {
            return "Chưa cập nhật thông tin giao hàng !";
        }
        return $this->shipAddressToString($model);
    }


    public function shipAddressToString($model)
    {
        $address = $model;
        $street = $address->street_address;
        $city = $address->town_city;
        $receiver = $model->first_name . " " . $model->lastname;
        $zip_code = $address->zip_code;
        $phone = $address->phone;
        // print_r($model);
        $string = $phone . ", " . $receiver . ", " . $street . ", " . $city . ", Zipcode: " . $zip_code;
        return $string;
    }


    public function getReceiverAttribute()
    {
        return $this->ship_address->first_name . " " . $this->ship_address->last_name;
    }
}
