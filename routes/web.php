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

Route::namespace('WEB')->group(function(){
  Route::get('login','LoginController@index')->name('login');
  Route::post('login/submit','LoginController@submitLogin')->name('login-submit');
  Route::get('register','LoginController@register')->name('register');
  Route::get('/topup','TopupController@index')->name('topup');
  Route::post('/topup/submit','TopupController@topUp')->name('topup-submit');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
