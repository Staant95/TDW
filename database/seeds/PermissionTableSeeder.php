<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;

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
        Permission::create(['action' => "Create Review"]),
        Permission::create(['action' => "Open Sell"]),
        Permission::create(['action' => "Close Sell"]),
        Permission::create(['action' => "Edit Sell"]),
        Permission::create(['action' => "Ban User"]),
        Permission::create(['action' => "Buy"]),
        Permission::create(['action' => "Delete Sell"]),
        Permission::create(['action' => "Delete Review"])
    ]);

        $admin = Role::where('name','=','Admin')->first();
        $permissions->each(function($permission, $key) use ($admin) {
            $admin->permissions()->attach($permission);
        });

        $venditore = Role::where('name', '=', 'Venditore')->first();
        $permissions->splice(1,4)->each(function($permission) use ($venditore) {
            $venditore->permissions()->attach($permission);
        });


        $utente = Role::where('name', '=', 'Utente')->first();
        $utente->permissions()->attach(1);

    }
}
