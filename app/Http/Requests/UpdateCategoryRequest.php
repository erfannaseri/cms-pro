<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'slug'=>'required|min:5|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'لطفا فیلد نام دسته بندی را وارد نمایید',
            'name.min'=>'نام دسته بندی بسیار کوتاه است حداقل باید 8 کارکتر باشد',
            'name.max'=>'نام دسته یندی بسیار طولانی است',
            'slug.required'=>'لطفا فیلد نام مستعار دسته بندی را وارد نمایید',
            'slug.min'=>'نام مستعار دسته بندی بسیار کوتاه است حداقل باید 8 کارکتر باشد',
            'slug.max'=>'نام مستعار دسته یندی بسیار طولانی است',
        ];
    }
}
