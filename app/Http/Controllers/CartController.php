<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        // if not logged redirect to login
        $logged_user = Auth::user();

        return response()
            ->json(['user' => $logged_user], 200)
            ->header('Content-Type', 'application/json');
    }

    public function store() {

    }

    public function update($id) {

    }

    public function destroy($id) {

    }
}
