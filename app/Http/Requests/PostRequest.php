<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required',
            'conten' => 'required',
            'user_id' => 'required',
        ];
    }

    public  function  messages()
    {
        return [
            'title.required' => 'Vui lòng nhập tiêu đề',
            'conten.required' => 'Vui lòng nhập nội dung',
            'user_id.required' => 'Vui lòng nhập người viết',
        ];
    }
}
