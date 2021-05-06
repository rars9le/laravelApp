<?php

use App\http\Controllers\BoardController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\RestappController;

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

Route::get('person', [PersonController::class, 'index']);

Route::get('person/find', [PersonController::class, 'find']);
Route::post('person/find', [PersonController::class, 'search']);

Route::get('person/add', [PersonController::class, 'add']);
Route::post('person/add', [PersonController::class, 'create']);

Route::get('person/edit', [PersonController::class, 'edit']);
Route::post('person/edit', [PersonController::class, 'update']);

Route::get('person/delete', [PersonController::class, 'delete']);
Route::post('person/delete', [PersonController::class, 'remove']);

Route::get('board', [BoardController::class, 'index']);

Route::get('board/add', [BoardController::class, 'add']);
Route::post('board/add', [BoardController::class, 'create']);

Route::resource('rest', RestappController::class);
