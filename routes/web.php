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
Route::patch('/user/{id}/files', 'CustomerController@upload');

Auth::routes();

Route::get('/home', 'HomeController@index');

//Middleware for User Authentication
Route::group(['middleware' => ['auth']], function() {
  //Route to show all users
  Route::get('/index', 'CustomerController@index');
  //Route responsible for updating user information
  Route::put('/user/{id}/approved', [
    'as' => 'customers.approvedtoggle',
    'uses' => 'App\CustomerController@approvedtoggle',
  ]);
});
