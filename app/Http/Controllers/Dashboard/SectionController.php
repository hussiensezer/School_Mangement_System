<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sections\StoreSectionRequest;
use App\Models\ClassRoom;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{

    public function index()
    {
        $allGrades = Grade::with(['sections',"classrooms"])->get();
        $sections = Section::get()->all();
        $grades = Grade::get()->all();

        return view("dashboard.sections.index",compact("sections", "grades","allGrades"));
    }


    public function create()
    {
        //
    }


    public function store(StoreSectionRequest $request)
    {


       try{
            $validate = $request->validated();

            $requestData = $request->except(['name_ar','name_en']);
            $requestData['name'] = ['ar' => $request->name_ar , 'en' => $request->name_en];

            $section = Section::create([
                'name' => $requestData['name'],
                'grade_id' => $requestData['grade_id'],
                'classroom_id' => $requestData['classroom_id'],
                'status'   => $requestData['status']
            ]);
            toastr()->success(__("site.massage.add_success"));
            return redirect()->route("dashboard.sections.index");
       }
       catch(\Exception $e) {
           return redirect()->back()->withErrors(['error' => $e->getMessage()] );
       }
    }// End Of Request


    public function show(Section $section)
    {
        //
    }


    public function edit(Section $section)
    {
        //
    }


    public function update(StoreSectionRequest $request, Section $section)
    {
        try{
            $validated =  $request->validated();
            $request_data = $request->except(['name_ar','name_en']);
            $request_data['name'] = ['ar' => $request->name_ar , 'en' => $request->name_ar];
            $section->update([
                'name' => $request_data['name'],
                'classroom_id' => $request_data['classroom_id'],
                'grade_id' => $request_data['grade_id'],
                'status' => $request_data['status'],
            ]);
            toastr()->success(__('site.massage.update_success'));
            return redirect()->route('dashboard.sections.index');
        }
        catch (\Exception  $e) {
            return redirect()->back()->withErrors(['error' => $e->message()]);
        }
    }


    public function destroy(Section $section)
    {
        try{
            $section->delete();
            toastr()->success(__("site.massage.delete_success"));
            return redirect()->route("dashboard.sections.index");
        }
        catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->message()] );
        }
    }// End Of Destroy

    public function classes($id) {
      //$classRooms =   ClassRoom::select(["name","id"])->where("grade_id" ,"=", $request->id)->get();
      $classRooms =   ClassRoom::where("grade_id" , $id)->pluck("name","id");

        return  $classRooms;
    }

    public function status($id) {

        try{
            $section = Section::findorFail($id);
            // I Said If Status Active Change To Deactivate From 1 To 0 , If Come With 0 Value Will be 1
            $status =   $section->status == 1 ? 0 : 1;
            $section->update([
            "status" =>  intval($status),
            ]);
            toastr()->success(__("site.massage.update_success"));
            return redirect()->route("dashboard.sections.index");
        }
        catch (\Exeption $e) {

            return redirect()->back()->withErrors(['error' => $e->message()]);
        }
    }
}
