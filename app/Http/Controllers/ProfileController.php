<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request) {

        $name = $request->session()->get('name');
        return view('profile', ['name' => $name]);
    }
}
