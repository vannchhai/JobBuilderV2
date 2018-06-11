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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([
        'middleware' => ['api', 'cors','throttle:60,1',
        'bindings'],
        'prefix' => '',
    ], function ($router) {

		Route::post('/AddExperience', 'Candidate\AddResumeController@AddExperience');


    });