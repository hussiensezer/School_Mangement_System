<?php

namespace App\Http\Requests\Grades;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\Translatable\HasTranslations;
class StoreGradeRequest extends FormRequest
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
           'name_ar' => 'required|unique:grades,name',
           'name_en' => 'required',

        ];
    }
}
