<?php
use BoardSoc\User;

class UserDetailsCest
{
    /**
     * @var User
     */
    protected $user;

    public function _before(FunctionalTester $I)
    {
        $this->user = User::create([
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => 'hello',
        ]);
        $I->amLoggedAs($this->user);
        $I->amOnRoute('home');
    }

    // tests
    public function changeMyPassword(FunctionalTester $I)
    {
        $I->click('My Details');

        $password = $this->user->password;

        $I->amOnRoute('users.edit', ['user' => $this->user]);
        $I->submitForm('form', [
            'password' => 'FooBar',
            'password_confirmation' => 'FooBar',
        ]);
        $I->seeRecord('users', [
            'email' => $this->user->email,
        ]);
        $I->see('Details updated');

        $I->dontSeeRecord('users', [
            'email' => $this->user->email,
            'password' => $password
        ]);

        $I->click('Log Out');
        $I->amOnPage('/login');
        $I->submitForm('.form-horizontal', [
            'email' => $this->user->email,
            'password' => 'FooBar'
        ]);
        $I->seeAuthentication();
    }

    public function notInputtingAPasswordDoesntChangeIt(FunctionalTester $I)
    {
        $I->amOnRoute('users.edit', ['user' => $this->user]);
        $I->submitForm('form', []);

        $I->seeRecord('users', $this->user->getAttributes());
    }

    public function notConfirmingYourPasswordIsAnError(FunctionalTester $I)
    {
        $I->amOnRoute('users.edit', ['user' => $this->user]);
        $I->submitForm('form', ['password' => 'FooBar']);

        $I->seeRecord(
            'users',
            [
                'password' => $this->user->password,
                'email' => $this->user->email,
            ]
        );
        $I->see('The password confirmation does not match.');
    }

    public function iCanOptInToReceivingEmails(FunctionalTester $I)
    {
        $I->amOnRoute('users.edit', ['user' => $this->user]);
        $I->checkOption('mayemail');
        $I->submitForm('form', []);

        $I->seeRecord(
            'users',
            [
                'mayemail' => 1,
                'email' => $this->user->email,
            ]
        );
    }

    public function iCanDeleteMyAccount(FunctionalTester $I)
    {
        $I->amOnRoute('users.edit', ['user' => $this->user]);
        $I->submitForm('form.delete', [], 'Delete account');

        $I->dontSeeRecord('users', ['email' => $this->user->email]);
    }
}
