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

// Route::get('/', function () {
//     return view('front.home');
// });
Route::get('/', 'HomeController@index');
Route::get('/', 'HomeController@getDistricts');

Auth::routes();

// Register
Route::get('register', 'Auth\RegisterController@getDistricts')->name('register');
Route::get('upazila/get/{id}', 'Auth\RegisterController@getUpazilas');

// login
$this->post('logout', 'Auth\LoginController@logout')->name('logout');
