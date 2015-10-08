<?php

namespace BoardSoc\Http\ViewComposers;


use Bootstrapper\Button;
use Bootstrapper\Form;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\View\View;

class LoginLinkComposer
{

    public function compose(View $view)
    {
        if (\Auth::guest()) {
            $loginForm = \Navigation::links([
                [
                    'title' => 'Log in',
                    'link' => url('auth/login')
                ]
            ])->withAttributes(['class' => 'navbar-right']);
        } else {
            $logoutLink = \Navigation::links([
                [
                    'title' => 'My Games',
                    'link' => route('users.show', ['user' => \Auth::user()]),
                ],
                [
                    'title' => 'My Details',
                    'link' => route('users.edit', ['user' => \Auth::user()]),
                ],
                [
                    'title' => 'Log Out',
                    'link' => url('auth/logout'),
                ],
            ])->withAttributes(['class' => 'navbar-right']);
        }

        $view->with(
            'loginFormOrLogoutLink',
            isset($loginForm) ? $loginForm : $logoutLink
        );
    }
}
