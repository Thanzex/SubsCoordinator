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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'TestController@index')->name('test')->middleware('auth');

// Route::get('/Serie','ProjectController@index')->name('projects');
// Route::post('/Serie/create', 'ProjectController@store')->name('project.store');
// Route::get('/Serie/create', 'ProjectController@create')->name('project.create');
// Route::get('/Serie/{id}/edit','ProjectController@edit')->name('project.edit');
// Route::post('/Serie/{id}/delete','ProjectController@destroy')->name('project.destroy');
// Route::get('/Serie/{id}','ProjectController@show')->name('project.show');

Route::resource('Serie','ProjectController');
Route::post('Serie/edit','ProjectController@formEdit')->name('Serie.formEdit');
Route::post('Serie/destroy','ProjectController@formDestroy')->name('Serie.formDestroy');
