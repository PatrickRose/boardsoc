<?php namespace BoardSoc\Http\Controllers;

use BoardSoc\Http\Requests;
use BoardSoc\Http\Controllers\Controller;

use Illuminate\Http\Request;
use View;

class StaticPagesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('index');
	}

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function about()
    {
        return View::make('about');
    }
}