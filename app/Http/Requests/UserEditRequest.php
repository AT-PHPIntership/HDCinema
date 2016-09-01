<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserEditRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname'  => 'required|regex:'.config('define.regex_fullname').'|max:100|min:3',
            'tel'     => 'required|regex:'.config('define.regex_tel').'|max: 14|min:10',
            'address'   => 'required|regex:'.config('define.regex_address').'|max: 100|min:6',
            'image'     => 'mimes:jpeg,jpg,png|max:1000',
        ];
    }
}
