<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => "Utente"]);
        Role::create(['name' => "Venditore"]);
        Role::create(['name' => "Admin"]);
        Role::create(['description' => "Compratore"]);
        Role::create(['description' => "Utente che può vendere"]);
        Role::create(['description' => "Amministratore"]);
    }
}
