<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::group(['prefix' => 'index', 'middleware' => 'api'], function () {
    Route::get("get-skill", "IndexController@getSkill");
    Route::get("get-experience", "IndexController@getExperience");
    Route::get("get-evaluate", "IndexController@getEvaluate");
    Route::get("get-work", "IndexController@getWork");
    Route::get("get-info", "IndexController@getInfo");
});
