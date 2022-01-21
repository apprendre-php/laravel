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
            'name' => $this->faker->unique()->randomElement([
                'Bouclier',
                'Bottes',
                'Baguette trop grosse',
                'Potion de soin',
                'Arc',
                'Epée',
                'Elixir de force',
                'Bandage',
                'Marteau de bronze',
                'Dagues',
                'Anneau de robustesse',
                'Salade de fruit',
                'Cape',
                'Happy Meal',
                'Baton du vide',
                'Faux spectral',
                'Cookie',
                'Collier de regénération',
                "Lame d'infini",
                "Coiffe de puissance",
                'Coques en acier',
            ]),
        ];
    }
}
