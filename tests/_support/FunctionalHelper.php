<?php
namespace Codeception\Module;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FunctionalHelper extends \Codeception\Module
{

    public function seeIAmAskedToLogIn()
    {
        /** @var Laravel5 $laravel5 */
        $laravel5 = $this->getModule('Laravel5');

        $laravel5->seeCurrentUrlEquals('/auth/login');
    }

    public function dontSeeIAmAskedToLogIn()
    {
        /** @var Laravel5 $laravel5 */
        $laravel5 = $this->getModule('Laravel5');

        $laravel5->dontSeeCurrentUrlEquals('/auth/login');
    }

}
