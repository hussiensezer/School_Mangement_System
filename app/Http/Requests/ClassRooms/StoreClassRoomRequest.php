<?php

namespace App\Http\Requests\ClassRooms;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class StoreClassRoomRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $rules = ["grade_id" => 'required|exists:grades,id'];
        foreach( LaravelLocalization::getSupportedLanguagesKeys() as $locale) {
            $rules += ['name.' . $locale => 'required|' . Rule::unique('classrooms', 'name->' . $locale)->ignore($request->grade_id, 'grade_id')];
        }
        return $rules;
    }
}
