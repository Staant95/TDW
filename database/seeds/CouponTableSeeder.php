<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Coupon;

class CouponTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            'code' => Str::random(5),
            'value' => 10
        ]);
        Coupon::create([
            'code' => Str::random(5),
            'value' => 15
        ]);
        Coupon::create([
            'code' => Str::random(5),
            'value' => 20
        ]);
    }
}
