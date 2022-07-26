<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'min:6|required',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Yêu cầu nhập tên',
            'email.required' => 'Yêu cầu nhập email',
            'email.unique' => 'Email đã tồn tại',
            'email.email' => 'Email sai định dạng',
            'password.required' => 'Yêu cầu nhập password',
            'password.min' => 'Password phải nhiều hơn 6 kí tự',
            ''
        ];
    }
}
