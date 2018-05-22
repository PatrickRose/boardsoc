@extends('base.standard')

@section('title')
    Add new Achievement
@endsection

@section('page-header')
    <div id="headerwrap">
        <div class="container">
            <div class="row">
                <h3>
                    Add achievements
                </h3>
            </div>
        </div>
    </div>
@endsection


@section('content')

    <div class="container mtb">

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

    </div>
@endsection
