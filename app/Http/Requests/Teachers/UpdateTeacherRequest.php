<?php

namespace App\Http\Requests\Teachers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTeacherRequest extends FormRequest
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
//            'email' =>  'required|' .  Rule::unique('teachers', 'email')->ignore($this->id),

            'name_ar' => 'required',
            'name_en' => 'required',
            'specialization_id' => 'required|exists:specializations,id',
            'gender_id' => 'required|exists:genders,id',
            'joined_date' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ];
    }
}
