<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name'=>'required|max:255|min:5|string',
            'email'=>'required|max:255|min:10|email',
            'password'=>'required|max:255|min:6|confirmed',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'لطفا فیلد نام را پر کنید',
            'name.max'=>'نام وارد شده بسیار طولانی است',
            'name.min'=>'نام وارد شده بسیار کوتاه است',
            'name.string'=>'فرمت نام وارد شده درست نیس لطفا از حروف استفاده نمایید',
            'email.required'=>'لطفا فیلد ایمیل را پر کنید',
            'email.max'=>'ایمیل وارد شده بسیار طولانی است',
            'email.min'=>'ایمیل وارد شده بسیار کوتاه است',
            'email.email'=>'لطفا فرمت ایمیل را درست وارد نمایید',
            'password.required'=>'لطفا فیلد رمز عبور را پر کنید',
            'password.max'=>'رمز عبور وارد شده بسیار طولانی است',
            'password.min'=>'رمز عبور وارد شده باید حداقل 6کارکتر باشد',
            'password.confirmed'=>'رمز عبور های وارد شده منطبق نیستند',
        ];
    }
}
