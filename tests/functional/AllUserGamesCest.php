<?php

require_once 'UserTests.php';

class AllUserGamesCest extends UserTests
{

    private $cache = [];

    private $allNames = [];

    public function _before(FunctionalTester $I)
    {
        $this->cache = [];
        $this->allNames = [];
        $ids = range(1, 5);
        /** @var \BoardSoc\Repositories\BoardGameGeekRepository $repo */
        $repo = App::make('BoardSoc\Repositories\BoardGameGeekRepository');
        $repo->getMany(array_merge($ids, [6]));
        $faker = Faker\Factory::create('en-gb');

        foreach (range(1, 5) as $i) {
            $this->cache[$i] = [];
            $user = \BoardSoc\User::create(
                [
                    'name' => $faker->name,
                    'email' => $faker->email,
                    'password' => $faker->word
                ]
            );

            $gamesForUser = array_slice($ids, 0, $i);
            $this->allNames[] = $user->name;
            $user->games()->sync($gamesForUser);

            foreach ($gamesForUser as $game)
            {
                $this->cache[$game][] = $user->name;
            }
        }
    }

    public function canSeeTheFullListOfUserGames(FunctionalTester $I)
    {
        $I->amOnRoute('games.index');

        /** @var \BoardSoc\Repositories\BoardGameGeekRepository $repo */
        $repo = App::make('BoardSoc\Repositories\BoardGameGeekRepository');
        $games = $repo->getMany([1,2,3,4,5]);
        foreach($games as $game)
        {
            $I->canSee($game->name);
            $id = $game->id;
            $I->canSeeElement("#boardgamegeek-{$id}");

            $I->canSeeNumberOfElements("#boardgamegeek-{$id} .owned-by", count($this->cache[$id]));

            foreach($this->cache[$id] as $expectedName)
            {
                $I->canSee($expectedName, "#boardgamegeek-{$id} .owned-by");
            }

            foreach(array_diff($this->allNames, $this->cache[$id]) as $dontSee)
            {
                $I->cantSee($dontSee, "#boardgamegeek-{$id} .owned-by");
            }
        }

        $I->cantSeeElement('#boardgamegeek-6');
    }
}
