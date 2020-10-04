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
                App\Cart::create(['user_id' => $user->id]);
                App\Wishlist::create(['user_id' => $user->id]);
            });
        $me = App\User::create(['name' => 'Stas', 'lastname' => 'Bardosh', 'email' => 'stas@gmail.com', 'password' => Hash::make('secret')]);
        $admin = App\Role::find(3);
        App\Address::create([
            'city' => 'Rieti',
            'street' => 'Viale T. Morroni',
            'zip' => '02100',
            'user_id' => $me->id
        ]);
        $admin->users()->save($me);
        App\Cart::create(['user_id' => $me->id]);
        App\Wishlist::create(['user_id' => $me->id]);
    }
}
