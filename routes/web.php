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

Route::resource('project', 'ProjectController', ['only' => 'store']);

Route::group(['prefix' => 'app'], function () {
    Route::get('{team}', function ($team) { echo $team; });
    Route::get('{team}/team', function ($team) { echo "$team management"; });
});
