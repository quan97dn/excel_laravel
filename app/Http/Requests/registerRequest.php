<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerRequest extends FormRequest
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
            'username'              => 'required|unique:users',
            'email'                 => 'required|email|different:username',
            'password'              => 'required|min:4|confirmed',
            'password_confirmation' => 'required',
            'policy'                => 'required'
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
            'password.required'                 => 'A password is required',
            'password.min'                      => 'A password not min 4',
            'password.confirmed'                => 'A password confirmation not equals password' ,
            'password_confirmation.required'    => 'A password confirmation is required' ,
            'policy'                            => 'A Privacy Policy checker'
        ];
    }

}
