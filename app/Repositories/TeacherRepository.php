<?php

namespace App\Repositories;

use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use http\Exception;

class TeacherRepository implements TeacherRepositoryInterface
{

    // Return All Teachers
    public function getAllTeachers()
    {
           return Teacher::all();
    }

    // Return All Gender
    public function getGenders() {
        return Gender::all();
    }

    // Return All Specializations
    public function getSpecializations() {
        return Specialization::all();
    }

    // Store Teacher Into Database
    public function storeTeacher($request)
    {
        try{

            $teachers =  Teacher::create([
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'name' => ['en' => $request->name_en , 'ar' => $request->name_ar],
                'specialization_id' => $request->specialization_id,
                'gender_id' => $request->gender_id,
                'joined_date' => $request->joined_date,
                'address' => $request->address,
                'phone' => $request->phone
            ]);
            toastr()->success(__('site.massage.add_success'));
            return redirect()->route("dashboard.teachers.index");
        }
        catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );
        }
    }

    //Get Single Teachers To Update or Show or Delete
    public function getTeacher($id) {
        return Teacher::findOrFail($id);
    }

    // Edit Teacher
    public function editTeacher($id)
    {   $teacher = $this->getTeacher($id);
        $genders = $this->getGenders();
        $specializations = $this->getSpecializations();
        return view("dashboard.teachers.edit",compact('teacher','genders','specializations'));
    }

    //Update Teacher
    public function updateTeacher($request,$id)
    {
       try {
           $validate =  $request->validated();
           $teacher = $this->getTeacher($id);
           $pass = empty($request->password) ? $teacher->password : bcrypt($request->password);

            $teacher->update([
                'email' => $request->email,
                'password' => $pass,
                'name' => ['en' => $request->name_en , 'ar' => $request->name_ar],
                'specialization_id' => $request->specialization_id,
                'gender_id' => $request->gender_id,
                'joined_date' => $request->joined_date,
                'address' => $request->address,
                'phone' => $request->phone
            ]);
           toastr()->success(__('site.massage.update_success'));
           return redirect()->route("dashboard.teachers.index");
       }
       catch (\Exception  $e) {
           return redirect()->back()->withErrors(['error' => $e->getMessage()] );
       }
    }

    public function destroyTeacher($id)
    {
       try{
           $teacher =  $this->getTeacher($id);
           $teacher->delete();
           toastr()->success(__('site.massage.delete_success'));
           return redirect()->route("dashboard.teachers.index");
       }
       catch (\Exception $e) {
           return redirect()->back()->withErrors(['error' => $e->getMessage()] );
       }
    }
}
