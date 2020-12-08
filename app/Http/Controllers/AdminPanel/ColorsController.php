<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Arr;
use App\Colour;

class ColorsController extends Controller
{
    
    public function index()
    {
        $colors = Colour::paginate(20);
        return view('admin.index')->with([
            'modelName' => 'colors',
            'records' => $colors,
            'createLink' => route('colors.create'),
            'basePath' => route('colors.index'),
            'modelColumns' => Arr::except(Schema::getColumnListing('colours'),[0,1,2])
        ]);
    }

    
    public function create()
    {
        return view('admin.colors.create')->with([
            'url' => route('colors.store')
        ]);
    }

    
    public function store(Request $request)
    {
        $fields = Arr::except($request->all(), [
            '_token'
        ]);

        Colour::create($fields);        

        return redirect()->route('colors.index');
    }

   
    public function show($id)
    {
        $record = Arr::except(Colour::where('id', $id)->first()->getOriginal(), [
            'created_at',
            'updated_at',
        ]);

        $relationships = [];

        return view('admin.show')->with([
            'record' => $record,
            'basePath' => route('colors.index'),
            'modelName' => 'Color',
            'relationships' => $relationships
        ]);

    }

    
    public function edit($id)
    {
        $color = Colour::where('id', $id)->first();

        $color = Arr::except($color, [
            'id',
            'created_at',
            'updated_at'
        ]);

        return view('admin.colors.edit')->with([
            'color' => $color,
            'url' => route('colors.update', ['color' => $id])
        ]);
    }

    public function update(Request $request, $id)
    {
        $fields = Arr::except($request->all(), ['_token', '_method']);

        Colour::where('id', $id)->first()->update($fields);

        return redirect()->route('colors.index');
    }


    
    public function destroy($id)
    {
        Colour::where('id', $id)->first()->delete();
        return redirect()->route('colors.index');
    }
}
