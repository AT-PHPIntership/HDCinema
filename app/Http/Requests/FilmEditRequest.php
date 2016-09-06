<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FilmEditRequest extends Request
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
            'name' => 'required|regex:'.config('define.regex_name').'|max:100|min:2',
            'genre' => 'required|regex:'.config('define.regex_genre').'|min:3|max:100',
            'actor'  => 'required|min:3|max:100|regex:'.config('define.regex_actor'),
            'director' => 'required|regex:'.config('define.regex_director').'|min:6|max:100',
            'duration' => 'required|regex:'.config('define.regex_duration'),
            'starttime' => 'required|date',
            'trailer' => 'required|regex:'.config('define.regex_trailer').'|min:10|max:100',
            'image'     => 'mimes:jpeg,jpg,png|max:1000'
        ];
    }
}
