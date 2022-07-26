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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/index', [\App\Http\Controllers\v1\UserController::class, 'index']);
//Route::post('/register', [\App\Http\Controllers\v1\UserController::class, 'regisform']);
//Route::post('/login' , [\App\Http\Controllers\v1\UserController::class, 'login'])->name('login');
//post
Route::post('/inpost', [\App\Http\Controllers\v1\PostController::class, 'insertform']);
Route::get('/listpost', [\App\Http\Controllers\v1\PostController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('sanctum/logout', [\App\Http\Controllers\v1\SanctumController::class, 'logout']);
    Route::get('sanctum/index' , [\App\Http\Controllers\v1\SanctumController::class, 'index']);
});

   Route::get('sanctum/list' , [\App\Http\Controllers\v1\SanctumController::class, 'listUser']);
   Route::post('/sanctum/register', [\App\Http\Controllers\v1\SanctumController::class, 'register']);
   Route::post('/sanctum/login', [\App\Http\Controllers\v1\SanctumController::class, 'login'])->name('login');

   Route::get('/queue' , [\App\Http\Controllers\v1\QueueController::class, 'index']);

