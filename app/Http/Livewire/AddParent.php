<?php

namespace App\Http\Livewire;

use App\Models\BloodType;
use App\Models\Nationality;
use App\Models\Religion;
use App\Models\StudentParent;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddParent extends Component
{
    use WithFileUploads;
    public $currentStep  = 1,
        $photos,
        $updateMode = false,
        $successMessage,
        $catchError,
        $email ,$password,

        // Father Data
        $father_name_ar,
        $father_name_en,$father_job_ar,
        $father_job_en,$national_id_father,
        $passport_id_father,$father_phone,
        $nationality_father_id,$bloodType_father,
        $religion_father_id,$address_father,

    // Mother Data
        $mother_name_ar,
        $mother_name_en,$mother_job_ar,
        $mother_job_en,$national_id_mother,
        $passport_id_mother,$mother_phone,
        $nationality_mother_id,$bloodType_mother,
        $religion_mother_id,$address_mother
    ;



    public function updated($propertyName) {
        $this->validateOnly($propertyName,[
            'email' => 'required|email',
            'national_id_father' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'passport_id_father' => 'min:10|max:10',
            'father_phone' =>       'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'national_id_mother' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'passport_id_mother' => 'min:10|max:10',
            'mother_phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',

        ]);
    }
    public function steps($page)
    {
        if($page == 2) {

        $fatherValidate = $this->validate([
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
            'address_father'    => 'required'
        ]);
            if($fatherValidate) {$this->currentStep = $page;}
        }// End If Statement Of Father Validate

        elseif($page == 3)
        {
            $motherValidate = $this->validate([
                'email' => 'required|unique:student_parents,email,' . $this->id,
                'password'=> 'required',
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
            ]);
            if($motherValidate) {$this->currentStep = $page;}
        }// End If Statement Of Mother Validate

        else {
            $this->currentStep = $page;
        }


    }
    public function submitForm() {
        try{

            $parent = new StudentParent();
            $parent->email =  $this->email;
            $parent->password =  Hash::make($this->password);
            $parent->father_name =  ['en' => $this->father_name_en , 'ar' => $this->father_job_ar];
            $parent->father_job  =  ['en' => $this->father_job_en  , 'ar' => $this->father_job_ar];
            $parent->national_id_father  = $this->national_id_father;
            $parent->passport_id_father  = $this->passport_id_father;
            $parent->phone_father  = $this->father_phone;
            $parent->nationality_father_id  = $this->nationality_father_id;
            $parent->bloodType_father_id  = $this->bloodType_father;
            $parent->religion_father_id  = $this->religion_father_id;
            $parent->address_father  = $this->address_father;

            // Mother Data
            $parent->mother_name =  ['en' => $this->mother_name_en , 'ar' => $this->mother_job_ar];
            $parent->mother_job  =  ['en' => $this->mother_job_en  , 'ar' => $this->mother_job_ar];
            $parent->national_id_mother  = $this->national_id_mother;
            $parent->passport_id_mother  = $this->passport_id_mother;
            $parent->phone_mother  = $this->mother_phone;
            $parent->nationality_mother_id  = $this->nationality_mother_id;
            $parent->bloodType_mother_id  = $this->bloodType_mother;
            $parent->religion_mother_id  = $this->religion_mother_id;
            $parent->address_mother  = $this->address_mother;
            $parent->save();
            $this->successMessage = __("site.massage.add_success");
            $this->clearForm();
            $this->currentStep = 1;
        }// End Of Try
        catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        }// End Of Catch
    }// End SubmitForm
    public function clearForm()
    {
        $inputsData = [
            "password",
            "email",
            // Father Data
            "father_name_ar",
            "father_name_en","father_job_ar",
            "father_job_en","national_id_father",
            "passport_id_father","father_phone",
            "nationality_father_id","bloodType_father",
            'religion_father_id',"address_father",

            // Mother Data
            "mother_name_ar",
            "mother_name_en",'mother_job_ar',
            "mother_job_en","national_id_mother",
            'passport_id_mother','mother_phone',
            'nationality_mother_id','bloodType_mother',
            'religion_mother_id','address_mother'];

        foreach($inputsData  as $input) {
            $this->$input = '';
        }
    }// End Clear Form
    public function render()
    {
        return view('livewire.add-parent',[
            'nationalities' => Nationality::all(),
            'bloodTypes' => BloodType::all(),
            'religions' => Religion::all(),
        ]);
    }


}

