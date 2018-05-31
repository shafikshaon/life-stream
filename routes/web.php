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

// Front end
Route::get('donors', 'HomeController@getListOfDonors')->name('list_of_donors');

// Profile
Route::get('profile', 'ProfileController@getProfile')->name('profile')->middleware('auth');
Route::get('profile/details', 'ProfileController@getProfileDetails')->name('profile_details')->middleware('auth');

// Donation
Route::get('donation/add', 'DonationController@getAddDonation')->name('add_donation')->middleware('auth');
Route::post('donation/add', 'DonationController@postAddDonation')->name('add_donation')->middleware('auth');
Route::get('donation/history', 'DonationController@getDonationHistory')->name('donation_history')->middleware('auth');
Route::get('donation/delete/{id}', 'DonationController@deleteDonationInformation')->name('delete_donation')->middleware('auth');
Route::get('donation/edit/{id}', 'DonationController@getEditDonationHistory')->name('edit_donation')->middleware('auth');
Route::post('donation/edit/{id}', 'DonationController@postEditDonationHistory')->name('edit_donation')->middleware('auth');
