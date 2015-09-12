<?php

namespace BoardSoc\Http\Controllers;

use BoardSoc\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    protected $redirectTo = '/';

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct(\Illuminate\Contracts\Auth\PasswordBroker $passwords, \Illuminate\Contracts\Auth\Guard $auth)
    {
        $this->middleware('guest');
	$this->passwords = $passwords;
	$this->auth = $auth;
    }
}
