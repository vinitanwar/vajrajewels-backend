<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Oder; 
use App\Models\Siteuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SiteuserController extends Controller
{

 
    public function getUsers(){
 
        $user = Siteuser::with('carts')->get();
        

        return view("pages.user",compact("user"));
    }

 


    public function Signup(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "name" => "required|string|max:220",
            "email" => "required|string|email|max:255|unique:siteusers,email",
            "password" => "required|string|min:6"
        ]);


        if ($validate->fails()) {
            return response()->json(["success" => false, "message" => $validate->errors()->all()]);
        }

        $user = Siteuser::create([
            "name" => $request["name"],
            "email" => $request["email"],
            "password" => $request["password"],
        ]);

        $token = $user->createToken("auth_token")->plainTextToken;


        return response()->json([
            'user' => $user,
            "success" => true
        ])->cookie(
                'auth_token',   // cookie name
                $token,         // cookie value
                60 * 24 * 30 * 4,    // expires in minutes (7 days here)
                '/',            // path
                null,           // domain (null = same domain)
                true,           // secure = only HTTPS
                true,           // httpOnly = not accessible by JS
                false,          // raw
                'Strict'        // SameSite policy
            );







    }


    public function LoginIn(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required|string|min:6",
        ]);

        if ($validate->fails()) {
            return response()->json(["success" => false, "message" => $validate->errors()->first()]);
        }

        $user = Siteuser::where("email", $request->email)->first();

        if (!$user && !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid login'], 401);

        }

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'user' => $user,
            "success" => true
        ])->cookie(
                'auth_token',
                $token,         // cookie value
                60 * 24 * 30 * 4,    // expires in minutes (7 days here)
                '/',            // path
                null,           // domain (null = same domain)
                true,           // secure = only HTTPS
                true,           // httpOnly = not accessible by JS
                false,          // raw
                'Strict'        // SameSite policy
            );





    }

    public function Logout(Request $request)
    {
        $token = $request->cookie("auth_token");

       

        return response()->json([
            "success" => true,
            "message" => "Logged out"
        ])->cookie("auth_token", "", -1);
    }

    public function DeleteAccount()
    {

    }




    public function getUser(Request $request)
    {

        return response()->json([
            "success" => true,
            "user" => $request->user(),
        ]);

    }






    public function Addaddresses(Request $request)
    {

        $validate = Validator::make($request->all(), [
            "country" => "require|string",
            "state" => "require|string",
            "post_code" => "require|string",
            "full_address" => "require|string",
            "user_id" => "require|string",
            "city" => "string",
        ]);
        if ($validate->fails()) {
            return response()->json(["success" => false, "message" => $validate->errors()->all()]);
        }

        // Address::create








    }









    public function getUserDetails(String $id){
       try {
             $user = Siteuser::where("id",$id)->first();
            $cart = Cart::with('product')->where('user_id', $id)->get();

            
            $addresses = Address::where('user_id', $id)->get();

            
            $orders = Oder::with('items.product', 'address')
                ->where('user_id', $id)
                ->orderBy('created_at', 'desc')
                ->get();

            return view("pages.userdetails",compact("cart","addresses","orders","user"));
            
            
            
          

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
    }







