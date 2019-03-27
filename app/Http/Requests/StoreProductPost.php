<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(app('current_user_type') !== 'guest'){
            return true;
        }

    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Заполните название',
            'art.required'  => 'Заполните артикул',
            'art.regex'    => 'Разрешены только латинские буквы и цифры'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'art' => 'required|unique:products|regex:/^[A-Za-z0-9]+$/i',
        ];
    }
}
