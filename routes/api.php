<?php

use App\Http\Controllers\Api\V1\TeamController;
use App\Http\Controllers\Api\V1\TeamPlayerContoller;
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

Route::post('register', 'App\Http\Controllers\Api\AuthController@register');
Route::post('login', 'App\Http\Controllers\Api\AuthController@login');


Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {

    Route::apiResource('teams', TeamController::class)->except(['index', 'show']);
    Route::apiResource('teamplayers', TeamPlayerContoller::class)->except(['index', 'show']);
});

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['api']], function () {

    Route::apiResource('teams', TeamController::class)->only(['index', 'show']);
    Route::apiResource('teamplayers', TeamPlayerContoller::class)->only(['index', 'show']);
});
