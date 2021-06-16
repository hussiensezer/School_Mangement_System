<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Grades\UpdateGradeRequest;
use App\Models\Grade;
use App\Http\Requests\Grades\StoreGradeRequest;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class GradeController extends Controller
{

    public function index()
    {
        $grades = Grade::get()->all();
        return view("dashboard.grades.index",compact('grades'));
    }// End Of Index


    public function create()
    {
    } // End Of create

    public function store(StoreGradeRequest $request)
    {
        if(Grade::where('name->ar', $request->name_ar)->orWhere('name->en',$request->name_en)->exists()) {
            return redirect()->back()->withErrors([__('site.massage.error'),__('site.massage.name_exists')]);

        }

       try{
           $validated = $request->validated();
           // Except Request Name And Name name_en To Re Assign For Name To Save Into DataBase
           $request_data = $request->except(['name_ar','name_en']);

           $request_data['name'] = ['en' => $request->name_en, 'ar' => $request->name_ar];

           Grade::create($request_data);

           toastr()->success(__('site.massage.add_success'));
           return redirect()->route("dashboard.grades.index");
       }

       catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );
       }
    } // End Of store


    public function show(Grade $grade)
    {
        //
    }// End Of show


    public function edit(Grade $grade)
    {
        //
    }// End Of edit

    public function update(Request $request, Grade $grade)
    {
        $grades =Grade::whereNotIn('id', [$request->id]);

        dd($grades);
        //$grade = json_decode( $grade);


//        try{
//            $request_data = $request->except(["name_ar",'name_en']);
//
//            $request_data['name'] = ['en' => $request->name_en, 'ar' => $request->name_ar];
//            $grade->update($request_data);
//
//            toastr()->success(__('site.massage.update_success'));
//            return redirect()->route('dashboard.grades.index');
//        }
//        catch (\Exception $e) {
//            return redirect()->back()->withErrors(['error' => $e->getMessage()] );
//        }
    }// End Of update


    public function destroy(Grade $grade)
    {
        $grade = $grade->findOrFail($grade->id)->delete();
        toastr()->success(__('site.massage.delete_success'));
        return redirect()->route('dashboard.grades.index');
    } // End Of destroy
}
