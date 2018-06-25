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


Auth::routes();

Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/save/category/{name}', [
	'uses' => 'HomeController@saveCategory',
	'as' => 'category'
	]);
	
Route::get('/all/categories', [
	'uses' => 'HomeController@categories',
	'as' => 'categories'
	]);
	
Route::get('/all/products', [
	'uses' => 'HomeController@products',
	'as' => 'products'
	]);
	
	
Route::get('/sell/products/{cid}/{pid}', [
	'uses' => 'HomeController@sellProduct',
	'as' => 'sellproduct'
	]);
	
Route::get('/auth/store', [
	'uses' => 'HomeController@authStore',
	'as' => 'authStore'
	]);
	
Route::get('/check/store/{pid}', [
	'uses' => 'HomeController@checkStore',
	'as' => 'checkStore'
	]);
	
	
Route::get('/find/sellers/{pid}/{cid}', [
	'uses' => 'HomeController@findSellers',
	'as' => 'findSellers'
	]);
	
Route::get('/active/product/{pid}', [
	'uses' => 'HomeController@activeProduct',
	'as' => 'activeProduct'
	]);
	
Route::get('/remove/product/{pid}', [
	'uses' => 'HomeController@removeProduct',
	'as' => 'removeProduct'
	]);
	

	
Route::post('/upload/image', [
	'uses' => 'HomeController@image',
	'as' => 'image'
	]);	
	
	
Route::post('/submit/product', [
	'uses' => 'HomeController@submitProduct',
	'as' => 'product'
	]);
	
Route::post('/submit/seller', [
	'uses' => 'HomeController@submitSeller',
	'as' => 'submitseller'
	]);
	
Route::post('/map', function (Request $request) {
    $lat = $request->input('lat');
    $long = $request->input('long');
    $location = ["lat"=>$lat, "long"=>$long];
    event(new SendLocation($location));
    return response()->json(['status'=>'success', 'data'=>$location]);
});

	
Route::group(['middleware' => ['auth']], function () {
    //only authorized users can access these routes
});

Route::group(['middleware' => ['guest']], function () {
    //only guests can access these routes
	
	Route::get('guest/all/products', [
	'uses' => 'Controller@guestproducts',
	'as' => 'guestproducts'
	]);
});