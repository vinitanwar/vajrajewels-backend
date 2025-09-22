<?php

namespace App\Http\Controllers\froentend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class ProductController extends Controller
{


public function getAllCategory(){
    $categories = Category::all();

    return response()->json(["success"=>true,"categories"=>$categories]);
}



public function getAllTestimonial(){
        $testimonials= Testimonial::all();
        return response()->json(["success"=>true,"testimonials"=>$testimonials]);

}





public function getProducts(Request $request){




    $minPrice = $request->query('min_price');
    $maxPrice = $request->query('max_price');
    $gender=$request->query("gender");
    $category = $request->query('cat');
    $catid= $request->query("catid");
    $query = Product::query();
    
    if(!$query){
        return response()->json(["success"=>false,"message"=>"Product not found"]);
       }



       if ($minPrice !== null) {
        $query->where('price', '>=', (float)$minPrice);
    }
    
    if ($maxPrice !== null) {
        $query->where('price', '<=', (float)$maxPrice);
    }
 if ($gender !== null) {
        $query->where('type', $gender);
    }
 if ($category !== null) {

        $categor = Category::where("title", $category)->first();
        $query->where("category_id", $categor->id);
    }
    if ($catid !== null) {

        
        $query->where("category_id", $catid);
    }


    $products = $query->get();
       return response()->json(["success"=>true,"products"=>$products]);





} 

public function getProductsbyFilter(String $filter)
{
    if ($filter == "new") {
        // Latest products 
        $products = Product::orderBy("created_at", "desc")->take(4)->get();

    } elseif ($filter == "best") {
        // Best sellers
        $products = Product::orderBy("total_sale_count", "desc")->take(4)->get();

    } elseif ($filter == "offer") {
        // Products with offers
        $products = Product::where("get_offer", true)->take(4)->get();

    }    
    else {
      
        $products = Product::all();
    }

    return response()->json([
        "success" => true,
        "products" => $products
    ]);
}



public function getSingleProduct(String $slug){
 $product = Product::where("slug",$slug)->first();
return response()->json(["success"=>true,"product"=>$product]);
}





public function getProductforCheckout(Request $request){
  $itemIds = $request->item;

if (!is_array($itemIds)) {
    return response()->json([
        "success" => false,
        "message" => "Items must be an array of product IDs" 
    ], 400);
}
$products = Cart::whereIn('id', $itemIds)->with("product")->get();

return response()->json([
    "success" => true,
    "products" => $products
]);


}


}
