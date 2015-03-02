@extends('base.standard')

@section('title')
    Sign up
@endsection

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <h1>
            Sign up user
        </h1>
        {!! Form::open([
            'class' => 'form-horizontal',
            'route' => 'users.store'
        ]) !!}

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

        {!! Form::submit('Sign them up') !!}

        {!! Form::close() !!}
    </div>
@endsection