<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource. 
     */
     public function index()
    {
        $categories= Category::all();


        return view("pages.category",["categories"=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
$validator = Validator::make($request->all(), [
    "image" => "required|image|mimes:jpeg,png,jpg,gif,webp|max:2048", 
    "title" => "required|string|unique:categories,title"
]);

if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }


    $imagePath = null;


if($request->hasFile("image")){
    $imagePath = $request->file('image')->store('categories', 'public');
      


}

$category = new Category();

$category->title = strtolower($request->title);
$category->image=$imagePath;
$category->save();
return back()->with('success', 'Category created successfully!');
 }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    $cat= Category::findOrFail($id);
     $cat->has_in_nav = !$cat->has_in_nav;
    $cat->save();


return back()->with('success', 'Category Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
     $category= Category::findOrFail($id);
$category->delete();



        return redirect()->route("category.index")
                         ->with("success", "Category deleted successfully!");
    }
}
