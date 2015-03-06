<?php namespace BoardSoc\Http\Requests;

use BoardSoc\Http\Requests\Request;

class ChangeDetails extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return \Auth::user() && \Auth::user()->id == \Route::getCurrentRoute()->parameter('users');
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
        $id = \Route::getCurrentRoute()->parameter('users');

		return [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'password' => 'confirmed'
		];
	}

}
