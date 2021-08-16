<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Parents\StoreParentRequest;
use App\Models\BloodType;
use App\Models\Nationality;
use App\Models\ParentAttachment;
use App\Models\Religion;
use App\Models\StudentParent;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class ParentController extends Controller
{
    use ImageTrait;
    public function index()
    {
        $parents = StudentParent::all();
        return view("dashboard.parents.index",compact("parents"));
    }


    public function create()
    {
        $nationalities = Nationality::all();
        $bloodTypes = BloodType::all();
        $religions = Religion::all();
        return view("dashboard.parents.create",compact("nationalities",'bloodTypes','religions'));
    }


    public function store(StoreParentRequest $request)
    {
        try{
            $parent = new StudentParent();
            $parent->email =  $request->email;
            $parent->password =  Hash::make($request->password);
            $parent->father_name =  ['en' => $request->father_name_en , 'ar' => $request->father_name_ar];
            $parent->father_job  =  ['en' => $request->father_job_en  , 'ar' => $request->father_job_ar];
            $parent->national_id_father  = $request->national_id_father;
            $parent->passport_id_father  = $request->passport_id_father;
            $parent->phone_father  = $request->father_phone;
            $parent->nationality_father_id  = $request->nationality_father_id;
            $parent->bloodType_father_id  = $request->bloodType_father;
            $parent->religion_father_id  = $request->religion_father_id;
            $parent->address_father  = $request->address_father;

            // Mother Data
            $parent->mother_name =  ['en' => $request->mother_name_en , 'ar' => $request->mother_name_ar];
            $parent->mother_job  =  ['en' => $request->mother_job_en  , 'ar' => $request->mother_job_ar];
            $parent->national_id_mother  = $request->national_id_mother;
            $parent->passport_id_mother  = $request->passport_id_mother;
            $parent->phone_mother  = $request->mother_phone;
            $parent->nationality_mother_id  = $request->nationality_mother_id;
            $parent->bloodType_mother_id  = $request->bloodType_mother;
            $parent->religion_mother_id  = $request->religion_mother_id;
            $parent->address_mother  = $request->address_mother;
            $parent->save();

            if(!empty($request->photos)) {
                $parent = StudentParent::get(['id','email'])->where("email" , $request->email)->first();
                $storeImages = $this->imageStore($request->photos ,"assets/imageStore");
                if($parent) {
                    $files =  ParentAttachment::create([
                            'file_name' => $storeImages,
                            'parent_id' => $parent->id,
                    ]);
                }
            }
            toastr()->success(__('site.massage.add_success'));
            return redirect()->route("dashboard.parents.index");
        }// End Of Try
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );
        }// End Of Catch
    }


    public function show($id)
    {
        //
    }


    public function edit(StudentParent $parent)
    {
        ;
        $nationalities = Nationality::all();
        $bloodTypes = BloodType::all();
        $religions = Religion::all();
        return view("dashboard.parents.edit",compact("nationalities",'bloodTypes','religions','parent'));
    }


    public function update(Request $request, $id)
    {

        try{
            $parent = StudentParent::findOrFail($id)->first();
            $pass = !empty($request->password) ? bcrypt($request->password) : $parent->password;
            $image =$parent->parentattachment->file_name;
            if(!empty($request->photos) ) {
                Storage::disk('parent')->delete('imageStore/'. $parent->parentAttachment->file_name);
            $image = $this->imageStore($request->photos ,"imageStore");
            }
            $parent->update([
                "email" => $request->email,
                "password" =>$pass,
                "father_name" => ['en' => $request->father_name_en , 'ar' => $request->father_name_ar],
                "father_job" => ['en' => $request->father_job_en  , 'ar' => $request->father_job_ar],
                'national_id_father' =>  $request->national_id_father,
                'passport_id_father' =>  $request->passport_id_father,
                'phone_father' =>  $request->father_phone,
                'nationality_father_id' =>  $request->nationality_father_id,
                'bloodType_father_id' =>  $request->bloodType_father,
                'religion_father_id' =>  $request->religion_father_id,
                'address_father' =>  $request->address_father,
                'mother_name' =>  ['en' => $request->mother_name_en , 'ar' => $request->mother_name_ar],
                'mother_job' =>  ['en' => $request->mother_job_en  , 'ar' => $request->mother_job_ar],
                'national_id_mother' =>  $request->national_id_mother,
                'passport_id_mother' =>  $request->passport_id_mother,
                'phone_mother' =>  $request->mother_phone,
                'nationality_mother_id' =>  $request->nationality_mother_id,
                'bloodType_mother_id' =>  $request->bloodType_mother,
                'religion_mother_id' =>  $request->religion_mother_id,
                'address_mother' =>  $request->address_mother,
            ]);
            $parentAttachment =   ParentAttachment::get()->where("parent_id" , $id)->first();
            $parentAttachment->update([
                "file_name" => $image
            ]);
            toastr()->success(__('site.massage.add_success'));
            return redirect()->route("dashboard.parents.index");
        }// End Of Try
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );
            return $e->getMessage();
        }// End Of Catch
    }


    public function destroy($id)
    {
        try {
            $parent = StudentParent::findOrFail($id)->first();
            $parentAttachment = ParentAttachment::findOrFail($parent->parentAttachment->id)->first();
          $deleteParent = $parent->delete();
          if($deleteParent) {
              Storage::disk('parent')->delete('imageStore/'. $parent->parentAttachment->file_name);
          }
            toastr()->success(__('site.massage.delete_success'));
            return redirect()->route("dashboard.parents.index");
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            return $e->getMessage();
        }
    }
}
