<?php

namespace App\Http\Requests\Sections;

use Illuminate\Foundation\Http\FormRequest;

class StoreSectionRequest extends FormRequest
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
            'name_ar' => 'required',
            'name_en' => 'required',
            "grade_id" => 'required|exists:grades,id',
            "classroom_id" => 'required|exists:classrooms,id',
            'status'    => 'required|boolean'
        ];
    }
}
