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



Route::get('/', 'HomeController@index')->name('home');
Route::get('/blogs', 'HomeController@detail');
Route::get('/blogs/{id}', 'HomeController@show');

Route::get('/user/viewprofile/{id}', 'UserController@viewprofile')->name('user.viewprofile');

Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@verify');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::get('/signup', 'SignupController@index')->name('signup');
Route::post('/signup', 'SignupController@verify');

Route::post('/blog/create', 'PostController@Create');
Route::get('/blog/detail/{id}', 'PostController@detail')->name('blog.detail');
Route::get('/blog/edit/{id}', 'PostController@edit')->name('blog.edit');
Route::post('/blog/edit/{id}', 'PostController@saveedit');
Route::get('/blog/delete/{id}', 'PostController@delete')->name('blog.delete');

Route::post('/comment/commentCreate', 'CommentController@commentCreate');

