<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $cartItems = session('cart', 'empty');
        return response()
            ->json($cartItems, 200)
            ->header('Content-Type', 'application/json');
    }


    public function store(Request $request)
    {
        $item = collect(['id' => rand(1, 10000), 'name' => $request->get('name')]);
        session(['cart' => $item]);
        return response()
            ->json($item, 200)
            ->header('Content-Type', 'application/json');
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
