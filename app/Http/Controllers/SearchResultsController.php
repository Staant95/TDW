<?php

namespace App\Http\Controllers;

use App\Product;
use App\Format;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;

class SearchResultsController extends Controller
{

    public function search(Request $request)
    {
        $products = collect([]);


        $products = Product::where('name', 'like', $request->query('product') . '%')->get();


        $brands = $this->getBrands($products);

        return view('searchresults')
            ->with([
                'products' => $products,
                'brands' => $brands
            ]);
    }

    public function filter(Request $request)
    {

        // put old values in session
        $request->flash();

        $formBrands = collect($request->except('_token', 'price', 'product'));
        
    

        $products = Product::where('name', 'like', $request->query('product') . '%')->get();
        

        
        $brands = $this->getBrands($products); 

        if($request->has('price')) {
            $priceRange = $this->determinePriceRange($request->input('price'));

            $products = $this->filterByPrice($products, $priceRange);
        }
        
        
        
        if($formBrands->count()) {
            $products = $this->filterByBrand($products, $formBrands);
        }
        
        return view('searchresults')->with([
            'products' => $products,
            'brands' => $brands
        ]);
    }




    private function getBrands($products)
    {

        $brands = collect([]);

        $products->each(function ($product) use ($brands) {
            $product->formats->each(function ($format) use ($brands) {
                $brands->push($format->brand);
            });
        });

        return $brands->unique();
    }


    private function determinePriceRange($price)
    {

        $priceRange = collect([]);

        switch ($price) {
            case "low":
                $priceRange->push(20, 50);
                break;
            case "medium":
                $priceRange->push(50, 100);
                break;
            case "high":
                $priceRange->push(100, 500);
                break;
        }


        return $priceRange;
    }


    private function filterByPrice($products, $priceRange)
    {
        return $products->whereBetween('price', [$priceRange[0], $priceRange[1]]);
    }


    public function filterByBrand($products, $arrayOfBrands)
    {
        $result = collect([]);

        $products->each(function($product) use ($result, $arrayOfBrands) {

            $product->formats->each(function($format) use ($result, $arrayOfBrands, $product){

                if($arrayOfBrands->contains($format->brand)) $result->push($product);

            });
            
        });

        return $result;
    }
}
