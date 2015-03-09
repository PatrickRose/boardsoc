@extends('base.standard')

@section('title')
    Library
@endsection

@section('content')

    <h1 class="page-header">
        BoardSoc Library
    </h1>

    @foreach($games->chunk(3) as $row)

        <div class="row">

            @foreach($row as $game)
                <div class="col-md-4">
                    <h3>
                        {{ $game->boardGameGeekGame->name }}
                    </h3>

                    <img src="{{ $game->boardGameGeekGame->image }}"
                         width="100%">

                </div>
            @endforeach

        </div>

    @endforeach

@endsection