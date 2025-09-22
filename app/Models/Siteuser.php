<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class Siteuser extends Model
{
      use HasApiTokens;
    protected $fillable=[
        "name",
        "email",
        "password",
        "number",
        "status"
    ];
 
    public function setPasswordAttribute($value)
{
    $this->attributes['password'] = Hash::make($value);
}

public function addresses()
{
    return $this->hasMany(Address::class,"user_id");
}

 public function carts()
    {
        return $this->hasMany(Cart::class,"user_id");
    }

    public function oders(){
        return $this->hasMany(Oder::class,"user_id");

    }


}
