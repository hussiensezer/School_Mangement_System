<?php

namespace App\Http\Livewire;

use App\Models\BloodType;
use App\Models\Nationality;
use App\Models\Religion;
use Livewire\Component;

class AddParent extends Component
{

    public $currentStep  = 1,
        $email ,$password,

        // Father Data
        $father_name_ar,
        $father_name_en,$father_job_ar,
        $father_job_en,$national_id_father,
        $passport_id_father,$father_phone,
        $nationality_father_id,$bloodType_father,
        $Religion_father_id,$Address_father,

    // Mother Data
        $mother_name_ar,
        $mother_name_en,$mother_job_ar,
        $mother_job_en,$national_id_mother,
        $passport_id_mother,$mother_phone,
        $nationality_mother_id,$bloodType_mother,
        $Religion_mother_id,$Address_mother
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
        $this->currentStep = $page;
    }

    public function render()
    {
        return view('livewire.add-parent',[
            'nationalities' => Nationality::all(),
            'bloodTypes' => BloodType::all(),
            'religions' => Religion::all(),
        ]);
    }


}

