<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


Route::group([], function () {

    Route::get('users', 'UserController@all');
    Route::resource('statususers', 'StatusUserController');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logouwwt', 'AuthController@logout');
    });
});

//auhthentication
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::get('unauthorized',function(){
    return response()->json(['message'=>'unauthorized'],401);
})->name('unauthorized');
