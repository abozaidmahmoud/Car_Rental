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
//Route::pattern('id','[0-9]+');



Route::get('/','HomeController@home');


//Admin Routes
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'guest:admin'],function(){
	//admin login
	Route::get('login','AdminController@get_login_view');
	Route::post('login','AdminController@login');
	
});

Route::group(['namespace'=>'Admin','middleware'=>'admincheck'],function(){

	//admin home route
	Route::get('admin/home','AdminController@home');

	//agency routes
	Route::resource('admin/agency','AgencyController');
	

	//car routes
	Route::resource('admin/car','CarController');
	
	//user routes
	Route::resource('admin/user','UserController');

	//route for get agency details
	Route::get('admin/agencies_details','AgencyController@agency_detail');

	//route for rented hired under each agency 
	Route::get('admin/agency/{id}/show_rented_user','AgencyController@show_rented_user');

	//route for get car details
	Route::get('admin/car_details','CarController@car_detail');

	
	//agency search
	Route::get('agency/search','AgencyController@search');

	//car search
	Route::get('car/search','CarController@search');

	//user search
	Route::get('user/search','UserController@search');
});

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
});

//admin logout
Route::get('logout','Admin\AdminController@logout');

Route::get('agency/{id}/show_car','HomeController@show_car');

//hire car route
Route::post('hire_car','HomeController@hire_car');

//car search
Route::get('home/car/search','HomeController@search');





