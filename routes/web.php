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
    return view('index');
});

Route::post('/check_domain', 'UserController@checkDomain');
Route::get('/login', 'UserController@getLogin');
Route::post('/login', 'UserController@postLogin');
Route::get('/register', 'UserController@getRegister');
Route::post('/register', 'UserController@postRegister');
Route::get('/logout', 'UserController@logout');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('project', 'ProjectController', ['only' => 'store']);

    Route::group(['prefix' => 'app'], function () {
        Route::get('/', 'PageController@app');
        Route::get('{team}', 'TeamController@show');
        Route::get('{team}/manage', 'TeamController@manage');

        Route::get('{team}/projects', 'TeamController@projects');
        Route::get('{team}/project', 'ProjectController@show');
        Route::post('{team}/project', 'ProjectController@store');
        Route::get('{team}/project/create', 'ProjectController@create');
        Route::get('{team}/project/{project}', 'ProjectController@show');

        Route::get('{team}/templates', 'TeamController@templates');
        Route::post('{team}/template', 'ProjectTemplateController@store');
        Route::get('{team}/template/{template}', 'ProjectTemplateController@show');
        // Route::post('{team}/template/{template}/task', 'TaskTemplateController@store');
        Route::get('{team}/template/{id}/delete', 'ProjectTemplateController@delete');

        Route::resource('{team}/template/{template}/task', 'TaskTemplateController');
        Route::resource('{team}/project/{project}/task', 'TaskController');
        Route::resource('{team}/manage/user', 'UserController');
    });
});
