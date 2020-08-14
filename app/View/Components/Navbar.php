<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use App\Models\NavItem;

class Navbar extends Component
{

    public $navItems;

    public function __construct()
    {

        if(Auth::check()) {
            $this->navItems = collect([
                new NavItem('Homepage', route('homepage')),
                new NavItem('Services', route('services')),
                new NavItem(Auth::user()->name, route('profile', ["user" => Auth::id()])),
            ]);
        } else {
            $this->navItems = collect([
                new NavItem('Homepage', route('homepage')),
                new NavItem('Services', route('services')),
                new NavItem('Login', route('login')),
                new NavItem('Register', route('register')),
//                new NavItem('Profile', route('profile', ["user" => 1])),
            ]);
        }
    }


    public function render()
    {
        return view('components.navbar');
    }
}
