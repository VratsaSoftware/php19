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
           'level' => 'required|min:5',
           // 'test'  => 'required'
        ];
    }

    public function messages()
    {
        return [
            'level.required'  => 'Полето е задължително!',
            'level.min'       => 'Въведете най-малко 5 знака!',
            // 'test.required'   => 'Полето е задължителн!'
        ];
    }
}
