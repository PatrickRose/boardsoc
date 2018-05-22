@extends('base.standard')

@section('title')
    {{ $event->name }}
@endsection

@section('page-header')
	<div id="headerwrap">
		<div class="container">
			<div class="row">
				<h3>
					{{ $event->name }}
					<small>
						{{ $event->date->format('l jS M') }}
					</small>
				</h3>
			</div>
		</div>
	</div>
@endsection

@section('content')
	<div class="container mtb">

    @if(Auth::check() && Auth::user()->is_committee)
        {!! link_to_route('events.edit', 'Edit Event', ['event' => $event]) !!}
    @endif

    @foreach($event->getParagraphs() as $paragraph)
        <p>
            {{ $paragraph }}
        </p>
    @endforeach

    <a href="https://www.facebook.com/events/{{ $event->facebook }}">
        Hit attending on Facebook!
    </a>
	</div>

@endsection
