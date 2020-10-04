<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class SearchResultsController extends Controller
{
    
    public function search(Request $request)
    {
        if($request->has('category')) {
            $category = Category::findOrFail($request->query('category'));
            return view('searchresults')
            ->with(['products' => $category->products]);
        } else {
            $products = Product::where('name', 'like', $request->query('product') . '%')->get();
            return view('searchresults')
            ->with(['products' => $products]);
        }
    }
    

   
}
