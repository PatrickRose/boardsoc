<?php
namespace BoardSoc\Http\Requests;

class UserGamesAdd extends ChangeDetails {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'board_game_geek_id' => 'required|'
        ];
    }

}
