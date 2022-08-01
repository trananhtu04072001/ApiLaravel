<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
            'email' => 'required|unique:authors',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Yêu cầu nhập tên',
            'email.required' => 'Yêu cầu nhập email',
            'email.unique' => 'email đã bị trùng',
            'image.required' => 'yêu cầu nhập ảnh',
            'image.image' => 'Không phải là một ảnh',
            'image.mimes' => 'Sai định dạng ảnh',
        ];
    }
}
