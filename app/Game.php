<?php namespace BoardSoc;

      use Carbon\Carbon;
      use Illuminate\Database\Eloquent\Model;

      /**
 * BoardSoc\Game
 *
 * @property integer $id
 * @property integer $deposit
 * @property integer $board_game_geek_game_id
 * @property integer $location
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\Game whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\Game whereDeposit($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\Game whereBoardGameGeekGameId($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\Game whereLocation($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\Game whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\Game whereUpdatedAt($value)
 * @property-read \BoardSoc\BoardGameGeekGame $boardGameGeekGame
 * @property-read \Illuminate\Database\Eloquent\Collection|\BoardSoc\\Loan[] $loans
 */
      class Game extends Model {


          protected $fillable = [
              'deposit',
              'board_game_geek_id',
          ];

          public function boardGameGeekGame()
          {
              return $this->belongsTo('BoardSoc\BoardGameGeekGame');
          }

          public function isOnLoan()
          {
              $loan = $this->lastLoan();

              if (!$loan instanceof Loan)
              {
                  return false;
              }

              if (is_null($loan->date_until))
              {
                  return $loan->created_at->addWeeks(2) > Carbon::now();
              }

              return $loan->date_until < Carbon::now();
          }

          public function isLoanedTo(User $user = null)
          {
              if (is_null($user) || !$this->isOnLoan()) {
                  return false;
              }

              return $this->lastLoan()->user_id = $user->id;
          }

          public function lastLoan()
          {
              return $this->loans()->orderBy('created_at')->first();
          }

          public function loanTo(User $user)
          {
              $loan = new Loan();
              $loan->game_id = $this->id;
              $loan->user_id = $user->id;
              $loan->date_until = null;

              return $loan->save() ? $loan : null;
          }

          public function loans()
          {
              return $this->hasMany('BoardSoc\\Loan');
          }

      }
