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
Route::get('newuser', 'CustomerController@newuser');
//Route responsible for creating new user
Route::post('store', 'CustomerController@store');

//Route responsible for file upload
Route::post('files', function(){
  request()->file('file')->store('files');
  return back();
});

Auth::routes();

Route::get('/home', 'HomeController@index');

//Middleware for User Authentication
Route::group(['middleware' => ['auth']], function() {
  //Route for Showing one user
  Route::get('user/{id}', 'CustomerController@profile');
  //Route to show all users
  Route::get('index', 'CustomerController@index');
  //Route responsible for updating user information
  Route::patch('/user/{customer}/approved', 'CustomerController@approvedtoggle');
});
