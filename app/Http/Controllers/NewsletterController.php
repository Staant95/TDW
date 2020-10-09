<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Coupon;

class NewsletterController extends Controller
{
    public function store(Request $request) {

        $coupon = Coupon::where('value', '=', 10)->first();
 
        $coupon->users()->attach(Auth::id());
        // $coupon->users()->updateExistingPivot(Auth::id(), ['used' => 1]);

        
        return redirect()->route('profile.coupons.index');
    }
}
