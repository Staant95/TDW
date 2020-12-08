<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Arr;
use App\Size;

class SizesController extends Controller
{
    
    public function index()
    {
        $sizes = Size::paginate(20);

        return view('admin.index')->with([
            'modelName' => 'sizes',
            'records' => $sizes,
            'createLink' => route('sizes.create'),
            'basePath' => route('sizes.index'),
            'modelColumns' => Arr::except(Schema::getColumnListing('sizes'),[0,1,2])
        ]);
    }

    public function create()
    {
        return view('admin.sizes.create')->with([
            'url' => route('sizes.store')
        ]);
    }

    
    public function store(Request $request)
    {
        $fields = Arr::except($request->all(), [
            '_token'
        ]);

        Size::create($fields);        

        return redirect()->route('sizes.index');
    }

   
    public function show($id)
    {
        $record = Arr::except(Size::where('id', $id)->first()->getOriginal(), [
            'created_at',
            'updated_at',
        ]);

        $relationships = [];

        return view('admin.show')->with([
            'record' => $record,
            'basePath' => route('sizes.index'),
            'modelName' => 'Size',
            'relationships' => $relationships
        ]);
    }

   
    public function edit($id)
    {
        $size = Size::where('id', $id)->first();

        $size = Arr::except($size, [
            'id',
            'created_at',
            'updated_at'
        ]);

        return view('admin.sizes.edit')->with([
            'size' => $size,
            'url' => route('sizes.update', ['size' => $id])
        ]);
    }

   
    public function update(Request $request, $id)
    {
        $fields = Arr::except($request->all(), ['_token', '_method']);

        Size::where('id', $id)->first()->update($fields);

        return redirect()->route('sizes.index');
    }

    
    public function destroy($id)
    {
        Size::where('id', $id)->first()->delete();
        return redirect()->route('sizes.index');
    }
}
