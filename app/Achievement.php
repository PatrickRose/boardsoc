<?php namespace BoardSoc;

use Illuminate\Database\Eloquent\Model;

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
