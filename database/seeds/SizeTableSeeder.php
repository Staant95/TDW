<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Size;

class SizeTableSeeder extends Seeder
{
  
    private $clotheSizes = [
        's',
        'm',
        'l',
        'xl',
        'xxl'
    ];


    public function run(Faker $faker)
    {
        foreach($this->clotheSizes as $size) {

            Size::create(['size' => $size]);
        }

        for($i = 35; $i < 43; $i++) {
            Size::create(['size' => $i]);
        }
    }
}
