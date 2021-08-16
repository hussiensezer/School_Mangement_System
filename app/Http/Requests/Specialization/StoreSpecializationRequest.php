<?php

namespace App\Http\Requests\Specialization;

use Illuminate\Foundation\Http\FormRequest;

class StoreSpecializationRequest extends FormRequest
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
            'name_ar' => 'required|unique:specializations,name->ar,' . $this->id,
            'name_en' => 'required|unique:specializations,name->en,' . $this->id,
        ];
    }
}
