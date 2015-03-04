<?php namespace BoardSoc;

use Illuminate\Database\Eloquent\Model;

/**
 * BoardSoc\Event
 *
 * @property integer $id
 * @property string $name 
 * @property string $date 
 * @property string $details 
 * @property string $facebook 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\Event whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\Event whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\Event whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\Event whereDetails($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\Event whereFacebook($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\Event whereUpdatedAt($value)
 */
class Event extends Model {

	protected $fillable = [
        'name', 'date', 'facebook', 'details'
    ];

    public function getDates()
    {
        return ['created_at', 'updated_at', 'date'];
    }

    public function getFirstParagraph()
    {
        return $this->getParagraphs()[0];
    }

    public function getParagraphs()
    {
        return explode("\n\n", $this->details);
    }

}
