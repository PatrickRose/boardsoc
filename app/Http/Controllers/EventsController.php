<?php namespace BoardSoc\Http\Controllers;

use BoardSoc\Event;
use BoardSoc\Http\Requests;
use BoardSoc\Http\Requests\CreateEvents;
use BoardSoc\Http\Requests\UpdateEvent;
use Carbon\Carbon;

class EventsController extends Controller
{

    function __construct()
    {
        $this->middleware(
            'auth.admin',
            [
                'except' => [
                    'index',
                    'show',
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
        $events = Event::where('date', '>', Carbon::now())->paginate(12);

        return \View::make('events.index')->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return \View::make('events.create')->with('event', new Event());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateEvents $events
     * @return Response
     */
    public function store(CreateEvents $events)
    {
        $event = Event::create($events->all());

        \Flash::success("'{$event->name}' created");

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
        $event = Event::findOrFail($id);

        return \View::make('events.view')->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);

        return \View::make('events.edit')->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int        $id
     * @param UpdateEvent $updateEvent
     * @return Response
     */
    public function update($id, UpdateEvent $updateEvent)
    {
        $event = Event::findOrFail($id);
        $event->fill($updateEvent->all());
        $event->save();

        \Flash::success('Event updated');

        return \Redirect::route('events.show', ['event' => $id]);
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
