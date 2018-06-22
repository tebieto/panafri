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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/save/category/{name}', [
	'uses' => 'HomeController@saveCategory',
	'as' => 'category'
	]);
	
Route::get('/all/categories', [
	'uses' => 'HomeController@categories',
	'as' => 'categories'
	]);
	
Route::post('/upload/image', [
	'uses' => 'HomeController@image',
	'as' => 'image'
	]);	
	
	
Route::post('/submit/product', [
	'uses' => 'HomeController@submitProduct',
	'as' => 'product'
	]);

