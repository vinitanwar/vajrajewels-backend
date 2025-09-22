<?php

namespace App\Http\Controllers\froentend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogFroentdnfController extends Controller
{
public function getBlogsrandom(){
 $blogs = Blog::inRandomOrder()->take(3)->get();

    return response()->json([
        "success" => true,
        "blogs" => $blogs
    ]);
}


public function getBlogs(){
 $blogs = Blog::all();

    return response()->json([
        "success" => true,
        "blogs" => $blogs
    ]);
}



public function getsingleBlog(String $slug){
 $blogs = Blog::where("slug",$slug)->first();

    return response()->json([
        "success" => true,
        "blog" => $blogs
    ]);
}









}
