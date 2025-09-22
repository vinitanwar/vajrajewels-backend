<?php

namespace App\Http\Controllers\froentend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class authController extends Controller
{
    //


public function addtoCart(Request $request)
{
    $userId = $request->user()->id;
    $productId = $request->product_id;
    $amount = $request->amount;

    // Check if product already exists in user's cart
    $cart = Cart::where("user_id", $userId)
                ->where("product_id", $productId)
                ->first();

    if ($cart) {
        // Update existing cart item
        $cart->count += 1;
        $cart->total_amount = $cart->count * $amount;
        $cart->save();
    } else {
        // Create new cart item
        $cart = new Cart();
        $cart->product_id = $productId;
        $cart->user_id = $userId;
        $cart->amount = $amount;
        $cart->total_amount = $amount;
        $cart->count = 1;
        $cart->save();
    }

    return response()->json([
        "success" => true,
        "cart" => $cart
    ]);
}


public function getCartItem(Request $request){
      $userId = $request->user()->id;
$carts = Cart::with('product')
            ->where('user_id', $userId)
            ->get();
         if(!$carts ){
        return response()->json(["success"=>false,"message"=>"Cart is Empty"]);
     }

     return response()->json(["success"=>true,"carts"=>$carts]);
  
}

public function cartAddcount(string $id)
{
    $cartdata = Cart::find($id);

    if (!$cartdata) {
        return response()->json(["success" => false, "message" => "Cart item not found"], 404);
    }

    $cartdata->count += 1;
    $cartdata->total_amount = $cartdata->total_amount + $cartdata->amount;
    $cartdata->save();

    return response()->json([
        "success" => true,
        "message" => "Item quantity increased successfully",
        "cart" => $cartdata
    ]);
}

public function cartRemovecount(string $id)
{
    $cartdata = Cart::find($id);

    if (!$cartdata) {
        return response()->json(["success" => false, "message" => "Cart item not found"], 404);
    }

    if ($cartdata->count == 1) {
        $cartdata->delete();
        return response()->json([
            "success" => true,
            "message" => "Item removed from cart"
        ]);
    } else {
        $cartdata->count -= 1;
        $cartdata->total_amount = $cartdata->total_amount - $cartdata->amount;
        $cartdata->save();

        return response()->json([
            "success" => true,
            "message" => "Item quantity decreased successfully",
            "cart" => $cartdata
        ]);
    }
}

}
