<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassRooms\StoreClassRoomRequest;
use App\Models\ClassRoom;
use App\Models\Grade;
use Illuminate\Http\Request;

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
        $validated = $request->validated();
        ClassRoom::create([
            'name' => $request->name,
            'grade_id'=> $request->grade_id
        ]);
        toastr()->success(__('site.massage.add_success'));
        return redirect()->route("dashboard.classrooms.index");
    }// End Of store


    public function show(ClassRoom $classRoom)
    {
        //
    }// End Of show


    public function edit(ClassRoom $classRoom)
    {
        //
    }// End Of edit


    public function update(Request $request, ClassRoom $classRoom)
    {
        //
    }// End Of update


    public function destroy(ClassRoom $classRoom)
    {
        //
    }// End Of destroy
}
