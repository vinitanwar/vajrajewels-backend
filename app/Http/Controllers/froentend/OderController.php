<?php

namespace App\Http\Controllers\froentend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Oder;
use App\Models\Order_item;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class OderController extends Controller
{

    
    public function addOrder(Request $request)
    {
        $userId = $request->user()->id;

        $validate = Validator::make($request->all(), [
            "total_amount"     => "required|numeric|min:1",
            "payment_method"   => "required|in:cod,razorpay",
            "address_id"       => "required|exists:addresses,id",

            "product_details"  => "required|array|min:1",
           
        ]);




        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validate->errors()
            ], 422);
        }

        DB::beginTransaction();

        try {
            $finalAmount = $request->total_amount;

            $order = Oder::create([
                'user_id'        => $userId,
                'total_amount'   => $request->total_amount,
                'discount'       => 0,
                'final_amount'   => $finalAmount,
                'payment_method' => $request->payment_method,
                'address_id'     => $request->address_id,
                'payment_status' => 'pending',
                'status'         => 'pending',
            ]);

            foreach ($request->product_details as $cart) {



            Order_item::create([
                    'order_id'   => $order->id,
                    'product_id' => $cart["product_id"],
                    'quantity'   => $cart["count"],
                    'price'      => $cart["amount"],
                    'total'      => $cart["total_amount"],
                ]);

            Cart::where('id', $cart["id"])->delete();
Product::where("id", $cart["product_id"])
    ->increment("total_sale_count", 1);
                 }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Order placed successfully!',
                'order'   => $order->load('items.product') 
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'error'   => $e->getMessage()
            ], 500);
        }
    }



  public function getAllorder(Request $request){
         $userId = $request->user()->id;

    $orders = Oder::where("user_id", $userId)
                ->with(["items.product"]) // include product in each order item
                ->get();

    return response()->json([
        "success" => true,
        "message" => "Orders retrieved successfully",
        "orders" => $orders
    ]);



}


public function getSingleOrder(Request $request,$id){
 $userId = $request->user()->id;

$order = Oder::where("user_id", $userId)->where("id",$id)
                ->with(["items.product"]) 
                ->first();
  

 return response()->json([
        "success" => true,
        "message" => "Orders retrieved successfully",
        "order" => $order
    ]);



}


public function getWishlist(Request $request)
{
    // Validate the request
    $validated = $request->validate([
        'wishlist' => 'required|array',
        'wishlist.*' => 'integer|exists:products,id', 
    ]);

    $wishlistIds = $validated['wishlist'];

    // Fetch products from the database
    $products = Product::whereIn('id', $wishlistIds)->get();

    return response()->json([
        'success' => true,
        'products' => $products
    ]);
}


public function returnOrder(Request $request)
{
    $request->validate([
        'id' => 'required|exists:orders,id',
        'message' => 'required|string|max:500',
    ]);

    $userId = $request->user()->id;

    // Check if the order belongs to this user
    $order = Oder::where("id", $request->id)
        ->where("user_id", $userId)
        ->first();

    if (!$order) {
        return response()->json([
            "success" => false,
            "message" => "Order not found or does not belong to you."
        ], 404);
    }

    // Check if already returned
    if ($order->isreturn) {
        return response()->json([
            "success" => false,
            "message" => "This order has already been returned."
        ], 400);
    }

    // Update return status
    $order->update([
        "isreturn" => true,
        "whyreturn" => $request->message,
    ]);

    return response()->json([
        "success" => true,
        "message" => "Return request submitted successfully.",
        "order" => $order
    ]);
}


}
