<?php
use \FunctionalTester;

class NavigationLinksCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('/');
    }

    public function accessTheHomePage(FunctionalTester $I)
    {
        $I->click('Home');

        $I->canSeeCurrentUrlEquals('');
        $I->canSeeResponseCodeIs(200);
    }

    public function accessTheHomePageUsingTheBrand(FunctionalTester $I)
    {
        $I->click('BoardSoc');

        $I->canSeeCurrentUrlEquals('');
        $I->canSeeResponseCodeIs(200);
    }

    public function accessTheAboutPage(FunctionalTester $I)
    {
        $I->click('About');

        $I->canSeeCurrentRouteIs('about');
        $I->canSeeResponseCodeIs(200);
    }

    public function accessTheEventsPage(FunctionalTester $I)
    {
        $I->click('Events');

        $I->canSeeCurrentRouteIs('events.index');
        $I->canSeeResponseCodeIs(200);
    }

    public function accessTheLibraryPage(FunctionalTester $I)
    {
        $I->click('Library');

        $I->canSeeCurrentRouteIs('library.index');
        $I->canSeeResponseCodeIs(200);
    }
}