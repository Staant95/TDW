<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Cart;
use App\product;

class CartController extends Controller
{

    public function index(User $user, Cart $cart)
    {
        return response($user->cart->products, 200);
    }


    public function store(User $user, Request $request)
    {
        $product = Product::findOrFail($request->input('product_id'));
        $cart = $user->cart;
        return response();
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
