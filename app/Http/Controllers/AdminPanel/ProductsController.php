<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Colour;
use App\Size;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;

class ProductsController extends Controller
{
 
    public function index()
    {
        $products = Product::paginate(20);
        return view('admin.index')->with([
            'modelName' => 'products',
            'records' => $products,
            'createLink' => route('products.create'),
            'basePath' => route('products.index'),
            'modelColumns' => Arr::except(Schema::getColumnListing('products'),[0,2,5])
        ]);
    }
   
   
    public function create()
    {
        $colors = Colour::all();

        $sizes = Size::all();
        
        return view('admin.products.create')->with([
            'url' => route('products.store'),
            'colors' => $colors,
            'sizes' => $sizes
            // taglia e colore
        ]);
    }

   
    public function store(Request $request)
    {
        

        $product = Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'brand_id' => 1,
        ]);

        if($request->has('colors')) {
            $colors = $request->input('colors');

            foreach($colors as $color) {

                $color = Colour::where('id', $color)->first();
                $product->colours()->attach($color->id);

            }
        }

        if($request->has('sizes')) {
            $sizes = $request->input('sizes');

            foreach($sizes as $size) {

                $size = Colour::where('id', $size)->first();
                $product->sizes()->attach($size->id);

            }
        }


        return redirect()->route('products.index');
        
    }

    
    public function show($id)
    {
        $record = Arr::except(Product::where('id', $id)->first()->getOriginal(), [
            'created_at',
            'updated_at',
            'remember_token',
            'email_verified_at',
        ]);

        $product = Product::where('id', $id)->first(); 

        $relationships = [];

        if($product->sizes->count()) {

            $relationships['Sizes'] = $product->sizes;
        }

        if($product->colours->count()) {      

            $relationships['Colors'] = $product->colours;
        }
        return view('admin.show')->with([
            'record' => $record,
            'basePath' => route('products.index'),
            'modelName' => 'Product',
            'relationships' => $relationships
        ]);

    }

    
    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        $product = Arr::except($product, [
            'id',
            'created_at',
            'updated_at'
        ]);
        return view('admin.products.edit')->with([
            'product' => $product,
            'url' => route('products.update', ['product' => $id])
        ]);
    }

    
    public function update(Request $request, $id)
    {
        $fields = Arr::except($request->all(), ['_token', '_method']);

        Product::where('id', $id)->update($fields);
        
        return redirect()->route('products.index');
    }

    
    public function destroy($id)
    {
        Product::where('id', $id)->first()->delete();
        return redirect()->route('products.index');
    }
}
