@extends('base.standard')

@section('title')
    Member Games
@endsection

@section('page-header')
    <div id="blue">
        <div class="container">
            <div class="row">
                <h3>
                    Member's Games
                </h3>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container mtb">

        <div class="col-lg-8 col-lg-offset-2 centered">
            <h2>
                Have a gander at the lovely games our members own!
            </h2>
            <br/>
            <div class="hline"></div>
        </div>
    </div>

    <div id="portfoliowrap">
        <div class="portfolio-centered">
            <div class="recentitems portfolio">

                @foreach($games as $game)

                    <div class="portfolio-item member-game" id="boardgamegeek-{{ $game->id }}">
                        <div class="he-wrap tpl6">
                            <img src="{{ $game->getThumbnail() }}"
                                 alt="{{ $game->name }}">
                            <div class="he-view">
                                <div class="bg a0 info" data-animate="fadeIn">
                                    <h3 class="a1" data-animate="fadeInDown">
                                        {{ $game->name }}
                                    </h3>
                                    <div>
                                        Owned by:
                                        <ul>
                                            @foreach($game->users as $user)
                                                <li class="owned-by">{{ $user->name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- he bg -->
                        </div><!-- he view -->
                    </div><!-- he wrap -->
            @endforeach
            </div>
        </div>
    </div>
@endsection
