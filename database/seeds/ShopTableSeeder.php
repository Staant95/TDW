<?php

use Illuminate\Database\Seeder;
use App\Shop;
use App\Product;
use Carbon\Carbon;
use Faker\Generator as Faker;


class ShopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $totalShops = 20;
        $products = Product::all();
        
        $shops = factory(Shop::class, $totalShops)->create();
        

        $products->each(function($product) use($faker, $shops, $totalShops) {
            $endIndex = $faker->numberBetween(1, $totalShops);
            $sliceOfShops = $shops->slice(1, $endIndex);

            $sliceOfShops->each(function($shop) use ($product){
                $product->shops()->attach($shop, [
                    'sale' => 10,
                    'start' => Carbon::now(),
                    'end' => Carbon::now()->addDays(7)
                ]);
            });
        });

    }
}
