<?php
use \FunctionalTester;

class SearchingCest
{

    public function searchBoardGameGeek(FunctionalTester $I)
    {
        $I->amOnRoute('games.search', ['search' => 'citadels']);

        $I->see('citadels');
    }

    private function createLibraryGames($number = 3)
    {
        /** @var \BoardSoc\Repositories\BoardGameGeekRepository $repo */
        $repo = App::make('BoardSoc\Repositories\BoardGameGeekRepository');

        foreach(range(1, $number) as $id)
        {
            $game = $repo->get($id);
            $libraryGame = new Game();
            $libraryGame->deposit = $id;
            $libraryGame->boardGameGeekGame()->associate($game);
            $libraryGame->save();

            $this->games[] = $game;
            $this->libraryGames[] = $libraryGame;
        }
    }
}