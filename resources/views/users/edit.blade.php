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

                                <div class="row">
                                        {!! ControlGroup::generate(
                                                Form::label('name', 'Name:'),
                                                        Form::text('name'),
                                                        null,
                                                        2
                                            ) !!}
                                </div>

                                <div class="row">
                                        {!! ControlGroup::generate(
                                                Form::label('email', 'Email:'),
                                                        Form::text('email'),
                                                        null,
                                                        2
                                            ) !!}
                                </div>

                                <div class="row">
                                        {!! ControlGroup::generate(
                                                Form::label('mayemail', 'Can we email you about events?:'),
                                                        Form::checkbox('mayemail'),
                                                        Alert::info("At most, we'll email you once a week about the events for that week."),
                                                        2
                                            ) !!}
                                </div>

                                <div class="row">
                                        {!! ControlGroup::generate(
                                                Form::label('password', 'New Password:'),
                                                        Form::password('password'),
                                                        'Leave blank if you don\'t want to update this',
                                                        2
                                            ) !!}
                                </div>

                                <div class="row">
                                        {!! ControlGroup::generate(
                                                Form::label('password_confirmation', 'Confirm password:'),
                                                        Form::password('password_confirmation'),
                                                        null,
                                                        2
                                            ) !!}
                                </div>

                                <div class="row">
                                        {!! Form::submit('Change details') !!}
                                </div>

                                {!! Form::close() !!}

                                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE', 'class' => 'delete']) !!}

                                <div class ="row">
                                        <div class="col-md-2">
                                                Delete your account?
                                        </div>
                                        <div class="col-md-10">
                                                {!! Alert::info('Click the button below to delete your account from the website. Note that if you signed up to become a member via the Union\'s website, your email and details will continue to be stored there. Contact the Union to handle removal of that data') !!}
                                                {!! Form::submit('Delete account', ['class' => 'btn-danger', 'onclick' => 'return confirm("Are you sure you want to delete your account?")']) !!}
                                        </div>
                                </div>


                                {!! Form::close() !!}

                        </div>
                </div>
        </div>

@endsection
