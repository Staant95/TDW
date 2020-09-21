<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('user/{user}/cart', 'API\CartController')->except('show');
