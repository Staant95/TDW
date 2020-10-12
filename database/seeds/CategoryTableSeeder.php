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
            Category::create(['name' => 'Deals']), // 1-8
            Category::create(['name' => "Women"]), // 9-16
            Category::create(['name' => "Men"]),   // 17-24
            Category::create(['name' => "Jeans"]), // 25-32
            Category::create(['name' => "Shoes"]), // 32-40
            Category::create(['name' => "T-shirt"]), //41-48
            Category::create(['name' => "Sunglasses"]),//49-56
            Category::create(['name' => "Underwear"]),//57-64
            Category::create(['name' => "Sport"]),//65-72
            Category::create(['name' => "Kids"]), // 73-80
            // Category::create(['name' => "Summer Sales"]),
            // Category::create(['name' => "Winter Sales"]),
            // Category::create(['name' => "Trending"]),
            Category::create(['name' => 'Skirt']), // 81-88
            Category::create(['name' => "Hats"]), // 89-96
            Category::create(['name' => "Socks"]), // 97-104
            Category::create(['name' => "Gloves"]), // 105-112
            Category::create(['name' => 'Men-Suits']), // 113-120
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
