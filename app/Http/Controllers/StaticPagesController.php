<?php namespace BoardSoc\Http\Controllers;

use BoardSoc\Event;
use BoardSoc\Http\Requests;
use BoardSoc\Http\Controllers\Controller;

use Carbon\Carbon;
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
        $events = Event::where('date', '>', Carbon::now())->orderBy('date')->limit(1)->get();

        return View::make('index')->with('events', $events);
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
