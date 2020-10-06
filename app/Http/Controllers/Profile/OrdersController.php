<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index() {
        
        return view('profile.orders')->with([
            'orders' => Auth::user()->orders
        ]);
    }
}
