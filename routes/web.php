<?php

use App\Http\Controllers\Adminlogin; 
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardCotroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteuserController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('/login', [Adminlogin::class, 'showLoginForm'])->name('login');
    Route::post('/login', [Adminlogin::class, 'login']);

    Route::get('/register', [Adminlogin::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [Adminlogin::class, 'register']);
});

Route::middleware('auth')->group(function () {
Route::get("/logout",[Adminlogin::class, 'logout']);
Route::get("/",[DashboardCotroller::class,"GetDashboard"])->name("dashboard");
Route::resource('category', CategoryController::class);
Route::resource("product",ProductController::class);
Route::get("/users",[SiteuserController::class,"getUsers"]);
Route::get("/users/{id}",[SiteuserController::class,"getUserDetails"]);



 
Route::resource("/banners",BannerController::class);
Route::resource("/blogs",BlogController::class);

Route::get("/testimonials",[TestimonialController::class,"gettestimonial"]);
Route::post("/testimonials",[TestimonialController::class,"store"]);


Route::get("/settings",[TestimonialController::class,"getLayout"]);
Route::post("/settings/update",[TestimonialController::class,"updateLayout"]);


Route::get("/orders",[AdminOrderController::class,"getAllorder"]);
Route::get("/orders/pending",[AdminOrderController::class,"getpendingorder"]);
Route::get("/orders/processing",[AdminOrderController::class,"getprocessingorder"]);
Route::get("/orders/shipped",[AdminOrderController::class,"getshippedorder"]);
Route::get("/orders/delivered",[AdminOrderController::class,"getdeliveredorder"]);
Route::get("/orders/cancelled",[AdminOrderController::class,"getcancelledorder"]);
Route::get("/orders/paid",[AdminOrderController::class,"getpaiddorder"]);
Route::get("/orders/unpaid",[AdminOrderController::class,"getunpaidorder"]);



Route::get("/orders/{id}",[AdminOrderController::class,"getSingleOrder"]);
Route::post("/addtracknumber/{id}",[AdminOrderController::class,"addTrackingnumber"]);
Route::post("/update-order-status/{id}",[AdminOrderController::class,"updateStatus"]);
Route::post("/update-order-payment/{id}",[AdminOrderController::class,"updatePayment"]);





});