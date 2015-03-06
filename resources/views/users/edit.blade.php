@extends('base.standard')

@section('title')
    Edit Your Details
@endsection

@section('content')

    <h1 class="page-header">
        Edit your details
    </h1>

    {!! Form::model($user,
        [
            'route' => ['users.update', $user->id],
            'method' => 'PUT'
        ]
    )
    !!}

    {!! ControlGroup::generate(
        Form::label('name', 'Name:'),
        Form::text('name'),
        null,
        2
    ) !!}

    {!! ControlGroup::generate(
        Form::label('email', 'Email:'),
        Form::text('email'),
        null,
        2
    ) !!}

    {!! ControlGroup::generate(
        Form::label('password', 'New Password:'),
        Form::password('password'),
        'Leave blank if you don\'t want to update this',
        2
    ) !!}

    {!! ControlGroup::generate(
        Form::label('password_confirmation', 'Confirm password:'),
        Form::password('password_confirmation'),
        null,
        2
    ) !!}

    {!! Form::submit('Change details') !!}

    {!! Form::close() !!}

@endsection