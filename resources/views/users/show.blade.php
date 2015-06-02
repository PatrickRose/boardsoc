@extends('base.standard')

@section('title')
    {{ $user->name }}
@endsection

@section('content')

    <h1 class="page-header">
        {{ $user->name }}
        @if($user->id == Auth::id())
            <small>
                {!! link_to_route('users.games.create',
                "Add games to collection",
                ['users' =>  $user->id]) !!}
            </small>
        @endif
    </h1>

    @if($user->games->count())

        {!! $user->getTabbedGames() !!}

    @else
        <div class="alert alert-info">
            {{ $user->name }} hasn't got any games apparently...
        </div>
    @endforelse

@endsection