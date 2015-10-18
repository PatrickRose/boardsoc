<?php
namespace BoardSoc\Http\Controllers;

use BoardSoc\Achievement;
use BoardSoc\Http\Requests;
use BoardSoc\Http\Requests\CreateAchievement;
use BoardSoc\User;
use Illuminate\Mail\Message;
use Laracasts\Flash\Flash;

class AchievementsController extends Controller
{

    public function __construct()
    {
        $this->middleware(
            'auth.admin',
            [
                'only' => [
                    'create',
                    'store',
                    'give',
                ]
            ]
        );
        $this->middleware('auth', ['only' => ['claim']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $achievements = [];
        /** @var \BoardSoc\Achievement $achievement */
        foreach(Achievement::all() as $achievement)
        {
            $claim = route('achievements.claim', ['achievement' => $achievement]);
            $achievements[] = [
                'title' => $achievement->name,
                'contents' => $achievement->description . "<p><a href='$claim' class='btn btn-default'><span class='fa fa-trophy'></span> Claim this achievement</a></p>",
            ];
        }

        $accordion = \Accordion::withContents($achievements);

        return \View::make('achievements.index', compact('accordion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return \View::make('achievements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateAchievement $createAchivement
     * @return Response
     */
    public function store(CreateAchievement $createAchivement)
    {
        $achievement = new Achievement($createAchivement->all());
        $achievement->save();

        Flash::success('Achievement added');
        return \Redirect::route('admin.index');
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

    public function give($achievement, $user)
    {
        $user = User::findOrFail($user);
        $achievementModel = Achievement::findOrFail($achievement);

        $user->achievements()->attach([$achievement]);

        return \Redirect::route('admin.index');
    }

    public function claim($achievement)
    {
        $achievementModel = Achievement::findOrFail($achievement);
        $user = \Auth::user();
        $committeeUsers = User::whereIsCommittee(1)->get(['email']);

        foreach ($committeeUsers as $committeeUser) {
            \Mail::send(
                ['text' => 'mail/claim'],
                ['achievement' => $achievementModel, 'user' => $user],
                function (Message $message) use ($committeeUser) {
                    $message->to($committeeUser->email)
                        ->subject('Achievement claim');
                }
            );
        }

        \Flash::info("Request to claim '{$achievementModel->name}' sent");
        return \Redirect::back();
    }

}
