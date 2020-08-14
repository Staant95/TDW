<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


Route::get('products', function() {
    $products = ["id" => 1, "name" => "Pantaloni"];
    return response()
        ->json($products, 200)
        ->header('Content-Type', 'application/json');
});

Route::resource('cart', 'CartController')->except(['create', 'show', 'edit']);

