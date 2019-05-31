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

//facebook socialite

Route::get('login/facebook', 'Auth\LoginController@redirectToFacebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleFBProvidercallback');
Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleProviderCallback');

//Route::post('/giftlist', 'GiftListsController@store')->name('giftlist');

Route::resource('giftlist','GiftListController');
Route::resource('gift','GiftController');

