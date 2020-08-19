<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class MockController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return response()->json(['data' => $products], 200)->header('Content-Type', 'application/json');
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
