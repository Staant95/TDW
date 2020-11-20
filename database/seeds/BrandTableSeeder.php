<?php

use Illuminate\Database\Seeder;
use App\Brand;

class BrandTableSeeder extends Seeder
{
  
    protected $brands = [
        'Levis',
        'Timberland',
        'Tommy Jeans',
        'Wolford',
        'adidas',
        'aldo',
        'american eagle',
        'annafield',
        'bershka',
        'bonobo',
        'carhart',
        'celio',
        'champion',
        'clavin klein',
        'defacto',
        'diadora',
        'emporio armani',
        'iconeyewear',
        'jack&jones',
        'jeepers peepers',
        'jordan',
        'kappa',
        'levis',
        'moschino',
        'nike',
        'numph',
        'only&sons',
        'oysho',
        'pimkie',
        'pull&bear',
        'puma',
        'quicksilver',
        'solid',
        'the north face',
        'tommy hilfiger',
        'tom tailor',
        'twisted tailor',
        'urban classics',
        'vans',
    ];


    public function run()
    {
        foreach($this->brands as $brand) {
            Brand::create(['name' => $brand]);
        }
    }
}
