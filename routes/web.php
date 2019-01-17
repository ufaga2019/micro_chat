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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/alias', ['uses' => 'MicroChatController@getAlias']);

Route::get('/get', 'MicroChatController@getData');

Route::get('/alias/{alias}',  'MicroChatController@get');

Route::get('/get/{object_id}/{alias}',  'MicroChatController@getObject');
