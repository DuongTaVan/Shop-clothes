<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'full'=>'min:3|max:20',
            'email'=>'email',
            'theme'=>'min:3|max:20',
            'message'=>'min:3|max:100'
        ];
    }
    public function messages()
    {
        return [
            'full.min'=>'Họ và tên phải có ít nhất 3 kí tự',
            'full.max'=>'Họ và tên có nhiều nhất 20 kí tự',
            'email.email'=>'Sai định dạng email',
            'theme.min'=>'Chủ đề phải có ít nhất 3 kí tự',
            'theme.max'=>'Chủ đề có nhiều nhất 20 kí tự',
            'message.min'=>'Lời nhắn phải có ít nhất 3 kí tự',
            'message.max'=>'Lời nhắn có nhiều nhất nhất 100 kí tự',
        ];
    }
}
