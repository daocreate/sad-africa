<?php

Route::get('/home','FrontController@index')->name('home');
Route::get('lang/{locale}', 'FrontController@lang'); //for Localisation
Route::get('/course_list','FrontController@formations_index')->name('course_list');