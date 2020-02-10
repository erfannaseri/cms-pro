<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
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
            'name'=>'required|min:8|max:255',
            'content'=>'required'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'=>'لطفا فیلد نام مقاله را وارد نمایید',
            'name.min'=>'نام مقاله بسیار کوتاه است حداقل باید 8 کارکتر باشد',
            'name.max'=>'نام مقاله بسیار طولانی است',

            'content.required'=>'لطفا متن مقاله را وارد نمایید'
        ];
    }
}
