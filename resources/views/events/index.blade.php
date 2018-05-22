@extends('base.standard')

@section('title')
    Events
@endsection

@section('page-header')
    <div id="headerwrap">
        <div class="container">
            <div class="row">
                <h3>Events</h3>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="container mtb">

        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                @forelse($events->chunk(3) as $row)
                    @foreach($row as $event)
                        <h3 class="ctitle">
                            <a href="{{ route('events.show', ['event'=> $event]) }}">
                                {{ $event->name }}
                            </a>
                            <span class="csmall">
                                {{ $event->date->format('l jS M') }}
                            </span>
                        </h3>

                        <p>
                            {{ $event->getFirstParagraph() }}
                        </p>
                        {!!
                            link_to_route(
                                'events.show',
                                'More information',
                                ['event'=> $event]
                            )
                        !!}
 		        <div class="hline"></div>
		 	
		 	<div class="spacing"></div>
		    @endforeach
                @empty
                    <div class="alert alert-info">
                        No events organised yet, check back soon!
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
