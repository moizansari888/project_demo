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

use App\Category;
use App\Post;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin',function (){

    return view('admin.index');

});

Route::group(['middleware'=>'admin'],function (){

    Route::resource('admin/user','AdminUserController');

    Route::resource('admin/post','AdminPostController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
