<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Wishlist;
use App\Product;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $user = Auth::user();
        $wishlist = $user->wishlist;
                       
        
        return view ('wishlist')->with(['wishlist' => $wishlist,
                                        'user' => $user]);            
    }

    public function addProduct()
    {



    }


    public function removeProduct($product_id)
    {
        $user = Auth::user();
        $wishlist = $user->wishlist;
       WTF: $wishlist->products->detach($product->id);

        return redirect()->back();

    } 