<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = Item::factory()
            ->count(20)
            ->create();

        User::all()->each(function (User $user) use ($items) {
            $user->items()->attach(
                $items->random(5),
                ['quantity' => 1]
            );
        });
    }
}
