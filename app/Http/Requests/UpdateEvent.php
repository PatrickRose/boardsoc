<?php namespace BoardSoc\Http\Requests;

use Auth;
use BoardSoc\Http\Requests\Request;

class UpdateEvent extends Request {

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
        $id = \Input::get('event');

        return [
            'name' => 'required',
            'date' => 'required|after:' . Carbon::now(),
            'details' => 'required',
            'facebook' => 'required|unique:events,facebook,' . $id
        ];
	}

}
