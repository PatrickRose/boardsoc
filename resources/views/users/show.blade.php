@extends('base.standard')

@section('title')
    {{ $user->name }}
@endsection

@section('page-header')
    <div id="headerwrap">
        <div class="container">
            <div class="row">
                <h3>
                    {{ $user->name }}
                    @if($user->id == Auth::id())
                        <small>
                            {!! link_to_route('users.games.create',
                            "Add games to collection",
                            ['users' =>  $user->id]) !!}
                        </small>
                    @endif
                </h3>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="container mtb">
        @if($user->achievements->count())
            <dl>
                @foreach($user->achievements as $achievement)
                    <dt>{{ $achievement->name }}</dt>
                    <dd>{{ $achievement->description}}</dd>
                @endforeach
            </dl>
        @else
            <div class="alert alert-info">
                {{ $user->name }} has not achievements
            </div>
        @endif
    </div>

    <div id="portfoliowrap">
        <div class="portfolio-centered">
            <div class="recentitems portfolio">
                @forelse($user->games as $game)
                    <div class="portfolio-item">
                        <div class="he-wrap tpl6">
                            <img src="{{ $game->getThumbnail() }}"
                                 alt="{{ $game->name }}">

                            <div class="he-view">
                                <div class="bg a0" data-animate="fadeIn">
                                    <h3 class="a1" data-animate="fadeInDown">
                                        {{ $game->name }}
                                    </h3>

                                    <p>
                                        @if($user->id == Auth::id())
                                            <a href="{{ route(
                                                    'users.games.delete',
                                                    ['users' => $user->id, 'games' => $game->id]
                                                ) }}"
                                               class="btn btn-default">
                                                {!! $game->getButtonName() !!}
                                            </a>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <!-- he view -->
                        </div>
                        <!-- he wrap -->
                    </div><!-- end col-12 -->
                @empty
                    <div class="alert alert-info">
                        {{ $user->name }} hasn't got any games apparently...
                    </div>
                @endforelse
            </div>
        </div>

@endsection
