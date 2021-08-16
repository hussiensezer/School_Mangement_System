<?php


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){

    Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function(){
        // Welcome Route To Redirect To Dashboard With MiddleWare Auth
        Route::get("/","WelcomeController@index")->name("welcome");

        // Grade Route
        Route::resource('grades','GradeController');
        // ClassRooms Route
        Route::post('classrooms/deleteAll','ClassRoomController@deleteAll')->name("classrooms.deleteAll");
        Route::post('classrooms/filterById','ClassRoomController@filterById')->name("classrooms.filterById");
        Route::resource('classrooms','ClassRoomController');

        // Sections Route
        Route::get('sections/classes/{id}','SectionController@classes')->name("sections.classes");
        Route::get('sections/status/{id}','SectionController@status')->name("sections.status");
        Route::resource('sections','SectionController');

        // Parents Route
        Route::resource("parents", 'ParentController');

        // Specializations Route
        Route::resource("specializations", 'SpecializationController');

        // Teachers Route
        Route::resource("teachers", 'TeacherController');

    });




});


