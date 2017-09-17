<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class sendEmailRequest extends FormRequest
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
            'email' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'email.required'  => 'A email is required',
            'email.email'     => 'A email not type example@gmail.com '
        ];
    }
}
