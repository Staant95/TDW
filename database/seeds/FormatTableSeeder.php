<?php

use Illuminate\Database\Seeder;

class FormatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Format::class, 10)->create();
    }
}
