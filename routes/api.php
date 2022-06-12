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

Route::apiResource('task.tags', \App\Http\Controllers\TagController::class);
