<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/items', function() {
    return response()
        ->json(['data' => App\Product::where('price', '<', 100)->paginate(5)], 200)
        ->header('Content-Type', 'application/json');
});
