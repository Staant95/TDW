<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Arr;

class RolesController extends Controller
{
   
    public function index()
    {
        $roles = Role::paginate(20);
        return view('admin.index')->with([
            'modelName' => 'roles',
            'records' => $roles,
            'createLink' => route('roles.create'),
            'basePath' => route('roles.index'),
            'modelColumns' => Arr::except(Schema::getColumnListing('roles'),[0,2,4])
        ]);
    }

    
    public function create()
    {
        return view('admin.roles.create')->with([
            'url' => route('roles.store'),
            'permissions' => Permission::all()
        ]);
    }

    
    public function store(Request $request)
    {
        $fields = Arr::except($request->all(), [
            '_token',
            'permissions'
        ]);


        $role = Role::create($fields);

        foreach($request->input('permissions') as $permission) {
            $role->permissions()->attach($permission);
        }

        return redirect()->route('roles.index');

    }

   
    public function show($id)
    {
        $record = Arr::except(Role::where('id', $id)->first()->getOriginal(), [
            'created_at',
            'password',
            'updated_at',
            'remember_token',
            'email_verified_at',
        ]);
        $role = Role::where('id', $id)->first(); 

        $relationships['Permissions'] = $role->permissions;
        

        return view('admin.show')->with([
            'record' => $record,
            'basePath' => route('roles.index'),
            'modelName' => 'Role',
            'relationships' => $relationships
        ]);

    }

    
    public function edit($id)
    {
        $role = Role::where('id', $id)->first();

        $role = Arr::except($role, [
            'id',
            'created_at',
            'updated_at'
        ]);

        return view('admin.roles.edit')->with([
            'role' => $role,
            'permissions' => Permission::all(),
            'url' => route('roles.update', ['role' => $id])
        ]);
    }

    
    public function update(Request $request, $id)
    {
        $fields = Arr::except($request->all(), ['_token', '_method', 'permissions']);

        $role = Role::where('id', $id)->first();

        Role::where('id', $id)->update($fields);

        $permissionsId = [];

        foreach($request->input('permissions') as $permission) {
            array_push($permissionsId, $permission);
        }

        $role->permissions()->sync($permissionsId);

        return redirect()->route('roles.index');
    }

   
    public function destroy($id)
    {
        $role = Role::where('id', $id)->first();
        $role->delete();
        return redirect()->route('roles.index');
    }
}
