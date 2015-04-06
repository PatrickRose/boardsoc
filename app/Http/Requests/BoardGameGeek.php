<?php namespace BoardSoc\Http\Requests;

use BoardSoc\Http\Requests\Request;

class BoardGameGeek extends ChangeDetails {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'boardgamegeekusername' => 'required'
		];
	}

}
