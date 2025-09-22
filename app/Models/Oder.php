<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oder extends Model
{
  protected $fillable = [
        'user_id',
        'total_amount',
        'discount',
        'final_amount',
        'payment_method',
        'payment_status',
        'status',
        'address_id',
        'tracking_number',
        "deleverd_date",
        "isreturn",
        "whyreturn"
    ];



    protected $cast =[
        "deleverd_date"=>"datetime",
        "isreturn"=>"boolean"
    ];


   public function user()
    {
        return $this->belongsTo(Siteuser::class, 'user_id');
    }
      public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function items()
    {
        return $this->hasMany(Order_item::class, 'order_id');
    }


}
