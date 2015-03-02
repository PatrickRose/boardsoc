<?php namespace BoardSoc\Http\Controllers;

use BoardSoc\Http\Requests;
use BoardSoc\Http\Controllers\Controller;

use BoardSoc\Http\Requests\SignUpUsers;
use BoardSoc\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Psy\Command\DumpCommand;
use Redirect;
use View;

class UsersController extends Controller {

    /**
     * @var Redirector
     */
    private $redirector;

    function __construct(Redirector $redirector)
    {
        $this->redirector = $redirector;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $this->middleware('auth.admin');

        return View::make('users.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param SignUpUsers $signUpUsers
     * @return Response
     */
	public function store(SignUpUsers $signUpUsers)
	{
        $user = User::create(\Input::all());
        $user->setPasswordAttribute(str_random(8));

        \Flash::info('User created');

        return $this->redirector->route('admin.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
