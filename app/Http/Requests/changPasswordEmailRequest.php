<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class changPasswordEmailRequest extends FormRequest
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
            'password'              => 'required|min:4|confirmed',
            'password_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'password.required'                 => 'A password is required',
            'password.min'                      => 'A password not min 4',
            'password.confirmed'                => 'A password confirmation not equals password' ,
            'password_confirmation.required'    => 'A password confirmation is required'
        ];
    }
}
