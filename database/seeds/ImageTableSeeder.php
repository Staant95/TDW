<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Image;
use App\Category;
use Illuminate\Support\Facades\Http;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = Category::all();

        $categories->each(function($category) {

            $category->products->each(function($product) use ($category) {

                // $medium = Http::get('https://source.unsplash.com/300x400/?' . $category->name);
                // $square = Http::get('https://source.unsplash.com/600x600/?' . $category->name);

                // Storage::put( 'public/' . $category->name . '/' . $product->id  .'medium.jpg', $medium->body() );
                // Storage::put( 'public/' . $category->name . '/' . $product->id  .'square.jpg', $square->body() );
            


                Image::create([
                    'URL' => 'storage/' . $category->name . '/' . $product->id  .'medium.jpg', 
                    'product_id' => $product->id
                ]);

                // Image::create([
                //     'URL' => 'storage/' . $category->name . '/' . $product->id  .'square.jpg', 
                //     'product_id' => $product->id
                // ]);
            

            });

        });
    
      
    }
}
