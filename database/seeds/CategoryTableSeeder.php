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
        Category::create(['name' => "Donna"]);
        Category::create(['name' => "Uomo"]);
        Category::create(['name' => "Jeans"]);
        Category::create(['name' => "Scarpe"]);
        Category::create(['name' => "T-shirt"]);
        Category::create(['name' => "Pantaloni"]);
        Category::create(['name' => "Intimo"]);
        Category::create(['name' => "Sportivo"]);
        Category::create(['name' => "Bambino"]);
    }
}
