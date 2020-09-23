<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['actions' => "Vendite"]);
        Permission::create(['actions' => "Fa cose"]);
    }
}
