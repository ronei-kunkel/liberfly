<?php

use App\Core\Infra\Http\Controller\Api\Auth\AuthApiController;
use App\Core\Infra\Http\Controller\Api\Flight\FlightApiController;
use App\Core\Infra\Http\Controller\Api\User\UserApiController;
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

Route::post('/user', [UserApiController::class, 'store']);

Route::post('/login', [AuthApiController::class, 'login'])->name('login');

Route::middleware('api')->group(function () {
    Route::resource('flight', FlightApiController::class)->only(['index', 'show'])->middleware('auth:api');
});
