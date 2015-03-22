<?php namespace BoardSoc;

use Illuminate\Database\Eloquent\Model;

/**
 * BoardSoc\BoardGameGeekGame
 *
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $name
 * @property integer $minplayers
 * @property integer $maxplayers
 * @property string $image
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\BoardGameGeekGame whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\BoardGameGeekGame whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\BoardGameGeekGame whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\BoardGameGeekGame whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\BoardGameGeekGame whereMinplayers($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\BoardGameGeekGame whereMaxplayers($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\BoardGameGeekGame whereImage($value)
 */
class BoardGameGeekGame extends Model {

	public $incrementing = false;

}
