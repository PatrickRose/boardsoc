<?php

use Illuminate\Database\Seeder;

class LibrarySeeder extends Seeder {

    private $repo;

    public function __construct(BoardSoc\Repositories\BoardGameGeekRepository $repo)
    {
        $this->repo = $repo;
    }

    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('events')->delete();

        foreach(range(1, 30) as $id)
        {
            try {
                $this->repo->get($id);
            }
            catch (Exception $e)
            {
                $game = new BoardSoc\BoardGameGeekGame();
                $game->id = $id;
                $game->minplayers = $faker->randomNumber;
                $game->maxplayers = $faker->randomNumber;
                $game->image = $faker->imageUrl();
                $game->name = $faker->sentence;
                $game->save();
            }
            BoardSoc\Game::create([
                'board_game_geek_game_id' => $id,
                'deposit' => $faker->randomNumber
            ]);
        }
    }

}
