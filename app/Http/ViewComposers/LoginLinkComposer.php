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
            $loginForm = \Form::open([
                'url' => url('auth/login'),
                'class' => 'navbar-form navbar-right login',
            ]);
            $loginForm .= '<div class="form-group">';
            $loginForm .= \Form::label('email',
                'Email',
                [
                    'class' => 'sr-only'
                ]
            );
            $loginForm .= \Form::email(
                'email',
                null,
                [
                    'placeholder' => 'Email...'
                ]
            );
            $loginForm .= '</div>';

            $loginForm .= '<div class="form-group">';
            $loginForm .= \Form::label('password',
                'Password',
                [
                    'class' => 'sr-only'
                ]
            );
            $loginForm .= \Form::password(
                'password',
                null,
                [
                    'placeholder' => 'Password...'
                ]
            );
            $loginForm .= '</div>';

            $loginForm .= \Form::submit('Log in');
            $loginForm .= \Form::close();
        } else {
            $logoutLink = \Navigation::links([
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