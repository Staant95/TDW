<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;
use Faker\Generator as Faker;

class CategoryTableSeeder extends Seeder
{
    private $macroCategories = [
        'Abbigliamento' => [
            'Camicie' => [
                'camicia',
                'camicia beige',
                'camicia original',
                'camicetta',
                'camicetta original',
                'marshall shirt'
            ],
            'Jeans' => [
                'jeans skinny fit',
                'mit graffiti',
                'mit hohem bund',
                'mit rissen',
                'jeans skinny fit',
                'jeans tapered fit'
            ],
            'Skirt' => [
                'highrise',
                'shorts',
                'gonna jeanss',
                'nukaty skirt',
                'rock im koko',
                'gonna jeans'
            ],
            'Socks' => [
                'midcut',
                'solid crew',
                'jacjens',
                'regular',
                'kneehigh',
                'sock checks'
            ],
            'Suits' => [
                'cappotto corto',
                'nuamaury',
                'giacca completo',
                'jprstuart',
                'onlysmark',
                'giacca'
            ],
            'Tshirt' => [
                'polo black',
                'tshirt',
                't shirt',
                'cutandsew tee',
                'contrast pocket tee',
                'edie'
            ],
        ],
        'Scarpe' => [
            'Shoes' => [
                'stan smith',
                'sneakers',
                'max aura',
                'air force 1',
                'rsx',
                'smash v2'
            ],
        ],
        'Sports' => [
            'Sport' => [
                'lin',
                'tuta set',
                'tuta',
                'crew logo',
                'taino',
                'collant'
            ],        
        ],
        'Accessori' => [
            'Gloves' => [
                'watch gloves',
                'jack montana',
                'sphere running',
                'unisex',
                'ottawa',
                'gloves'
            ], 
            'Hats' => [
                'barett',
                'im leoparden',
                'zum wenden',
                'watch hat',
                'berretto large',
                'berretto'
            ],
            'Sunglasses' => [
                'esky',
                'sunglasses unisex',
                'sun glasses',
                'jackpot',
                'likoma',
                'sunglasses'
            ],
        ],
        'Intimo' => [
            'Underwear' => [
                'modern bralette',
                'coulotte',
                'plunge pushup',
                'boxer',
                'slip set',
                'basic thong',
                'slip',
                'perizoma'
            ]
        ]
    ];





    public function run(Faker $faker)
    {

        foreach($this->macroCategories as $macroCategory => $subCategories) {

            $currentCategory = Category::create(['name' => $macroCategory]);

            foreach($subCategories as $category => $products) {

                Category::create([
                    'name' => $category, 
                    'parent_id' => $currentCategory->id
                    ]);
                
                foreach($products as $product) {

                    $product = Product::create([
                        'name' => $product,
                        'price' => $faker->randomFloat(1, 20, 150),
                        'description' => $faker->sentence(10),
                        'brand_id' => $faker->numberBetween(1, 25)
                    ]);
                    
                    $product->addMedia(storage_path('app/public/'))->toMediaCollection();
                    
                }

            }

        }
    }
}
