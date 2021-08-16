<?php

namespace App\Http\Requests\Specialization;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSpecializationRequest extends FormRequest
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
            'name_ar' => ['required' ,  Rule::unique('specializations','name->ar')->ignore($this->id)],
            'name_en' =>  ['required' ,  Rule::unique('specializations', 'name->en')->ignore($this->id)],
        ];
    }
}
