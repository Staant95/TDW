<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponsController extends Controller
{
    
    public function index() {

        $coupons = Auth::user()->coupons->where('pivot.used', 0);

        if(Auth::user()->coupons->where('pivot.coupon_id', 1)->count())
            $newsletterCoupon = Auth::user()->coupons->where('pivot.coupon_id', 1)->first()->pivot->used;
        else {
            $newsletterCoupon = 0;
        }
        return view('profile.coupons')->with([
            'coupons' => $coupons,
            'newsletterCoupon' => $newsletterCoupon
        ]);
    }

}
