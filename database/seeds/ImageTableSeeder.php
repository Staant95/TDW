<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Product;
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
        $categories = $categories->except(1);

        $categories->each(function($category) {

            $category->products->each(function($product) use ($category) {

                $medium = Http::get('https://source.unsplash.com/300x400/?' . $category->name);
                $square = Http::get('https://source.unsplash.com/600x600/?' . $category->name);

                Storage::put( 'public/' . $category->name . '/' . $product->id  .'medium.jpg', $medium->body() );
                Storage::put( 'public/' . $category->name . '/' . $product->id  .'square.jpg', $square->body() );
            


                Image::create([
                    'URL' => 'storage/' . $category->name . '/' . $product->id  .'medium.jpg', 
                    'product_id' => $product->id
                ]);

                Image::create([
                    'URL' => 'storage/' . $category->name . '/' . $product->id  .'square.jpg', 
                    'product_id' => $product->id
                ]);
            

            });

        });
        


        // 500x600 -> detail product image
        // 300x400 ->trending product


        // $file = Storage::get('public/filepaths.txt');
    
        // $paths = collect([]);
        // $temp = "";
    
        // // split the string into array
        // for($i = 0; $i < strlen($file); $i++) {
    
        //     if($file[$i] !== "\n"){
        //         $temp = $temp . $file[$i];
        //     } else {
        //         $paths->push($temp);
        //         $temp = "";
        //     }
        // }
        // $pathCounter = 0;
    
        // $products = Product::all();
    
    
        // for($i = 0; $i < $products->count(); $i++) {
    
        //     Image::create(['URL' => $paths->get($pathCounter), 'product_id' => $products->get($i)->id]);
        //     $pathCounter = $pathCounter + 1;
    
        // }
       
    }
}
