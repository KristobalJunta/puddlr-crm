<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/test', function (Request $request) {
    // dd($request->all());
    foreach($request->get('quotas') as $user_id => $quota) {
        echo "$user_id - $quota\n";
    }
});
