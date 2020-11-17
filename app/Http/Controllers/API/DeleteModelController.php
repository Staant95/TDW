<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Order;
use App\Permission;
use App\Role;

class DeleteModelController extends Controller
{
    public function user($id) {
        User::where('id', $id)->delete();
    }


    public function order($id) {
        Order::where('id', $id)->delete();
    }


    public function permission($id) {
        Permission::where('id', $id)->delete();
    }



    public function roles($id) {
        Role::where('id', $id)->delete();
    }


    public function product($id) {
        Product::where('id', $id)->delete();
    } 
}
