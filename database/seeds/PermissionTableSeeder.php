<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
    $permissions = collect([
        $permission = Permission::create(['action' => "Buy"]),
        $permission = Permission::create(['action' => "Create Review"]),
        $permission = Permission::create(['action' => "Open Sell"]),
        $permission = Permission::create(['action' => "Close Sell"]),
        $permission = Permission::create(['action' => "Edit Sell"]),
        $permission = Permission::create(['action' => "Ban User"]),
        $permission = Permission::create(['action' => "Delete Sell"]),
        $permission = Permission::create(['action' => "Delete Review"])
    ]);

        $admin = App\Role::where('name','=','Admin')->get();
        $admin->permissions()->attach($permissions->keys());

        $venditore = App\Role::where('name', '=', 'Venditore')->get();
        $venditore->permissions()->attach($permissions->keys()->slice(1,5));

        $utente = App\Role::where('name', '=', 'Utente')->get();
        $utente->permissions()->attach($permissions->keys()->slice(1,2));
    }
}
