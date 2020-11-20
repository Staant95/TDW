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


    private $fullProductName = [
        'bershka-camicia-large.jpg',
        'defacto-camicia_beige-large.jpg',
        'defacto-camicia_original-large.jpg',
        'pimkie-camicetta-large.jpg',
        'solid-camicetta_original-large.jpg',
        'twistedtailor-marshall_shirt-large.jpg',


        'bershka-jeans_skinny_fit-large.jpg',
        'bershka-mit_graffiti-large.jpg',
        'bershka-mit_hohem_bund-large.jpg',
        'bershka-mit_rissen-large.jpg',
        'pull&bear-jeans_skinny_fit-large.jpg',
        'pull&bear-jeans_tapered_fit-large.jpg',


        'americaneagle-highrise-large.jpg',
        'massimodutti-shorts-large.jpg',
        'mymorocks-gonna_jeanss-large.jpg',
        'numph-nukaty_skirt-large.jpg',
        'pimkie-rock_im_koko-large.jpg',
        'pull&bear-gonna_jeans-large.jpg',


        'adidas-midcut-large.jpg',
        'adidas-solid_crew-large.jpg',
        'jack&jones-jacjens-large.jpg',
        'levis-regular-large.jpg',
        'tommyhilfiger-kneehigh-large.jpg',
        'tomtailor-sock_checks-large.jpg',


        'bonobo-cappotto_corto-large.jpg',
        'celio-nuamaury-large.jpg',
        'defacto-giacca_completo-large.jpg',
        'jack&jones-jprstuart-large.jpg',
        'only&sons-onlysmark-large.jpg',
        'wefashion-giacca-large.jpg',


        'AdidasOriginal-polo_black-large.jpg',
        'Even&Odd-tshirt-large.jpg',
        'Levis-t_shirt-large.jpg',
        'Timberland-cutandsew_tee-large.jpg',
        'TommyJeans-contrast_pocket_tee-large.jpg',
        'Wolford-edie-large.jpg',


        'adidas-stan_smith-large.jpg',
        'annafield-sneakers-large.jpg',
        'jordan-max_aura-large.jpg',
        'nike-air_force_1-large.jpg',
        'puma-rsx-large.jpg',
        'puma-smash_v2-large.jpg',


        'adidas-lin-large.jpg',
        'adidas-tuta_set-large.jpg',
        'champion-tuta-large.jpg',
        'diadora-crew_logo-large.jpg',
        'kappa-taino-large.jpg',
        'nike-collant-large.jpg',


        'carhartt-watch_gloves-large.jpg',
        'jack&joones-jack_montana-large.jpg',
        'nike-sphere_running-large.jpg',
        'nike-unisex-large.jpg',
        'quicksilver-ottawa-large.jpg',
        'urbancalssics-gloves-large.jpg',


        'bershka-barett-large.jpg',
        'bershka-im_leoparden-large.jpg',
        'bershka-zum_wenden-large.jpg',
        'carhart-watch_hat-large.jpg',
        'thenorthface-berretto_large-large.jpg',
        'vans-berretto-large.jpg',


        'aldo-esky-large.jpg',
        'iconeyewear-sunglasses_unisex-large.jpg',
        'jeeperspeepers-sun_glasses-large.jpg',
        'quayaustralia-jackpot-large.jpg',
        'urbanclassics-likoma-large.jpg',
        'zign-sunglasses-large.jpg',


        'calvinklein-modern_bralette-large.jpg',
        'clavinklein-coulotte-large.jpg',
        'clavinklein-plunge_pushup-large.jpg',
        'emporioarmani-boxer-large.jpg',
        'emporioarmani-slip_set-large.jpg',
        'moschino-basic_thong-large.jpg',
        'moschino-slip-large.jpg',
        'oysho-perizoma-large.jpg',
        
    ];


    public function run(Faker $faker)
    {

        $counter = 0;

        foreach($this->macroCategories as $macroCategory => $subCategories) {

            $currentCategory = Category::create(['name' => $macroCategory]);

            foreach($subCategories as $category => $products) {

                $savedCategory = Category::create([
                    'name' => $category, 
                    'parent_id' => $currentCategory->id
                    ]);
                
                foreach($products as $index => $product) {

                    $product = Product::create([
                        'name' => $product,
                        'price' => $faker->randomFloat(1, 20, 150),
                        'description' => $faker->sentence(10),
                        'brand_id' => $faker->numberBetween(1, 25)
                    ]);

                    $product->categories()->attach($savedCategory->id);
                    
                    $product->addMedia(
                        storage_path('app/public/' . $category . '/' . $this->fullProductName[$counter])
                        )->toMediaCollection();
                     

                    $counter = $counter + 1;
                }

            }

        }


        
    }
}
