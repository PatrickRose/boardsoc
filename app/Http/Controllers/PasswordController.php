<?php

namespace BoardSoc\Http\Controllers;

use Illuminate\Http\Request;
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

    public function postReset(Request $request)
    {
	$this->validate($request, [
	    'token' => 'required',
	    'email' => 'required|email',
	    'password' => 'required|confirmed',
	]);

	$credentials = $request->only(
	    'email', 'password', 'password_confirmation', 'token'
	);

	$response = $this->passwords->reset($credentials, function($user, $password)
	    {
		$user->password = $password;

		$user->save();

		$this->auth->login($user);
	    });

	switch ($response)
	{
	    case PasswordBroker::PASSWORD_RESET:
	    return redirect($this->redirectPath());

	    default:
	    return redirect()->back()
			     ->withInput($request->only('email'))
			     ->withErrors(['email' => trans($response)]);
	}
    }

}
