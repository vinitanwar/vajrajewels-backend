<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
           $products = Product::orderBy('id', 'desc')->paginate(10);

        return view("pages.product.index",compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
  $categories = Category::all(); // get all categories for dropdown
        return view('pages.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         
    // ✅ Validate input
    $validated = $request->validate([
        'title'         => 'required|string|max:255|unique:products,title',
        'slug'          => 'nullable|string|max:255|unique:products,slug',
        'old_price'     => 'nullable|string',
        'price'         => 'required|string',
        'description'   => 'required|string',
        'details'       => 'nullable|array',
        'return_policy' => 'nullable|string',
        'shipping'      => 'nullable|string',
        'status'        => 'required|boolean',
        'type'          => 'nullable|in:all,male,female,kids,baby',
        'category_id'   => 'required|exists:categories,id',
    "produty_nav_type"=>"nullable|in:jewellery,engagement,gifting",
    "product_for"=>"nullable|in:him,her",
"meta_title"=>"nullable|string",
"meta_des"=>"nullable|string",

        // ✅ File validations
        'img1'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'img2'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'innerimages.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    // ✅ Auto-slug if not provided
    if (empty($validated['slug'])) {
        $validated['slug'] = \Illuminate\Support\Str::slug($validated['title']);
    }

    // ✅ Handle main image
    if ($request->hasFile('img1')) {
        $validated['img1'] = $request->file('img1')->store('products', 'public');
    }
    if ($request->hasFile('img2')) {
        $validated['img2'] = $request->file('img2')->store('products', 'public');
    }

    // ✅ Handle gallery images
    if ($request->hasFile('innerimages')) {
        $paths = [];
        foreach ($request->file('innerimages') as $image) {
            $paths[] = $image->store('products/gallery', 'public');
        }
        $validated['innerimages'] = $paths;
    }

    // ✅ Handle product details
    if ($request->has('details')) {
        $validated['details'] = $request->input('details');
    }

    // ✅ Create product
    $product = Product::create($validated);

    return redirect()->route('product.index')
        ->with('success', 'Product created successfully ✅');
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
        
$product = Product::findOrFail($id);
$categories= Category::all();
        return view('pages.product.edit', compact('categories',"product"));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $product = Product::findOrFail($id);

    // ✅ Validate input
    $validated = $request->validate([
        'title'         => 'required|string|max:255',
        'slug'          => 'required|string|max:255|unique:products,slug,' . $id,
        'price'         => 'required|numeric',
        'old_price'     => 'nullable|numeric',
        'type'          => 'required|string|max:100',
        'category_id'   => 'required|integer',
        'description'   => 'nullable|string',
        'details'       => 'nullable',
        'return_policy' => 'nullable|string',
        'shipping'      => 'nullable|string',
        'img1'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'img2'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        "produty_nav_type"=>"nullable|in:jewellery,engagement,gifting",
    "product_for"=>"nullable|in:him,her",
"meta_title"=>"nullable|string",
"meta_des"=>"nullable|string",
    ]);

    // ✅ Handle Image 1
    if ($request->hasFile('img1')) {
        // delete old image
        if ($product->img1 && Storage::disk('public')->exists($product->img1)) {
            Storage::disk('public')->delete($product->img1);
        }
        // save new one
        $validated['img1'] = $request->file('img1')->store('products', 'public');
    }

    // ✅ Handle Image 2
    if ($request->hasFile('img2')) {
        if ($product->img2 && Storage::disk('public')->exists($product->img2)) {
            Storage::disk('public')->delete($product->img2);
        }
        $validated['img2'] = $request->file('img2')->store('products', 'public');
    }

    // ✅ Update DB record
    $product->update($validated);

    return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

   
    public function destroy(string $id)
    {
        //
   $product = Product::findOrFail($id);

    // Delete main images if they exist
    if ($product->img1 && Storage::disk('public')->exists($product->img1)) {
        Storage::disk('public')->delete($product->img1);
    }

    if ($product->img2 && Storage::disk('public')->exists($product->img2)) {
        Storage::disk('public')->delete($product->img2);
    }

    // Delete inner images (if stored as JSON array or comma separated)
    if ($product->innerimages) {
        $images = is_array($product->innerimages) 
                    ? $product->innerimages 
                    : json_decode($product->innerimages, true);

        if ($images && is_array($images)) {
            foreach ($images as $img) {
                if (Storage::disk('public')->exists($img)) {
                    Storage::disk('public')->delete($img);
                }
            }
        }
    }

    // Finally delete product from DB
    $product->delete();

       return redirect()->route('product.index')->with('success', 'Product deleted successfully.');


    

    }
}
