<?php

class AccessibleURLsCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function accessTheBasePage(FunctionalTester $I)
    {
        $I->am('a user');
        $I->amGoingTo('visit the main page');
        $I->lookForwardTo('seeing all the information');

        $I->amOnPage('/');
        $I->canSeeCurrentRouteIs('home');
        $I->canSeeResponseCodeIs(200);
        $I->canSeeInTitle('Welcome!');
        $I->canSee('Welcome to the Sheffield University Board Gaming Society');
    }

    public function accessTheAboutPage(FunctionalTester $I)
    {
        $I->am('a user');
        $I->amGoingTo('visit the about page');
        $I->lookForwardTo('learning about BoardSoc');

        $I->amOnPage('/about');
        $I->canSeeCurrentRouteIs('about');
        $I->canSeeResponseCodeIs(200);
        $I->canSeeInTitle('About');
        $I->canSee('Sheffield University Board Gaming Society was set up');
    }
}
