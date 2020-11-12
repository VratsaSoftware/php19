<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookCreateUpdateRequest extends FormRequest
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
        // всички полета са задължителни
        // цената е число
        // снимката е файл във формат jpg, png
        return [
            'title'     => 'required',
            'isbn'      => 'required',
            'price'     => 'required|numeric',
            'info'      => 'required',
            'filename'  => 'required|mimes:jpg,png',
            'date_available' => 'required',
            'author_id' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'title.required'    => 'Полето е задължително!',
            'isbn.required'     => 'Полето е задължително!',
            'price.required'    => 'Полето е задължително!',
            'price.numeric'     => 'Въведете число!',
            'info.required'     => 'Полето е задължително!',
            'filename.required'  => 'Полето е задължително!',
            'filename.mimes'    => 'Добавете файл формат .png или .jpg!',
            'date_available.required'  => 'Полето е задължително!',
            'author_id.required'  => 'Полето е задължително!',
            'author_id.numeric'   => 'Полето е задължително!',
        ];
    }
}
