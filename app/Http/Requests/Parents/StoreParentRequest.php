<?php

namespace App\Http\Requests\Parents;

use Illuminate\Foundation\Http\FormRequest;

class StoreParentRequest extends FormRequest
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
            //         Father Validate
            'email' => 'required|unique:student_parents,email,' . $this->id,
            'password'=> 'required',
            'father_name_ar' => 'required',
            'father_name_en' => 'required',
            'father_job_ar' => 'required',
            'father_job_en' => 'required',
            'national_id_father' => 'required|unique:student_parents,nationality_father_id,' . $this->id,
            'passport_id_father' => 'required|unique:student_parents,passport_id_father,' . $this->id,
            'father_phone' =>       'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'nationality_father_id' => "required|exists:nationalities,id",
            'bloodType_father' => "required|exists:blood_types,id",
            'religion_father_id' => "required|exists:religions,id",
            'address_father'    => 'required',
            //     Mother Validate
            'mother_name_ar' => 'required',
            'mother_name_en' => 'required',
            'mother_job_ar' => 'required',
            'mother_job_en' => 'required',
            'national_id_mother' => 'required|unique:student_parents,nationality_mother_id,' . $this->id,
            'passport_id_mother' => 'required|unique:student_parents,passport_id_mother,' . $this->id,
            'mother_phone' =>       'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'nationality_mother_id' => "required|exists:nationalities,id",
            'bloodType_mother' => "required|exists:blood_types,id",
            'religion_mother_id' => "required|exists:religions,id",
            'address_mother'    => 'required'
        ];
    }
}
