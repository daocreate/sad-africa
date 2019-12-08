<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function (){
    return redirect('home');
});
Auth::routes();
Route::get('profile', 'AvatarController@index')->middleware('auth')->name('profile.show');
Route::resource('avatar','AvatarController')->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin1', function () {
    return view('backend.index');
});
Route::get('/home', 'HomeController@index')->name('home');
//for language transcription
Route::get('languages', 'LanguageTranslationController@index')->name('languages');
Route::post('translations/update', 'LanguageTranslationController@transUpdate')->name('translation.update.json');
Route::post('translations/updateKey', 'LanguageTranslationController@transUpdateKey')->name('translation.update.json.key');
Route::delete('translations/destroy/{key}', 'LanguageTranslationController@destroy')->name('translations.destroy');
Route::post('translations/create', 'LanguageTranslationController@store')->name('translations.create');
Route::get('check-translation', function(){
    \App::setLocale('fr');
    dd(__('website'));
});
