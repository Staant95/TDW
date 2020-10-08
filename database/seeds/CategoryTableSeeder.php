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
            Category::create(['name' => "Kids"]),
            // Category::create(['name' => "Summer Sales"]),
            // Category::create(['name' => "Winter Sales"]),
            // Category::create(['name' => "Trending"]),
            Category::create(['name' => "Hats"]),
            Category::create(['name' => "Socks"]),
            Category::create(['name' => "Gloves"]),
            Category::create(['name' => "Men-Suits"]),
        ]);

        $products = App\Product::all();

        $arrOfProducts = $products->chunk(8);
        $indexArray = 0;

        // itero su ogni categoria, 
       foreach($categories as $category) {
            
            foreach($arrOfProducts[$indexArray] as $product) {

                $category->products()->attach($product->id);

            }

            $indexArray += 1;
       }
    }
}
