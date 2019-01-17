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
//Route::get('/hello', function () {
//    return ['zdarova'];
//})->middleware(['auth:api', 'scope:hello']);
//
//Route::get('/goodbye', function () {
//    return ['poka'];
//})->middleware(['auth:api', 'scope:goodbye']);
//
//
//
//Route::get('/all', function () {
//    return ['poka', 'zdarova'];
//})->middleware(['auth:api', 'scopes:hello,goodbye']);
//

Route::post('login', 'API\UserController@login');


Route::group(['middleware' => 'auth:api'], function(){
    Route::prefix('user')->group(function(){
        //   Route::get('type', 'API\UserController@type');
  Route::get('/', function(){ return response()->json('kek'); });
    });
    Route::resource('users', 'API\UserController')->only('index');
    Route::post('users/{id}', 'API\UserController@show');
});



