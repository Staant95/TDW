<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class CategoryController extends Controller
{

    public function index(Category $category) {


        $products = $category->products;

        return view('explore-category')->with([
            'products' => $products
        ]);

    }


    public function sort(Request $request, Category $category) {

        $request->flash();
        
        $filterType = $request->input('filterType');

        
        if($filterType === "price") {
            $products = $category->products->sortBy('price');

        } else if ($filterType === "name") {
            $products = $category->products->sortBy('name');

        } else {
            $products = $category->products;
        }

 

        return view('explore-category')->with([
            'products' => $products
        ]);

    }
}
