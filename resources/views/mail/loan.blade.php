Hi there!

Someone has just requested to loan a game from the library:

Person: {{ $user->name }}
Email: {{ $user->email }}
Game: {{ $game->boardGameGeekGame->name }}
Deposit: £{{ $game->deposit }}

When you have passed the game on, then please mark the loan as complete on
the website:
{{ route('loan.confirm', ['loan' => $loan]) }}

Enjoy!
BoardSoc