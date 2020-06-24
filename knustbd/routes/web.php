<?php

use App\Category;

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
    $categories = Category::all()->sortBy('name');
    return view('welcome', ['categories'=>$categories]);
});



Auth::routes();
// route('Overall.searchedBusinesses');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('businesses/searched', 'BusinessesController@searched')->name('Overall.searched');
Route::resource('businesses', 'BusinessesController');

Route::middleware(['auth'])->group(function () {
    Route::get('businesses/index', 'BusinessesController@index');
    Route::get('businessescategories/sayBusiness', 'BusinessesCategoriesController@sayBusiness');
    // Route::get('businessescategories/{id}', 'BusinessesCategoriesController@store');
    Route::resource('businessescategories', 'BusinessesCategoriesController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('comments', 'CommentsController');
    Route::resource('users', 'UsersController');
});
