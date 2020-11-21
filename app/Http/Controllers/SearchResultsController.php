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
        $colours = $this->getColours($products);
        $sizes = $this->getSizes($products);
        

        return view('searchresults')
            ->with([
                'products' => $products,
                'brands' => $brands,
                'colours' => $colours,
                'sizes' => $sizes
            ]);
    }

    public function filter(Request $request)
    {

        // put old values in session
        $request->flash();

        $formBrands = collect($request->except('_token', 'price', 'product'));
        $formSizes = collect($request->except('_token', 'price', 'product', 'brand'));
       
        
    

        $products = Product::where('name', 'like', $request->query('product') . '%')->get();
        

        
        $brands = $this->getBrands($products);
        $colours = $this->getColours($products);
        $sizes = $this->getSizes($products); 

        if($request->has('price')) {
            $priceRange = $this->determinePriceRange($request->input('price'));

            $products = $this->filterByPrice($products, $priceRange);
        }
        
        
   
        //if($formBrands->isNotEmpty() && $formSizes->isNotEmpty()) {
        //    $products = $this->filterByBoth($products, $formBrands, $formSizes);
        //}
        //elseif($formBrands->isNotEmpty()){
        //    $products = $this->filterByBrand($products, $formBrands);
        //}
        //else{
        //    $products = $this->filterBySize($products, $formSizes);
        //}

        if($formBrands->isNotEmpty()) {
            $products = $this->filterByBrand($products, $formBrands);
        }

        if($formSizes->isNotEmpty()) {
            $products = $this->filterBySize($products, $formSizes);
        }
        dd($products);
        return view('searchresults')->with([
            'products' => $products,
            'brands' => $brands,
            'colours' => $colours,
            'sizes' => $sizes
        ]);
    }



    private function getColours($products)
    {

        $colours = collect([]);
        

        foreach ($products as $product){
            $colors = $product->colours;
            foreach ($colors as $color){
                $colours->push($color->type);
            }
                         
        }


        return $colours->unique();
    }

    private function getSizes($products)
    {

        $sizes = collect([]);
        

        foreach ($products as $product){
            $taglies = $product->sizes;
            foreach ($taglies as $taglie){
                $sizes->push($taglie->size);
            }
                         
        }


        return $sizes->unique();
    }



    private function getBrands($products)
    {

        $brands = collect([]);

        foreach ($products as $product){
            $brands->push($product->brand->name);
        }


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

        foreach ($products as $product){
            if($arrayOfBrands->contains($product->brand->name)) 
                $result->push($product);
        }
        
        return $result;
    }

    public function filterBySize($products, $sizes)
    {
        $result = collect([]);
        
        foreach ($products as $product){
            $taglies = $product->sizes;
                foreach ($taglies as $taglie){
                    if($sizes->contains($taglie->size)) 
                    $result->push($product);
        }

        }
        
        return $result;
    }

    public function filterByBoth($products, $sizes, $arrayOfBrands)
    {
        $result = collect([]);

        foreach ($products as $product){
            $taglies = $product->sizes;
                foreach ($taglies as $taglie){
                    if($arrayOfBrands->contains($product->brand->name) && $sizes->contains($taglie->size)) 
                $result->push($product);
                }

        }
        
        return $result;
    }


}
