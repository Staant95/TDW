<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class HomepageController extends Controller
{

    public function index()
    {
        /*
        should fetch all required data,
        feature product,
        trending items,
        hot items,
        best selling items,
        on sale,
        top viewed,
        categories
        */
        $feature = null;
        $trending = null;
        $hot = null;
        $bestSelling = null;
        $onSale = null;
        $topViewed = null;
        $categories = null;
        return view('homepage.test');
    }


}
