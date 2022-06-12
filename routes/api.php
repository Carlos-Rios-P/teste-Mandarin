<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TagController;
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

Route::apiResource('task', \App\Http\Controllers\TaskController::class);
Route::patch('task/{id}/status', [TaskController::class, 'updateStatus']);
Route::get('task/{id}/file_url', [TaskController::class, 'getUrl']);

Route::apiResource('task.tag', \App\Http\Controllers\TagController::class)->only('store');
Route::prefix('tag')->group(function(){
    Route::get('/index', [TagController::class, 'index']);
    Route::get('/show/{id}', [TagController::class, 'show']);
    Route::delete('/delete/{id}', [TagController::class, 'delete']);
    Route::put('/update/{id}', [TagController::class, 'update']);
});
