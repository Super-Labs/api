<?php

use Illuminate\Support\Facades\Route;

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

// the api user
Route::middleware('auth:api')->prefix('/user')->group(function () {
    /* register and login */
    Route::post('register', [\App\Http\Controllers\UserController::class, 'register']); // route register user
    Route::post('login', [\App\Http\Controllers\UserController::class, 'login']); // route login user
});
