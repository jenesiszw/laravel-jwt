<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;

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

/**
 * auth api routes
 */
Route::controller(AuthController::class)
    ->prefix('auth')
    ->group(function () {
        Route::post('/login', 'login');
        Route::post('/logout', 'logout')->middleware(['jwt']);
        Route::post('/refresh', 'refresh')->middleware(['jwt']);
    });


/**
 * test api route
 */

Route::controller(TestController::class)
    ->prefix('test')
    ->middleware(['jwt'])
    ->group(function () {
        Route::get('/', 'test');
    });