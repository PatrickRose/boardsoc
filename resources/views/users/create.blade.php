@extends('base.standard')

@section('title')
    Sign up
@endsection

@section('page-header')
    <div id="blue">
        <div class="container">
            <div class="row">
                <h3>
                    Sign up user
                </h3>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container mtb">
        <div class="col-md-8 col-md-offset-2">
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
    </div>
@endsection