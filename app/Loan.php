<?php namespace BoardSoc;

use Illuminate\Database\Eloquent\Model;

/**
 * BoardSoc\Loan
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $game_id
 * @property \Carbon\Carbon $date_until
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\Loan whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\Loan whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\Loan whereGameId($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\Loan whereDateUntil($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\Loan whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\Loan whereUpdatedAt($value)
 */
class Loan extends Model {

    public function getDates()
    {
        return ['created_at', 'updated_at', 'date_until'];
    }

    public function loanFinishText()
    {
        $expireFinish = is_null($this->date_until) ? 'time out' : 'finish';
        $endDate = is_null($this->date_until) ?
            $this->created_at->addWeeks(2) :
            $this->date_until;


        return "This loan will $expireFinish in " . $endDate->diffForHumans();
    }

}
