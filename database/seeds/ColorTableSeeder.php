<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Colour;

class ColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $colours = [
        'White',
        'Yellow',
        'Black',
        'Green',
        'Blue',
        'Violet',
        'Brown',
        'Red',
        'Orange'            
    ];

    
    public function run()
    {
        foreach($this->colours as $colour) {
            Colour::create(['type' => $colour]);
        }
    }
    
}
