@extends('base.standard')

@section('title')
    Library
@endsection

@section('page-header')
    <div id="headerwrap">
        <div class="container">
            <div class="row" >
                <h3>
                    BoardSoc Library
                </h3>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container mtb">

        <div class="col-lg-8 col-lg-offset-2 centered">
            <h2>
                Want to borrow some games? Well you can!
            </h2>
            <br />
            <div class="hline"></div>
        </div>
    </div>

    <div id="portfoliowrap">
        <div class="portfolio-centered">
            <div class="recentitems portfolio">

                @foreach($games as $game)

                    <div class="portfolio-item">
                        <div class="he-wrap tpl6">
                            <img src="{{ $game->boardGameGeekGame->getThumbnail() }}"
                                alt="{{ $game->boardGameGeekGame->name }}">
                            <div class="he-view">
                                <div class="bg a0" data-animate="fadeIn">
                                    <h3 class="a1" data-animate="fadeInDown">
                                        {{ $game->boardGameGeekGame->name }} (£{{ $game->deposit }} Deposit)
                                    </h3>
                                    <p>
                                        @if(!$game->isOnLoan())
                                            {!! Button::asLinkTo(route('loan.create', ['library' => $game]))->withValue('Loan this game')->prependIcon(Icon::tower()) !!}
                                        @elseif($game->isLoanedTo(Auth::user()))
                                            You have requested this game...

                                            {{ $game->lastLoan()->loanFinishText() }}
                                        @endif
                                    </p>
                                </div><!-- he bg -->
                            </div><!-- he view -->
                        </div><!-- he wrap -->
                    </div><!-- end col-12 -->
                @endforeach
            </div>
        </div>
    </div>
@endsection
