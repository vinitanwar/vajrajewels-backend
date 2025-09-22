<?php

namespace App\Http\Controllers\froentend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;

class NavBarcontroller extends Controller
{
    public function getJewellery(){
        $cat= Category::where("has_in_nav",1)->get();

        return response()->json(["success"=>true,"cat"=>$cat]);
    }

    public function getnavProduct(Request $request,$id){
 
     $products = Product::where("category_id",$id)->where("produty_nav_type","jewellery")->Limit(3)->get(["id","img1","slug"]);

 return response()->json([
        "success" => true,
        "products" => $products
    ]);
    }



    public function getProductFor(Request $request){

   $products= Product::where("product_for",$request->for)->where("produty_nav_type",$request->type)->Limit(3)->get(["id","img1","slug"]);

 return response()->json([
        "success" => true,
        "products" => $products
    ]);

    }
}
