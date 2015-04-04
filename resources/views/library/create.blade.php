@extends('base.standard')

@section('title')
    Add Game To Library
@endsection

@section('content')

    <h1 class="page-header">
        Add Game To Library
    </h1>

    <div class="row">
        <div class="search-form">
            <div class="results">
            </div>
            <input type="text" class="search">
            <button class="submit btn btn-default"
                    data-loading-text="Searching..."
                    data-url="{{ route('games.search', ['search' => '']) }}"
                    autocomplete="off">
                <span class="glyphicon glyphicon-search" /> Search
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

@endsection