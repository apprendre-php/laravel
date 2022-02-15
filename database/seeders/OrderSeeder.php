<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::all()->random(15)->each(function (User $user) {
            $orders = Order::factory()->count(rand(1, 5))->make();

            $user->orders()->saveMany($orders);

            $orders->each(function (Order $order) {
                $items = Item::all()->random(rand(2, 4));

                foreach ($items as $item) {
                    $order->items()->attach($item, ['quantity' => rand(1, 10)]);
                }
            });
        });
    }
}
