<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('events')->delete();

        foreach(range(1, 30) as $event)
        {
            BoardSoc\Event::create([
                'name' => $event . $faker->sentence,
                'date' => $faker->dateTimeBetween('now', '+ 7 days'),
                'details' => $faker->paragraph,
                'facebook' => $faker->randomNumber
            ]);
        }
    }

}
