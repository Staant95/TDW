<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Order;
use App\Address;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Auth::user()->cart;
        $products = $cart->products;

        $total = $products->sum('price');

        $payments = Auth::user()->payments;

        $addresses = Auth::user()->addresses;

        return view('checkout')->with([
            'total' => $total,
            'products' => $products,
            'cart' => $cart,
            'payments' => $payments,
            'addresses' => $addresses
        ]);
    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'address' => 'bail|required',
            'payment' => 'required'
        ]);


        $address = Address::find($validated['address']);
        
        $cart = Auth::user()->cart;
        $products = $cart->products;
        $total = $products->sum('price');
        $cart->products()->detach();

        Order::create([
            'shipping_id' => 1,
            'code' => Str::random(5),
            'expected' => Carbon::now()->add(5, 'day'),
            'total' => $total,
            'user_id' => Auth::id(),
            'address_id' => $address->id
        ]);
        return redirect()->route('profile.orders');
    }

 
}
