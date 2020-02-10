<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitCommentRequest extends FormRequest
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
            'email'=>'required|email',
            'content'=>'required',
            recaptchaFieldName() => recaptchaRuleName()
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'نام خود را جهت ثبت نظر باید حتما وارد نمایید',
            'name.string'=>'نام شما باید مجموعه ای از حروف و عدد باشد',
            'name.max'=>'نام شما بسیار طولانی است باید حداکثر 256 حرف باشد',
            'name.min'=>'نام شما بسیار کوتاه است باید حداقل 5 حرف باشد',
            'email.required'=>'حتما باید ایمیل خود را ثبت نمایید',
            'email.email'=>'ایمیل خود را بو صورت ایمل صحیح وار نمایید',
            'content.required'=>'حتما نظر خود را بنویسید'
        ];
    }
}
