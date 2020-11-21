<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Arr;

class PermissionsController extends Controller
{
   
    public function index()
    {
        $permissions = Permission::paginate(20);

        return view('admin.index')->with([
            'modelName' => 'permissions',
            'records' => $permissions,
            'createLink' => route('permissions.create'),
            'basePath' => route('permissions.index'),
            'modelColumns' => Arr::except(Schema::getColumnListing('permissions'),[1,2,3])
        ]);
    }

    
    public function create()
    {
        return view('admin.permissions.create')->with([
            'url' => route('permissions.store'),
        ]);
    }

    
    public function store(Request $request)
    {
        $fields = Arr::except($request->all(), [
            '_token'
        ]);


        $permission = Permission::create($fields);

        return redirect()->route('permissions.index');
    }

    
    public function show($id)
    {
        $record = Arr::except(Permission::where('id', $id)->first()->getOriginal(), [
            'created_at',
            'password',
            'updated_at',
        ]);        

        $relationships = [];

        return view('admin.show')->with([
            'record' => $record,
            'basePath' => route('permissions.index'),
            'modelName' => 'Permission',
            'relationships' => $relationships
        ]);
    }

    
    public function edit($id)
    {
        $permission = Permission::where('id', $id)->first();

        $permission = Arr::except($permission, [
            'id',
            'created_at',
            'updated_at'
        ]);

        return view('admin.permissions.edit')->with([
            'permission' => $permission,
            'url' => route('permissions.update', ['permission' => $id])
        ]);
    }

   
    public function update(Request $request, $id)
    {
        $fields = Arr::except($request->all(), ['_token', '_method']);

        Permission::where('id', $id)->first()->update($fields);

        return redirect()->route('permissions.index');
    }

   
    public function destroy($id)
    {
        Permission::where('id', $id)->first()->delete();
        return redirect()->route('permissions.index');
    }
}
