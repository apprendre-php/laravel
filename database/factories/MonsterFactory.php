<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MonsterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                'Aatrox',
                'Annie',
                'Ahri',
                'Alistar',
                'Amumu',
                'Ashe',
                'Brand',
                'Bard',
                'Azir',
                'Caitlyn',
                'Jinx',
                'Braum',
                'Draven',
                'Diana',
                'Darius',
                'Ekko',
                'Victor',
                'Garen',
                "Gnar",
                "Gragas",
                'Graves',
            ]),
        ];
    }
}
