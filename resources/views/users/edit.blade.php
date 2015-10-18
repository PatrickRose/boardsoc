@extends('base.standard')

@section('title')
    Edit Your Details
@endsection

@section('page-header')
    <div id="blue">
        <div class="container">
            <div class="row">
                <h3>
                    Edit your details
                </h3>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="container mtb">
        <div class="row">
            <div class="col-md-12">

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

            </div>
        </div>
    </div>

@endsection