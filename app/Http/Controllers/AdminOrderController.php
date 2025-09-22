<?php

namespace App\Http\Controllers;

use App\Models\Oder; 
use App\Models\Order_item;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    

public function getAllorder(Request $request)
{
$orders = Order_item::with("order")->orderBy('created_at', 'desc')->get();


  $heading= "All Orders";

    return 
     view("pages.order.allorder",compact("orders","heading"));

}


public function getpendingorder(Request $request)
{
$orders = Order_item::with("order")
    ->whereHas("order", function($q) {
        $q->where("status", "pending");
    })
    ->orderBy('created_at', 'desc')
    ->get();

 $heading= "Pending Orders";
    return 
     view("pages.order.allorder",compact("orders","heading"));
    
    
    // response()->json(["item"=>$orders]);

}
public function getshippedorder(Request $request)
{
$orders = Order_item::with("order")
    ->whereHas("order", function($q) {
        $q->where("status", "shipped");
    })
    ->orderBy('created_at', 'desc')
    ->get();

 $heading= "Processing Orders";
    return 
     view("pages.order.allorder",compact("orders","heading"));
    
    
    // response()->json(["item"=>$orders]);

}
public function getprocessingorder(Request $request)
{
$orders = Order_item::with("order")
    ->whereHas("order", function($q) {
        $q->where("status", "processing");
    })
    ->orderBy('created_at', 'desc')
    ->get();

 $heading= "Processing Orders";
    return 
     view("pages.order.allorder",compact("orders","heading"));
    
    
    // response()->json(["item"=>$orders]);

}
public function getdeliveredorder(Request $request)
{
$orders = Order_item::with("order")
    ->whereHas("order", function($q) {
        $q->where("status", "delivered");
    })
    ->orderBy('created_at', 'desc')
    ->get();

 $heading= "Delivered Orders";
    return 
     view("pages.order.allorder",compact("orders","heading"));
    
    
    // response()->json(["item"=>$orders]);

}
public function getcancelledorder(Request $request)
{
$orders = Order_item::with("order")
    ->whereHas("order", function($q) {
        $q->where("status", "cancelled");
    })
    ->orderBy('created_at', 'desc')
    ->get();

 $heading= "Cancelled Orders";
    return 
     view("pages.order.allorder",compact("orders","heading"));
    
    
    // response()->json(["item"=>$orders]);

}




public function getpaiddorder(Request $request)
{
$orders = Order_item::with("order")
    ->whereHas("order", function($q) {
        $q->where("payment_status", "paid");
    })
    ->orderBy('created_at', 'desc')
    ->get();

 $heading= "Paid Orders";
    return 
     view("pages.order.allorder",compact("orders","heading"));
    
}


public function getunpaidorder(Request $request)
{
$orders = Order_item::with("order")
    ->whereHas("order", function($q) {
        $q->where("payment_status", "pending");
    })
    ->orderBy('created_at', 'desc')
    ->get();

 $heading= "Paid Orders";
    return 
     view("pages.order.allorder",compact("orders","heading"));
    
}










public function getSingleOrder(String $id){
$orderItem = Order_item::with("order.address","order.user","product")
                    ->where("id", $id)
                    ->first();
return 
view("pages.order.singleorder",compact("orderItem"));


// response()->json([$orderItem]);



}
     

public function addTrackingnumber(Request $request, $id)
{
    $request->validate([
        'tracking_number' => 'required|string|max:255',
    ]);

    Oder::where('id', $id)->update([
        'tracking_number' => $request->tracking_number,
    ]);

    return redirect()->back()->with('success', 'Tracking number added successfully.');
}

public function updateStatus(Request $request, $id)
{
    // ✅ Validate status input
    $request->validate([
        'status' => 'required|in:pending,processing,shipped,delivered,cancelled',
    ]);

    $order = Oder::findOrFail($id);

   if($request->status=="delivered"){

    $order->update([
        'status' => $request->status,
        "deleverd_date"=> now()
    ]);

}
else{
$order->update([
        'status' => $request->status,
    ]);
}
    

    // ✅ Redirect back with success message
    return redirect()->back()->with('success', 'Order status updated successfully.');
}



public function updatePayment(Request $request, $id)
{
    // ✅ Validate status input
    $request->validate([
        'status' => 'required|in:pending,paid',
    ]);

    // ✅ Find order
    $order = Oder::findOrFail($id);

    // ✅ Update status
    $order->update([
        'payment_status' => $request->status,
    ]);

    // ✅ Redirect back with success message
    return redirect()->back()->with('success', 'Order payment status updated successfully.');
}






}
