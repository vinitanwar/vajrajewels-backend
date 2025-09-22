<?php

namespace App\Http\Controllers;
 
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
       
 $blogs= Blog::all();

        return view("pages.blog.index",compact("blogs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();
        //

        return view("pages.blog.create",compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'image'        => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'title'        => 'required|string|max:255|unique:blogs,title',
        'short_des'    => 'nullable|string|max:255',
        'author'       => 'required|string|max:255',
        'reading_time' => 'required|string|max:255',
        'description'  => 'nullable|string',
        'tags'         => 'nullable|array',
        'tags.*'       => 'string|max:50',
        'category_id'  => 'required|exists:categories,id',
    ]);

    // Handle image upload
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('blogs', 'public'); // stored in storage/app/public/blogs
    }

   
    $blog = new Blog();
    $blog->image        = $imagePath;
    $blog->title        = $request->title;
    $blog->short_des    = $request->short_des;
    $blog->author       = $request->author;
    $blog->reading_time = $request->reading_time;
    $blog->description  = $request->description;
    $blog->tags         = $request->tags ; 
    $blog->category_id  = $request->category_id;
    $blog->save();

    return redirect()->back()->with('success', 'Blog created successfully!');
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
        $blog = Blog::findOrFail($id);
    $categories =Category::all();

    return view('pages.blog.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog = Blog::findOrFail($id);

    // Validate
    $validated = $request->validate([
        'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'title'        => 'required|string|max:255|unique:blogs,title,' . $blog->id,
        'short_des'    => 'nullable|string|max:255',
        'author'       => 'required|string|max:255',
        'reading_time' => 'required|string|max:255',
        'description'  => 'nullable|string',
        'tags'         => 'nullable|array',
        'tags.*'       => 'string|max:50',
        'category_id'  => 'required|exists:categories,id',
    ]);

    //                  
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('blogs', 'public');
        $blog->image = $imagePath;
    }


    $blog->title        = $request->title;
    $blog->short_des    = $request->short_des;
    $blog->author       = $request->author;
    $blog->reading_time = $request->reading_time;
    $blog->description  = $request->description;
    $blog->tags         = $request->tags ;
    $blog->category_id  = $request->category_id;
    $blog->save();

    return redirect()->route('blogs.index')->with('success', 'Blog updated successfully!');

    } 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       Blog::find($id)->delete();
           return redirect()->route('blogs.index')->with('success', 'Blog Delete successfully!');

    }
}
