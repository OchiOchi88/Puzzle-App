<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\StageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ユーザー登録
Route::post('users/store', [UserController::class, 'store'])->name('user.store');

// ユーザー情報更新
Route::post('users/update', [UserController::class, 'update'])
    ->middleware('auth:sanctum')->name('users.update');

// ユーザー情報更新
Route::post('users/update', [UserController::class, 'update'])
    ->middleware('auth:sanctum')->name('users.update');
Route::get('stage',
    [StageController::class, 'users'])
    ->name('users.index');
