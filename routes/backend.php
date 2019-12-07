<?php

Route::group(['middleware' => ['role:admin|manager']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('formations','FormationController');
    Route::get('/profile1', 'AvatarController@index')->name('profile.show');
    Route::get('/admin','BackController@index')->name("backIndex");
    /* Events route */
    Route::resource('events', 'EventController');
    Route::resource('categories', 'CategoryController');
});
Route::get('/admin','BackEndController@index')->middleware('auth')->name("backIndex");
Route::get('/login','AuthBack\MyloginController@login')->name("login");
Route::post('/login','AuthBack\MyloginController@treatmentLogin')->name("tLogin");
Route::get('/logout','AuthBack\MyloginController@getOut')->name("logout");
Route::get('/signup','AuthBack\MysignupController@signup')->name("singup");
Route::post('/signup','AuthBack\MysignupController@treatmentSignup')->name("tSingup");
//Route::get('/addUser','BackController@addUser');
Route::get('/frontend', function () {
    return view('frontend.home');
});