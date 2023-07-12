<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PlayersSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $playerTypes = DB::table('player_types')->pluck('id');

        foreach (range(1, 8) as $index) {
            DB::table('players')->insert([
                'name' => $faker->name,
                'ability' => $faker->numberBetween(1, 10),
                'force' => $faker->numberBetween(1, 10),
                'speed' => $faker->numberBetween(1, 10),
                'player_type_id' => $playerTypes->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

