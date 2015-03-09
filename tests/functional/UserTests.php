<?php

abstract class UserTests
{

    protected $committeeUser;
    protected $user;

    protected function createUsers()
    {
        $committeeUser = \BoardSoc\User::create(
            [
                'email' => 'pjr0911025@gmail.com',
                'password' => 'admin',
            ]
        );
        $committeeUser->is_committee = true;
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