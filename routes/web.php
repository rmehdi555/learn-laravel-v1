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


Route::get('/', function () {
    return view('welcome');
});
*/

/*   lesson 2
Route::get('hi',function(){
    return 'salam';
});
Route::get('users/{id}',function ($id){
    return 'id = '.$id;
});
Route::get('usersnull/{id?}',function ($id = null){
    return 'id = '.$id;
});
Route::get('users/{id?}/comment/{comment_id?}',function ($id = null,$comment_id=null){
    return 'id = '.$id.' and comment = '.$comment_id;
});
*/

/* lesson 2

Route::get('index','PageController@index');
Route::get('users/{id?}','PageController@users');
Route::get('welcome','PageController@welcome');

*/

/* lessonn 3,4

Route::get('index','PageController@index');

*/

/* lesson 5
Route::get('post','PostController@index');
Route::post('testpost','PostController@store');

*/

// lesson 8

//    Route::group(['prefix'=>'article'],function(){
//
//          Route::get('','ArticleController@index');
//          Route::get('create','ArticleController@create');
//          Route::post('','ArticleController@store');
//          Route::get('{id}/edit','ArticleController@edit');
//          Route::get('{id}','ArticleController@show');
//           //lesson 15
//          Route::post('{id}/comment','ArticleController@storeComment');
//          Route::put('{id}','ArticleController@update');
//          Route::delete('{id}','ArticleController@destroy');
//
//    });


    //  lesson 20


Route::group(['prefix'=>'category'],function(){

    Route::get('','CategoryController@index');
    Route::post('','CategoryController@store');
    Route::delete('{id}','CategoryController@destroy');
});


//lesson 21

Route::resource('article','ArticleController');
Route::post('article/{id}/comment','ArticleController@storeComment');


//lesson 22

route::resource('dog','DogController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//lesson 23

Route::Auth();
