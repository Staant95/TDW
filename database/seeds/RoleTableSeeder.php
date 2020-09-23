<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Utente', ' description' => 'Compratore']);
        Role::create(['name' => 'Venditore' , 'description' => 'Utente che può vendere']);
        Role::create(['name' => 'Admin' , 'description' => 'Amministratore']);
        
    }
}
