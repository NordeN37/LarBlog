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

Route::get('/blog/category/{slug?}', 'BlogController@category')->name('category');
Route::get('/blog/article/{slug?}', 'BlogController@article')->name('article');


Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth']], function(){
  Route::get('/', 'DashboardController@dashboard')->name('admin.index')->middleware('admin');
  Route::resource('/category', 'CategoryController', ['as'=>'admin'])->middleware('admin');
  Route::resource('/article', 'ArticleController', ['as'=>'admin'])->middleware('admin');
  Route::resource('/tag', 'TagController',['as'=>'admin'])->middleware('admin');
  Route::group(['prefix' => 'user_managment', 'namespace' => 'UserManagment'], function() {
  	Route::resource('/user', 'UserController', ['as' => 'admin.user_managment'])->middleware('admin');
  });
});

Route::group(['prefix'=>'users', 'namespace'=>'User'], function (){
   Route::get('/', 'DashboardController@dashboard')->name('user.index');
   Route::resource('/article', 'ArticleController', ['as'=>'user']);
});

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/', 'HomeController@index');
