<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'username' => 'required|unique:users|regex:'.config('define.regex_username').'|max:100|min:3',
            'password' => 'required|min:6|max:100',
            'fullname'  => 'required|min:3|max:100|regex:'.config('define.regex_fullname'),
            'address' => 'required|regex:'.config('define.regex_address').'|min:6|max:100',
            'tel' => 'required|regex:'.config('define.regex_tel').'|max: 14|min:10',
            'image'     => 'mimes:jpeg,jpg,png|max:1000'
        ];
    }
}
