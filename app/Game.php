<?php namespace BoardSoc;

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

	//

}
