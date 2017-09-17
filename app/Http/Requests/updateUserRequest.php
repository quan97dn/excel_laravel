<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateUserRequest extends FormRequest
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
            'f_name'                => 'required|max:20',
            'l_name'                => 'required|max:50',
            'username'              => 'required',
            'email'                 => 'required|email|different:username',
            'level'                 => 'required',
            'fileImage'             => 'image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'f_name.required'                   => 'A firstname is required',
            'f_name.max'                        => 'A firstname not max 20',
            'l_name.required'                   => 'A lastname is required',
            'l_name.max'                        => 'A lastname not max 50',
            'username.required'                 => 'A username is required',
            'email.required'                    => 'A email is required',
            'email.email'                       => 'A email not type example@gmail.com ',
            'level.required'                    => 'A level is required'
        ];
    }
}
