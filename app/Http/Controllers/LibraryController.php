<?php namespace BoardSoc\Http\Controllers;

use BoardSoc\Game;
use BoardSoc\Http\Requests;
use BoardSoc\Http\Requests\AddGameToLibrary;
use BoardSoc\Loan;
use BoardSoc\Repositories\BoardGameGeekRepository;
use BoardSoc\User;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{

    /**
     * @var BoardGameGeekRepository
     */
    private $boardGameGeekRepository;

    function __construct(BoardGameGeekRepository $boardGameGeekRepository)
    {
        $this->middleware(
            'auth.admin',
            [
                'only' => [
                    'create',
                    'store',
                    'confirm'
                ]
            ]
        );
        $this->middleware('auth', ['only' => ['loan']]);
        $this->boardGameGeekRepository = $boardGameGeekRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $games = Game::with('boardGameGeekGame')
            ->with('loans')
            ->get();

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
            $addGameToLibrary->get('board_game_geek_game_id')
        );

        $libraryGame = new Game($addGameToLibrary->all());
        $libraryGame->boardGameGeekGame()->associate($game);
        $libraryGame->save();

        \Flash::success('Game added to library');
        return \Redirect::route('admin.index');
    }

    public function loan($id)
    {
        $game = Game::findOrFail($id);
        $loan = $game->loanTo(Auth::user());

        if ($loan) {
            \Flash::success('Game loaned!');

            $users = User::whereIsCommittee(1)->get(['email']);

            foreach ($users as $user) {
                $email = $user->email;
                \Mail::send(
                    ['text' => 'mail/loan'],
                    ['game' => $game, 'user' => Auth::user(), 'loan' => $loan],
                    function (Message $message) use ($email) {
                        $message->to($email)
                            ->subject('Game loan requested');
                    }
                );
            }
        } else {
            \Flash::error('Game was not loaned!');
        }

        return \Redirect::route('library.index');
    }

    public function confirm($id)
    {
        /** @var Loan $loan */
        $loan = Loan::findOrFail($id);

        if ($loan->hasBeenConfirmed()) {
            \Flash::error('Loan already had been completed');
            return \Redirect::route('admin.index');
        }

        if ($loan->confirm()) {
            \Flash::success('Loan ');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
	}

}
