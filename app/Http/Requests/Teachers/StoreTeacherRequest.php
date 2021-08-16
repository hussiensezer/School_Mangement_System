<?php

namespace App\Http\Requests\Teachers;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherRequest extends FormRequest
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
            'email' => 'required|unique:teachers|email',
            'password' => 'required|min:6|max:10',
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
