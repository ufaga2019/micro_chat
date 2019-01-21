<?php

use App\Models\MicroChats;
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





Route::group(['middleware' => 'auth:api'], function(){

//    Route::get('/alias', 'MicroChatController@getAlias');
//
//    Route::get('/get', 'MicroChatController@getData');
//
//    Route::get('/alias/{alias}',  'MicroChatController@get');
//
//    Route::get('/get/{object_id}/{alias}',  'MicroChatController@getObject');

    Route::get('/home', 'HomeController@index')->name('home');

});
Route::get('/alias', 'MicroChatController@getAlias');

Route::get('/get', 'MicroChatController@getData');

Route::get('/alias/{alias}',  'MicroChatController@get');

Route::get('/get/{object_id}/{alias}',  'MicroChatController@getObject');



    Route::get('/index', 'MicroChatController@index');

    Route::get('/show/{id}', 'MicroChatController@show');

Route::post('/store', 'MicroChatController@store')->name('store');

//    Route::post('/store', function(Request $request) {
//    return MicroChats::create($request->all);
//    });

    Route::put('update/{id}', 'MicroChatController@update');

    Route::delete('delete/{id}', 'MicroChatController@delete');







