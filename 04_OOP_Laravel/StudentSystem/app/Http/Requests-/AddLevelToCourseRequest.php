<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddLevelToCourseRequest extends FormRequest
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
            'level' => 'required|min:3|max:100'
        ];
    }

     public function messages() {
        return [
            'level.required' => 'Полето :attribute е задължително!',
            'level.min'      => 'Въведете минимум :min знака!',
            'level.max'     => 'Въведете максимум :max знака!',           
        ];
    }
}
