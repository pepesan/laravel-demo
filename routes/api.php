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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('articles', 'ArticleController@index');
// Route::post('articles', 'ArticleController@store');
// Route::get('articles/{article}', 'ArticleController@show');
// Route::put('articles/{article}', 'ArticleController@update');
// Route::delete('articles/{article}', 'ArticleController@delete');
Route::prefix('articles')->group(function () {
    Route::get('', 'ArticleController@index');
    Route::post('', 'ArticleController@store');
    Route::get('/{article}', 'ArticleController@show');
    Route::put('/{article}', 'ArticleController@update');
    Route::delete('/{article}', 'ArticleController@delete');
});
\Illuminate\Support\Facades\Auth::routes(['login'=> false]);
Route::post('register', 'Auth\APIRegisterController@register');
