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

//Landing Page
Route::get('/', function () {
    return view('welcome');
});

//Route to enter information for new user
Route::group(['middleware' => ['web']], function () {
  Route::get('/newuser', 'CustomerController@newuser');
});

//Route responsible for creating new user
Route::post('/store', 'CustomerController@store');
//Route for Showing one user
Route::get('/user/{id}', 'CustomerController@profile');
//Route responsible for file upload
Route::post('/user/{id}/files', 'CustomerController@upload');
Route::get('/hero', 'CustomerController@hero');

Auth::routes();

Route::get('/home', 'HomeController@index');


//Middleware for User Authentication
Route::group(['middleware' => ['auth']], function() {
  //Route to show all users
  Route::get('/index', 'CustomerController@index');
  //Route responsible for customer approval
  Route::get('/approve/{id}', 'CustomerController@approve');
  //Route responsible for customer unapproval
  Route::get('/unapprove/{id}', 'CustomerController@unapprove');

  Route::get('/approved_index', 'CustomerController@approved_index');
  Route::get('/unapproved_index', 'CustomerController@unapproved_index');
  Route::get('/approve_all', 'CustomerController@approve_all');
  Route::get('/unapprove_all', 'CustomerController@approve_all');
});
