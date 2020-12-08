<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Cart;
use App\Wishlist;
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
     
        return view('admin.users.create')->with([
            'url' => route('users.store'),
            'roles' => Role::all()
        ]);
    }

    
    public function store(Request $request)
    {
      
        $fields = Arr::except($request->all(), [
            '_token'
        ]);
  
        $user = User::create($fields);

        Cart::create(['user_id' => $user->id]);
        Wishlist::create(['user_id' => $user->id]);

        return redirect()->route('users.index');
    }

    
    public function show($id)
    {
        $record = Arr::except(User::where('id', $id)->first()->getOriginal(), [
                    'created_at',
                    'password',
                    'updated_at',
                    'remember_token',
                    'email_verified_at',
                ]);
        $user = User::where('id', $id)->first(); 

        // check if user have any orders and addresses
        $relationships = [];

        if($user->orders->count()) {            
            $relationships['Orders'] = $user->orders;
        } 

        if($user->addresses->count()) {
            $relationships['Addresses'] = $user->addresses;
        } 

        if($user->orders->count()) {
            $relationships['Orders'] = $user->orders;
        }

        return view('admin.show')->with([
            'record' => $record,
            'basePath' => route('users.index'),
            'modelName' => 'User',
            'relationships' => $relationships
        ]);
    }

    
    public function edit($id)
    {
        $user = User::where('id', $id)->first();

        $user = Arr::except($user, [
            'id',
            'email_verified_at',
            'password',
            'remember_token',
            'created_at',
            'updated_at'
        ]);

        return view('admin.users.edit')->with([
            'user' => $user,
            'roles' => Role::all(),
            'url' => route('users.update', ['user' => $id])
        ]);
    }

   
    public function update(Request $request, $id)
    {
        $fields = Arr::except($request->all(), ['_token', '_method']);

        User::where('id', $id)->update($fields);

        return redirect()->route('users.index');
    }

    
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        $user->cart->delete();
        $user->delete();
        return redirect()->route('users.index');
    }
}
