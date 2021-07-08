<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassRooms\StoreClassRoomRequest;
use App\Models\ClassRoom;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ClassRoomController extends Controller
{

    public function index()
    {
        $classrooms = ClassRoom::all();

        $grades =  Grade::select('name','id')->get();
        return view('dashboard.classrooms.index',compact('classrooms','grades'));
    } // End Of index


    public function create()
    {
        //
    }// End Of create


    public function store(StoreClassRoomRequest $request)
    {

        $lists = $request->Lists;

        try{

            foreach($lists as $list) {
                $classRoom = new ClassRoom();
                $classRoom->name = ['en' => $list['name_en'], 'ar' => $list['name_ar']];
                $classRoom->grade_id = $list['grade_id'];
                 $classRoom->save();

             }
            toastr()->success(__('site.massage.add_success'));
            return redirect()->route("dashboard.classrooms.index");
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }// End Of store


    public function show(ClassRoom $classRoom)
    {
        //
    }// End Of show


    public function edit(ClassRoom $classRoom)
    {
        //
    }// End Of edit


    public function update(StoreClassRoomRequest $request, $id)
    {

        try{

        $classRoom =   ClassRoom::findOrFail($id);
           $classRoom->update([
               'name' => ['ar' => $request->name_ar , 'en' => $request->name_en],
              'grade_id' => $request->grade_id,
           ]);

        toastr()->success(__('site.massage.update_success'));
        return redirect()->route("dashboard.classrooms.index");
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );
        }
    }// End Of update


    public function destroy(ClassRoom $classRoom,$id)
    {
        try{
            $classRoom =  $classRoom->findOrFail($id);
            $classRoom->delete();
            toastr()->success(__('site.massage.delete_success'));
            return redirect()->route("dashboard.classrooms.index");
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );
        }
    }// End Of destroy


    public function deleteAll(Request $request) {

       try{
           $ids = explode(",", $request->ids);

           classRoom::whereIn("id",$ids)->delete();
           toastr()->success(__('site.massage.delete_success'));
           return redirect()->route("dashboard.classrooms.index");
       }
       catch (\Exception $e){
           return redirect()->back()->withErrors(['error' => $e->getMessage()] );
       }
    }

    public function filterById(Request $request) {

        $grades = Grade::all();
       $search =   ClassRoom::where("grade_id", "=" ,$request->grade_id)->get();
        return view('dashboard.classrooms.index',compact('grades'))->withDetails($search);
    }
}
