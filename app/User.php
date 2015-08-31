<?php namespace BoardSoc;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;

/**
 * BoardSoc\User
 *
 * @property integer                       $id
 * @property string                        $name
 * @property string                        $email
 * @property string                        $password
 * @property boolean                       $is_committee
 * @property string                        $remember_token
 * @property \Carbon\Carbon                $created_at
 * @property \Carbon\Carbon                $updated_at
 * @property \BoardSoc\BoardGameGeekGame[] games
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\User
 *         whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\User
 *         whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\User
 *         whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\User
 *         wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\User
 *         whereIsCommittee($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\User
 *         whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\User
 *         whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\BoardSoc\User
 *         whereUpdatedAt($value)
 * @method static static findOrFail($id)
 */
class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function setPasswordAttribute($password)
    {
        if ($password != '') {
            $this->attributes['password'] = \Hash::make($password);
        }
    }

    public function games()
    {
        return $this->belongsToMany('BoardSoc\\BoardGameGeekGame');
    }

    public function achievements()
    {
        return $this->belongsToMany('BoardSoc\\Achievement');
    }

    public function getTabbedGames($currentUserID = null)
    {
        $sortedGames = [
            'A' => [],
            'B' => [],
            'C' => [],
            'D' => [],
            'E' => [],
            'F' => [],
            'G' => [],
            'H' => [],
            'I' => [],
            'J' => [],
            'K' => [],
            'L' => [],
            'M' => [],
            'N' => [],
            'O' => [],
            'P' => [],
            'Q' => [],
            'R' => [],
            'S' => [],
            'T' => [],
            'U' => [],
            'V' => [],
            'W' => [],
            'X' => [],
            'Y' => [],
            'Z' => [],
            '0-9' => [],
        ];

        foreach ($this->games as $game) {
            $name = strtoupper($game->name[0]);
            if (str_contains('QWERTYUIOPLKJHGFDSAZXCVBNM', $name) === false) {
                $name = '0-9';
            }
            $sortedGames[$name][] = $game;
        }

        $tabContents = [];

        foreach ($sortedGames as $title => $games) {
            $content = '';
            foreach (array_chunk($games, 3) as $row) {
                $content .= '<div class="row">';
                foreach ($row as $game) {
                    $content .= '<div class="col-md-4"><h3>' .
                        $game->name .
                        '</h3><img src="' .
                        $game->image .
                        '"width="100%">';

                    if ($this->id == $currentUserID) {
                        $content .= link_to_route(
                            'users.games.delete',
                            "Remove \"{$game->name}\"",
                            ['users' => $this->id, 'games' => $game->id],
                            ['class' => 'btn btn-default']
                        );
                    }

                    $content .= '</div>';
                }
                $content .= '</div>';
            }
            if ($content === '') {
                $content = '<div class="alert alert-info">No games</div>';
            }

            $tabContents[] = compact('title', 'content');
        }

        return \Tabbable::withContents($tabContents);
    }

}
