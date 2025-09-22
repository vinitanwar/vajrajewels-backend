<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        "count",
        "amount",
        "total_amount",
        "product_id",
        "user_id",
    ];

    // Relationships
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(Siteuser::class); // since your table is siteusers
    }
}
