<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class checkoutRequest extends FormRequest
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
            'name'=>'min:3|max:20',
            'address'=>'min:3|max:30',
            'email'=>'email',
            'phone'=>'min:9|max:10'
        ];
    }
    public function messages()
    {
        return [
            'name.min'=>'Tên phải có ít nhất 3 kí tự',
            'name.max'=>'Tên có nhiều nhất 20 kí tự',
            'address.min'=>'address có ít nhất 3 kí tự',
            'address.max'=>'address có nhiều nhất 30 kí tự',
            'email.email'=>'Email không đúng định dạng',
            'phone.min'=>'Số điện thoại không đúng định dạng',
            'phone.max'=>'Số điện thoại không đúng định dạng',
        ];
    }
}
