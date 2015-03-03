<?php
use \FunctionalTester;

class AuthenticationCest
{
    protected $committeeUser;
    protected $user;

    public function _before(FunctionalTester $I)
    {
        $committeeUser = \BoardSoc\User::create([
            'email' => 'admin@example.com',
            'password' => 'admin',
        ]);
        $committeeUser->is_committee = true;
        $this->committeeUser = $committeeUser;

        $user = \BoardSoc\User::create([
            'email' => 'user@example.com',
            'password' => 'user',
        ]);
        $this->user = $user;
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
        $I->fillField('email', 'jack@example.com');
        $I->click('Sign them up');

        $I->see('User created');
        $I->seeRecord('users', [
            'name' => 'Jack Doe',
            'email' => 'jack@example.com'
        ]);
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
            'email' => 'jack@example.com'
        ]);
    }

    public function loginFromTheMainPage(FunctionalTester $I)
    {
        $I->am('a committee member');
        $I->amGoingTo('log in');
        $I->lookForwardTo('logging in');

        $I->amOnRoute('home');
        $I->submitForm('.login', [
            'email' => $this->committeeUser->email,
            'password' => 'admin'
        ]);
        $I->seeAuthentication();
    }

    public function logoutFromAnyPage(FunctionalTester $I)
    {
        $I->amLoggedAs($this->committeeUser);

        $I->amOnRoute('home');
        $I->click('Log out');
        $I->dontSeeAuthentication();
    }
}