<?php

use App\Http\Controllers\HelloController;
use App\Http\Middleware\HelloMiddleware;
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
    return view('welcome');
});

Route::get('/hello', [HelloController::class, 'index']);
Route::post('/hello', [HelloController::class, 'post']);

Route::get('/hello/show', [HelloController::class, 'show']);

Route::get('/hello/add', [HelloController::class, 'add']);
Route::post('/hello/add', [HelloController::class, 'create']);

Route::get('/hello/edit', [HelloController::class, 'edit']);
Route::post('/hello/edit', [HelloController::class, 'update']);

Route::get('/hello/delete', [HelloController::class, 'delete']);
Route::post('/hello/delete', [HelloController::class, 'remove']);

Route::get('hello/other', 'HelloController@other');
