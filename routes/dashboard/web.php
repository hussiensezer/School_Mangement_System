<?php


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){

    Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function(){
        // Welcome Route To Redirect To Dashboard With MiddleWare Auth
        Route::get("/","WelcomeController@index")->name("welcome");

        Route::resource('grades','GradeController');


    });

});


