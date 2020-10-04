<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchResultsController extends Controller
{
    
    public function search(Request $request)
    {
        if($request->has('category')) {

            $category = Category::findOrFail($request->query('category'));     
            return view('searchresults')
            ->with([
                'products' => $category->products
            ]);

        } else {

            $products = Product::where('name', 'like', $request->query('product') . '%')->get();

            $brands = collect([]);

            $products->each(function($product) use ($brands) {
                $product->formats->each(function($format) use($brands) {
                    $brands->push($format->brand);
                });
            });

            return view('searchresults')
            ->with([
                'products' => $products,
                'brands' => $brands
            ]);
        }


    }

    public function filter(Request $request) {

        $searchedProduct = Product::where('name', 'like', $request->query('product') . '%')->get();


        if($request->has('price-range')) {

            $products = $this->filterByPrice($request->input('price-range'), $request->input('product'));
             
            return view('searchresults')->with(['products' => $products]);
        }

        return view('searchresults')->with(['products' => $searchedProduct]);

    }




    private function filterByPrice($price, $product) {
        
        $priceRange = collect([]);

        switch($price) {
            case "low" : 
                $priceRange->push(20, 50);
                break;
            case "medium" : 
                $priceRange->push(50,100);
                break;
            case "high" : 
                $priceRange->push(100, 300);
                break;
        }

        $products = DB::table('products')
                    ->where('name', 'like', $product .'%')
                    ->whereBetween('price', [$priceRange[0], $priceRange[1]])
                    ->get();

        return $products;

    }
    

   public function filterByBrand($products) {
       $brands = collect([]);
       $products->each(function($product) use ($brands) {
            $product = Product::find($product->id);
                $product->shops->each(function($shop) use ($brands) {
                    $brands->push($shop->pivot->brand);
                });
         });

     return $brands->unique();
   }
}
