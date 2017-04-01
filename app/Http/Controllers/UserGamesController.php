<?php namespace BoardSoc\Http\Controllers;

use Auth;
use BoardSoc\Http\Requests;
use BoardSoc\Http\Controllers\Controller;

use BoardSoc\Http\Requests\BoardGameGeek;
use BoardSoc\Http\Requests\UserGamesAdd;
use BoardSoc\Repositories\BoardGameGeekRepository;
use BoardSoc\User;
use Illuminate\Http\Request;
use Redirect;
use View;

class UserGamesController extends Controller {

	/**
	 * @var BoardGameGeekRepository
	 */
	private $boardGameGeekRepository;

	public function __construct(BoardGameGeekRepository $boardGameGeekRepository)
	{
		$this->boardGameGeekRepository = $boardGameGeekRepository;
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
		return View::make('users.games.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param UserGamesAdd $userGamesAdd
	 * @return Response
	 */
	public function store(UserGamesAdd $userGamesAdd)
	{
		$bggIds = $userGamesAdd->get('board_game_geek_id');

		$games = $this->boardGameGeekRepository->getMany($bggIds);

		if ($games->count() > 0) {
			$user = Auth::user();
			$user->games()->attach($bggIds);

			foreach($games as $game)
			{
				\Flash::success(
					sprintf('"%s" added to your collection', $game->name)
				);
			}
		}

		return Redirect::back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param      $user
	 * @param  int $id
	 * @return Response
	 */
	public function destroy($user, $id)
	{
		if (Auth::id() != $user)
		{
			return Redirect::back();
		}

		Auth::user()->games()->detach($id);

		\Flash::success('Game removed');

		return Redirect::back();
	}

	public function boardgamegeek(BoardGameGeek $boardGameGeek)
	{
		$user = Auth::user();
		$games = $this->boardGameGeekRepository->getUserGames($boardGameGeek->get('boardgamegeekusername'));
		$ids = [];

		foreach($games as $game)
		{
			$ids[] = $game->id;
		}

		$user->games()->attach($ids);

		\Flash::success('Games imported from Board Game Geek');

		return Redirect::route('users.games.create', ['users' => $user]);
	}

}
