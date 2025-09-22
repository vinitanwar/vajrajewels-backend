<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\froentend\AddressController;
use App\Http\Controllers\froentend\authController;
use App\Http\Controllers\froentend\BlogFroentdnfController;
use App\Http\Controllers\froentend\NavBarcontroller;
use App\Http\Controllers\froentend\OderController;
use App\Http\Controllers\froentend\ProductController;
use App\Http\Controllers\SiteuserController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

   

Route::post("v1/user/signup",[SiteuserController::class,"Signup"]);
Route::post("v1/user/login",[SiteuserController::class,"LoginIn"]);

Route::get("/v1/getbanner",[BannerController::class,"getAllbanner"]);
Route::get("/v1/categories",[ProductController::class,"getAllCategory"]);
Route::get("/v1/products",[ProductController::class,"getProducts"]); 
Route::get("/v1/products/{filter}",[ProductController::class,"getProductsbyFilter"]);
Route::get("/v1/testimonial",[ProductController::class,"getAllTestimonial"]);

Route::get("/v1/getsingleproduct/{slug}",[ProductController::class,"getSingleProduct"]);
Route::get("/v1/settings",[TestimonialController::class,"getLayout2"]); 
Route::get("/v1/getnavcat",[NavBarcontroller::class,"getJewellery"]);
Route::get("/v1/getnavProductj/{id}",[NavBarcontroller::class,"getnavProduct"]);
Route::post("/v1/getnavProductfor",[NavBarcontroller::class,"getProductFor"]);
Route::get("/v1/blogs/random",[BlogFroentdnfController::class,"getBlogsrandom"]);
Route::get("/v1/blogs",[BlogFroentdnfController::class,"getBlogs"]);
Route::get("/v1/blog/{slug}",[BlogFroentdnfController::class,"getsingleBlog"]);

Route::middleware("cookie.auth")->group(function(){

Route::post("/v1/user/logout",[SiteuserController::class,"Logout"]);

Route::get("/v1/user/get",[SiteuserController::class,"getUser"]);
Route::post("/v1/cart",[authController::class,"addtoCart"]);
Route::get("/v1/getcart",[authController::class,"getCartItem"]);
Route::get("/v1/getcart/add/{id}",[authController::class,"cartAddcount"]);
Route::get("/v1/getcart/remove/{id}",[authController::class,"cartRemovecount"]);
Route::post("/v1/getcheckoutproduct",[ProductController::class,"getProductforCheckout"]);
Route::post("/v1/addaddress",[AddressController::class,"addAddress"]);
Route::get("/v1/getaddress",[AddressController::class,"getAddress"]);
Route::get("/v1/updateaddress/{id}",[AddressController::class,"updateAddress"]);
Route::get("/v1/deleteaddress/{id}",[AddressController::class,"deleteAddress"]);

Route::post("/v1/add/oder",[OderController::class,"addOrder"]);

Route::get("/v1/getorder",[OderController::class,"getAllorder"]);
Route::post("/v1/getwishlist",[OderController::class,"getWishlist"]);

Route::get("/v1/getsingleorder/{id}",[OderController::class,"getSingleOrder"]);





});







