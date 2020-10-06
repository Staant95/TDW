<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Address;
use Illuminate\Support\Facades\Auth;

class AddressesController extends Controller
{
    public function index() {
        $addresses = Address::where('user_id', '=', Auth::id())->get();
        return view('profile.addresses')
        ->with(['addresses' => $addresses]);
    }

    public function store(Request $request) {
        Address::create([
            'city' => $request->input('city'),
            'street' => $request->input('street'),
            'zip' => $request->input('zip'),
            'user_id' => Auth::id()
        ]);
       
        if($request->has('redirect'))  return redirect()->route('checkout.index');
        

        return redirect()->route('profile.addresses.index');
        
    }

    public function create() {
        return view('profile.create-address');
    }

    public function destroy(Address $address) {
        $address->delete();
        return redirect()->back();
    }
}
