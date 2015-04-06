@extends('base.standard')

@section('title')
    {{ $user->name }}
@endsection

@section('content')

    <h1 class="page-header">{{ $user->name }}</h1>

    @forelse($user->games->chunk(3) as $row)

        <div class="row">

            @foreach($row as $game)
                <div class="col-md-4">
                    <h3>
                        {{ $game->name }}
                    </h3>

                    <img src="{{ $game->image }}"
                         width="100%">

                    @if($user->id == Auth::id())
                        {!! link_to_route('users.games.delete', "Remove \"{$game->name}\"", ['users' => $user->id, 'games' => $game->id]) !!}
                    @endif
                </div>
            @endforeach

        </div>

    @empty
        <div class="alert alert-info">
            {{ $user->name }} hasn't got any games apparently...
        </div>
    @endforelse

@endsection