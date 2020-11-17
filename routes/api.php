<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('users/{user}/cart', 'API\CartController')->except('show');

Route::get('categories', function() {
   $categories = App\Category::limit(7)->get();
   return response()->json($categories->except(1), 200)->header('Content-Type', 'application/json');
});

Route::get('categories/{category}/products', function(App\Category $category) {
   $products = collect($category->products)->slice(0,8);
   $products->each(function($product) {
      $p = App\Product::find($product->id);
      $product->image = $p->images->first()->URL;
   });
   return response()->json($products, 200)->header('Content-Type', 'application/json');
});

Route::post('wishlists/{wishlist}/products', 'API\WishlistController@store');


Route::delete('/products/{id}', 'API\DeleteModelController@product');
Route::delete('/users/{id}', 'API\DeleteModelController@user');
Route::delete('/orders/{id}', 'API\DeleteModelController@order');
Route::delete('/roles/{id}', 'API\DeleteModelController@role');
Route::delete('/permission/{id}', 'API\DeleteModelController@permission');