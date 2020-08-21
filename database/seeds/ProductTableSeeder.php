<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        factory(App\Product::class, 100)
        ->create()
        ->each(function($product) use($faker) {
            $product->formats()->save(
                factory(App\Format::class)->make(),
                ['quantity' => $faker->numberBetween(50, 200)]
            );
        });
    }
}
