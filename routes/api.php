<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::resource('cart', 'CartController')->except(['show', 'edit', 'create']);
