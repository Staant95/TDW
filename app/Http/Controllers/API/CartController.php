<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();
        return response()->json($user, 200)->header('Content-Type', 'application/json');
    }


    public function store(Request $request)
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
