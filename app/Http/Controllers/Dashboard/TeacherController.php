<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teachers\StoreTeacherRequest;
use App\Http\Requests\Teachers\UpdateTeacherRequest;
use Illuminate\Http\Request;
use App\Repositories\TeacherRepositoryInterface;
class TeacherController extends Controller
{
    private $teachersRepository ;

    public function __construct(TeacherRepositoryInterface $teachersRepository)
    {
        $this->teachersRepository = $teachersRepository;
    }

    public function index() {
      $teachers = $this->teachersRepository->getAllTeachers();
     return view("dashboard.teachers.index",compact('teachers'));
    }

    public function create() {
        $genders = $this->teachersRepository->getGenders();
        $specializations = $this->teachersRepository->getSpecializations();
        return view("dashboard.teachers.create",compact("genders",'specializations'));
    }
    public function store(StoreTeacherRequest $request) {
        return $this->teachersRepository->storeTeacher($request);
    }

    public function edit($id) {
       return  $this->teachersRepository->editTeacher($id);

    }

    public function update(UpdateTeacherRequest $request, $id) {
        return $this->teachersRepository->updateTeacher($request,$id);
    }
    public function destroy($id) {
        return $this->teachersRepository->destroyTeacher($id);
    }
}
