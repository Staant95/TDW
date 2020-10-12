<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Cart;
use App\Product;

class CartProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cart_id)
    {
        $cart = Cart::find($cart_id);
        $products= $cart->products;
        
        $total = 0;

        foreach($products as $product) {
            $total += ($product->price * $product->pivot->quantity);
        }

        return view('cart')->with(['products' => $cart->products,
                                    'total' => $total]);
    }

   

   
    public function store(Cart $cart,Request $request)
    {



        $product = $request->input('product');
        $products = $cart->products;
        if(! $products->contains($product))
            $cart->products()->attach($product);
            return redirect()->back();
    }



    
    public function update(Cart $cart, Product $product, Request $request)
    {
        if($request->has('minus')) {

            $quantity = $cart->products->where('pivot.product_id', '=', $product->id)->first()->pivot->quantity;
            if($quantity > 1) {
                $quantity -= 1;
                $cart->products()->updateExistingPivot($product->id, ['quantity' => $quantity]);
            }

        } else {

            $quantity = $cart->products->where('pivot.product_id', '=', $product->id)->first()->pivot->quantity;
            $quantity += 1;
            $cart->products()->updateExistingPivot($product->id, ['quantity' => $quantity]);
        }

        return redirect()->route('carts.products.index', ['cart' => Auth::user()->cart->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart, Product $product)
    { 
        $cart->products()->detach($product);
        return redirect()->back();
    }
}
