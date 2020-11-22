<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Product;
use App\Colour;
use App\Size;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $products = Product::all();
        // assign all colors and sizes
        $colors = Colour::all();

        $clothSizes = Size::whereBetween('id', [1, 5])->get();
        $shoeSizes = Size::whereBetween('id', [6, 13])->get();

        foreach($products as $product) {

            foreach($colors as $color) {
                $product->colours()->attach($color->id);
            }


            if($product->categories[0]->name == 'Shoes') {

                foreach($shoeSizes as $size) {

                    $product->sizes()->attach($size->id);

                }
                
            } else {


                foreach($clothSizes as $size) {
                    
                    $product->sizes()->attach($size->id);

                }

            }

        }


    }
}
