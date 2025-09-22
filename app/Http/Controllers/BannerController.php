<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Validator,Storage};

class BannerController extends Controller
{
    /**
     * Display a listing of the resource. 
     */
    public function index()
    {
        //
 
$banners = Banner::orderBy('count', 'asc')->get();

        return view("pages.banner" ,compact("banners"));
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
    $validate = Validator::make($request->all(), 
    [
    "banner" => "required|image|max:4096", // max 4MB
    "count"  => "required|numeric"
]);
   if ($validate->fails()) {
        return back()->withErrors($validate)->withInput();
    }



  $allreadyCount= Banner::where("count",$request["count"])->first();

  if($allreadyCount){

$allreadyCount->count= Banner::count() +1;
$allreadyCount->save();

  }



    $path = $request->file('banner')->store('', 'public');
 $banner = new Banner();
    $banner->banner = $path;   
    $banner->count = $request->count;
    $banner->save();

  

return back();





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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      

        $banner = Banner::findOr($id);
         if ($banner->banner && Storage::disk('public')->exists($banner->banner)) {
        Storage::disk('public')->delete($banner->banner);
    }

       $banner->delete();

    return redirect()->back()->with('success', 'Banner deleted successfully!');
    }



    public function getAllbanner(){
        $banners = Banner::orderBy('count', 'asc')->get();
       return response()->json([
            "success" => true,
            "banners" => $banners
        ], 200);
    }
}
