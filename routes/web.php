<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



Auth::routes();

Route::resource('cart', 'CartController');






