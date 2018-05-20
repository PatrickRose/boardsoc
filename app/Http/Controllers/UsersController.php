<?php
namespace BoardSoc\Http\Controllers;

use BoardSoc\Achievement;
use BoardSoc\Http\Requests;
use BoardSoc\Http\Requests\ChangeDetails;
use BoardSoc\Http\Requests\SignUpUsers;
use BoardSoc\Http\Requests\RemoveAccount;
use BoardSoc\User;
use Illuminate\Mail\Message;
use Illuminate\Routing\Redirector;
use Input;
use Redirect;
use View;

class UsersController extends Controller
{

    /**
     * @var Redirector
     */
    private $redirector;

    function __construct(Redirector $redirector)
    {
        $this->redirector = $redirector;

        $this->middleware('auth.admin', ['only' => ['create', 'store']]);
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
        
        $user = new User($signUpUsers->all());
        $password = str_random(8);
        $user->password = $password;
        $email = $user->email;
        $user->save();

        \Flash::info('User created');
        \Mail::send(
            ['text' => 'mail/welcome'],
            ['password' => $password, 'email' => $email, 'route' => route('users.edit', compact('user'))],
            function (Message $message) use($email) {
                $message->to($email)
                        ->subject('Welcome to BoardSoc');
            }
        );

        return $this->redirector->route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::with('games')->with('achievements')->findOrFail($id);

        return View::make('users.show', compact('user', 'achievements'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return View::make('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int                   $id
     * @param ChangeDetails $changeDetails
     * @return Response
     */
    public function update($id, ChangeDetails $changeDetails)
    {
        $user = User::findOrFail($id);
        $user->fill($changeDetails->all());
        $user->mayemail = $changeDetails->input('mayemail');
        $user->save();

        \Flash::success('Details updated');

        return Redirect::route('users.edit', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id, RemoveAccount $removeAccount)
    {
        $success = false;
        $user = User::findOrFail($id);

        \DB::transaction(function () use (&$success, $user, $id) {
            \BoardSoc\Loan::where('user_id', $id)->delete();

            $user->delete();

            $success = true;
            return true;
        });

        // Log them out
        if ($success)
        {
            return Redirect::route('logout');
        }

        \Flash::info('Failed to delete account - get in touch with a committee member so they can investigate it further');
        return Redirect::route('users.edit', compact('user'));
    }
}
