@extends('base.standard')

@section('title')
    Add new Achievement
@endsection

@section('content')

    {!! Form::open(['route' => 'achievements.store']) !!}

    {!! ControlGroup::generate(
        Form::label('name'),
        Form::text('name')
    ) !!}

    {!! ControlGroup::generate(
        Form::label('description'),
        Form::textarea('description')
    ) !!}

    {!! Form::submit('Create') !!}

    {!! Form::close() !!}

@endsection