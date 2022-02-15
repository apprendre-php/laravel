<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::get('https://fakestoreapi.com/products/category/electronics?limit=5')->body();

        $items = json_decode($response);

        foreach ($items as $item) {
            Item::factory()->create([
                'name' => $item->title,
                'price' => $item->price,
                'description' => $item->description,
                'thumbnail' => $item->image,
            ]);
        }
    }
}
