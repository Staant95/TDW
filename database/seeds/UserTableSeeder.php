<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 5)
            ->create()
            ->each(function($user) {
                $cart = App\Cart::create(['user_id' => $user->id]);

            });
        $me = App\User::create(['name' => 'stas', 'email' => 'stas@gmail.com', 'password' => Hash::make('secret')]);
        App\Cart::create(['user_id' => $me->id]);

    }
}
