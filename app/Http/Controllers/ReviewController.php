<?php

namespace App\Http\Controllers;

use App\Product;
use App\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        Review::create([
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'stars' => $request->input('star'),
            'description' => $request->description
        ]);

        return redirect()->route('product', ['product' => $request->product_id]);
    }
}
