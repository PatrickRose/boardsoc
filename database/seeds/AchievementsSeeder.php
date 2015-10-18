<?php

use BoardSoc\Achievement;
use Illuminate\Database\Seeder;

class AchievementsSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker\Factory::create();

        foreach(range(1, 30) as $id)
        {
            Achievement::create([
                'name' => $faker->sentence . $id,
                'description' => $faker->paragraph()
            ]);
        }
        Achievement::create([
            'name' => "$id: ". $faker->sentence,
            'description' => $faker->paragraph()
        ]);
    }

}