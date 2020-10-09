<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponsController extends Controller
{
    
    public function index() {

        return view('profile.coupons')->with([
            'coupons' => Auth::user()->coupons
        ]);
    }

}
