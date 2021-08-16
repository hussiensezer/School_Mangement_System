<?php

namespace App\Repositories;

interface TeacherRepositoryInterface
{
    //Get all Teachers
    public function getAllTeachers();

    //Get all Genders
    public function getGenders();

    //Get all Specializations
    public function getSpecializations();

    /*Store Teacher Into DataBase
      --Accept Parameters $Request Of Data
    */
    public  function storeTeacher($request);

    // get Single Teacher
    public function getTeacher($id);

    // Retrieve Data Of Teacher To Edit
    public  function editTeacher($id);

    //Update Data Of Teacher

    public function updateTeacher($request,$id) ;

    // Delete Teacher From DB

    public function destroyTeacher($id) ;

}
