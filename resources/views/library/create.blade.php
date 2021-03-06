@extends('base.standard')

@section('title')
    Add Game To Library
@endsection

@section('page-header')
    <div id="headerwrap">
        <div class="container">
            <div class="row">
                <h3>
                    Add Game To Library
                </h3>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="container mtb">

        <div class="row">
            <div class="search-form">
                <div class="results">
                </div>
                <input type="text" class="search">
                <button class="submit btn btn-default"
                        data-loading-text="Searching..."
                        data-url="{{ route('games.search', ['search' => '']) }}"
                        autocomplete="off">
                    <span class="glyphicon glyphicon-search"/> Search
                </button>
            </div>
        </div>

        {!! Form::open(['route' => 'library.store']) !!}

        {!! ControlGroup::generate(
                Form::label('board_game_geek_game_id', 'Board Game Geek id'),
            Form::number('board_game_geek_game_id')
        ) !!}

        {!! ControlGroup::generate(
            Form::label('deposit', 'Deposit (in pounds)'),
            Form::number('deposit')
        ) !!}

        <div class="form-group">
            {!! Form::submit('Save') !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection
