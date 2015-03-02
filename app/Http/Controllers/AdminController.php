<?php namespace BoardSoc\Http\Controllers;

use BoardSoc\Http\Middleware\AuthenticateAdmin;
use BoardSoc\Http\Requests;
use BoardSoc\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function __construct(AuthenticateAdmin $authenticateAdmin)
    {
        $this->middleware('auth.admin');
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return \View::make('admin.index');
	}
}
