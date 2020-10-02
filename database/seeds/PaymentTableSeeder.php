<?php

use Illuminate\Database\Seeder;
use App\Payment;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::create(['type' => 'Visa']);
        Payment::create(['type' => 'American Express']);
        Payment::create(['type' => 'Master Card']);
    }
}
