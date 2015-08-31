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
            {{ $game->boardGameGeekGame->name }} (£{{ $game->deposit }} Deposit)
          </h3>

          <img src="{{ $game->boardGameGeekGame->image }}"
               width="100%">

          <p>
            @if(!$game->isOnLoan())
	      {!! Button::asLinkTo(route('loan.create', ['library' => $game]))->withValue('Loan this game')->prependIcon(Icon::tower())->block() !!}
            @elseif($game->isLoanedTo(Auth::user()))
              You have requested this game...

              {{ $game->lastLoan()->loanFinishText() }}
            @endif
          </p>

        </div>
      @endforeach

    </div>

  @endforeach

@endsection
