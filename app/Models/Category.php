<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    public $table="categories";
public $fillable=["image","title","has_in_nav"];

public $casts=[
    "has_in_nav"=>"boolean"
];

public function products(){
    return $this->hasMany(Product::class,"category_id");
     
}

public function blogs(){
    return $this->hasMany(Blog::class,"category_id");
}




}
