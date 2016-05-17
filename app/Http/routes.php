<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => ['web']], function () {
    // Put all your routes inside here.

    Route::get('/', [
        'as' => 'url',
        'uses' => 'UrlController@index'
        ]);
    Route::post('/url', [
        'as' => 'url',
        'uses' => 'UrlController@store'
        ]);
    
});
 
