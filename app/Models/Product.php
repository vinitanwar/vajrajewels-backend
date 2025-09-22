<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    //

   
    protected $fillable = [
        "title",
        "slug",
        "img1",
        "img2",
        "old_price",
        "price",
        "innerimages",
        "description",
        "details",
        "return_policy",
        "shipping",
        "total_sale_count",
        "status",
        "type",
        "category_id",
        "meta_title",
        "meta_des",
        "produty_nav_type",
        "product_for",

    ];

    protected $casts = [
        "innerimages" => "array",
        "details" => "array",
        "status" => "boolean",
    ];



    public function category()
    {
        return $this->belongsTo(Category::class,"category_id");
    }

  protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->title);
            }
        });

        static::updating(function ($product) {
            if ($product->isDirty('title') && empty($product->slug)) {
                $product->slug = Str::slug($product->title);
            }
        });
    }

    public function carts()
    {
        return $this->hasMany(Cart::class,"product_id");
    }

    public function order_items(){
                return $this->hasMany(Order_item::class,"product_id");

    }








}
