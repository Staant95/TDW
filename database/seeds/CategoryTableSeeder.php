<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Deals']);
        Category::create(['name' => "Women"]);
        Category::create(['name' => "Men"]);
        Category::create(['name' => "Jeans"]);
        Category::create(['name' => "Shoes"]);
        Category::create(['name' => "T-shirt"]);
        Category::create(['name' => "Sunglasses"]);
        Category::create(['name' => "Underwear"]);
        Category::create(['name' => "Sport"]);
        Category::create(['name' => "Kid"]);
    }
}
