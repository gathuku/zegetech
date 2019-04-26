<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/v1/login','API\AuthController@login');
Route::prefix('v1')->namespace('API')->group(function(){

      Route::post('/login','AuthController@login');
      Route::post('/register','AuthController@register');

      //Auth protected
      Route::middleware('APIToken')->group(function(){
             Route::post('/logout','AuthController@logout');
      });

});
