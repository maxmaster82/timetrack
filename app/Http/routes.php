<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('project/{project}', 'ProjectController@getProjectData');
Route::get('project/{project}/time', 'ProjectController@getTimeEntries');
Route::post('project/{project}/time', 'ProjectController@addTimeEntry');
Route::delete('project/{project}/time/{timeEntry}', 'ProjectController@deleteTimeEntry');

Route::get('/project/{project}/edit', 'ProjectController@edit');
Route::post('/project/{project}/edit', 'ProjectController@update');