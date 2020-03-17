<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditInformationUser extends FormRequest
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
            'full'=>'required|min:2|max:32',
            'password'=>'required|min:5',

        ];
    }
    public function messages()
    {
        return [
            'full.required'=>'Tên không được để trống!',
            'full.min'=>'Tên phải có ít nhất 2 kí tự!',
            'full.max'=>'Tên phải không được quá 32 kí tự!',
            'password.required'=>'Mật khẩu không được để trống!',
            'password.min'=>'Mật khẩu phải có ít nhất 5 kí tự!'
        ];
    }
}
