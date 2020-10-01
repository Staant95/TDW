<?php

use Illuminate\Database\Seeder;
use App\Category;
use Faker\Generator as Faker;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = collect([
            Category::create(['name' => 'Deals']),
            Category::create(['name' => "Women"]),
            Category::create(['name' => "Men"]),
            Category::create(['name' => "Jeans"]),
            Category::create(['name' => "Shoes"]),
            Category::create(['name' => "T-shirt"]),
            Category::create(['name' => "Sunglasses"]),
            Category::create(['name' => "Underwear"]),
            Category::create(['name' => "Sport"]),
            Category::create(['name' => "Kid"])
        ]);

        $products = App\Product::all();

        $categories->each(function($category) use ($faker, $products) {

            $start = $faker->numberBetween(1, $products->count());
            $end = $faker->numberBetween($start, $products->count());
            $sliceOfProducts = $products->slice($start, $end)->keys();

           $category->products()->attach($sliceOfProducts);
        });
    }
}
