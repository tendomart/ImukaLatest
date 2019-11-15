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

Route::post('/register', 'API\RegisterController@register');
//Deals Rest Controller API

Route::get('/deals', 'API\DealsController@index');
Route::post('/deals', 'API\DealsController@store');
Route::get('/deal/{id}', 'API\DealsController@show');
Route::post('/deals', 'API\DealsController@update');
Route::delete('/deals', 'API\DealsController@store');

  

Route::middleware('auth:api')->group( function () {

   // Route::resource('deals', 'API\DealsController');
	Route::resource('investor', 'API\InvestorController');

});
