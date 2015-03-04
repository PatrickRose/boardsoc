@extends('base.standard')

@section('title')
    Create new Event
@endsection

@section('content')
    <h1>
        Create new event
    </h1>

    {!! Form::open(['route' => 'events.store']) !!}

    {!! ControlGroup::generate(
        Form::label('name', 'Event name'),
        Form::text('name')
    ) !!}

    {!! ControlGroup::generate(
        Form::label('date', 'Date'),
        Form::date('date', \Carbon\Carbon::tomorrow()->format('Y-m-d'))
    ) !!}

    {!! ControlGroup::generate(
        Form::label('details', 'Description'),
        Form::textarea('details')
    ) !!}

    {!! ControlGroup::generate(
        Form::label('facebook'),
        Form::text('facebook'),
        'This is the ID after the event: https://www.facebook.com/events/{value}'
    ) !!}

    {!! Form::submit('Create') !!}

    {!! Form::close() !!}
@endsection