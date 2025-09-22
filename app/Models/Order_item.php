<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
 protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'total',
    ];

     public function order()
    {
        return $this->belongsTo(Oder::class, 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
