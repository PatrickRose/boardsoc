<?php namespace BoardSoc\Http\Controllers;

use BoardSoc\BoardGameGeekGame;
use BoardSoc\Game;
use BoardSoc\Http\Requests;
use BoardSoc\Http\Controllers\Controller;

use BoardSoc\Http\Requests\AddGameToLibrary;
use BoardSoc\Repositories\BoardGameGeekRepository;
use Illuminate\Http\Request;

class LibraryController extends Controller {

    /**
     * @var BoardGameGeekRepository
     */
    private $boardGameGeekRepository;

    function __construct(BoardGameGeekRepository $boardGameGeekRepository)
    {
        $this->middleware('auth.admin', ['only' => ['create', 'store']]);
        $this->boardGameGeekRepository = $boardGameGeekRepository;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $games = Game::with('boardGameGeekGame')->get();

		return \View::make('library.index', compact('games'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return \View::make('library.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param AddGameToLibrary $addGameToLibrary
     * @return Response
     */
	public function store(AddGameToLibrary $addGameToLibrary)
	{
        $game = $this->boardGameGeekRepository->get(
            $addGameToLibrary->get('boardgamegeekid')
        );

        $libraryGame = new Game($addGameToLibrary->all());
        $libraryGame->boardGameGeekGame()->associate($game);
        $libraryGame->save();

        \Flash::success('Game added to library');
        return \Redirect::route('admin.index');
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
