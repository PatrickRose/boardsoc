@extends('base.standard')

@section('title')
    Add Game To Library
@endsection

@section('content')

    <h1 class="page-header">
        Add Game To Library
    </h1>

    {!! Form::open(['route' => 'library.store']) !!}

    {!! ControlGroup::generate(
            Form::label('board_game_geek_game_id', 'Board Game Geek id'),
        Form::number('board_game_geek_game_id')
    ) !!}

    {!! ControlGroup::generate(
        Form::label('deposit', 'Deposit (in pounds)'),
        Form::number('deposit')
    ) !!}

    {!! Form::close() !!}

@endsection