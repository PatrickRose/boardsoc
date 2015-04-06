<?php

require_once 'UserTests.php';

class UserGamesCest extends UserTests
{
    public function _before(FunctionalTester $I)
    {
        $this->createUsers();
        $I->amLoggedAs($this->user);
    }

    public function addAGameToMyCollection(FunctionalTester $I)
    {
        $I->amOnRoute('users.games.create', ['users' => $this->user]);

        $I->fillField('board_game_geek_id[0]', 1);
        $I->click('Add game to library');

        $I->see('Die Macher');
        $I->see('added to your collection');
        $I->seeRecord(
            'board_game_geek_game_user',
            [
                'board_game_geek_game_id' => 1,
                'user_id' => $this->user->id,
            ]
        );
    }

    public function seeMyCollection(FunctionalTester $I)
    {
        $ids = [1, 2, 3, 5];
        /** @var \BoardSoc\Repositories\BoardGameGeekRepository $repo */
        $repo = App::make('BoardSoc\Repositories\BoardGameGeekRepository');
        $games = $repo->getMany($ids);
        $this->user->games()->sync($ids);

        $I->amOnRoute('users.show', ['users' => $this->user]);
        foreach ($games as $game) {
            $I->see($game->name);
        }

        $notThere = $repo->getMany([10, 11]);
        foreach ($notThere as $game) {
            $I->dontSee($game->name);
        }
    }

    public function addGamesFromBoardGameGeek(FunctionalTester $I)
    {
        $I->amOnRoute('users.games.create', ['users' => $this->user]);

        $I->fillField('boardgamegeekusername', 'DrugCrazed');
        $I->click('Get games from BGG');

        $I->see('Games imported from board game geek');
        $I->seeRecord(
            'board_game_geek_game_user',
            [
                'user_id' => $this->user->id
            ]
        );
    }

    public function removeGamesFromCollection(FunctionalTester $I)
    {
        $ids = [1, 2];
        /** @var \BoardSoc\Repositories\BoardGameGeekRepository $repo */
        $repo = App::make('BoardSoc\Repositories\BoardGameGeekRepository');
        $games = $repo->getMany($ids);
        $this->user->games()->sync($ids);
        $I->seeRecord(
            'board_game_geek_game_user',
            [
                'user_id' => $this->user->id,
                'board_game_geek_game_id' => 1
            ]
        );
        $I->seeRecord(
            'board_game_geek_game_user',
            [
                'user_id' => $this->user->id,
                'board_game_geek_game_id' => 2
            ]
        );

        $I->amOnRoute('users.show', ['users' => $this->user->id]);
        $I->click('Remove "Die Macher"');

        $I->dontSee($games[0]->name);
        $I->see($games[1]->name);

        $I->see('Game removed');

        $I->dontSeeRecord(
            'board_game_geek_game_user',
            [
                'user_id' => $this->user->id,
                'board_game_geek_game_id' => 1
            ]
        );
        $I->seeRecord(
            'board_game_geek_game_user',
            [
                'user_id' => $this->user->id,
                'board_game_geek_game_id' => 2
            ]
        );
    }
}