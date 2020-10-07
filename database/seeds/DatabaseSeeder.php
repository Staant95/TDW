<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleTableSeeder::class,
            PermissionTableSeeder::class,
            FormatTableSeeder::class,
            ProductTableSeeder::class,
            CategoryTableSeeder::class,
            UserTableSeeder::class,
            PaymentTableSeeder::class,
            ShopTableSeeder::class,
            ImageTableSeeder::class,
        ]);
    }
}
