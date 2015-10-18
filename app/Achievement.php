<?php namespace BoardSoc;

use Illuminate\Database\Eloquent\Model;

/**
 * BoardSoc\Achievement
 *
 * @property integer $id 
 * @property string $name 
 * @property string $description 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read \Illuminate\Database\Eloquent\Collection|\BoardSoc\\User[] $users 
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\Achievement whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\Achievement whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\Achievement whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\Achievement whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\Achievement whereUpdatedAt($value)
 */
class Achievement extends Model {

    protected $fillable = [
        'name',
        'description'
    ];

    public function users()
    {
        return $this->belongsToMany('BoardSoc\\User');
    }

}
