<?php

namespace App\Http\Controllers\froentend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller 
{ 

    public function addAddress(Request $request){

              $userId = $request->user()->id;

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'gender'     => 'nullable|string',
            'email'      => 'required|email',
            'phone'      => 'required|string|max:20',
            'country'    => 'required|string|max:255',
            'state'      => 'required|string|max:255',
            'address'    => 'required|string',
            'landmark'   => 'nullable|string',
            'house_no'   => 'nullable|string',
            'postcode'   => 'nullable|string|max:20',
            'city'       => 'required|string|max:255',
            'order_notes'=> 'nullable|string',
        ]);
        
    Address::where('user_id', $userId)->update(['selectAddress' => 0]);

    $address = new Address();
    $address->first_name=$request["first_name"];
    $address->last_name=$request["last_name"];
    $address->gender=$request["gender"];
    $address->email=$request["email"];
    $address->phone=$request["phone"];
    $address->country=$request["country"];
    $address->state=$request["state"];
    $address->address=$request["address"];
    $address->landmark=$request["landmark"];
    $address->house_no=$request["house_no"];
    $address->postcode=$request["postcode"];
    $address->city=$request["city"];
    $address->order_notes=$request["order_notes"];
    $address->user_id=$userId;;

$address->save();

    return response()->json([
        'success' => true,
        'message' => 'Address created successfully',
        'data'    => $request->all()
    ], 201);






    }

  public function getAddress(Request $request)
{
    $userId = $request->user()->id;

    // Fetch all addresses for the logged-in user
    $addresses = Address::where("user_id", $userId)->get();

    if ($addresses->isEmpty()) {
        return response()->json([
            'success' => false,
            'message' => 'No addresses found',
            'data'    => []
        ], 404);
    }

    return response()->json([
        'success' => true,
        'message' => 'Addresses retrieved successfully',
        'address'    => $addresses
    ], 200);
}

public function updateAddress(Request $request, string $id)
{
    $userId = $request->user()->id;

    // Reset all addresses of this user to 0
    Address::where('user_id', $userId)->update(['selectAddress' => 0]);

    // Update only the selected address to 1
    $address = Address::where('id', $id)->update(['selectAddress' => 1]);

    if (!$address) {
        return response()->json([
            'success' => false,
            'message' => 'Address not found'
        ], 404);
    }


    return response()->json([
        'success' => true,
        'message' => 'Default address updated successfully',
        'address' => $address
    ]);
}

public function deleteAddress(Request $request, string $id)
{

    // Find the address that belongs to the logged-in user
    $address = Address::where('id', $id)->first();

    if (!$address) {
        return response()->json([
            'success' => false,
            'message' => 'Address not found or not authorized'
        ], 404);
    }

    $address->delete();

    return response()->json([
        'success' => true,
        'message' => 'Address deleted successfully'
    ]);
}




}
