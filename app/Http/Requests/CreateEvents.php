<?php namespace BoardSoc\Http\Requests;

use BoardSoc\Http\Requests\Request;
use Carbon\Carbon;

class CreateEvents extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return \Auth::user() && \Auth::user()->is_committee;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'name' => 'required',
            'date' => 'required|after:' . Carbon::now(),
            'facebook' => 'required|unique:events'
		];
	}

}
