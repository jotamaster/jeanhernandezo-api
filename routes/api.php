<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


// Route::post('login', 'Api\AuthController@login');
// Route::post('register', 'Api\AuthController@register');

Route::get('unauthorized',  function(Request $request){
    return response()->json(['message'=>'unauthorized'],401);
})->name('unauthorized');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/migrate', 'MigrateController@index');
Route::post('/auth/login', 'AuthController@login');
Route::post('/auth/register', 'AuthController@register');
Route::get('/auth/me', 'AuthController@me');

// Route::group(['middleware' => 'auth:api'], function(){
//     Route::get('user-detail', 'Api\AuthController@userDetail');
// });
