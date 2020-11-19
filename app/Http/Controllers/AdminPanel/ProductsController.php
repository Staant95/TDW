<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
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
        return view('admin.products.create')->with([
            'url' => route('products.store'),
            // taglia e colore
        ]);
    }

   
    public function store(Request $request)
    {
        Product::create(Arr::except($request->all(), ['_token']));
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
