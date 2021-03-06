<?php

abstract class UserTests
{

    /**
     * @var BoardSoc\User
     */
    protected $committeeUser;

    /**
     * @var BoardSoc\User
     */
    protected $user;

    protected function createUsers()
    {
        $committeeUser = new \BoardSoc\User(
            [
                'email' => 'pjr0911025@gmail.com',
                'password' => 'admin',
            ]
        );
        $committeeUser->is_committee = true;
        $committeeUser->save();
        $this->committeeUser = $committeeUser;

        $user = \BoardSoc\User::create(
            [
                'email' => 'user@example.com',
                'password' => 'user',
            ]
        );
        $this->user = $user;
    }
}