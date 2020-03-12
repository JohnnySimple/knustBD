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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();
// route('Overall.searchedBusinesses');
Route::get('/home', 'HomeController@index')->name('home');


Route::get('businesses/index', 'BusinessesController@index');
Route::get('businesses/searched', 'BusinessesController@searched')->name('Overall.searched');

Route::resource('businesses', 'BusinessesController');
Route::resource('categories', 'CategoriesController');
Route::resource('comments', 'CommentsController');
Route::resource('users', 'UsersController');