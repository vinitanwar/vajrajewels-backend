<?php

namespace App\Http\Controllers;

use App\Models\Layout;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{


    public function gettestimonial(){
      $testimonials= Testimonial::all();
  return view("pages.testimonial",compact("testimonials"));
    }


      public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "image" => "required|image|mimes:jpg,jpeg,png,webp|max:2048",
            "position" => "required|string|max:255",
            "message" => "required|string",
        ]);


        $imagePath = $request->file('image')->store('testimonials', 'public');

        // Save to DB
        Testimonial::create([
            "name" => $request->name,
            "image" => $imagePath,
            "position" => $request->position,
            "message" => $request->message,
        ]);

        return redirect()->back()->with("success", "Testimonial added successfully!");
    }


    public function getLayout(){
        $layout=Layout::first();

   return view("pages.setting",compact("layout"));

    }

      public function getLayout2(){
        $layout=Layout::first();

return response()->json(["layout"=>$layout]);
    }


   
public function updateLayout(Request $request)
{
    // Validate input
    $request->validate([
        'number'   => 'required|string|max:20',
        'email'    => 'required|email|max:255',
        'address'  => 'required|string|max:500',
        'logo'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        'yt_link'      => 'nullable|url|max:255',
        'fb_link'      => 'nullable|url|max:255',
        'insta_link'   => 'nullable|url|max:255',
        'x_link'       => 'nullable|url|max:255',
        'linkedin_link'=> 'nullable|url|max:255',
        'thread_link'  => 'nullable|url|max:255',
    ]);
 
    $layout = Layout::findOrFail($request->id);

    // Update text fields
    $layout->number   = $request->number;
    $layout->email    = $request->email;
    $layout->address  = $request->address;

    // Update social links
    $layout->yt_link       = $request->yt_link;
    $layout->fb_link       = $request->fb_link;
    $layout->insta_link    = $request->insta_link;
    $layout->x_link        = $request->x_link;
    $layout->linkedin_link = $request->linkedin_link;
    $layout->thread_link   = $request->thread_link;

    // Handle logo upload
    if ($request->hasFile('logo')) {
        if ($layout->logo && Storage::disk('public')->exists($layout->logo)) {
            Storage::disk('public')->delete($layout->logo);
        }

        $path = $request->file('logo')->store('logos', 'public');
        $layout->logo = $path;
    }

    $layout->save();

    return redirect()->back()->with('success', 'Website settings updated successfully!');
}




}
 