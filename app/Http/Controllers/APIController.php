<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIController extends Controller
{
    public function index(Request $request) {
        // $partial_name = $request->input('product');
        // $products = Product::where('name', like, $partial_name . '%')->get();
        return response()
            ->json(['name' => "asd"], 200)
            ->header('Content-Type', 'application/json');
    }
}
