<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('users/{user}/cart', 'API\CartController')->except('show');

Route::get('categories', function() {
   $categories = App\Category::limit(6)->get();
   return response()->json($categories, 200)->header('Content-Type', 'application/json');
});

Route::get('categories/{category}/products', function(App\Category $category) {
   $products = collect($category->products)->slice(1,8);
   $products->each(function($product) {
      $p = App\Product::find($product->id);
      $product->image = $p->images;
   });
   return response()->json($products, 200)->header('Content-Type', 'application/json');
});

Route::post('wishlists/{wishlist}/products', 'API\WishlistController@store');
