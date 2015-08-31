<?php
namespace BoardSoc\Http\Controllers;

use BoardSoc\Achievement;
use BoardSoc\Http\Requests;
use BoardSoc\Http\Controllers\Controller;

use BoardSoc\Http\Requests\CreateAchievement;
use BoardSoc\User;
use Bootstrapper\Accordion;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Mail\Message;

class AchievementsController extends Controller {

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
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $allAchievements = Achievement::all();
        $user = \Auth::user();

        $sortedAchivements = [
            'A' => [],
            'B' => [],
            'C' => [],
            'D' => [],
            'E' => [],
            'F' => [],
            'G' => [],
            'H' => [],
            'I' => [],
            'J' => [],
            'K' => [],
            'L' => [],
            'M' => [],
            'N' => [],
            'O' => [],
            'P' => [],
            'Q' => [],
            'R' => [],
            'S' => [],
            'T' => [],
            'U' => [],
            'V' => [],
            'W' => [],
            'X' => [],
            'Y' => [],
            'Z' => [],
            '0-9' => [],
        ];

        foreach ($allAchievements as $achievement) {
            $name = strtoupper($achievement->name[0]);
            if (str_contains('QWERTYUIOPLKJHGFDSAZXCVBNM', $name) === false) {
                $name = '0-9';
            }
            $sortedAchivements[$name][] = $achievement;
        }

        $tabContents = [];

        foreach ($sortedAchivements as $title => $achievements) {

            $accordionContent = [];
            foreach($achievements as $achievement) {
                $content = $achievement->description;

		$content .= link_to_route(
		    'achievements.claim',
		    "Claim '{$achievement->name}'",
		    ['achievement' => $achievement->id],
		    ['class' => 'btn btn-default']
		);

                $accordionContent[] = [
                    'title' => $achievement->name,
                    'contents' => $content,
                ];
            }


            $content = count($accordionContent) ?
                       \Accordion::withContents($accordionContent) :
                       '<div class="alert alert-info">No achievements</div>';

            $tabContents[] = compact('title', 'content');
        }

        $achievements = \Tabbable::withContents($tabContents);

        return \View::make('achievements.index', compact('achievements'));
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

	foreach($committeeUsers as $committeeUser) {
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
