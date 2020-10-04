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
        
        $product = $request->input('product_id');
        $cartProducts = $user->cart->products;

        if($cartProducts->contains($product)) {

            $cartProducts->filter(function($item) use ($product, $user) {
                if($item->id == $product) {
                    $item->pivot->quantity = $item->pivot->quantity + 1;
                    $user->cart->push();
                }
            });
            
        } else {
            $user->cart->products()->attach($product);
        }
        $user->cart->refresh();
        return response($user->cart->products);
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
