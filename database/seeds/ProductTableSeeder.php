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
        factory(App\Product::class, 50)
        ->create()
        ->each(function($product) use($faker) {

            $formatSize = App\Format::count();
            $randomFormat = $faker->numberBetween(1, $formatSize);
            $format = App\Format::find($randomFormat);
            $product->formats()->attach(
                $format,
                [ 'quantity' => $faker->numberBetween(5,40)]
            );

            $categoriesSize = App\Category::count();
            $randomCategory = $faker->numberBetween(1,$categoriesSize);

            $category = App\Category::find($randomCategory);
            $product->categories()->attach(
                $category
            );
        });
    }
}
