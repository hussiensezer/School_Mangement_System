<?php

namespace App\Http\Requests\Grades;

use App\Models\Grade;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class UpdateGradeRequest extends FormRequest
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
    public function rules(Request $request, Grade $grade)
    {
        $rules = [];

        foreach( LaravelLocalization::getSupportedLanguagesKeys() as $locale) {
            $rules += ['name.' . $locale => 'required|' . Rule::unique('grades', 'name->' . $locale)->ignore($request->id, 'id')];
        }

        return $rules;
    }
}
