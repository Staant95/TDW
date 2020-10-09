<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Order;
use App\Address;
use App\Coupon;

class CheckoutController extends Controller
{
    
    public function index(Request $request)
    {

        $user = Auth::user();

        $cart = $user->cart;

        $products = $cart->products;

        $total = $products->sum('price');

        $finalPrice = $total;

        $shippingCost = $total > 100 ? 0 : 10;

        // when cart has no products
        if($total === 0) $shippingCost = 0;


        $coupon = null;

        if($request->has('coupon') && $request->query('coupon') !== NULL) {

            $coupon = $user->coupons->where('pivot.code', '=', $request->query('coupon'))->first();
            
            if($coupon !== NULL) {
                $finalPrice -= $coupon->value;
            } else {
                return abort(404, 'Cannot find a coupon with that code');
            }
        }

        $payments = Auth::user()->payments;

        $addresses = Auth::user()->addresses;

        return view('checkout')->with([
            'total' => $total,
            'products' => $products,
            'cart' => $cart,
            'payments' => $payments,
            'addresses' => $addresses,
            'shippingCost' => $shippingCost,
            'coupon' => $coupon,
            'finalPrice' => $finalPrice
        ]);
    }



    public function store(Request $request)
    {

        $validated = $request->validate([
            'address' => 'required',
            'payment' => 'required'
        ]);

        if($request->has('coupon') && $request->query('coupon') !== NULL) {

            $coupon = Auth::user()->coupons->where('pivot.code', '=', $request->query('coupon'))->first();
            
            if($coupon !== NULL) {
                $coupon->users()->updateExistingPivot(Auth::id(), ['used' => 1]);
                $coupon->users()->detach(Auth::id());
            } else {
                return abort(404, 'Cannot find a coupon with that code');
            }
        }

        $address = Address::find($validated['address']);
        
        $cart = Auth::user()->cart;

        $products = $cart->products;

        $total = $request->input('total');


        $order = Order::create([
            'shipping_id' => 1,
            'code' => Str::random(5),
            'expected' => Carbon::now()->add(5, 'day'),
            'total' => $total,
            'user_id' => Auth::id(),
            'address_id' => $address->id
        ]);


        foreach($products as $product) { 
            $order->products()->attach($product);
        }
        
        // clear cart
        $cart->products()->detach();
        
        
        return redirect()->route('profile.orders');
    }


    public function coupon(Request $request) {

    }

 
}
