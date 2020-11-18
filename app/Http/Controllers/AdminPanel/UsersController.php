<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Arr;

class UsersController extends Controller
{
    
    public function index()
    {
        $users = User::paginate(20);
        return view('admin.index')->with([
            'modelName' => 'users',
            'records' => $users,
            'createLink' => route('users.create'),
            'basePath' => route('users.index'),
            'modelColumns' => Arr::except(Schema::getColumnListing('users'),[0,2,3,7,9])
        ]);
    }

    public function create()
    {
     
        return view('admin.user-create')->with([
            'url' => route('users.store'),
            'roles' => Role::all()
        ]);
    }

    
    public function store(Request $request)
    {
      
        $fields = Arr::except($request->all(), [
            '_token'
        ]);
  
        User::create([
            'name' => $fields['name'],
            'lastname' => 'smith',
            'email' => $fields['email'],
            'password' => $fields['password'],
            // 'role_id' => $fields['role']
        ]);
        return redirect()->back();
    }

    
    public function show($id)
    {
        $record = Arr::except(User::where('id', $id)->first()->getOriginal(), [
                    'created_at',
                    'updated_at',
                    'remember_token',
                    'email_verified_at',
                ]);
        $user = User::where('id', $id)->first(); 

        // check if user have any orders and addresses
        $orders = $user->orders->count() ? $user->orders : collect([]);
        $addresses = $user->addresses->count() ? $user->addresses : collect([]);

        return view('admin.show')->with([
            'record' => $record,
            'basePath' => route('users.index'),
            'modelName' => 'User',
            'relationships' => [
                'Orders' => $orders,
                'Addresses' => $addresses
            ]
        ]);
    }

    
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        $user->cart->delete();
        $user->delete();
        return redirect()->back();
    }
}
