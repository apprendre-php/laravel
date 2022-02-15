<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement([
                'Clavier',
                'Souris',
                'PC Portable',
                'Carte graphique',
            ]),
            'thumbnail' => $this->faker->imageUrl(),
            'price' => $this->faker->randomFloat(2, 1, 5000),
            'quantity' => $this->faker->randomNumber(3),
            'description' => $this->faker->sentence(),
        ];
    }
}
