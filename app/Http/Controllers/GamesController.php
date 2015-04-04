<?php namespace BoardSoc\Http\Controllers;

use BoardSoc\Http\Requests;
use BoardSoc\Http\Controllers\Controller;

use BoardSoc\Repositories\BoardGameGeekRepository;
use Illuminate\Http\Request;

class GamesController extends Controller {

    /**
     * @var BoardGameGeekRepository
     */
    private $boardGameGeekRepository;

    function __construct(BoardGameGeekRepository $boardGameGeekRepository)
    {
        $this->boardGameGeekRepository = $boardGameGeekRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param $searchTerm
     * @return Response
     */
	public function search($searchTerm)
	{
		$games = $this->boardGameGeekRepository->search($searchTerm);

        return $games->toJson();
	}

}
