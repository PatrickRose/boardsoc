<?php

namespace BoardSoc\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RemoveAccount extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
            return \Auth::user() && \Auth::user()->id == \Route::getCurrentRoute()->parameter('user');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
