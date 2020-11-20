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
            BrandTableSeeder::class,
            SizeTableSeeder::class,
            ColorTableSeeder::class,
            // FormatTableSeeder::class,
            CategoryTableSeeder::class,
            UserTableSeeder::class,
            PaymentTableSeeder::class,
            ProductTableSeeder::class,
            // ShopTableSeeder::class,   
            // ImageTableSeeder::class,
            CouponTableSeeder::class,
        ]);
    }
}
