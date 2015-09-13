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

    <dl>
        @foreach($user->achievements as $achievement)
            <dt>{{ $achievement->name }}</dt>
            <dd>{{ $achievement->description}}</dd>
        @endforeach
    </dl>

    @if($user->games->count())

        @foreach($user->games->chunk(3) as $row)
	  <div class="row">

	    @foreach($row as $game)
	      <div class="col-md-4">
		<h3>{{ $game->name }}</h3>
                <img src="{{ $game->image }}" width="100%">
		<div class="row" style='margin-top: 5px'>

		@if($user->id == Auth::id())
                    {!! link_to_route(
                            'users.games.delete',
                            "Remove \"{$game->name}\"",
                            ['users' => $user->id, 'games' => $game->id],
                            ['class' => 'btn btn-default btn-block']
                        )
                    !!}
		@endif
		</div>
	      </div>
	    @endforeach
	  </div>
	@endforeach

    @else
        <div class="alert alert-info">
            {{ $user->name }} hasn't got any games apparently...
        </div>
    @endforelse

@endsection
