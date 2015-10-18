@extends('base.standard')

@section('title')
    Your Collection
@endsection

@section('page-header')
    <div id="blue">
        <div class="container">
            <div class="row">
                <h3>
                    Add games to your collection
                </h3>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="container mtb">

        {!! Form::open(['route' => ['users.games.store', 'user' => Auth::user()]]) !!}

        {!! ControlGroup::generate(
            Form::label('board_game_geek_id[0]', 'BoardGameGeekId (0)'),
            Form::text('board_game_geek_id[0]')
        ) !!}

        {!! Form::submit('Add game to library') !!}

        {!! Form::close() !!}

        <h2>Import games from your Board Game Geek profile</h2>

        {!! Form::open(['route' => ['users.games.boardgamegeek', 'user' => Auth::user()]]) !!}

        {!! ControlGroup::generate(
           Form::label('boardgamegeekusername', 'Your BGG Username'),
           Form::text('boardgamegeekusername'),
           'You can check this by going to <em>http://www.boardgamegeek.com/user/{username}</em>'
        ) !!}

        {!! Form::submit('Get games from BGG') !!}

        {!! Form::close() !!}
    </div>
@endsection