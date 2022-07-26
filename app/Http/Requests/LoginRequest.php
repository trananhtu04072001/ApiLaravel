<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'min:6|required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Yêu cầu nhập password',
            'password.min' => 'Yêu cầu nhập nhiều hơn 6 kí tự',
            'password.required' => 'Yêu cầu nhập password',
        ];
    }
}
