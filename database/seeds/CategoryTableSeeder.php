<?php

use Illuminate\Database\Seeder;
use App\Category;
use Faker\Generator as Faker;

class CategoryTableSeeder extends Seeder
{
    private $categoriesAndProducts = [
        'Camicie' => [
          'camicia',
          'camicia',
          'camicia beige',
          'camicetta',
          'camicetta',
          'marshall shirt'
        ],
      
      
        'Hats' => [
          'barett',
          'im leoparden',
          'zum wenden',
          'watch hat',
          'berretto',
          'berretto'
        ],
      
      
        'Gloves' => [
          'watch gloves',
          'jack montana',
          'sphere running',
          'unisex',
          'ottawa',
          'gloves'
        ],
      
        'Jeans' => [
          'jeans skinny_fit',
          'mit graffiti',
          'mit hohem_bund',
          'mit rissen_large.jpg',
          'jeans skinny_fit',
          'jeans tapered_fit'
        ],
      
        'Shoes' => [
          'stan smith',
          'sneakers large.jpg',
          'max aura',
          'air force_1',
          'rsx',
          'smash v2'
        ],
      
        'Skirt' => [
          'highrise',
          'shorts',
          'gonna jeans',
          'nukaty skirt',
          'rock im_koko',
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
       'Sport' => [ 
           'lin', 
           'tuta', 
           'tuta', 
           'crew logo', 
           'taino', 
           'collant' 
       ],

        'Suits' => [
          'cappotto corto',
          'nuamaury',
          'giacca',
          'jprstuart',
          'onlysmark',
          'giacca'
        ],

        'Tshirt' => [
          'polo black',
          'tshirt',
          'tshirt',
          'cutandsew tee',
          'contrast pocket_tee',
          'edie'
        ],

        'Sunglasses' => [
          'esky',
          'sunglasses',
          'sunglasses',
          'jackpot',
          'likoma',
          'sunglasses'
        ],
        
        'Underwear' => [
          'modern bralette',
          'boxer',
          'plunge pushup',
          'boxer',
          'slip',
          'basic thong',
          'slip',
          'perizoma'
        ]
      ];



    public function run(Faker $faker)
    {
        
        Category::create(['name' => 'Camicie']); // 1-8
        Category::create(['name' => "Gloves"]); // 9-16
        Category::create(['name' => "Hats"]);  // 17-24
        Category::create(['name' => "Jeans"]); // 25-32
        Category::create(['name' => "Shoes"]); // 32-40
        Category::create(['name' => "Skirt"]); //41-48
        Category::create(['name' => "Scoks"]);//49-56
        Category::create(['name' => "Sport"]);//57-64
        Category::create(['name' => "Suits"]);//65-72
        Category::create(['name' => "Sunglasses"]); // 73-80
        Category::create(['name' => 'Tshirt']); // 81-88
        Category::create(['name' => "Underwear"]); // 89-96
         


        
    }
}
