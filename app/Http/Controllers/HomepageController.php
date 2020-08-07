<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index() {
        return view('welcome', ['name' => 'stas']);
    }

    public function store(Request $request) {
        $name = $request->input('name');

        session(['name' => $name]);

        return redirect('profile');
    }
}
