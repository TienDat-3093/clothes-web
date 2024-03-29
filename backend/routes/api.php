<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\APIProductsController;
use App\Http\Controllers\Api\APIUsersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->group(function(){
    Route::get('me', [APIUsersController::class,"getUser"]);
    Route::post('edit',[APIUsersController::class,"Edit"]);
});
Route::group([

    'middleware' => 'api',
], function ($router) {

    Route::post('login', [APIUsersController::class,"login"]);
    Route::post('logout', [APIUsersController::class,"logout"]);

});

Route::prefix('/product')->group(function(){
    Route::get('/index',[APIProductsController::class,'index']);
    Route::get('/show/{id}',[APIProductsController::class,'show']);
});
