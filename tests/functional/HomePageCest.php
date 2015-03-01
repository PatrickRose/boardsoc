<?php
use \FunctionalTester;

class HomePageCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('home');
    }

    public function canVisitTheAboutPage(FunctionalTester $I)
    {
        $I->click('read more here', '.col-md-4');

        $I->amOnRoute('about');
    }

    public function canVisitTheLibraryPage(FunctionalTester $I)
    {
        $I->click('take a look at the games we have available');

        $I->amOnRoute('library.index');
    }
}