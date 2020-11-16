<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyDataController extends Controller
{
    public function index() {
        return view('profile.mydata')->with([
            'user' => Auth::user()
        ]);
    }
}
