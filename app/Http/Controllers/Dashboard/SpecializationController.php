<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Specialization\StoreSpecializationRequest;
use App\Http\Requests\Specialization\UpdateSpecializationRequest;
use App\Models\Specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
   public function index() {

       $specializations= Specialization::get()->all();

       return view("dashboard.specializations.index",compact("specializations"));
   }

   public function store(StoreSpecializationRequest $request) {
        try{
            $validate =  $request->validated();
            $specialization = Specialization::create([
                "name" => ["ar" => $request->name_ar , "en" => $request->name_en]
            ]);
            toastr()->success(__("site.massage.add_success"));
            return redirect()->route("dashboard.specializations.index");
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );
        }
    }
    public function update(UpdateSpecializationRequest $request , $id) {

      try{
          $validate =  $request->validated();
           $specializaiton =  Specialization::findOrFail($id);
          $specializaiton->update([
              "name" => ["ar" => $request->name_ar , "en" => $request->name_en]
          ]);
          toastr()->success(__("site.massage.update_success"));
          return redirect()->route("dashboard.specializations.index");
      }
      catch (\Exception $e) {
          return redirect()->back()->withErrors(['error' => $e->getMessage()] );
      }
    }

    public function destroy($id) {
       try{
           $specializaiton =  Specialization::findOrFail($id);
           $specializaiton->delete();
           toastr()->success(__("site.massage.delete_success"));
           return redirect()->route("dashboard.specializations.index");
       }
       catch (\Exception $e) {
           return redirect()->back()->withErrors(['error' => $e->getMessage()] );
       }
    }

}
