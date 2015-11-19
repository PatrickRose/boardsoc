<?php

require_once __DIR__ . '/UserTests.php';

class AuthenticationCest extends UserTests
{

    public function _before(FunctionalTester $I)
    {
        $this->createUsers();
    }

    public function seeCommitteePage(FunctionalTester $I)
    {
        $I->am('a committee member');
        $I->amGoingTo('look at the committee backend');
        $I->lookForwardTo('seeing the options I have');

        $I->amLoggedAs($this->committeeUser);
        $I->amOnPage('/');
        $I->canSee('Admin');
        $I->click('Admin');
        $I->canSeeResponseCodeIs(200);
        $I->amOnRoute('admin.index');
        $I->canSee('Committee Admin Page');
    }

    public function checkThatOnlyCommitteeMembersCanSeePage(FunctionalTester $I)
    {
        $I->am('a naughty hacker');
        $I->amGoingTo("look at the committee backend though I shouldn't");
        $I->lookForwardTo('not being able to look at it');

        $I->amLoggedAs($this->user);
        $I->amOnRoute('admin.index');
        $I->seeCurrentUrlEquals('');
        $I->dontSee('Committee Admin Page');
        $I->see('You are not authorised to do that');
    }

    public function checkThatYouHaveToLogInToViewThePage(FunctionalTester $I)
    {
        $I->am('a naughty hacker');
        $I->amGoingTo("look at the committee backend though I shouldn't");
        $I->lookForwardTo('not being able to look at it');

        $I->amOnRoute('admin.index');
        $I->dontSee('Committee Admin Page');
        $I->see('You must log in to do that');
    }

    public function signUpANewUser(FunctionalTester $I)
    {
        $I->am('a committee member');
        $I->amGoingTo('sign up a new user');
        $I->lookForwardTo('them having an account');

        $I->amLoggedAs($this->committeeUser);
        $I->amOnRoute('admin.index');
        $I->click('Sign someone up');
        $I->fillField('name', 'Jack Doe');
        $I->fillField('email', 'testcodecept@example.com');
        $I->click('Sign them up');

        $I->see('User created');
        $I->seeRecord('users', [
            'name' => 'Jack Doe',
            'email' => 'testcodecept@example.com'
        ]);
        $I->dontSeeRecord('users', [
            'name' => 'Jack Doe',
            'email' => 'testcodecept@example.com',
            'password' => null,
        ]);
        $I->dontSeeRecord('users', [
            'name' => 'Jack Doe',
            'email' => 'testcodecept@example.com',
            'password' => '',
        ]);
    }

    public function getAskedToLogIn(FunctionalTester $I)
    {
        $I->amOnRoute('users.create');

        $I->seeIAmAskedToLogIn();
    }

    public function getValidationErrors(FunctionalTester $I)
    {
        $I->am('a committee member');
        $I->amGoingTo('sign up a new user');
        $I->lookForwardTo('them having an account');

        $I->amLoggedAs($this->committeeUser);
        $I->amOnRoute('admin.index');
        $I->click('Sign someone up');
        $I->fillField('name', 'Jack Doe');
        $I->click('Sign them up');

        $I->dontSee('User created');
        $I->dontSeeRecord('users', [
            'name' => 'Jack Doe',
            'email' => 'testcodecept@example.com'
        ]);
    }

    public function getToldIDontHavePermission(FunctionalTester $I)
    {
        $I->amLoggedAs($this->user);

        $I->amOnRoute('users.create');
        $I->seeCurrentUrlEquals('');
    }

    public function logoutFromAnyPage(FunctionalTester $I)
    {
        $I->amLoggedAs($this->committeeUser);

        $I->amOnRoute('home');
        $I->click('Log Out');
        $I->dontSeeAuthentication();
    }
}
