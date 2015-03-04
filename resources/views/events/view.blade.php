@extends('base.standard')

@section('title')
    {{ $event->name }}
@endsection

@section('content')

    <h1 class="page-header">
        {{ $event->name }}
        <small>
            {{ $event->date }}
        </small>
    </h1>

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

@endsection