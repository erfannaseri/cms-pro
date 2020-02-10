<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePortfolioRequest extends FormRequest
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
            'name'=>'required|min:5|',
            'description'=>'required',
            'link'=>'required',
            'tag'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'عنوان نمونه کار را وارد نمایید',
            'name.min'=>'عنوان نمونه مار باید حداقل 5 حرفی باشد',
            'description.required'=>'جزییات را برای نمونه کار بنویسید',
            'link.required'=>'لینک مربوط به این نمونه کار را بنویسید',
            'tag.required'=>'تگ مربوط به این نمونه کار را انتخاب نمایید',

        ];
    }
}
