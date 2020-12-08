<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Address;
use App\User;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Arr;
class AddressesController extends Controller
{
    private $modelName = 'addresses'; 
   
    public function index()
    {
        $addresses = Address::paginate(20);
        
        return view('admin.index')->with([
            'modelName' => $this->modelName,
            'records' => $addresses,
            'createLink' => route('addresses.create'),
            'basePath' => route('addresses.index'),
            'modelColumns' => Arr::except(Schema::getColumnListing('addresses'), [0, 5, 6])
        ]);
    }
    
    public function create()
    {
        return view('admin.addresses.create')->with([
            'url' => route('addresses.store'),
            'users' => User::all()
        ]);
    }

    
    public function store(Request $request)
    {
        Address::create(Arr::except($request->all(), [
            '_token'
        ]));

        return redirect()->route('addresses.index');
    }

   
    public function show($id)
    {
        
        $record = Arr::except(
            Address::where('id', $id)->first()->getOriginal(),
            [
                'created_at',
                'updated_at',
            ]
        );

        $relationships = [];

        return view('admin.show', [
            'modelName' => 'Addresses',
            'basePath' => route('addresses.index'),
            'record' => $record,
            'relationships' => $relationships

        ]);
    }

    
    public function edit($id)
    {
        
        $address = Address::where('id', $id)->first();
        $address = Arr::except($address, [
            'id',
            'created_at',
            'updated_at',
        ]);

        return view('admin.addresses.edit')->with([
            'address' => $address,
            'url' => route('addresses.update', ['address' => $id] ),
            'users' => User::all()
        ]);
    }

    
    public function update(Request $request, $id)
    {
        
        $fields = Arr::except($request->all(), [
            '_token',
            '_method'
        ]);

        Address::where('id', $id)->update($fields);

        return redirect()->route('addresses.index');
    }

    
    public function destroy($id)
    {
        Address::where('id', $id)->first()->delete();
        return redirect()->route('addresses.index');
    }
}
