<?php
use BoardSoc\Game;
use \FunctionalTester;

require_once('UserTests.php');

class LibraryCest extends UserTests
{

    /**
     * @var BoardSoc\BoardGameGeekGame[]
     */
    protected $games = [];

    /**
     * @var BoardSoc\Game[]
     */
    protected $libraryGames;

    public function _before(FunctionalTester $I)
    {
        $this->createUsers();
        $this->games = [];
        $this->libraryGames = [];
    }

    public function addSomethingToTheLibrary(FunctionalTester $I)
    {
        $I->amLoggedAs($this->committeeUser);
        $I->amOnRoute('admin.index');
        $I->click('Add game to library');

        $I->seeCurrentRouteIs('library.create');

        $I->submitForm('form', ['boardgamegeekid' => 1, 'deposit' => 3]);

        $I->see('Game added to library');
        $I->seeCurrentRouteIs('admin.index');
        $I->seeRecord('games', [
            'board_game_geek_game_id' => 1,
            'deposit' => 3
        ]);
        $I->seeRecord('board_game_geek_games', [
            'id' => 1,
            'name' => 'Die Macher',
            'minplayers' => 3,
            'maxplayers' => 5,
            'image' => '//cf.geekdo-images.com/images/pic159509.jpg',
        ]);
    }

    public function viewTheLibrary(FunctionalTester $I)
    {
        $this->createLibraryGames();

        $I->amOnRoute('library.index');
        foreach($this->libraryGames as $game)
        {
            $I->see($game->boardGameGeekGame->name);
            $I->see($game->deposit);
        }
    }

    public function getAskedToLogIn(FunctionalTester $I)
    {
        $I->amOnRoute('library.create');

        $I->seeIAmAskedToLogIn();
    }

    public function mustBeLoggedInToAddGamesToTheLibrary(FunctionalTester $I)
    {
        $I->amLoggedAs($this->user);
        $I->amOnRoute('library.create');

        $I->seeCurrentUrlEquals('');
    }

    public function loanAGameFromTheLibrary(FunctionalTester $I)
    {
        $this->createLibraryGames(1);

        $I->amLoggedAs($this->user);
        $I->amOnRoute('library.index');
        $I->click('Loan this game');

        $I->seeRecord('loans', [
            'user_id' => $this->user->id,
            'game_id' => $this->libraryGames[0]->id,
            'date_until' => null,
        ]);

        $I->see('Game loaned!');
        $I->see('You have requested this game...');
        $I->see('This loan will time out in');
    }

    public function canCompleteTheLoan(FunctionalTester $I)
    {
        $this->createLibraryGames(1);
        $loan = $this->libraryGames[0]->loanTo($this->user);
        $attributes = $loan->attributesToArray();
        $I->amLoggedAs($this->committeeUser);

        $I->seeRecord('loans', $attributes);
        $I->amOnRoute('loan.confirm', ['loan' => $loan]);
        $I->dontSeeRecord('loans', $attributes);

        unset($attributes['date_until']);
        $I->seeRecord('loans', $attributes);
    }

    public function getAskedToLogInWhenConfirmingALoan(FunctionalTester $I)
    {
        $this->createLibraryGames(1);
        $loan = $this->libraryGames[0]->loanTo($this->user);
        $I->amOnRoute('loan.confirm', ['loan' => $loan]);

        $I->seeIAmAskedToLogIn();
    }

    public function getErrorsWhenCompletingALoanWhenNotAdmin(FunctionalTester $I)
    {
        $this->createLibraryGames(1);
        $loan = $this->libraryGames[0]->loanTo($this->user);
        $I->amLoggedAs($this->user);
        $I->amOnRoute('loan.confirm', ['loan' => $loan]);

        $I->seeCurrentUrlEquals('');
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