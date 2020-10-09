<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use Illuminate\Support\Str;
use App\Coupon;

class NewsletterController extends Controller
{
    public function store(Request $request) {

        $coupon = Coupon::where('value', '=', 10)->first();
 
        $coupon->users()->attach(Auth::id(), ['code' => Str::random(5)]);
        
        // $coupon->users()->updateExistingPivot(Auth::id(), ['used' => 1]);

        
        return redirect()->route('profile.coupons.index');
    }
}
