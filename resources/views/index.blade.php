@extends('base.standard')

@section('title')
  Welcome!
@endsection

@section('content')
  <div id="headerwrap">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <h3>
            Board Games, Card Games, Happyness!
          </h3>
          <h1>
            Welcome to the Sheffield University Board Gaming Society
            (BoardSoc) Website
          </h1>
          <h5>
            Come along to our events
          </h5>
        </div>
      </div>
    </div>
  </div>

  <div id="service">
    <div class="container">
      <div class="row centered">
        <div class="col-md-4">
	  <i class="fa fa-info"></i>
          <h4>
            Want to know more about us?
          </h4>

          <p>
            BoardSoc is a student society of the University of Sheffield,
            focused on playing modern(ish) board games. Interested in
            more information? Then
            {!! link_to_route('about', 'read more here') !!}!
          </p>
        </div>
        <div class="col-md-4">
	  <i class="fa fa-calendar-check-o"></i>
          <h4>
            Want to play games with us?
          </h4>

          <p>
            We usually meet every saturday - the next few events are
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
	  <i class="fa fa-exchange"></i>
          <h4>
            Want to borrow something from the library?
          </h4>

          <p>
            A member of the society can borrow any game from our library
            for a small deposit. If you're interested,
            {!! link_to_route('library.index', 'take a look at the games we
                have available') !!}.
          </p>
        </div>
      </div>
    </div>
  </div>

@endsection
