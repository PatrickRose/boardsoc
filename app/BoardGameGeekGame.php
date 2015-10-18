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

    public function getThumbnail()
    {
        $pathInfo = pathinfo($this->image);
        if (!array_key_exists('extension', $pathInfo))
        {
            return $this->image;
        }

        return $pathInfo['dirname'] . '/' . $pathInfo['filename'] . '_t.' . $pathInfo['extension'];
    }

    public function getButtonName()
    {
        $buttonNames = explode(' ', htmlspecialchars($this->name));
        $toReturn = '<span class="fa fa-ban"></span> Remove ';
        $stringLength = 9;

        foreach($buttonNames as $name)
        {
            $stringLength += strlen($name) + 1;
            $toReturn .= $name;
            if ($stringLength > 27)
            {
                $toReturn .= '<br />';
                $stringLength = 0;
            }
            else
            {
                $toReturn .= ' ';
            }
        }

        return $toReturn;
    }

}
