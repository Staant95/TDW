<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Wishlist;
use App\Product;

class WishlistController extends Controller
{
    

    public function store(Request $request, Wishlist $wishlist)
    {
        $product = Product::find($request->input('product'));
        $products = $wishlist->products;
        if(!$products->contains($product)) {
            $wishlist->products()->attach($product);
        }
        return response()->json([], 201)->header('Content-Type', 'application/json');
    }

  
}
