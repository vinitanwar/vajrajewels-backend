<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Oder;
use App\Models\Order_item;
use App\Models\Product; 
use App\Models\Siteuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardCotroller extends Controller
{
    

public function GetDashboard(){

     // Users per month
// Users per month
    $users = Siteuser::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
        ->groupBy('month')
        ->orderBy('month')
        ->pluck('total', 'month');

    $userLabels = $users->keys()->map(fn($m) => date("F", mktime(0, 0, 0, $m, 1)));
    $userData = $users->values();
 
    // Orders this month
    $ordersThisMonth = Oder::whereMonth('created_at', Carbon::now()->month)->count();

    // Orders all time (just total)
    $ordersAllTime = Oder::count();

    // Orders per month (all time breakdown)
    $ordersMonthly = Oder::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
        ->groupBy('month')
        ->orderBy('month')
        ->pluck('total', 'month');

    $orderLabels = $ordersMonthly->keys()->map(fn($m) => date("F", mktime(0, 0, 0, $m, 1)));
    $orderData = $ordersMonthly->values();

    // Orders by status
    $ordersByStatus = Oder::select('status', DB::raw('COUNT(*) as total'))
        ->groupBy('status')
        ->pluck('total', 'status');
         $banners= Banner::count();
        $category= Category::count();
       $product=Product::count();
       $blog= Blog::count();


$unpaid_orders = Order_item::with("order")
    ->whereHas("order", function($q) {
        $q->where("payment_status", "pending");
    })
    ->orderBy('created_at', 'desc')
    ->get();



    $pending_orders = Order_item::with("order")
    ->whereHas("order", function($q) {
        $q->where("status", "pending");
    })
    ->orderBy('created_at', 'desc')
    ->get();





    return view("dashboard", compact(
        'userLabels',
        'userData',
        'ordersThisMonth',
        'ordersAllTime',
        'orderLabels',
        'orderData',
        'ordersByStatus',
        "banners",
        "category",
        "product",
        "blog",
        "unpaid_orders",
        "pending_orders"
    ));

}




}
