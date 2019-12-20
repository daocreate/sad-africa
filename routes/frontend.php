<?php

Route::get('/home','FrontController@index')->name('home');
Route::get('lang/{locale}', 'FrontController@lang'); //for Localisation
Route::get('/course_list','FrontController@formations_index')->name('course_list');
Route::get('check-translation', function(){
    \App::setLocale('fr');
    \Carbon\Carbon::setLocale('fr');
    dd(__('website'));
});
Route::group(['middleware' => ['role:learner']], function() {
    Route::get('/learner','LearnerController@index')->name("learner");
    Route::get('/inscription','LearnerController@inscription')->name("inscription");

});