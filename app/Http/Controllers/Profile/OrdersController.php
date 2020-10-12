<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;

class OrdersController extends Controller
{
    public function index() {
        
        return view('profile.orders')->with([
            'orders' => Auth::user()->orders
        ]);
    }


    public function show(Order $order) {

        
        return view('profile.order-detail')->with([
            'order' => $order
        ]);        
    }


    public function destroy(Order $order) {

    }
}
