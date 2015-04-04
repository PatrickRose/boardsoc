@extends('base.standard')

@section('title')
    Welcome!
@endsection

@section('content')
    <div class="jumbotron">
        <h1 class="page-header" style="text-align: center">
            Welcome to the Sheffield University Board Gaming Society
            (BoardSoc) Website
        </h1>

        <p>
            Come along to our events
        </p>
    </div>

    <div class="row">
        <div class="col-md-4">
            <h2 class="page-header">
                Want to know more about us?
            </h2>

            <p>
                BoardSoc is a student society of the University of Sheffield,
                focused on playing modern(ish) board games. Interested in
                more information? Then
                {!! link_to_route('about', 'read more here') !!}!
            </p>
        </div>
        <div class="col-md-4">
            <h2 class="page-header">
                Want to play games with us?
            </h2>

            <p>
                We usually meet every other week - the next few events are
                shown below:
            </p>
            @forelse($events as $event)
                <h3 class="page-header">
                    Our next event!
                    <small>
                        {{ $event->date->diffForHumans() }}
                    </small>
                </h3>
                <p>
                    {!! link_to_route(
                        'events.show',
                        $event->name,
                        [
                            'event' => $event->id
                        ]
                    ) !!}
                </p>
            @empty
                <h3>Check back soon...</h3>
                <p>
                    Our next event isn't fully organised yet, check back soon!
                </p>
            @endforelse
        </div>
        <div class="col-md-4">
            <h2 class="page-header">
                Want to borrow something from the library?
            </h2>

            <p>
                A member of the society can borrow any game from our library
                for a small deposit. If you're interested,
                {!! link_to_route('library.index', 'take a look at the games we
                have available') !!}.
            </p>
        </div>
    </div>
@endsection