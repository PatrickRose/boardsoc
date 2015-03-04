@extends('base.standard')

@section('title')
    Edit Event
@endsection

@section('content')
    <h1>
        Edit event
    </h1>

    {!! Form::model($event, ['route' => ['events.update', $event->id]]) !!}

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

    {!! Form::submit('Edit Event') !!}

    {!! Form::close() !!}
@endsection