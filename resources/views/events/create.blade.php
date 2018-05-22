@extends('base.standard')

@section('title')
    Create new Event
@endsection

@section('page-header')
    <div id="headerwrap">
        <div class="container">
            <div class="row">
                <h3>
                    Create new event
                </h3>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container mtb">

        {!! Form::model($event, ['route' => 'events.store']) !!}

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

        {!! Form::submit('Create Event') !!}

        {!! Form::close() !!}
    </div>
@endsection
