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

Route::group(['middleware' => 'auth:api'], function() {

    Route::get('events', 'EventController@index');
    Route::get('events/{id}', 'EventController@show');
    Route::post('events', 'EventController@store');
    Route::put('events/{id}', 'EventController@update');
    Route::delete('events/{id}', 'EventController@delete');

    Route::get('locations', 'LocationController@index');
    Route::get('locations/{id}', 'LocationController@show');
    Route::post('locations', 'LocationController@store');
    Route::put('locations/{id}', 'LocationController@update');
    Route::delete('locations/{id}', 'LocationController@delete');

    Route::get('stands', 'StandController@index');
    Route::get('stands/{id}', 'StandController@show');
    Route::post('stands', 'StandController@store');
    Route::put('stands/{id}', 'StandController@update');
    Route::delete('stands/{id}', 'StandController@delete');

    Route::get('companies', 'CompanyController@index');
    Route::get('companies/{id}', 'CompanyController@show');
    Route::post('companies', 'CompanyController@store');
    Route::put('companies/{id}', 'CompanyController@update');
    Route::delete('companies/{id}', 'CompanyController@delete');

    Route::get('contacts', 'ContactController@index');
    Route::get('contacts/{id}', 'ContactController@show');
    Route::post('contacts', 'ContactController@store');
    Route::put('contacts/{id}', 'ContactController@update');
    Route::delete('contacts/{id}', 'ContactController@delete');

    Route::get('documents', 'DocumentController@index');
    Route::get('documents/{id}', 'DocumentController@show');
    Route::post('documents', 'DocumentController@store');
    Route::put('documents/{id}', 'DocumentController@update');
    Route::delete('documents/{id}', 'DocumentController@delete');

});

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});