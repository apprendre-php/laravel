<?php

namespace Database\Seeders;

use App\Models\Guild;
use App\Models\User;
use Illuminate\Database\Seeder;

class GuildSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Guild::factory()
            ->count(5)
            ->hasAttached(User::all()->random(20))
            ->create();
    }
}
