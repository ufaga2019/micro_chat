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

use App\Models\MicroChats;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/alias', 'MicroChatController@getAlias');
//
//Route::get('/get', 'MicroChatController@getData');
//
//Route::get('/alias/{alias}',  'MicroChatController@get');
//
//Route::get('/get/{object_id}/{alias}',  'MicroChatController@getObject');




//Route::post('micro_chats', function(Request $request) {
//    return MicroChats::create($request->all());
//});

//Route::put('micro_chats/{id}', function(Request $request, $id) {
//    $article = MicroChats::findOrFail($id);
//    $article->update($request->all());
//
//    return $article;
//});

//Route::delete('micro_chats/{id}', function($id) {
//    MicroChats::find($id)->delete();
//
//    return 204;
//});

//Route::get('/index', 'MicroChatController@index');
//Route::get('/show/{id}', 'MicroChatController@show');
//Route::post('/store', 'MicroChatController@store');
//Route::put('/update/{id}', 'MicroChatController@update');
//Route::delete('/delete/{id}', 'MicroChatController@delete');
