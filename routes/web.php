<?php

use App\Core\Infra\Database\Eloquent\FlightRepositoryEloquent;
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

Route::get('/', function () {
    return (new FlightRepositoryEloquent())->get('b41b4964-e3e9-4f86-9af1-5c51617bff34');
});
