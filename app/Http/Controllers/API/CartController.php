<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Cart;
use App\product;

class CartController extends Controller
{

    public function index(User $user)
    {

        return response($user->cart->products, 200)->header('Content-Type', 'application/json');

    }


    public function store(User $user, Request $request)
    {
        $product = Product::findOrFail($request->input('product_id'));
        $cartProducts = $user->cart->products;


        if($cartProducts->contains($product)) {
            $cartProducts->map(function($item) use ($product) {
                if($item->id == $product->id) {
                    $item->pivot->quantity++;
                    $item->push();
                }
            });
        } else {
            $user->cart->products()->attach($product);
        }
        $fresh = User::find($user->id);
        return response($fresh->cart->products);
    }


    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(User $user, $id)
    {
        $cart = $user->cart;
        $cart->products()->detach($id);
        return response()->json($cart->products, 200)->header('Content-Type', 'application/json');
    }
}
