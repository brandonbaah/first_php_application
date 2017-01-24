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
//Route for Showing one user
Route::get('user/{id}', 'CustomerController@profile');
//Route to show all users
Route::get('index', 'CustomerController@index');
//Route to enter information for new user
Route::get('newuser', 'CustomerController@newuser');
//Route responsible for creating new user
Route::post('store', 'CustomerController@store');
//Route to enter updated information
Route::put('/user/{id}/edit', 'CustomerController@edit');
//Route responsible for updating user information
Route::get('user/{id}', 'CustomerController@update');

//Route responsible for file upload
Route::post('files', function(){
  request()->file('file')->store('files');
  return back();
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('admin', function () {
    echo 'Access granted Oh wise one';
})->middleware('admin');
