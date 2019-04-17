<?php



Route::get('/', function () {
    return view('_layout');
});
Route::get("/coach/delete","CoachController@destroy")->name('coach.destroy.new');
Route::resource('coach','CoachController');

Route::get("/courses/delete","CoursesController@destroy")->name('courses.destroy.new');
Route::resource('courses','CoursesController');
