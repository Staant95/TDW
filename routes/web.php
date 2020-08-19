<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function() {
   if(!session()->has('cart')) {
       session(['cart', []]);
   }
   $products = App\Product::paginate(5);
   return view('test', ['products' => 'hi']);
});

Route::get('/filter', function() {
   $results = App\Product::where('price', '<', 40)->paginate(3);
   return view('welcome', ['products' => $results]);
});




